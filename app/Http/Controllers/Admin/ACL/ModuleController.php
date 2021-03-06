<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateModule;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    protected $repository;

    public function __construct(Module $module)
    {
        $this->repository = $module;

        $this->middleware(['can:modules']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules = $this->repository->paginate();

        return view('admin.pages.modules.index', [
            'modules' => $modules,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.modules.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateModule $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('modules.index')->with('toast_success', 'Módulo cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$module = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.modules.show', [
            'module' => $module,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$module = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.modules.edit', [
            'module' => $module,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateModule $request, $id)
    {
        if(!$module = $this->repository->find($id)) {
            return redirect()->back();
        }

        $module->update($request->all());

        return redirect()->route('modules.index')->with('toast_success', 'Módulo editado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$module = $this->repository->find($id)) {
            return redirect()->back();
        }

        $module->delete();

        return redirect()->route('modules.index')->with('toast_success', 'Módulo deletado com sucesso');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $modules = $this->repository->search($request->filter);

        return view('admin.pages.modules.index', [
            'modules' => $modules,
            'filters' => $filters,
        ]);
    }
}
