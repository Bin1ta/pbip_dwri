@extends('layouts.app')

@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h3>Committee Categories</h3>
                </div>
            </div>
            <div class="col-md-6">
                <div class="breadcrumb-wrapper mb-30">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.committeeCategory.index') }}">Committee Categories</a></li>
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
                    <h6>Committee Category List</h6>
                    <a href="{{ route('admin.committeeCategory.create') }}" class="btn btn-sm btn-primary">Add New</a>
                </div>
                <div class="table-wrapper table-responsive table-hover">
                    <table class="table">
                        <thead>
                        <tr>
                            <th><h6>Name</h6></th>
                            <th><h6>Name (English)</h6></th>
                            <th><h6>place</h6></th>
                            <th><h6>Action</h6></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($committeeCategories as $committeeCategory)
                            <tr>
                                <td class="min-width">
                                    <p>{{ $committeeCategory->title }}</p>
                                </td>
                                <td class="min-width">
                                    <p>{{ $committeeCategory->title_en }}</p>
                                </td>
                                <td class="min-width">
                                    <p>{{ $committeeCategory->place->label() ??'' }}</p>
                                </td>

                                <td>
                                    <div class="action">
                                        <a href="{{ route('admin.committeeCategory.edit', $committeeCategory) }}" class="text-info">
                                            <i class="lni lni-pencil"></i>
                                        </a>
                                        <form action="{{ route('admin.committeeCategory.destroy', $committeeCategory) }}" method="POST" style="display: inline-block;">
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
                </div>
            </div>
        </div>
    </div>
@endsection
