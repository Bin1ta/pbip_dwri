<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FinishedContract\StoreFinishedContractRequest;
use App\Http\Requests\FinishedContract\updateFinishedContractRequest;
use App\Models\FinishedContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class FinishedContractController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(
            Gate::denies('finished_contract_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $finishedContracts = FinishedContract::latest()->paginate(10);
        return view('admin.finishedContract.index', compact('finishedContracts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(
            Gate::denies('finished_contract_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        return view('admin.finishedContract.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFinishedContractRequest $request)
    {
        abort_if(
            Gate::denies('finished_contract_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        FinishedContract::create($request->validated());
        toast('Finished Contract Added Successfully', 'success');
        return redirect()->route('admin.finished-contract.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(FinishedContract $finishedContract)
    {
        abort_if(
            Gate::denies('finished_contract_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        return view('admin.finishedContract.edit', compact('finishedContract'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateFinishedContractRequest $request, FinishedContract $finishedContract)
    {
        abort_if(
            Gate::denies('finished_contract_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $finishedContract->update($request->validated());
        toast('Finished Contract Updated Successfully', 'success');
        return redirect()->route('admin.finished-contract.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FinishedContract $finishedContract)
    {
        abort_if(
            Gate::denies('finished_contract_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $finishedContract->delete();
        toast('Finished Contract Deleted Successfully', 'success');
        return back();
    }
    public function currentStatus(FinishedContract $finishedContract)
    {
        abort_if(
            Gate::denies('contract_progress_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        $finishedContract->update([
            'current_status' => !$finishedContract->current_status
        ]);

        toast('Updated Successfully', 'success');

        return back();
    }
    public function contractorLiabilityStatus(FinishedContract $finishedContract)
    {
        abort_if(
            Gate::denies('contract_progress_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        $finishedContract->update([
            'contractors_liability_status' => !$finishedContract->contractors_liability_status
        ]);

        toast('Updated Successfully', 'success');

        return back();
    }
}
