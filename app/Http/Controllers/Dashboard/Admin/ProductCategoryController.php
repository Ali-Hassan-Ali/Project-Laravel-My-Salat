<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{

    public function index()
    {
        $product_categorys = ProductCategory::latest()->get();

        return view('dashboard_admin.product_categorys.index', compact('product_categorys'));

    }//end of index

    
    public function create()
    {
        return view('dashboard_admin.product_categorys.create');

    }//end of ceate

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','max:255'],
            'size' => ['required'],
        ]);

        try {

            ProductCategory::create($request->all());

            session()->flash('success', __('dashboard.added_successfully'));
            return redirect()->route('dashboard.admin.product_categorys.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//en dof store

    
    public function show(ProductCategory $productCategory)
    {
        return $productCategory;
    }

    
    public function edit(ProductCategory $productCategory)
    {
        return view('dashboard_admin.product_categorys.edit', compact('productCategory'));

    }//end of edit

    
    public function update(Request $request, ProductCategory $productCategory)
    {
        $request->validate([
            'name' => ['required','max:255'],
            'size' => ['required'],
        ]);

        try {

            $productCategory->update($request->all());

            session()->flash('success', __('dashboard.updated_successfully'));
            return redirect()->route('dashboard.admin.product_categorys.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of update

    
    public function destroy(ProductCategory $productCategory)
    {
        try {

            $productCategory->delete();

            session()->flash('success', __('dashboard.deleted_successfully'));
            return redirect()->route('dashboard.admin.product_categorys.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of destroy

}//end of controller