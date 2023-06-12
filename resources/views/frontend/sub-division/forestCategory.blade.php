
@extends('layouts.master')
@section('content')
    <div class="container-fluid mt-2">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('welcome')}}"><i class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ request()->language=='en' ? $forestCategory->title_en : $forestCategory->title}}</li>
            </ol>
        </nav>
    </div>
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="well-heading" style="border-left: 10px solid #b31b1b; position: relative;background-color: {{$colors->nav}};">
                    <i class="fa fa-clipboard" ></i> {{request()->language=='en' ? $forestCategory->title_en : $forestCategory->title}}
                </div>
            </div>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>

                        <tr>
                            <th>{{__('S.N')}}</th>
                            <th>{{__('Name of Community Forest')}}</th>
                            <th>{{__('Address')}}</th>
                            <th>{{__('House hold')}}</th>
                            <th>{{__('Area (Hectare)')}}</th>
                            <th>{{__('Approve Date')}}</th>
                            <th>{{__('End Date')}}</th>
                            <th>{{__('Remarks')}}</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($forestCategory->forestDetails as $forestDetail)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                @if(request()->language=='en')
                                    <td>{{$forestDetail->forest_name_en}}</td>
                                    <td>{{$forestDetail->address_en}}</td>
                                @else
                                    <td>{{$forestDetail->forest_name}}</td>
                                    <td>{{$forestDetail->address}}</td>
                                @endif
                                <td>{{$forestDetail->house_hold}}</td>
                                <td>{{$forestDetail->area}}</td>
                                <td>{{$forestDetail->approve_date}}</td>
                                <td>{{$forestDetail->end_date}}</td>
                                @if(request()->language=='en')
                                    <td>{{$forestDetail->remarks_en}}</td>

                                @else
                                    <td>{{$forestDetail->remarks}}</td>

                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
