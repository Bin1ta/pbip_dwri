<?php

namespace App\Http\Controllers\Admin\SubDivision;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\ForestCategory\StoreForestCategoryRequest;
use App\Http\Requests\ForestCategory\UpdateForestCategoryRequest;
use App\Models\ForestCategory;
use Illuminate\Http\Request;

class ForestCategoryController extends BaseController
{
    public function index()
    {
        $forestCategories = ForestCategory::all();
        return view('admin.forestCategory.index', compact('forestCategories'));
    }

    public function create()
    {
        //
    }

    public function store(StoreForestCategoryRequest $request)
    {
        ForestCategory::create($request->validated());

        toast('Forest Category Added Successfully', 'success');

        return back();
    }

    public function show(ForestCategory $forestCategory)
    {
        //
    }

    public function edit(ForestCategory $forestCategory)
    {
        return view('admin.forestCategory.edit', compact('forestCategory'));
    }

    public function update(UpdateForestCategoryRequest $request, ForestCategory $forestCategory)
    {
        $forestCategory->update($request->validated());
        toast('Forest Category Updated Successfully', 'success');

        return redirect(route('admin.forestCategory.index'));
    }

    public function destroy(ForestCategory $forestCategory)
    {
        $forestCategory->delete();
        toast('Forest Category Deleted Successfully', 'success');

        return back();
    }
}
