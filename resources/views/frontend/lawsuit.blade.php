
@extends('layouts.master')
@section('content')
    <div class="container-fluid mt-2">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('welcome')}}"><i class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">{{__('Lawsuits')}}</li>
            </ol>
        </nav>
    </div>
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="well-heading" style="border-left: 10px solid #b31b1b; position: relative;background-color: {{$colors->nav}};">
                    <i class="fa fa-clipboard" ></i> {{__('Lawsuits')}}
                </div>
            </div>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>

                        <tr>
                            <th>{{__('मुद्दाको किसिम')}}</th>
                            <th>{{__('बिगो')}}</th>
                            <th>{{__('जरिवाना')}}</th>
                            <th>{{__('कैद')}}</th>
                            <th>{{__('दर्ता मिति')}}</th>
                            <th>{{__('दर्ता भएको निकाय')}}</th>
                            <th>{{__('अभियुवकको संख्या')}}</th>
                            <th>{{__('कैफियत')}}</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($lawsuits as $lawsuit)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                @if(request()->language=='en')
                                    <td>{{$lawsuit->type_en}}</td>

                                @else
                                    <td>{{$lawsuit->type}}</td>

                                @endif
                                @if(request()->language=='en')
                                    <td>{{$lawsuit->bigo_en}}</td>

                                @else
                                    <td>{{$lawsuit->bigo}}</td>

                                @endif
                                <td>{{$lawsuit->fine}}</td>
                                <td>{{$lawsuit->jailed}}</td>
                                <td>{{$lawsuit->reg_date}}</td>
                                <td>{{$lawsuit->reg_body}}</td>
                                <td>{{$lawsuit->accused}}</td>
                                <td>{{$lawsuit->remarks}}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
