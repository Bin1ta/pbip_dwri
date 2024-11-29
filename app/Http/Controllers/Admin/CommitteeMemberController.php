<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Committee\StoreCommitteeRequest;
use App\Http\Requests\CommitteeMember\StoreCommitteeMemberRequest;
use App\Http\Requests\CommitteeMember\UpdateCommitteeMemberRequest;
use App\Models\Committee;
use App\Models\CommitteeMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class CommitteeMemberController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        abort_if(
            Gate::denies('water_consumption_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $committeeMembers = CommitteeMember::with('committee')->latest()->paginate(10);
        return view('admin.committeeMember.index', compact('committeeMembers'));
    }

    public function create()
    {
        abort_if(
            Gate::denies('water_consumption_create'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $committees = Committee::all();
        return view('admin.committeeMember.create', compact('committees'));
    }

    public function store(StoreCommitteeMemberRequest $request)
    {
        abort_if(
            Gate::denies('water_consumption_create'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        CommitteeMember::create($request->validated());
        return redirect()->route('admin.committeeMember.index')->with('success', 'Committee Member created successfully.');
    }

    public function edit(CommitteeMember $committeeMember)
    {
        abort_if(
            Gate::denies('water_consumption_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $committees = Committee::all();
        return view('admin.committeeMember.edit', compact('committeeMember', 'committees'));
    }

    public function update(UpdateCommitteeMemberRequest $request, CommitteeMember $committeeMember)
    {
        abort_if(
            Gate::denies('water_consumption_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('committee_members', 'public');
            $request->merge(['photo' => $path]);
        }

        $committeeMember->update($request->validated());
        return redirect()->route('admin.committeeMember.index')->with('success', 'Committee Member updated successfully.');
    }



    public function destroy(CommitteeMember $committeeMember)
    {
        $committeeMember->delete();
        return redirect()->route('admin.committeeMember.index')->with('success', 'Committee Member deleted successfully.');
    }
}
