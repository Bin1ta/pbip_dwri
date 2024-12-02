@extends('layouts.master')
@section('content')
    <div class="container-fluid mt-2">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('welcome') }}"><i class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Completed Contract') }}</li>
            </ol>
        </nav>
    </div>

    <div class="container-fluid">
        <div class="col-md-12 mb-4">
            <div class="well-heading"
                style="border-left: 10px solid #b31b1b; position: relative;background-color: {{ $colors->nav }};">
                <i class="fa fa-clipboard"></i> {{ __('Completed Contract') }}
            </div>
        </div>
        {{-- <div class="outer-box">
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

                            <td>1</td>
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
        </div> --}}
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

            <div class="container-fluid">
                <div class="outer-box">


                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
                        {{-- <div class="dt-buttons"> <button class="dt-button buttons-copy buttons-html5" tabindex="0"
                                aria-controls="DataTables_Table_0" type="button"><span>Copy</span></button> <button
                                class="dt-button buttons-excel buttons-html5" tabindex="0"
                                aria-controls="DataTables_Table_0" type="button"><span>Excel</span></button> <button
                                class="dt-button buttons-csv buttons-html5" tabindex="0"
                                aria-controls="DataTables_Table_0" type="button"><span>CSV</span></button> <button
                                class="dt-button buttons-pdf buttons-html5" tabindex="0"
                                aria-controls="DataTables_Table_0" type="button"><span>PDF</span></button> </div>
                        <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>Search:<input type="search"
                                    class="" placeholder="" aria-controls="DataTables_Table_0"></label></div> --}}
                                    <div class="d-flex justify-content-between align-items-center flex-wrap " style="margin-left: 80px; margin-right: 150px;">
                                        <!-- Button Group -->
                                        <div class="btn-group" role="group" aria-label="Data Export Buttons">
                                            <button class="btn btn-secondary">Copy</button>
                                            <button class="btn btn-secondary">Excel</button>
                                            <button class="btn btn-secondary">CSV</button>
                                            <button class="btn btn-secondary">PDF</button>
                                        </div>

                                        <!-- Search Form -->
                                        <form class="form-inline mt-2 mt-lg-0">
                                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                                        </form>
                                    </div>
                        <table class="contract myTable table table-stripped dataTable no-footer" id="DataTables_Table_0"
                            aria-describedby="DataTables_Table_0_info">
                            <thead>
                                <tr>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" aria-label="Name of project: activate to sort column ascending"
                                        style="width: 58.8625px;">Name of project</th>
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0"
                                        rowspan="1" colspan="1"
                                        aria-label="Name of work: activate to sort column descending"
                                        style="width: 138.8px;" aria-sort="ascending">Name of work</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1"
                                        aria-label="Contract identification number: activate to sort column ascending"
                                        style="width: 147.55px;">Contract identification number</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1"
                                        aria-label="Name and address of contractor: activate to sort column ascending"
                                        style="width: 189.05px;">Name and address of contractor</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" aria-label="Date of agreement: activate to sort column ascending"
                                        style="width: 81.35px;">Date of agreement</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1"
                                        aria-label="Amount of Agreement (Inc VAT/VO): activate to sort column ascending"
                                        style="width: 91.4125px;">Amount of Agreement (Inc VAT/VO)</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" aria-label="Date of completion 	: activate to sort column ascending"
                                        style="width: 85.475px;">Date of completion </th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1"
                                        aria-label="Actual Expenditure (inc VAT,price escalation): activate to sort column ascending"
                                        style="width: 90.925px;">Actual Expenditure (inc VAT,price escalation)</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1"
                                        aria-label="Contractors liability status: activate to sort column ascending"
                                        style="width: 87.775px;">Contractors liability status</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" aria-label="Current status: activate to sort column ascending"
                                        style="width: 61.925px;">Current status</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1"
                                        aria-label="Major works completed 	: activate to sort column ascending"
                                        style="width: 79.975px;">Major works completed </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($finishedContracts as $finishedContract)
                                    <tr class="odd">
                                        <td class="">{{$finishedContract->name  }}</td>
                                        <td class="sorting_1">{{ $finishedContract->work }}</td>
                                        <td>{{ $finishedContract->identification_no ??'' }}</td>
                                        <td>{{ $finishedContract->contractor_detail }}</td>
                                        <td>{{ $finishedContract->agreement_date }}</td>
                                        <td>{{ $finishedContract->agreement_amount }}</td>
                                        <td>{{ $finishedContract->completion_date }}</td>
                                        <td>{{ $finishedContract->actual_expenditure }}</td>
                                        <td>{{ $finishedContract->contractors_liability_status }}</td>
                                        <td>{{ $finishedContract->current_status }}</td>
                                        <td>{{ $finishedContract->work_completed }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-2 mb-2">
                            {{ $finishedContracts->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>

    </div>
@endsection
