<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    protected $category;
    protected $product;

    public function __construct(Category $category, Product $product)
    {
        $this->category = $category;
        $this->product = $product;

        $this->middleware(['can:products']);
    }

    public function categories($idProduct)
    {
        $product = $this->product->find($idProduct);

        if(!$product) {
            return redirect()->back();
        }

         $categories = $product->categories()->paginate();

        return view('admin.pages.products.categories.categories', [
             'categories' => $categories,
             'product' => $product,
        ]);
    }

    public function categoriesAvailable(Request $request, $idProduct)
    {
        if(!$product = $this->product->find($idProduct)) {
            return redirect()->back();
        }

        $filters = $request->except('_token');

        // $products = $this->product->paginate();
        $categories = $product->categoriesAvailable($request->filter);

        return view('admin.pages.products.categories.available', [
            'categories' => $categories,
            'product' => $product,
            'filters' => $filters
       ]);
    }

    public function attachCategoriesProduct(Request $request, $idProduct)
    {
        if(!$product = $this->product->find($idProduct)) {
            return redirect()->back();
        }

        if (!$request->categories || count($request->categories) == 0) {
            return redirect()->back()->with('warning', 'Favor selecionar ao menos uma categoria');
        }

        $product->categories()->attach($request->categories);

        return redirect()->route('products.categories', $product->id);
    }

    public function detachCategoriesProduct($idProduct, $idCategory)
    {

        $product = $this->product->find($idProduct);
        $category = $this->category->find($idCategory);

        if(!$category || !$product) {
            return redirect()->back();
        }

        $product->categories()->detach($category);

        return redirect()->route('products.categories', $product->id);

    }

    public function products($idCategory)
    {
        $category = $this->category->find($idCategory);

        if(!$category) {
            return redirect()->back();
        }

        $products = $category->categorys()->paginate();

        return view('admin.pages.categories.products.products', [
            'products' => $products,
             'category' => $category,
        ]);
    }
}
