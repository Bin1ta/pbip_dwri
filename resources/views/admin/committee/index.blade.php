@extends('layouts.app')

@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>Committees</h2>
                </div>
            </div>
            <div class="col-md-6">
                <a href="{{ route('admin.committee.create') }}" class="btn btn-primary float-end">Add Committee</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-style mb-30">
                <div style="display: flex; justify-content: space-between">
                    </div>
        <div class="table-wrapper table-responsive table-hover">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Place</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($committees as $committee)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $committee->name ?? ''}}</td>
                        <td>{{ $committee->committeeCategory->name ?? '-' }}</td>
                        <td>{{ $committee->place->label() ?? ''}}</td>
                        <td>
                            <a href="{{ route('admin.committee.edit', $committee) }}" class="text-info">                                            <i class="lni lni-pencil"></i>
                            </a>
                            <form action="{{ route('admin.committee.destroy', $committee) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="text-danger show_confirm" type="submit">
                                    <i class="lni lni-trash-can"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
