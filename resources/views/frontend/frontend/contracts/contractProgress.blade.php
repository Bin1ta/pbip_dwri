@extends('layouts.master')
@section('content')
    <div class="container-fluid mt-2">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('welcome') }}"><i class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Contract Progress') }}</li>
            </ol>
        </nav>
    </div>

    <div class="container-fluid">
        <div class="col-md-12 mb-4">
            <div class="well-heading"
                style="border-left: 10px solid #b31b1b; position: relative;background-color: {{ $colors->nav }};">
                <i class="fa fa-clipboard"></i> {{ __('Contract Progress') }}
            </div>
        </div>
        <div class="outer-box">
            <style>
                table.contract {
                    border-collapse: collapse;
                    width: 100%;
                }

                table.contract th,
                table.contract td {
                    border: 1px solid black;
                    /* Adds vertical and horizontal borders */
                    padding: 8px;
                    text-align: center;
                }

                table.contract th {
                    background-color: #CCC0DA;
                }

                table.contract tr:nth-child(even) {
                    background-color: #FFC7CE;
                    /* Alternating row color for even rows */
                }
            </style>

            <table class="contract">
                <thead>

                    <tr style="background-color: #CCC0DA;">
                        <th rowspan="2">S.N</th>
                        <th rowspan="2">Name of work </th>
                        <th rowspan="2">Contract ID</th>
                        <th rowspan="2">Name of Contractor</th>
                        <th rowspan="2">Contract Amount</th>
                        <th rowspan="2">Date of Agreement</th>
                        <th rowspan="2">Date of completion as per Agreement</th>
                        <th rowspan="2">Due Date of Completion</th>
                        <th rowspan="2">Time Extended based on Original schedule</th>
                        <th rowspan="2">Time Elapsed based on revised schedule</th>
                        <th colspan="3">Financial Progress</th>
                        <th colspan="2">Physical Progress</th>
                        <th rowspan="2">Progress Status</th>
                        <th rowspan="2">Remarks</th>
                    </tr>
                    <tr style="background-color: #CCC0DA">
                        <th>Amount</th>
                        <th>Percent</th>
                        <th>Date</th>
                        <th>Percent</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>


                    @foreach ($contractProgresses as $contractProgress)
                        <tr style="background-color: #FFC7CE;">

                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $contractProgress->work_name ??'' }}</td>
                            <td>{{ $contractProgress->contract_id ??'' }}</td>
                            <td>{{ $contractProgress->contractor_name }}</td>
                            <td>{{ $contractProgress->contractor_amount ??'' }}</td>
                            <td>{{ $contractProgress->agreement_date ??'' }}</td>
                            <td>{{ $contractProgress->completion_date ??'' }}</td>
                            <td>{{ $contractProgress->completion_date_due ??'' }}</td>
                            <td>{{ $contractProgress->times_extended ??'' }}</td>
                            <td>{{ $contractProgress->times_extended_reversed ??'' }}</td>
                            <td>{{ $contractProgress->financial_progress_amount ??'' }}</td>
                            <td>{{ $contractProgress->financial_progress_percent ??'' }}</td>
                            <td>{{ $contractProgress->financial_progress_date ??'' }}</td>
                            <td>{{ $contractProgress->physical_progress_date ??'' }}</td>
                            <td>{{ $contractProgress->physical_progress_percent ??'' }}</td>
                            <td>{{ $contractProgress->progress_status ??'' }}</td>
                            <td>{{ $contractProgress->remarks ??'' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
          <div class="mt-2 mb-2">
            {{$contractProgresses->links()  }}
          </div>
        </div>

    </div>
@endsection
