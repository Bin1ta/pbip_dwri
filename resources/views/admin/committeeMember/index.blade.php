@extends('layouts.app')

@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h3>Committee Members</h3>
                </div>
            </div>
            <div class="col-md-6">
                <div class="breadcrumb-wrapper mb-30">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.committeeMember.index') }}">Committee
                                    Member</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-style mb-30">
                <div style="display: flex; justify-content: space-between">
                    <h6>Committee Member List</h6>
                    <a href="{{ route('admin.committeeMember.create') }}" class="btn btn-sm btn-primary">Add New</a>
                </div>
                <div class="table-wrapper table-responsive table-hover">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Post</th>
                            <th>Photo</th>
                            <th>Committee</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($committeeMembers as $member)
                            <tr>
                                <td>{{ $member->name }}</td>
                                <td>{{ $member->post }}</td>
                                <td>
                                    <img src="{{$member->photo}}" alt="{{$member->name}}" height="80" width="80"></td>
                                <td>{{ $member?->committee?->name }}</td>
                                <td>
                                    <div class="action d-flex align-items-center gap-2">
                                        <!-- Edit Button -->
                                        <a href="{{ route('admin.committeeMember.edit', $member->id) }}"
                                           class="text-info"
                                           data-bs-toggle="tooltip"
                                           data-bs-placement="top"
                                           title="Edit Committee Member"
                                           aria-label="Edit Committee Member">
                                            <i class="lni lni-pencil"></i>
                                        </a>

                                        <!-- View Button -->
                                        <a href="{{ route('admin.committeeMember.show', $member->id) }}"
                                           class="text-info"
                                           data-bs-toggle="tooltip"
                                           data-bs-placement="top"
                                           title="View Committee Member"
                                           aria-label="View Committee Member">
                                            <i class="lni lni-eye"></i>
                                        </a>

                                        <!-- Delete Button -->
                                        <form action="{{ route('admin.committeeMember.destroy', $member->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-danger show_confirm" type="submit">
                                                <i class="lni lni-trash-can"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>



                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{ $committeeMembers->links() }}
                    </div>
@endsection
