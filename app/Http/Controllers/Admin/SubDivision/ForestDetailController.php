<?php

namespace App\Http\Controllers\Admin\SubDivision;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\ForestDetail\StoreForestDetailRequest;
use App\Http\Requests\ForestDetail\UpdateForestDetailRequest;
use App\Models\ForestCategory;
use App\Models\ForestDetail;
use Illuminate\Http\Request;
use function Symfony\Component\String\b;

class ForestDetailController extends BaseController
{
    public function index()
    {
        $forestDetails = ForestDetail::all();
        return view('admin.forestDetail.index', compact('forestDetails'));
    }

    public function create()
    {
        $forestCategories = ForestCategory::all();
        return view('admin.forestDetail.create', compact('forestCategories'));
    }

    public function store(StoreForestDetailRequest $request)
    {
        ForestDetail::create($request->validated());
        toast('Forest Detail Updated Successfully', 'success');

        return back();
    }

    public function show(ForestDetail $forestDetail)
    {
        //
    }

    public function edit(ForestDetail $forestDetail)
    {
        $forestCategories = ForestCategory::all();
        return view('admin.forestDetail.edit', compact('forestCategories', 'forestDetail'));
    }

    public function update(UpdateForestDetailRequest $request, ForestDetail $forestDetail)
    {
        $forestDetail->update($request->validated());
        toast('Forest Detail Updated Successfully', 'success');

        return redirect(route('admin.forestDetail.index'));
    }

    public function destroy(ForestDetail $forestDetail)
    {
        $forestDetail->delete();

        toast('Forest Detail Deleted Successfully', 'success');
        return back();
    }
}
