<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $repository;

    public function __construct(Category $category)
    {
        $this->repository = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->repository->latest()->paginate();

        return view('admin.pages.categories.index', [
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateCategory $request)
    {
        $data = $request->all();

        $this->repository->create($data);

        return redirect()->route('categories.index')->with('toast_success', 'Categoria cadastrada com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = $this->repository->find($id);

        if(!$category) {
            return redirect()->back();
        }

        return view('admin.pages.categories.show', [
            'category' => $category,
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
        $category = $this->repository->find($id);

        if(!$category) {
            return redirect()->back();
        }

        return view('admin.pages.categories.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateCategory $request, $id)
    {
        $category = $this->repository->find($id);

        if(!$category) {
            return redirect()->back();
        }

        $data = $request->all();

        $category->update($data);

        return redirect()->route('categories.index')->with('toast_success', 'Categoria editada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->repository->find($id);

        if(!$category) {
            return redirect()->back();
        }

        $category->delete();

        return redirect()->route('categories.index')->with('toast_success', 'Categoria deletada com sucesso');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $categories = $this->repository->search($request->filter);

        return view('admin.pages.categories.index', [
            'categories' => $categories,
            'filters' => $filters,
        ]);
    }
}
