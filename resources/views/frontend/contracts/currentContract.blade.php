@extends('layouts.master')

@section('content')
    <div class="container-fluid mt-2">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('welcome') }}"><i class="fa fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Current Contract') }}</li>
            </ol>
        </nav>
    </div>

    <div class="container-fluid">
        <div class="col-md-12 mb-4">
            <div class="well-heading"
                style="border-left: 10px solid #b31b1b; position: relative;background-color: {{ $colors->nav }};">
                <i class="fa fa-clipboard"></i> {{ __('Current Contract') }}
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

            <div class="container-fluid">
                <div class="outer-box">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
                        <div class="d-flex justify-content-between align-items-center flex-wrap"
                            style="margin-left: 80px; margin-right: 150px;">
                            <!-- Button Group -->
                            <div class="btn-group" role="group" aria-label="Data Export Buttons">
                                <a href="#" class="btn btn-secondary copy-button" data-target=".contract">Copy</a>

                                {{-- Check if URL contains currentContract_badkapath --}}
                                @if (Request::is('detail/currentContract_badkapath*'))
                                    <a href="{{ route('current.contracts.export_badkapatra', ['placeId' => \App\Enums\ProjectTypeEnum::BADKAPATH->value]) }}"
                                        class="btn btn-secondary">Excel</a>
                                @elseif(Request::is('detail/currentContract_praganna*'))
                                    <a href="{{ route('current.contracts.export_praganna', ['placeId' => \App\Enums\ProjectTypeEnum::PRAGANNA->value]) }}"
                                        class="btn btn-secondary">Excel</a>
                                @endif

                                @if (Request::is('detail/currentContract_badkapath*'))
                                    <a href="{{ route('current.contractsBadkapatra.pdf', ['placeId' => \App\Enums\ProjectTypeEnum::BADKAPATH->value]) }}"
                                        class="btn btn-secondary">PDF</a>
                                @elseif(Request::is('detail/currentContract_praganna*'))
                                    <a href="{{ route('current.contractsPraganna.pdf', ['placeId' => \App\Enums\ProjectTypeEnum::PRAGANNA->value]) }}"
                                        class="btn btn-secondary">PDF</a>
                                @endif
                            </div>

                            <!-- Search Form -->
                            <!-- Search Form -->
                            <form class="form-inline mt-2 mt-lg-0" method="GET" action="{{ url()->current() }}">
                                <input class="form-control mr-sm-2" type="search" name="search"
                                       placeholder="Search" value="{{ request('search') }}" aria-label="Search">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                            </form>
                        </div>

                        <table class="contract myTable table table-stripped compact dataTable no-footer"
                            id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                            <thead>
                                <tr>
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0"
                                        rowspan="1" colspan="1" aria-sort="ascending"
                                        aria-label="Name of project: activate to sort column descending"
                                        style="width: 56.3375px;">Name of project</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" aria-label="Name of work: activate to sort column ascending"
                                        style="width: 86.7375px;">Name of work</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1"
                                        aria-label="Contract identification number: activate to sort column ascending"
                                        style="width: 104.287px;">Contract identification number</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1"
                                        aria-label="Contractor's Name & address: activate to sort column ascending"
                                        style="width: 112.375px;">Contractor's Name & address</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" aria-label="Agreement Date: activate to sort column ascending"
                                        style="width: 85.05px;">Agreement Date</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1"
                                        aria-label="Amount of Agreement (Inc VAT/VO): activate to sort column ascending"
                                        style="width: 93.45px;">Amount of Agreement (Inc VAT/VO)</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1"
                                        aria-label="Date of completion as per agreement: activate to sort column ascending"
                                        style="width: 90.675px;">Date of completion as per agreement</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" aria-label="Number of extension: activate to sort column ascending"
                                        style="width: 75.3375px;">Number of extension</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1"
                                        aria-label="Total duration of time extension (months): activate to sort column ascending"
                                        style="width: 75.2375px;">Total duration of time extension (months)</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1"
                                        aria-label="Date of completion (revised): activate to sort column ascending"
                                        style="width: 88.9375px;">Date of completion (revised)</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" aria-label="Current status: activate to sort column ascending"
                                        style="width: 51.85px;">Current status</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" aria-label="Updated Progress: activate to sort column ascending"
                                        style="width: 66.7px;">Updated Progress</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" aria-label="Responsible person: activate to sort column ascending"
                                        style="width: 91.425px;">Responsible person</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($currentContracts as $currentContract)
                                    <tr class="odd">
                                        <td class="sorting_1">{{ $currentContract->name ?? '' }}</td>
                                        <td>{{ $currentContract->work ?? '' }}</td>
                                        <td>{{ $currentContract->identification_no }}</td>
                                        <td>{{ $currentContract->contractor_detail }}</td>
                                        <td>{{ $currentContract->agreement_date ?? '' }}</td>
                                        <td>{{ $currentContract->agreement_amount ?? '' }}</td>
                                        <td>{{ $currentContract->completion_date }}</td>
                                        <td> </td>
                                        <td>{{ $currentContract->extension_duration }}</td>
                                        <td>{{ $currentContract->completion_date_revised }}</td>
                                        <td>
                                            @if ($currentContract->current_status == 1)
                                                Ongoing
                                            @endif
                                        </td>
                                        <td>{{ $currentContract->updated_progress ?? '' }}</td>
                                        <td>{{ $currentContract->authorised_person ?? '' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            $(document).ready(function() {
                $('.copy-button').click(function(e) {
                    e.preventDefault();

                    let tableContent = '';
                    let target = $(this).data('target');

                    $(target).find('tr').each(function() {
                        let rowData = [];
                        $(this).find('th, td').each(function() {
                            rowData.push($(this).text().trim());
                        });
                        tableContent += rowData.join('\t') + '\n';
                    });

                    let $temp = $('<textarea>');
                    $('body').append($temp);
                    $temp.val(tableContent).select();
                    document.execCommand('copy');
                    $temp.remove();

                    alert('Table copied to clipboard!');
                });
            });
        </script>
    @endpush
@endsection
