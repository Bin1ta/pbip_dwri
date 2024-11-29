<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Committee\StoreCommitteeRequest;
use App\Http\Requests\Committee\UpdateCommitteeRequest;
use App\Models\Committee;
use App\Models\CommitteeCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class CommitteeController extends BaseController
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

        $committees = Committee::with('committeeCategory')->latest()->get();

        return view('admin.committee.index', compact('committees'));
    }

    public function create()
    {
        abort_if(
            Gate::denies('water_consumption_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $committeeCategory = CommitteeCategory::latest()->get();

        return view('admin.committee.create', compact('committeeCategory'));
    }

    public function store(StoreCommitteeRequest $request)
    {
        abort_if(
            Gate::denies('water_consumption_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        Committee::create($request->validated());
        return redirect(route('admin.committee.index'))->with('success', 'Committee Created');

    }

    public function edit(Committee $committee)
    {

        abort_if(
            Gate::denies('water_consumption_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $committeeCategory = CommitteeCategory::latest()->get();
        return view('admin.committee.edit', compact('committeeCategory','committee'));

    }

    public function update(UpdateCommitteeRequest $request, Committee $committee)
    {
        abort_if(
            Gate::denies('water_consumption_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $committee->update($request->validated());
        return redirect(route('admin.committee.index'))->with('success', 'Committee Updated');

    }

    public function destroy(Committee $committee)
    {
        abort_if(
            Gate::denies('water_consumption_delete'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $committee->delete();
        return redirect(route('admin.committee.index'))->with('success', 'Committee Deleted');

    }
}
