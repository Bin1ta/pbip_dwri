@extends('layouts.app')

@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h1>चलानी</h1>
                </div>
            </div>
            <div class="col-md-6">
                <div class="breadcrumb-wrapper mb-30">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">डस्वोर्ड</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.invoice.index') }}">चलानी लिस्ट</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Details
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="card-style mb-30">
        <div class="card-body">
            <table class="table table-bordered" style="border: 1px solid #343a40; ">
                <tbody>
                <tr>
                    <th style="border: 1px solid #343a40;">दर्ता नं.</th>
                    <td style="border: 1px solid #343a40;">{{ $registration->reg_no }}</td>
                </tr>
                <tr>
                    <th style="border: 1px solid #343a40;">मिति</th>
                    <td style="border: 1px solid #343a40;">{{ $registration->rec_date }}</td>
                </tr>
                <tr>
                    <th style="border: 1px solid #343a40;">पत्र संख्या</th>
                    <td style="border: 1px solid #343a40;">{{ $registration->letter_count }}</td>
                </tr>
                <tr>
                    <th style="border: 1px solid #343a40;">पत्र पठाउने व्यक्ति वा कार्यालयको नाम, ठेगाना</th>
                    <td style="border: 1px solid #343a40;">{{ $registration->sender_name }},{{ $registration->address }}</td>
                </tr>
                <tr>
                    <th style="border: 1px solid #343a40;">विषय</th>
                    <td style="border: 1px solid #343a40;">{{ $registration->subject }}</td>
                </tr>

                @if($registration->photo)
                    <tr>
                        <th style="border: 1px solid #343a40;">फोटो</th>
                        <td style="border: 1px solid #343a40;">
                            <iframe
                                src="{{ $registration->photo }}"
                                style="width: 100%; height: 500px; border: none;"
                                title="Photo Preview">
                            </iframe>
                        </td>
                    </tr>
                @endif

                <tr>
                    <th style="border: 1px solid #343a40;">विवरण</th>
                    <td style="border: 1px solid #343a40;">{{ $registration->remarks }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
