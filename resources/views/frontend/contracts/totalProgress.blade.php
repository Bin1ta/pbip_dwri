@extends('layouts.master')
@section('content')
    <div class="container-fluid mt-2">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('welcome') }}"><i class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Total Contract') }}</li>
            </ol>
        </nav>
    </div>

    <div class="container-fluid">
        <div class="col-md-12 mb-4">
            <div class="well-heading"
                style="border-left: 10px solid #b31b1b; position: relative;background-color: {{ $colors->nav }};">
                <i class="fa fa-clipboard"></i> {{ __('Total Contract') }}
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
                        <th rowspan="3">SN</th>
                        <th rowspan="3">Periodicity</th>
                        <th colspan="5">Financial Progress</th>
                        <th colspan="2">Physical Progress</th>
                        <th rowspan="3">Remarks</th>
                    </tr>
                    <tr style="background-color: #CCC0DA">
                        <th colspan="2">Amount (Rs)</th>
                        <th rowspan="2">Target Rs</th>
                        <th colspan="2">Percentage</th>
                        <th rowspan="2">Periodic</th>
                        <th rowspan="2">Cumulative</th>
                    </tr>
                    <tr style="background-color: #CCC0DA">
                        <th>Periodic Rs</th>
                        <th>P. Cumulative Rs</th>
                        <th>Periodic</th>
                        <th>Yearly</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($totalProgresses as $totalProgress)
                        <tr style="background-color: #C6EFCE">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $totalProgress->periodicity ??'' }}</td>
                            <td>{{ $totalProgress->financial_progress_periodic ??'' }}</td>
                            <td>{{ $totalProgress->financial_progress_rs ??'' }}</td>

                            <td>
                                {{-- {{
                                    ($totalProgress->financial_progress_periodic ?? 0) +
                                    ($totalProgress->financial_progress_rs ?? 0)
                                }} --}}
                            </td>

                            <td>{{ $totalProgress->periodic_percentage }}</td>
                            <td></td>

                            <td>{{ $totalProgress->periodic_physical_cumulative }}</td>
                            <td></td>



                            <td>{{ $totalProgress->remarks }}</td>
                        </tr>
                    @endforeach

                </tbody>

            </table>
            <div class="mt-2 mb-2">
                {{ $totalProgresses->links() }}

            </div>


        </div>

    </div>
@endsection
