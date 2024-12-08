<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Registration\StoreRegistrationRequest;
use App\Http\Requests\Registration\UpdateRegistrationRequest;
use App\Models\Registration;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
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
        return view('admin.registration.index', compact('registrations'));
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

        $registration = Registration::create($request->validated());

        if ($request->has('docs')) {
            foreach ($request->file('docs') as $file) {
                // Store file
                $filePath = $file->store('docs', 'public');

                // Log and handle errors
                if (!$filePath) {
                    Log::error('Failed to store file: ' . $file->getClientOriginalName());
                    continue; // Skip this file if storage fails
                }

                // Save file information to the database
                $registration->docs()->create([
                    'doc' => $filePath,
                ]);
            }
        }

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
        $registration->load('docs');
        return view('admin.registration.show', compact('registration'));
    }

    public function edit(Registration $registration)
    {
        abort_if(
            Gate::denies('registration_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        return view('admin.registration.edit', compact('registration'));
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

    public function deletePhoto(Registration $registration)
    {
        foreach ($registration->docs as $doc) {
            if (Storage::disk('public')->exists($doc->doc)) {
                Storage::disk('public')->delete($doc->doc);
            }
            $doc->delete();
        }

        $registration->delete();
        toast('Document and Registration Deleted Successfully', 'success');
        return redirect()->back();
    }


}
