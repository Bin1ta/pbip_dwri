<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\canal\StoreCanalRequest;
use App\Http\Requests\canal\UpdateCanalRequest;
use App\Models\Canal;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class CanalController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        abort_if(
            Gate::denies('canal_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        $canals = Canal::latest()->get();

        return view('admin.canal.index', compact('canals'));
    }


    public function store(StoreCanalRequest $request)
    {
        abort_if(
            Gate::denies('canal_create'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        Canal::create($request->validated());

        toast('Canal Added Successfully', 'success');

        return back();

    }


    public function edit(Canal $canal)
    {
        abort_if(
            Gate::denies('canal_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        return view('admin.canal.edit', compact('canal'));
    }

    public function update(UpdateCanalRequest $request, Canal $canal)
    {
        abort_if(
            Gate::denies('canal_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        if ($request->hasFile('photo')) {
            if ($canal->photo) {
                $this->deleteFile($canal->getRawOriginal('photo'));
            }
        }

        $canal->update($request->validated());

        toast('Canal Updated Successfully', 'success');

        return redirect(route('admin.canal.index'));
    }

    public function destroy(Canal $canal)
    {
        abort_if(
            Gate::denies('canal_delete'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        if ($canal->photo) {
            $this->deleteFile($canal->getRawOriginal('photo'));
        }

        $canal->delete();

        toast('Canal Deleted Successfully', 'success');

        return redirect(route('admin.canal.index'));
    }
}
