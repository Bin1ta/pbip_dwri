<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Registration\StoreRegistrationRequest;
use App\Http\Requests\Registration\UpdateRegistrationRequest;
use App\Models\Registration;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Illuminate\Http\Request;

class RegistrationController extends BaseController
{
    public function index()
    {
        abort_if(
            Gate::denies('registration_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $registrations = Registration::latest()->get();
        return view('admin.registration.index',compact('registrations'));
    }

    public function create()
    {
        abort_if(
            Gate::denies('registration_create'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        return view('admin.registration.create');
    }

    public function store(StoreRegistrationRequest $request)
    {
        abort_if(
            Gate::denies('registration_create'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        Registration::create($request->validated());
        toast('Registration Created Successfully', 'success');
        return redirect(route('admin.registration.index'));
    }

    public function show(Registration $registration)
    {
        abort_if(
            Gate::denies('registration_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        return view('admin.registration.show',compact('registration'));
    }

    public function edit(Registration $registration)
    {
        abort_if(
            Gate::denies('registration_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        return view('admin.registration.edit',compact('registration'));
    }

    public function update(UpdateRegistrationRequest $request, Registration $registration)
    {
        abort_if(
            Gate::denies('registration_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $registration->update($request->validated());
        toast('Registration Updated Successfully', 'success');
        return redirect(route('admin.registration.index'));
    }

    public function destroy(Registration $registration)
    {
        abort_if(
            Gate::denies('registration_delete'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $registration->delete();
        toast('Registration Deleted Successfully', 'success');
        return redirect(route('admin.registration.index'));
    }
}
