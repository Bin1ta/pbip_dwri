<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\WorkPlan\StoreWorkPlanProgressRequest;
use App\Http\Requests\WorkPlan\UpdateWorkPlanProgressRequest;
use App\Models\WorkPlanProgress;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;


class WorkPlanProgressController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        abort_if(
            Gate::denies('contract_progress_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        abort_if(
            Gate::denies('photoGallery_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $workPlanProgress = WorkPlanProgress::all();
        return view('admin.workPlanProgress.index',compact('workPlanProgress'));
    }

    public function create()
    {
        abort_if(
            Gate::denies('contract_progress_create'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        return view('admin.workPlanProgress.create');
    }

    public function store(StoreWorkPlanProgressRequest $request)
    {

        abort_if(
            Gate::denies('contract_progress_create'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        WorkPlanProgress::create($request->validated());
        toast('Work Plan Progress Created Successfully', 'success');
        return redirect(route('admin.work-plan-progress.index'));
    }

    public function show(WorkPlanProgress $workPlanProgress)
    {
        //
    }

    public function edit(WorkPlanProgress $workPlanProgress)
    {
        abort_if(
            Gate::denies('contract_progress_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        return view('admin.workPlanProgress.create',compact('workPlanProgress'));
    }

    public function update(UpdateWorkPlanProgressRequest $request, WorkPlanProgress $workPlanProgress)
    {
        abort_if(
            Gate::denies('contract_progress_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $workPlanProgress->update($request->validated());
        toast('Work Plan Progress Updated Successfully', 'success');
        return redirect(route('admin.work-plan-progress.index'));
    }

    public function destroy(WorkPlanProgress $workPlanProgress)
    {
        abort_if(
            Gate::denies('contract_progress_delete'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $workPlanProgress->delete();
        toast('Work Plan Progress Deleted Successfully', 'success');
        return back();
    }
}
