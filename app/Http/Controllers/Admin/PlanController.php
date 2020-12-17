<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlan;
use App\Models\Plan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PlanController extends Controller
{
    public $repository;

    public function __construct(Plan $plan)
    {
        $this->repository = $plan;

        $this->middleware(['can:plans']);
    }

    public function index()
    {
        $plans = $this->repository->paginate();

        return view('admin.pages.plans.index', [
            'plans' => $plans,
        ]);
    }

    public function create()
    {
        return view('admin.pages.plans.create');
    }

    public function store(StoreUpdatePlan $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('plans.index')->with('toast_success', 'Plano cadastrado com sucesso');
    }

    public function show($url)
    {

        $plan = $this->repository->where('url', $url)->first();

        if(!$plan) {
            return redirect()->back();
        }

        return view('admin.pages.plans.show', [
            'plan' => $plan,
        ]);
    }

    public function destroy($url)
    {
        $plan = $this->repository
                            ->with('details')
                            ->where('url', $url)->first();

        if(!$plan) {
            return redirect()->back();
        }

        if ($plan->details->count() > 0) {
            return redirect()
                            ->back()
                            ->with('error', 'Existem detalhes vinculados a esse plano, favor deletá-los antes!');
        }

        $plan->delete();

        return redirect()->route('plans.index')->with('toast_success', 'Plano deletado com sucesso');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $plans = $this->repository->search($request->filter);

        return view('admin.pages.plans.index', [
            'plans' => $plans,
            'filters' => $filters,
        ]);
    }

    public function edit($url)
    {
        $plan = $this->repository->where('url', $url)->first();

        if(!$plan) {
            return redirect()->back();
        }

        return view('admin.pages.plans.edit', [
            'plan' => $plan,
        ]);
    }

    public function update(StoreUpdatePlan $request, $url)
    {
        $plan = $this->repository->where('url', $url)->first();

        if(!$plan) {
            return redirect()->back();
        }

        $plan->update($request->all());

        return redirect()->route('plans.index')->with('toast_success', 'Plano editado com sucesso');
    }
}
