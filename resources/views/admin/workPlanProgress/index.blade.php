@extends('layouts.app')

@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>कार्य योजना प्रगति</h2>
                </div>
            </div>
            <div class="col-md-6">
                <a href="{{ route('admin.work-plan-progress.create') }}" class="btn btn-primary float-end">Add Plan</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-style mb-30">
                <div class="table-wrapper table-responsive table-hover">
                    <table class="table">
                        <thead class="bg-light text-center">
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
                            <th>Completed Word</th>
                            <th>Less Progress Reason</th>
                            <th>Action</th>
                        </tr>
                        <tr class="text-center">
                            <th colspan="4"></th>
                            <th>Quarterly 1</th>
                            <th>Quarterly 2</th>
                            <th>Quarterly 3</th>
                            <th>Quarterly 4</th>
                            <th>Quarterly 1</th>
                            <th>Quarterly 2</th>
                            <th>Quarterly 3</th>
                            <th>Quarterly 4</th>
                            <th>Quarterly 1</th>
                            <th>Quarterly 2</th>
                            <th>Quarterly 3</th>
                            <th>Quarterly 4</th>
                            <th colspan="4"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($workPlanProgresss as $workPlanProgress)
                            <tr class="text-center">
                                <td>{{ $workPlanProgress->year }}</td>
                                <td>{{ $workPlanProgress->month }}</td>
                                <td>{{ $workPlanProgress->detail }}</td>
                                <td>{{ $workPlanProgress->quantity }}</td>
                                <td>{{ $workPlanProgress->first_quarterly_1 }}</td>
                                <td>{{ $workPlanProgress->first_quarterly_2 }}</td>
                                <td>{{ $workPlanProgress->first_quarterly_3 }}</td>
                                <td>{{ $workPlanProgress->first_quarterly_4 }}</td>
                                <td>{{ $workPlanProgress->second_quarterly_1 }}</td>
                                <td>{{ $workPlanProgress->second_quarterly_2 }}</td>
                                <td>{{ $workPlanProgress->second_quarterly_3 }}</td>
                                <td>{{ $workPlanProgress->second_quarterly_4 }}</td>
                                <td>{{ $workPlanProgress->third_quarterly_1 }}</td>
                                <td>{{ $workPlanProgress->third_quarterly_2 }}</td>
                                <td>{{ $workPlanProgress->third_quarterly_3 }}</td>
                                <td>{{ $workPlanProgress->third_quarterly_4 }}</td>
                                <td>{{ $workPlanProgress->monthly_progress }}</td>
                                <td>{{ $workPlanProgress->upto_month_progress }}</td>
                                <td>{{ $workPlanProgress->completed_word }}</td>
                                <td>{{ $workPlanProgress->less_progress_reason }}</td>
                                <td>
                                    <div class="action d-flex justify-content-center">
                                        <a href="{{ route('admin.work-plan-progress.edit', $workPlanProgress) }}" class="btn btn-sm btn-primary mx-1">
                                            <i class="lni lni-pencil"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.work-plan-progress.destroy', $workPlanProgress) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger show_confirm mx-1" type="submit">
                                                <i class="lni lni-trash-can"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
