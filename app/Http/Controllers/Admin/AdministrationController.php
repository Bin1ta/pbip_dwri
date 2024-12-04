<?php

namespace App\Http\Controllers\Admin;

use App\Enums\DocumentTypeEnum;
use App\Http\Requests\Administration\StoreAdministrationRequest;
use App\Http\Requests\Administration\UpdateAdministrationRequest;
use App\Models\Administration;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdministrationController extends BaseController
{
    public function index(Request $request)
    {
        $type = $request->query('type');
        $documentType = DocumentTypeEnum::tryFrom($type);
        $title = $documentType ? $documentType->label() : '';
        $administrations = Administration::latest()
            ->get();
        return view('admin.administration.index', compact('administrations', 'title'));
    }


    public function create(Request $request)
    {
        $type = $request->query('type');
        $documentType = DocumentTypeEnum::tryFrom($type);
        $title = $documentType ? $documentType->label() : '';
        return view('admin.administration.create', compact('title', 'type'));
    }

    public function store(StoreAdministrationRequest $request)
    {
        Administration::create($request->validated());
        toast('Administration Created Successfully', 'success');
        return redirect(route('admin.administration.index'));
    }

    public function show(Administration $administration)
    {
        //
    }

    public function edit(Administration $administration, Request $request)
    {
        $type = $request->query('type');
        $documentType = DocumentTypeEnum::tryFrom($type);
        $title = $documentType ? $documentType->label() : '';
        return view('admin.administration.create',compact('administration', 'title', 'type'));
    }

    public function update(UpdateAdministrationRequest $request, Administration $administration)
    {
        $administration->update($request->validated());
        toast('Administration Updated Successfully', 'success');
        return redirect(route('admin.administration.index'));

    }

    public function destroy(Administration $administration)
    {
        $administration->delete();
        toast('Administration Deleted Successfully', 'success');
        return back();
    }
}
