<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\WorkPlan\StoreWorkPlanProgressRequest;
use App\Http\Requests\WorkPlan\UpdateWorkPlanProgressRequest;
use App\Models\WorkPlanProgress;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WorkPlanProgressController extends Controller
{
    public function index()
    {
        $workPlanProgress = WorkPlanProgress::all();
        return view('admin.workPlanProgress.index',compact('workPlanProgress'));
    }

    public function create()
    {
        return view('admin.workPlanProgress.create');
    }

    public function store(StoreWorkPlanProgressRequest $request)
    {
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
        return view('admin.workPlanProgress.create',compact('workPlanProgress'));
    }

    public function update(UpdateWorkPlanProgressRequest $request, WorkPlanProgress $workPlanProgress)
    {
        $workPlanProgress->update($request->validated());
        toast('Work Plan Progress Updated Successfully', 'success');
        return redirect(route('admin.work-plan-progress.index'));
    }

    public function destroy(WorkPlanProgress $workPlanProgress)
    {
        $workPlanProgress->delete();
        toast('Work Plan Progress Deleted Successfully', 'success');
        return back();
    }
}
