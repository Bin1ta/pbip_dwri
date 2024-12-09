@php use App\Helpers\Helpers; @endphp
@extends('layouts.master')
@section('content')
    <div class="container-fluid mt-2">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('welcome')}}"><i class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page"> {{__('Ex-Employee')}}</li>
            </ol>
        </nav>
    </div>
    <div class="container-fluid mt-2">
        <div class="well-heading"
             style="border-left: 10px solid #b31b1b; position: relative;background-color: {{$colors->nav}};">
            <i class="fa fa-users"></i> {{__('Ex-Employee')}}<h6 class="content_title"><span
                    class="pull-right"></span>
            </h6>
        </div>
        <div class="row">
            @foreach($exEmployees as $employee)
                <div class="col-md-3">
                    <div class="card-container">
                        <img class="rounded" src="{{$employee->photo}}" height="120" width="120"
                             alt="{{$employee->name ?? ''}}">
                        @if(request()->language=='en')
                            <p>{{$employee->name_en ?? ''}}</p>
                            <p>{{$employee->designation_en?? ''}}</p>
                        @else
                            <p>{{$employee->name ?? ''}}</p>
                            <p>{{$employee->designation?? ''}}</p>
                        @endif
                        @if(request()->language=='en')
                        <p> {{Helpers::getEnglishNumber($employee->phone ?? '')}}</p>
                        @else
                        <p>{{Helpers::getNepaliNumber($employee->phone ?? '')}}</p>
                        @endif
                        <p>{{$employee->email ?? ''}}</p>
                        <p>
                            {{ request()->language == 'en' ? 'From' : 'देखि' }}
                            {{ request()->language == 'en' ? $employee->joining_date->toDateString() : Helpers::getNepaliNumber($employee->joining_date->toDateString()) }}
                            {{ request()->language == 'en' ? 'To' : 'सम्म' }}
                            {{ request()->language == 'en' ? $employee->leaving_date->toDateString() : Helpers::getNepaliNumber($employee->leaving_date->toDateString()) }}
                        </p>

                    </div>

                </div>
            @endforeach
        </div>
    </div>
@endsection
