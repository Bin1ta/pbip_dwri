@extends('layouts.master')
@section('content')
    <div class="container-fluid mt-2">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('welcome')}}"><i class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">{{__('Audio Gallery')}}</li>
            </ol>
        </nav>
    </div>
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="well-heading" style="border-left: 10px solid #b31b1b; position: relative;background-color: {{$colors->nav}};">
                    <i class="fa fa-clipboard" ></i> {{__('Audio Gallery')}}
                </div>
            </div>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>

                        <tr>
                            <th>{{__('S.N')}}</th>
                            <th>{{__('Title')}}</th>
                            <th>{{__('Audio')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($audios as $audio)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                @if(request()->language=='en')
                                    <td>{{$audio->title_en}}</td>
                                @else
                                    <td>{{$audio->title}}</td>
                                @endif
                                <td>
                                    <audio controls="controls">
                                        <source src="{{$audio->file_url}}">
                                    </audio>
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
