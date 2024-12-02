
@extends('layouts.app')
@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h3>Contact Progress </h3>
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
                                Contact Progress
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
                    <h6 class="mb-10">Contact Progress</h6>
                    <a href="{{ route('admin.contract-progress.create') }}" class="btn btn-sm btn-primary">Add New</a>
                </div>
                <div class=" table-responsive table-hover">
                    <table class="table" style="width: 100rem;">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Work Name</th>
                                <th>Contract Id</th>
                                <th>Contractor Name</th>
                                <th>Contractor Amount</th>
                                <th>Agreement Date</th>
                                <th>Completion Date</th>
                                <th>Fin. Prog. Amount</th>
                                <th>Status</th>

                                <th>Action</th>
                            </tr>
                            <!-- end table row-->
                        </thead>
                        <tbody>
                            @forelse($contractProgresses as $contractProgress)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>{{ $contractProgress->work_name ?? '' }}</td>
                                    <td>{{ $contractProgress->contract_id ?? '' }}</td>
                                    <td>{{ $contractProgress->contractor_name ?? '' }}</td>
                                    <td>Rs.{{ $contractProgress->contractor_amount ?? '' }}</td>
                                    <td>{{ $contractProgress->agreement_date ?? '' }}</td>

                                    <td>{{ $contractProgress->completion_date ?? '' }}</td>

                                    <td>Rs.{{ $contractProgress->financial_progress_amount ?? '' }}</td>
                                    <td>

                                            @can('contract_progress_edit')
                                                <a href="{{route('admin.contractProgress.status',$contractProgress)}}">
                                                    @if($contractProgress->progress_status==1)
                                                        <i class="mdi mdi-check mdi-24px text-success"></i>
                                                    @else
                                                        <i class="mdi mdi-window-close mdi-24px text-danger"></i>
                                                    @endif

                                                </a>
                                            @endcan

                                    </td>

                                    <td>
                                        <div class="action">
                                            <a href="{{ route('admin.contract-progress.edit', $contractProgress) }}"
                                                class="text-info">
                                                <i class="lni lni-pencil"></i>
                                            </a>
                                            <form action="{{ route('admin.contract-progress.destroy', $contractProgress) }}"
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
                 {{ $contractProgresses->links()  }}
                    <!-- end table -->
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
@endsection
