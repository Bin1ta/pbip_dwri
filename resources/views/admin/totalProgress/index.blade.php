@extends('layouts.app')
@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h3>Total Progress </h3>
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
                                Total Progress
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
                    <h6 class="mb-10">Total Progress</h6>
                    <a href="{{ route('admin.total-progress.create') }}" class="btn btn-sm btn-primary">Add New</a>
                </div>
                <div class=" table-responsive table-hover">
                    <table class="table" style="width:100rem;">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th> Year</th>
                                <th>periodicity</th>
                                <th>financial progress periodic</th>

                                <th>financial progress Amount</th>
                                <th>periodic percentage</th>
                                <th>yearly percentage </th>
                                <th>periodic physical progress</th>
                                <th>Action</th>
                            </tr>
                            <!-- end table row-->
                        </thead>
                        <tbody>
                            @forelse($totalProgresses as $totalProgress)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>{{ $totalProgress->year ?? '' }}</td>
                                    <td>{{ $totalProgress->periodicity ?? '' }}</td>
                                    <td>{{ $totalProgress->financial_progress_periodic ?? '' }}</td>

                                    <td>Rs.{{ $totalProgress->financial_progress_rs ?? '' }}</td>

                                    <td>{{ $totalProgress->periodic_percentage ?? '' }}%</td>

                                    <td>{{ $totalProgress->yearly_percentage ?? '' }}</td>
                                    <td>{{ $totalProgress->periodic_physical_progress ?? '' }}</td>


                                    <td>
                                        <div class="action">
                                            <a href="{{ route('admin.total-progress.edit', $totalProgress) }}"
                                                class="text-info">
                                                <i class="lni lni-pencil"></i>
                                            </a>
                                            <form action="{{ route('admin.total-progress.destroy', $totalProgress) }}"
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
                    {{ $totalProgresses->links() }}
                    <!-- end table -->
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
@endsection
