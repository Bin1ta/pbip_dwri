<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Registration\StoreRegistrationRequest;
use App\Http\Requests\Registration\UpdateRegistrationRequest;
use App\Models\Registration;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegistrationController extends BaseController
{
    public function index()
    {
        $registrations = Registration::latest()->get();
        return view('admin.registration.index',compact('registrations'));
    }

    public function create()
    {
        return view('admin.registration.create');
    }

    public function store(StoreRegistrationRequest $request)
    {
        Registration::create($request->validated());
        toast('Registration Created Successfully', 'success');
        return redirect(route('admin.registration.index'));
    }

    public function show(Registration $registration)
    {
        return view('admin.registration.show',compact('registration'));
    }

    public function edit(Registration $registration)
    {
        return view('admin.registration.edit',compact('registration'));
    }

    public function update(UpdateRegistrationRequest $request, Registration $registration)
    {
        $registration->update($request->validated());
        toast('Registration Updated Successfully', 'success');
        return redirect(route('admin.registration.index'));
    }

    public function destroy(Registration $registration)
    {
        $registration->delete();
        toast('Registration Deleted Successfully', 'success');
        return redirect(route('admin.registration.index'));
    }
}
