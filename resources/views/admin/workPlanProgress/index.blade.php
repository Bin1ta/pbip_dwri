@extends('layouts.app')

@section('content')
    <!-- Title Wrapper -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2 class="mb-30">कार्य योजना प्रगति</h2>
            </div>
            <div class="col-md-6">
                <a href="{{ route('admin.work-plan-progress.create') }}" class="btn btn-primary float-end">Add Plan</a>
            </div>
        </div>
    </div>

    <!-- Work Plan Progress Table -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card-style mb-30">
                <div class="table-wrapper table-responsive table-hover">
                    <table class="table" style="width: 200rem;">
                        <thead class="bg-light text-center">
                            <!-- Main Header Row -->
                            <tr>
                                <th>Year</th>
                                <th>Month</th>
                                <th>Detail</th>
                                <th>Quantity</th>
                                <th colspan="4" class="text-center">First</th>
                                <th colspan="4" class="text-center">Second</th>
                                <th colspan="4" class="text-center">Third</th>
                                <th>Monthly Progress</th>
                                <th>Upto Month Progress</th>
                                <th>Completed Work</th>
                                <th>Less Progress Reason</th>
                                <th>Action</th>
                            </tr>
                            <!-- Sub Header Row -->
                            <tr class="text-center">
                                <th colspan="4"></th>
                                @foreach (['Quarterly 1', 'Quarterly 2', 'Quarterly 3', 'Quarterly 4'] as $quarter)
                                    <th>{{ $quarter }}</th>
                                @endforeach
                                @foreach (['Quarterly 1', 'Quarterly 2', 'Quarterly 3', 'Quarterly 4'] as $quarter)
                                    <th>{{ $quarter }}</th>
                                @endforeach
                                @foreach (['Quarterly 1', 'Quarterly 2', 'Quarterly 3', 'Quarterly 4'] as $quarter)
                                    <th>{{ $quarter }}</th>
                                @endforeach
                                <th colspan="4"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($workPlanProgress as $progress)
                                <tr class="text-center">
                                    <td>{{ $progress->year }}</td>
                                    <td>{{ $progress->month->label() }}</td>
                                    <td>{{ $progress->detail }}</td>
                                    <td>{{ $progress->quantity }}</td>
                                    @foreach (['first', 'second', 'third'] as $phase)
                                        @foreach (range(1, 4) as $quarter)
                                            <td>{{ $progress->{$phase . '_quarterly_' . $quarter} }}</td>
                                        @endforeach
                                    @endforeach
                                    <td>{{ $progress->monthly_progress }}</td>
                                    <td>{{ $progress->upto_month_progress }}</td>
                                    <td>{{ $progress->completed_word }}</td>
                                    <td>{{ $progress->less_progress_reason }}</td>
                                    <td>
                                        <div class="action">
                                            <a href="{{ route('admin.work-plan-progress.edit', $progress) }}"
                                                class="text-info">
                                                <i class="lni lni-pencil"></i>
                                            </a>
                                            <form action="{{ route('admin.work-plan-progress.destroy', $progress) }}"
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
                                    <td colspan="20" class="text-center">No Data Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
