@extends('layouts.app')
@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>वनको विवरण</h2>
                </div>
            </div>
            <!-- end col -->
            <div class="col-md-6">
                <div class="breadcrumb-wrapper mb-30">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.dashboard')}}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                वनको विवरण
                            </li>
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
                <div style="display: flex;justify-content: space-between">
                    <h6 class="mb-10">वनको विवरण</h6>
                    <a href="{{route('admin.forestDetail.create')}}" class="btn btn-sm btn-primary">Add New</a>
                </div>
                <div class=" table-responsive table-hover">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>SN</th>
                            <th>सामुदायिक वनको नाम</th>
                            <th>ठेगाना</th>
                            <th>संकेत</th>
                            <th>क्षेत्रफल (हेक्टर)</th>
                            <th>घरधुरी संख्या</th>
                            <th>कार्ययोजना स्विकृत मिति</th>
                            <th>कार्ययोजना समाप्त मिति</th>
                            <th>Action</th>
                        </tr>
                        <!-- end table row-->
                        </thead>
                        <tbody>
                        @forelse($forestDetails as $forestDetail)
                            <tr>
                                <td>
                                    {{$loop->iteration}}
                                </td>
                                <td>{{$forestDetail->forest_name}}</td>
                                <td>{{$forestDetail->address}}</td>
                                <td></td>
                                <td>{{$forestDetail->area}}</td>
                                <td>{{$forestDetail->house_hold}}</td>
                                <td>{{$forestDetail->approve_date}}</td>
                                <td>{{$forestDetail->end_date}}</td>

                                <td>
                                    <div class="action">
                                        <a href="{{route('admin.forestDetail.edit', $forestDetail)}}" class="text-info">
                                            <i class="lni lni-pencil"></i>
                                        </a>
                                        <form action="{{route('admin.forestDetail.destroy',$forestDetail)}}"
                                              method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-danger show_confirm">
                                                <i class="lni lni-trash-can"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="4">No Result Found</td>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>
                    <!-- end table -->
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
@endsection
