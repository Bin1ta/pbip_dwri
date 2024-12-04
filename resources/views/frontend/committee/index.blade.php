 @extends('layouts.master')
@section('content')
    <div class="container-fluid mt-2">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('welcome') }}"><i class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ $committeeCategory?->title ?? '' }}</li>
            </ol>
        </nav>
    </div>

    <div class="container-fluid">
        <div class="col-md-12 mb-4">
            <div class="well-heading"
                style="border-left: 10px solid #b31b1b; position: relative;background-color: {{ $colors->nav }};">
                <i class="fa fa-clipboard"></i> {{ $committeeCategory?->title ?? '' }}
            </div>
        </div>
        @foreach($committees as $committee)
            <h4 style="padding:10px; font-weight:bold;">{{ $committee?->name ?? '' }}</h4>

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

                @foreach ($committee->committeeMembers as $committeeMember )
                    <tr>
                    <td>{{ $loop->iteration }}</td>
                        @if(request()->language=='en')
                    <td>{{ $committeeMember->name_en  }}</td>
                    <td>{{ $committeeMember->address_en  }}</td>
                    <td>{{ $committeeMember->post_en  }}</td>
                        @else
                    <td>{{ $committeeMember->name  }}</td>
                    <td>{{ $committeeMember->address  }}</td>
                    <td>{{ $committeeMember->post  }}</td>
                    <td>{{ $committeeMember->phone  }}</td>

                    <td>
                        <img class="rounded" src="{{$committeeMember->first()->photo ?? ''}}" height="120" weight="120"
                             alt="{{$committeeMember->first()->name ?? ''}}">
                    </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endforeach

{{$committees->links()}}
    </div>
@endsection

