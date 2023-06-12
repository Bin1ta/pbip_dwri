<?php

namespace App\Http\Controllers\Admin\SubDivision;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\ForestDetail\StoreForestDetailRequest;
use App\Http\Requests\ForestDetail\UpdateForestDetailRequest;
use App\Models\ForestCategory;
use App\Models\ForestDetail;
use App\Models\SubDivision\SubDivision;
use Illuminate\Http\Request;

class SubDivisionForestController extends BaseController
{
    public function index(SubDivision $subDivision)
    {
        $forestDetails = ForestDetail::where('sub_division_id', $subDivision->id)->get();
        return view('admin.subDivisions.subDivisionForest.index', compact('forestDetails','subDivision'));
    }

    public function create(SubDivision $subDivision)
    {
        $forestCategories = ForestCategory::all();
        return view('admin.subDivisions.subDivisionForest.create', compact('subDivision','forestCategories'));
    }

    public function store(StoreForestDetailRequest $request, SubDivision $subDivision)
    {
        ForestDetail::create($request->validated() + [
                'sub_division_id' => $subDivision->id
            ]);
        toast('Forest Detail Added Successfully', 'success');
        return back();
    }

    public function show(SubDivision $subDivision, ForestDetail $forestDetail)
    {
        //
    }

    public function edit(SubDivision $subDivision, ForestDetail $forestDetail)
    {
        $forestCategories = ForestCategory::all();
        return view('admin.subDivisions.subDivisionForest.edit', compact('forestCategories','subDivision','forestDetail'));
    }

    public function update(UpdateForestDetailRequest $request, SubDivision $subDivision, ForestDetail $forestDetail)
    {
        $forestDetail->update($request->validated());
        toast('Forest Detail Updated Successfully', 'success');
        return redirect(route('admin.subDivision.forestDetail.index', $subDivision));
    }

    public function destroy(SubDivision $subDivision, ForestDetail $forestDetail)
    {
        $forestDetail->delete();
        toast('Forest Detail delete Successfully', 'success');
        return back();

    }
}
