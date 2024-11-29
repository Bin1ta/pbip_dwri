<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommitteeCategory\StoreCommitteeCategoryRequest;
use App\Http\Requests\CommitteeCategory\UpdateCommitteeCategoryRequest;
use App\Models\CommitteeCategory;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class CommitteeCategoryController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        abort_if(
            Gate::denies('water_consumption_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $committeeCategories = CommitteeCategory::all();
        return view('admin.committeeCategory.index', compact('committeeCategories'));
    }

    public function create()
    {
        abort_if(
            Gate::denies('water_consumption_create'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        return view('admin.committeeCategory.create');
    }

    public function store(StoreCommitteeCategoryRequest $request)
    {
        abort_if(
            Gate::denies('water_consumption_create'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        CommitteeCategory::create($request->validated());
        return redirect(route('admin.committeeCategory.index'))->with('success', 'Committee Category Created');
    }

    public function show(CommitteeCategory $committeeCategory)
    {
        //
    }

    public function edit(CommitteeCategory $committeeCategory)
    {
        abort_if(
            Gate::denies('water_consumption_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        return view('admin.committeeCategory.edit', compact('committeeCategory'));
    }
    public function update(UpdateCommitteeCategoryRequest $request, CommitteeCategory $committeeCategory)
    {
        abort_if(
            Gate::denies('water_consumption_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        $committeeCategory->update($request->validated());

        return redirect(route('admin.committeeCategory.index'))->with('success', 'Committee Category Updated');
    }

    public function destroy(CommitteeCategory $committeeCategory)
    {
        abort_if(
            Gate::denies('water_consumption_delete'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        $committeeCategory->delete();

        return redirect(route('admin.committeeCategory.index'))->with('success', 'Committee Category Deleted');
    }
}
