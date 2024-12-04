{{-- @extends('layouts.master')
@section('content')
    <div class="container-fluid mt-2">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('welcome') }}"><i class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ $committeeMembers->committee?->committeeCategory?->title ?? '' }}</li>
            </ol>
        </nav>
    </div>

    <div class="container-fluid">
        <div class="col-md-12 mb-4">
            <div class="well-heading"
                style="border-left: 10px solid #b31b1b; position: relative;background-color: {{ $colors->nav }};">
                <i class="fa fa-clipboard"></i> {{ $committeeMembers->committee?->committeeCategory?->title ?? '' }}
            </div>
        </div>


        <h4 style="padding:10px; font-weight:bold;">{{ $committeeMembers->committee?->committeeCategory?->title ?? '' }}</h4>

        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>क्र.स</th>
                    <th>नाम, थर</th>
                    <th>ठेगाना</th>
                    <th>पद</th>
                    <th>सम्पर्क नं.</th>
                    <th>फोटो</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($committeeMembers as $committeeMember )
                    <td>5</td>
                    <td>{{ $committeeMember->name  }}</td>
                    <td>गढवा १ पत्रिङगा</td>
                    <td>सदस्य</td>
                    <td></td>
                    <td>
                        <img src="https://pbip.dwri.gov.np/storage/photos/communityMember/b674b2f7accfacba85229d5f3da63ccb.png"
                            alt="" width="180" style="object-fit: contain">
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    </div>
@endsection --}}


@extends('layouts.master')
@section('content')

    <div class="container-fluid mt-2">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('welcome')}}"><i class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">@if(request()->language=='en') {{$committeeMembers->committee->committeeCategory->title}} @else {{$committeeMembers->committee->committeeCategory->title_en}} @endif</li>
            </ol>
        </nav>
    </div>
    <div class="container-fluid">
        <div class="well-heading" style="border-left: 10px solid #b31b1b; position: relative;background-color: {{$colors->nav}};">
            <i class="fa fa-newspaper-o"></i> @if(request()->language=='en') {{$committeeMembers->committee?->committeeCategory->title}} @else {{$committeeMembers->committee?->committeeCategory?->title_en}} @endif
        </div>
        <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>{{__('S.N')}}</th>
                <th>{{__('Title')}}</th>
                <th>{{__('Category')}}</th>
                <th>{{__('Published Date')}}</th>
                <th>{{__('Publisher')}}</th>
                <th></th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        </div>
    </div>
@endsection
