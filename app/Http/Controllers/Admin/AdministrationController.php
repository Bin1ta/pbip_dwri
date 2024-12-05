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
    public function index($documentType)
    {
        $administrations = Administration::where('type', $documentType)->latest()->get();
        $title = DocumentTypeEnum::tryFrom($documentType);
        return view('admin.administration.index', compact('administrations', 'title'));
    }

    public function create($documentType)
    {
        $title = DocumentTypeEnum::tryFrom($documentType);
        return view('admin.administration.create', compact('title', 'title'));
    }

    public function store(StoreAdministrationRequest $request, $documentType)
    {
        Administration::create($request->validated()+[
            'type'=>$documentType
            ]);
        toast('Administration Created Successfully', 'success');
        return redirect(route('admin.administration.index',$documentType));
    }

    public function show($documentType, Administration $administration)
    {
        return view('admin.administration.show', compact('administration', 'documentType'));
    }

    public function edit($documentType, Administration $administration)
    {
        $title = DocumentTypeEnum::tryFrom($documentType);
        return view('admin.administration.create', compact('administration', 'title'));
    }

    public function update(UpdateAdministrationRequest $request, $documentType, Administration $administration)
    {
        $administration->update($request->validated());
        toast('Administration Updated Successfully', 'success');
        return redirect(route('admin.administration.index',$documentType));

    }

    public function destroy($documentType, Administration $administration)
    {
        $administration->delete();
        toast('Administration Deleted Successfully', 'success');
        return redirect(route('admin.administration.index',$documentType));
    }
}
