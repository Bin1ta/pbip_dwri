@extends('layouts.app')
@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>Finished Contract </h2>
                </div>
            </div>
            <!-- end col -->
            <div class="col-md-6">
                <div class="breadcrumb-wrapper mb-30">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Finished Contract
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-style mb-30">
                <div style="display: flex;justify-content: space-between">
                    <h6 class="mb-10">Finished Contract</h6>
                    <a href="{{ route('admin.finished-contract.create') }}" class="btn btn-sm btn-primary">Add New</a>
                </div>
                <div class=" table-responsive table-hover">

                    <table class="table" style="width:110rem;">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th> Name</th>
                                <th>Place</th>
                                <th>Work Name</th>
                                <th>Identification No.</th>

                                <th>Agreement Date</th>

                                <th>Agreement Amount</th>
                                <th>Contractor's ability status</th>
                                <th>Status</th>

                                <th>Action</th>
                            </tr>
                            <!-- end table row-->
                        </thead>
                        <tbody>
                            @forelse($finishedContracts as $finishedContract)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>{{ $finishedContract->name ?? '' }}</td>
                                    <td>{{ $finishedContract->place_id->label() ?? '' }}</td>
                                    <td>{{ $finishedContract->work ?? '' }}</td>
                                    <td>{{ $finishedContract->identification_no ?? '' }}</td>
                                    <td>{{ $finishedContract->agreement_date ?? '' }}</td>
                                    <td>Rs.{{ $finishedContract->agreement_amount ?? '' }}</td>
                                    <td class="d-flex gap-1 text-center">

                                        @can('current_contract_edit')
                                            <a href="{{ route('admin.finished-contract.currentStatus', $finishedContract) }}">
                                                @if ($finishedContract->current_status == 1)
                                                    <i class="mdi mdi-check mdi-24px text-success"></i>
                                                @else
                                                    <i class="mdi mdi-window-close mdi-24px text-danger"></i>
                                                @endif
                                            </a>
                                        @endcan



                                    </td>
                                    <td>
                                        @can('current_contract_edit')
                                        <a href="{{ route('admin.finished-contract.contractorLiabilityStatus', $finishedContract) }}">
                                            @if ($finishedContract->contractors_liability_status == 1)
                                                <i class="mdi mdi-check mdi-24px text-success"></i>
                                            @else
                                                <i class="mdi mdi-window-close mdi-24px text-danger"></i>
                                            @endif
                                        </a>
                                    @endcan
                                    </td>

                                    <td>
                                        <div class="action">
                                            <a href="{{ route('admin.finished-contract.edit', $finishedContract) }}"
                                                class="text-info">
                                                <i class="lni lni-pencil"></i>
                                            </a>
                                            <form action="{{ route('admin.finished-contract.destroy', $finishedContract) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-danger show_confirm">
                                                    <i class="lni lni-trash-can"></i>
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="4">No Result Found</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                    <div class="mt-2 mb-2">
                        {{ $finishedContracts->links() }}
                    </div>

                    <!-- end table -->
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
@endsection
