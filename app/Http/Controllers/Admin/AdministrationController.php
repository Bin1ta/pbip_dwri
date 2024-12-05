<?php

namespace App\Http\Controllers\Admin;

use App\Enums\DocumentTypeEnum;
use App\Http\Requests\Administration\StoreAdministrationRequest;
use App\Http\Requests\Administration\UpdateAdministrationRequest;
use App\Models\Administration;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Illuminate\Http\Request;

class AdministrationController extends BaseController
{
    public function index($documentType)
    {
        abort_if(
            Gate::denies('administration_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $administrations = Administration::where('type', $documentType)->latest()->get();
        $title = DocumentTypeEnum::tryFrom($documentType);
        return view('admin.administration.index', compact('administrations', 'title'));
    }

    public function create($documentType)
    {
         abort_if(
            Gate::denies('administration_create'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $title = DocumentTypeEnum::tryFrom($documentType);
        return view('admin.administration.create', compact('title', 'title'));
    }

    public function store(StoreAdministrationRequest $request, $documentType)
    {
        abort_if(
            Gate::denies('administration_create'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        Administration::create($request->validated()+[
            'type'=>$documentType
            ]);
        toast('Administration Created Successfully', 'success');
        return redirect(route('admin.administration.index',$documentType));
    }

    public function show($documentType, Administration $administration)
    {
         abort_if(
            Gate::denies('administration_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        return view('admin.administration.show', compact('administration', 'documentType'));
    }

    public function edit($documentType, Administration $administration)
    {
        abort_if(
            Gate::denies('administration_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $title = DocumentTypeEnum::tryFrom($documentType);
        return view('admin.administration.create', compact('administration', 'title'));
    }

    public function update(UpdateAdministrationRequest $request, $documentType, Administration $administration)
    {
        abort_if(
            Gate::denies('administration_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $administration->update($request->validated());
        toast('Administration Updated Successfully', 'success');
        return redirect(route('admin.administration.index',$documentType));

    }

    public function destroy($documentType, Administration $administration)
    {
        abort_if(
            Gate::denies('administration_delete'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $administration->delete();
        toast('Administration Deleted Successfully', 'success');
        return redirect(route('admin.administration.index',$documentType));
    }
}
