<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanModuleController extends Controller
{
    protected $plan;
    protected $module;

    public function __construct(Plan $plan, Module $module)
    {
        $this->plan = $plan;
        $this->module = $module;

        $this->middleware(['can:plans']);
    }

    public function modules($idPlan)
    {
        $plan = $this->plan->find($idPlan);

        if(!$plan) {
            return redirect()->back();
        }

         $modules = $plan->modules()->paginate();

        return view('admin.pages.plans.modules.modules', [
             'plan' => $plan,
             'modules' => $modules,
        ]);
    }

    public function modulesAvailable(Request $request, $idPlan)
    {
        if(!$plan = $this->plan->find($idPlan)) {
            return redirect()->back();
        }

        $filters = $request->except('_token');

        // $modules = $this->module->paginate();
        $modules = $plan->modulesAvailable($request->filter);

        return view('admin.pages.plans.modules.available', [
            'plan' => $plan,
            'modules' => $modules,
            'filters' => $filters
       ]);
    }

    public function attachModulesPlan(Request $request, $idPlan)
    {
        if(!$plan = $this->plan->find($idPlan)) {
            return redirect()->back();
        }

        if (!$request->modules || count($request->modules) == 0) {
            return redirect()->back()->with('warning', 'Favor selecionar ao menos uma permissão');
        }


        $plan->modules()->attach($request->modules);

        return redirect()->route('plans.modules', $plan->id);
    }

    public function detachModulesPlan($idPlan, $idModule)
    {
        $plan = $this->plan->find($idPlan);
        $module = $this->module->find($idModule);

        if(!$plan || !$module) {
            return redirect()->back();
        }

        $plan->modules()->detach($module);

        return redirect()->route('modules.plans', $module->id);

    }

    public function plans($idModule)
    {
        $module = $this->module->find($idModule);

        if(!$module) {
            return redirect()->back();
        }

        $plans = $module->plans()->paginate();

        return view('admin.pages.modules.plans.plans', [
            'module' => $module,
             'plans' => $plans,
        ]);
    }
}
