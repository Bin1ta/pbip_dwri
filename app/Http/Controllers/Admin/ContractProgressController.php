<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\ContractProgress\StoreContractProgressRequest;
use App\Http\Requests\ContractProgress\UpdateContractProgressRequest;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

use App\Models\ContractProgress;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Spatie\LaravelIgnition\Http\Controllers\UpdateConfigController;

class ContractProgressController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(
            Gate::denies('contract_progress_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $contractProgresses = ContractProgress::latest()->paginate(10);
        return view('admin.contractProgress.index', compact('contractProgresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(
            Gate::denies('contract_progress_create'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        return view('admin.contractProgress.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContractProgressRequest $request)
    {

        abort_if(
            Gate::denies('contract_progress_create'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        ContractProgress::create($request->validated());
        toast('Contract Progress Added Successfully', 'success');
        return redirect(route('admin.contract-progress.index'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ContractProgress $contractProgress)
    {
        abort_if(
            Gate::denies('contract_progress_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        return view('admin.contractProgress.edit',compact('contractProgress'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContractProgressRequest $request, ContractProgress $contractProgress)
    {
        abort_if(
            Gate::denies('contract_progress_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        $contractProgress->update($request->validated());
        toast('Contract Progress updated Successfully', 'success');
        return redirect(route('admin.contract-progress.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContractProgress $contractProgress)
    {
        abort_if(
            Gate::denies('contract_progress_delete'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $contractProgress->delete();
        toast('Contract Progress Deleted', 'success');
        return back();
    }

    public function updateStatus(ContractProgress $contractProgress)
    {
        abort_if(
            Gate::denies('contract_progress_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        $contractProgress->update([
            'progress_status' => !$contractProgress->progress_status
        ]);

        toast('Updated Successfully', 'success');

        return back();
    }

}
