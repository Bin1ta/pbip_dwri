@extends('frontend.sub-division.index')
@section('subDivisionContent')
    <div class="container-fluid mt-2">
        <div class="well-heading" style="border-left: 10px solid #b31b1b; position: relative;background-color: {{$colors->nav}};">
            <i class="fa fa-newspaper-o"></i> {{__('Forest Detail')}}
        </div>
        <div class="table-responsive mt-2">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>{{__('S.N')}}</th>
                    <th>{{__('Name of Community Forest')}}</th>
                    <th>{{__('Category')}}</th>
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
                            <td>{{$forestCategory->title_en}}</td>
                            <td>{{$forestDetail->address_en}}</td>
                        @else
                            <td>{{$forestDetail->forest_name}}</td>
                            <td>{{$forestCategory->title}}</td>
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
@endsection
