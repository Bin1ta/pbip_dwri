<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TotalProgress\StoreTotalProgressRequest;
use App\Http\Requests\TotalProgress\UpdateTotalProgressRequest;
use App\Models\TotalProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class TotalProgressController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(
            Gate::denies('total_progress_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $totalProgresses = TotalProgress::latest()->paginate(10);
        return view('admin.totalProgress.index', compact('totalProgresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(
            Gate::denies('total_progress_create'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        return view('admin.totalProgress.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTotalProgressRequest $request)
    {
        abort_if(
            Gate::denies('total_progress_create'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        TotalProgress::create($request->validated());
        toast('Total Progress Added Successfully', 'success');
        return redirect(route('admin.total-progress.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_if(
            Gate::denies('total_progress_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TotalProgress $totalProgress)
    {
        abort_if(
            Gate::denies('total_progress_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        return view('admin.totalProgress.edit', compact('totalProgress'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTotalProgressRequest $request, TotalProgress $totalProgress)
    {
        abort_if(
            Gate::denies('total_progress_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $totalProgress->update($request->validated());
        toast('Total Progress Updated Successfully', 'success');
        return redirect(route('admin.total-progress.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TotalProgress $totalProgress)
    {
        abort_if(
            Gate::denies('total_progress_delete'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $totalProgress->delete();
        toast('Total Progress Deleted Successfully', 'success');
        return back();
    }
}
