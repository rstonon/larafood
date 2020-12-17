<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateTable;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    private $repository;

    public function __construct(Table $table)
    {
        $this->repository = $table;

        $this->middleware(['can:tables']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tables = $this->repository->paginate();

        return view('admin.pages.tables.index', [
            'tables' => $tables,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.tables.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateTable $request)
    {
        $data = $request->all();

        $this->repository->create($data);

        return redirect()->route('tables.index')->with('toast_success', 'Mesa cadastrada com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $table = $this->repository->find($id);

        if(!$table) {
            return redirect()->back();
        }

        return view('admin.pages.tables.show', [
            'table' => $table,
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
        $table = $this->repository->find($id);

        if(!$table) {
            return redirect()->back();
        }

        return view('admin.pages.tables.edit', [
            'table' => $table,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateTable $request, $id)
    {
        $table = $this->repository->find($id);

        if(!$table) {
            return redirect()->back();
        }

        $data = $request->all();

        $table->update($data);

        return redirect()->route('tables.index')->with('toast_success', 'Mesa editada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table = $this->repository->find($id);

        if(!$table) {
            return redirect()->back();
        }

        $table->delete();

        return redirect()->route('tables.index')->with('toast_success', 'Mesa deletada com sucesso');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $tables = $this->repository->search($request->filter);

        return view('admin.pages.tables.index', [
            'tables' => $tables,
            'filters' => $filters,
        ]);
    }
}
