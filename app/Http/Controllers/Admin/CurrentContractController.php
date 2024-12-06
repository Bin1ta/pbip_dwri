<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CurrentContract\StoreCurrentContractRequest;
use App\Http\Requests\CurrentContract\UpdateCurrentContractRequest;
use App\Models\CurrentContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class CurrentContractController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
    }    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(
            Gate::denies('current_contract_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $currentContracts=CurrentContract::latest()->paginate(10);
        return view('admin.currentContract.index',compact('currentContracts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(
            Gate::denies('current_contract_create'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
       return view('admin.currentContract.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCurrentContractRequest $request)
    {
        abort_if(
            Gate::denies('current_contract_create'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        CurrentContract::create($request->validated());
        toast('Current Contract Added Successfully','success');
        return redirect(route('admin.current-contract.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CurrentContract $currentContract)
    {
        abort_if(
            Gate::denies('current_contract_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        return view('admin.currentContract.edit', compact('currentContract'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCurrentContractRequest $request, CurrentContract $currentContract)
    {
        abort_if(
            Gate::denies('current_contract_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $currentContract->update($request->validated());
        toast('Current Contract Updated Successfully','success');
        return redirect(route('admin.current-contract.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CurrentContract $currentContract)
    {
        abort_if(
            Gate::denies('current_contract_delete'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $currentContract->delete();
        toast('Current Contract Deleted Successfully','success');
        return back();
    }

    public function updateStatus(CurrentContract $currentContract)
    {
        abort_if(
            Gate::denies('current_contract_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        $currentContract->update([
            'current_status' =>!$currentContract->current_status
        ]);
        toast('Updated Successfully', 'success');
        return back();
    }
}
