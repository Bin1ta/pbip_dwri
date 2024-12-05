@extends('layouts.master')
@section('content')
    <div class="container-fluid mt-2">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('welcome') }}"><i class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Work Plan Progress') }}</li>
            </ol>
        </nav>
    </div>

    <div class="container-fluid">
        <div class="col-md-12 mb-4">
            <div class="well-heading"
                style="border-left: 10px solid #b31b1b; position: relative;background-color: {{ $colors->nav }};">
                <i class="fa fa-clipboard"></i> {{ __('Work Plan Progress') }}
            </div>
        </div>

        <div class="outer-box">
            <style>
                .paginate {
                    display: flex;
                    margin: 0 0 20px 75vh;
                }

                .contract,
                td,
                th {
                    border: 1px solid black;
                    text-align: center;
                }

                .contract {
                    border-collapse: collapse;
                    width: 85%;
                    margin-top: 20px;
                    margin-bottom: 20px;
                    margin-left: 80px;
                }

                .contract>tbody>tr>th {
                    height: 20px;
                    text-align: center;
                    padding: 5px;

                }

                .contract>tbody>tr>td {

                    text-align: center;
                    padding: 5px;

                }
            </style>

            <table class="contract">
                <thead>
                    <tr style="background-color: #CCC0DA">
                        <th colspan="2" rowspan="2">माइलस्टोन</th>
                        <th colspan="12">लक्ष</th>
                        <th rowspan="3">मंसीर महिनाको प्रगति</th>
                        <th rowspan="3">मंसीर महिना सम्मको प्रगति</th>
                        <th rowspan="3">सम्पन्न कार्यहरु</th>
                        <th rowspan="3">प्रगति कम हुनुका कारणहरु</th>
                    </tr>
                    <tr style="background-color: #CCC0DA">
                        <th colspan="4">प्रथम चौमासिक</th>
                        <th colspan="4">दोस्रो चौमासिक</th>
                        <th colspan="4">तेस्रो चौमासिक</th>
                    </tr>
                    <tr style="background-color: #CCC0DA">
                        <th>विवरण</th>
                        <th>परिमाण</th>
                        <th>१</th>
                        <th>२</th>
                        <th>३</th>
                        <th>४</th>
                        <th>१</th>
                        <th>२</th>
                        <th>३</th>
                        <th>४</th>
                        <th>१</th>
                        <th>२</th>
                        <th>३</th>
                        <th>४</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($workPlanProgresses as $workPlanProgress )


                    <tr style="background-color: #FFC7CE">
                        <td>{{ $workPlanProgress->detail??'' }}</td>
                        <td>{{ $workPlanProgress->quantity ??'' }}</td>
                        <td>{{ $workPlanProgress->first_quarterly_1 ??'' }}</td>
                        <td>{{ $workPlanProgress->first_quarterly_2 ??'' }}</td>
                        <td>{{ $workPlanProgress->first_quarterly_3 ??'' }}</td>
                        <td>{{ $workPlanProgress->first_quarterly_4 ??'' }}</td>

                        <td>{{ $workPlanProgress->second_quarterly_1 ??'' }}</td>
                        <td>{{ $workPlanProgress->second_quarterly_2 ??'' }}</td>
                        <td>{{ $workPlanProgress->second_quarterly_3 ??'' }}</td>
                        <td>{{ $workPlanProgress->second_quarterly_4 ??'' }}</td>

                        <td>{{ $workPlanProgress->third_quarterly_1 ??'' }}</td>
                        <td>{{ $workPlanProgress->third_quarterly_2 ??'' }}</td>
                        <td>{{ $workPlanProgress->third_quarterly_3 ??'' }}</td>
                        <td>{{ $workPlanProgress->third_quarterly_4 ??'' }}</td>


                        <td>{{ $workPlanProgress->monthly_progress ??'' }}</td>
                        <td>{{ $workPlanProgress->upto_month_progress ??'' }}</td>
                        <td>{{ $workPlanProgress->completed_word ??'' }}</td>
                        <td>{{ $workPlanProgress->less_progress_reason ??'' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>


            <div class="mt-2 mb-2">
                {{ $workPlanProgresses->links() }}
            </div>


        </div>

    </div>
@endsection
