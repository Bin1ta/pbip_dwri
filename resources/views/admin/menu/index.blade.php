@extends('layouts.app')
@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>मेनु</h2>
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
                                मेनु लिस्ट
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
                    <h6 class="mb-10">Menu List</h6>
                    <a href="{{route('admin.menu.create')}}" class="btn btn-sm btn-primary">Add New</a>
                </div>
                <div class="table-responsive table-hover">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>SN</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>URL</th>
                            <th>Action</th>
                        </tr>
                        <!-- end table row-->
                        </thead>
                        <tbody>
                        @forelse($menus as $menu)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$menu->title}}</td>
                                <td>
                                    <a href="{{route('admin.menu.updateStatus',$menu)}}">
                                        @if($menu->status==1)
                                            <i class="mdi mdi-check mdi-24px text-success"></i>
                                        @else
                                            <i class="mdi mdi-window-close mdi-24px text-danger"></i>
                                        @endif

                                    </a>
                                </td>
                                <td>
                                    @if($menu->menus_count > 0)
                                        Main Menu
                                    @else
                                        @if(!empty($menu->model))
                                            @switch($menu->type)
                                                @case('category')
                                                    {{route('documentCategory', $menu->model->slug)}}
                                                    @break
                                                @case('subDivision')
                                                    {{route('subDivision', $menu->model->slug)}}
                                                    @break
                                                @case('forestCategory')
                                                    {{route('forestCategory', $menu->model->slug)}}
                                                    @break
                                                @default
                                                    {{route('officeDetail', $menu->model->slug)}}
                                            @endswitch
                                        @else
                                            {{route('static',$menu->slug)}}
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    <div class="action">
                                        <a href="{{route('admin.menu.edit', $menu)}}" class="text-info">
                                            <i class="lni lni-pencil"></i>
                                        </a>
                                        <form action="{{route('admin.menu.destroy',$menu)}}"
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
                            @foreach($menu->menus as $subMenu)
                                <tr style="background-color: #e0e7f2">
                                    <td> {{$loop->parent->iteration}}.{{$loop->iteration}}</td>
                                    <td>{{$subMenu->title}}</td>
                                    <td>
                                        <a href="{{route('admin.menu.updateStatus',$menu)}}">
                                            @if($subMenu->status==1)
                                                <i class="mdi mdi-check mdi-24px text-success"></i>
                                            @else
                                                <i class="mdi mdi-window-close mdi-24px text-danger"></i>
                                            @endif

                                        </a>
                                    </td>
                                    <td>
                                        @if(!empty($subMenu->model))
                                            @switch($subMenu->type)
                                                @case('category')
                                                    {{route('documentCategory', $subMenu->model->slug)}}
                                                    @break
                                                @case('subDivision')
                                                    {{route('subDivision', $subMenu->model->slug)}}
                                                    @break
                                                @case('forestCategory')
                                                    {{route('forestCategory', $subMenu->model->slug)}}
                                                    @break
                                                @default
                                                    {{route('officeDetail', $subMenu->model->slug)}}
                                            @endswitch
                                        @else
                                            {{route('static',$subMenu->slug)}}
                                        @endif
                                    </td>
                                    <td>
                                        <div class="action">
                                            <a href="{{route('admin.menu.edit', $subMenu)}}" class="text-info">
                                                <i class="lni lni-pencil"></i>
                                            </a>
                                            <form action="{{route('admin.menu.destroy',$subMenu)}}"
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
                            @endforeach
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
