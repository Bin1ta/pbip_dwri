<?php

namespace App\Http\Controllers\Admin;

use App\Enums\DocumentTypeEnum;
use App\Http\Requests\Administration\StoreAdministrationRequest;
use App\Http\Requests\Administration\UpdateAdministrationRequest;
use App\Models\Administration;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class AdministrationController extends BaseController
{
    public function index(Request $request)
    {
        abort_if(
            Gate::denies('administration_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $title = 'Administration';
        $type = $request->get('type');
        $administrations = Administration::when($type, function ($query, $type) {
            $query->where('type', $type);
        })->latest()->get();

        return view('admin.administration.index', compact('administrations', 'title'));
    }



    public function create(Request $request)
    {
        abort_if(
            Gate::denies('administration_create'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $type = $request->query('type');
        $documentType = DocumentTypeEnum::tryFrom($type);
        $title = $documentType ? $documentType->label() : '';
        return view('admin.administration.create', compact('title', 'type'));
    }

    public function store(StoreAdministrationRequest $request)
    {
        abort_if(
            Gate::denies('administration_create'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        Administration::create($request->validated());
        toast('Administration Created Successfully', 'success');
        return redirect(route('admin.administration.index'));
    }

    public function show(Administration $administration)
    {
        abort_if(
            Gate::denies('administration_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        return view('admin.administration.show', compact('administration'));
    }

    public function edit(Administration $administration, Request $request)
    {
        abort_if(
            Gate::denies('administration_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $type = $request->query('type');
        $documentType = DocumentTypeEnum::tryFrom($type);
        $title = $documentType ? $documentType->label() : '';
        return view('admin.administration.create',compact('administration', 'title', 'type'));
    }

    public function update(UpdateAdministrationRequest $request, Administration $administration)
    {
        abort_if(
            Gate::denies('administration_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $administration->update($request->validated());
        toast('Administration Updated Successfully', 'success');
        return redirect(route('admin.administration.index'));

    }

    public function destroy(Administration $administration)
    {
        abort_if(
            Gate::denies('administration_delete'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $administration->delete();
        toast('Administration Deleted Successfully', 'success');
        return back();
    }
}
