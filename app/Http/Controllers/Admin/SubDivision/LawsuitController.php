<?php

namespace App\Http\Controllers\Admin\SubDivision;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Lawsuit\StoreLawsuitRequest;
use App\Http\Requests\Lawsuit\UpdateLawsuitRequest;
use App\Models\Lawsuit;
use Illuminate\Http\Request;

class LawsuitController extends BaseController
{
    public function index()
    {
        $lawsuits = Lawsuit::all();
        return view('admin.lawsuit.index', compact('lawsuits'));
    }

    public function create()
    {
        return view('admin.lawsuit.create');
    }

    public function store(StoreLawsuitRequest $request)
    {
        Lawsuit::create($request->validated());
        toast('Lawsuit added successfully', 'success');
        return back();
    }

    public function show(Lawsuit $lawsuit)
    {
        //
    }

    public function edit(Lawsuit $lawsuit)
    {
        return view('admin.lawsuit.edit',compact('lawsuit'));
    }

    public function update(UpdateLawsuitRequest $request, Lawsuit $lawsuit)
    {
        $lawsuit->update($request->validated());
        toast('Lawsuit updated successfully', 'success');
        return redirect(route('admin.lawsuit.index'));
    }

    public function destroy(Lawsuit $lawsuit)
    {
        $lawsuit->delete();
        toast('Lawsuit deleted successfully', 'success');
        return back();
    }
}
