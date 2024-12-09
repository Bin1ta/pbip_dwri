@extends('layouts.app')
@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>Current Contract </h2>
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
                                Current Contract
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
                    <h6 class="mb-10">Current Contract</h6>
                    <a href="{{ route('admin.current-contract.create') }}" class="btn btn-sm btn-primary">Add New</a>
                </div>
                <div class=" table-responsive table-hover">
                    <table class="table" style="width: 100rem;">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th> Name</th>
                                <th>Place</th>
                                <th>Work Name</th>

                                <th>Contractor Detail</th>
                                <th>Agreement Date</th>

                                <th>Agreement Amount</th>
                                <th>Status</th>

                                <th>Action</th>
                            </tr>
                            <!-- end table row-->
                        </thead>
                        <tbody>
                            @forelse($currentContracts as $currentContract)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>{{ $currentContract->name ?? '' }}</td>
                                    <td>{{ $currentContract->place_id->label() ?? '' }}</td>
                                    <td>{{ $currentContract->work ?? '' }}</td>
                                    <td>{{ $currentContract->contractor_detail ?? '' }}</td>
                                    <td>{{ $currentContract->agreement_date ?? '' }}</td>
                                    <td>Rs.{{ $currentContract->agreement_amount ?? '' }}</td>
                                    <td>

                                        @can('current_contract_edit')
                                            <a href="{{ route('admin.currentContact.currentstatus', $currentContract) }}">
                                                @if ($currentContract->current_status == 1)
                                                    <i class="mdi mdi-check mdi-24px text-success"></i>
                                                @else
                                                    <i class="mdi mdi-window-close mdi-24px text-danger"></i>
                                                @endif
                                            </a>
                                        @endcan

                                    </td>

                                    <td>
                                        <div class="action">
                                            <a href="{{ route('admin.current-contract.edit', $currentContract) }}"
                                                class="text-info">
                                                <i class="lni lni-pencil"></i>
                                            </a>
                                            <form action="{{ route('admin.current-contract.destroy', $currentContract) }}"
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
                    {{ $currentContracts->links() }}
                    <!-- end table -->
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
@endsection
