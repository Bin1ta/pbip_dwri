@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title mb-30">
                        <h2>{{ isset($workPlanProgress) ? 'Edit Work Plan Progress' : 'Add Work Plan Progress' }}</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('admin.work-plan-progress.index') }}" class="btn btn-secondary float-end">Back</a>
                </div>
            </div>
        </div>

        <div class="card card-style mb-30">
            <div class="card-body">
                <form
                    action="{{ isset($workPlanProgress) ? route('admin.work-plan-progress.update', $workPlanProgress->id) : route('admin.work-plan-progress.store') }}"
                    method="POST">
                    @csrf
                    @if (isset($workPlanProgress))
                        @method('PUT')
                    @endif

                    <!-- Year -->
                    <div class="form-group mb-3">
                        <label for="year" class="form-label">Year</label>
                        <input type="text" name="year" id="year" class="form-control"
                               value="{{ old('year', $workPlanProgress->year ?? '') }}" placeholder="Enter Year" required>
                    </div>

                    <!-- Month -->
                    <div class="form-group mb-3">
                        <label for="month" class="form-label">Month</label>
                        <input type="text" name="month" id="month" class="form-control"
                               value="{{ old('month', $workPlanProgress->month ?? '') }}" placeholder="Enter Month" required>
                    </div>

                    <!-- Detail -->
                    <div class="form-group mb-3">
                        <label for="detail" class="form-label">Detail</label>
                        <textarea name="detail" id="detail" rows="3" class="form-control" placeholder="Enter Detail" required>{{ old('detail', $workPlanProgress->detail ?? '') }}</textarea>
                    </div>

                    <!-- Quantity -->
                    <div class="form-group mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" name="quantity" id="quantity" class="form-control"
                               value="{{ old('quantity', $workPlanProgress->quantity ?? '') }}" placeholder="Enter Quantity" required>
                    </div>

                    <!-- Quarterly Fields -->
                    <h5>First Quarterly</h5>
                    <div class="row mb-3">
                        @for ($i = 1; $i <= 4; $i++)
                            <div class="col-md-3">
                                <label for="first_quarterly_{{ $i }}" class="form-label">Quarterly {{ $i }}</label>
                                <input type="number" name="first_quarterly_{{ $i }}" id="first_quarterly_{{ $i }}" class="form-control"
                                       value="{{ old('first_quarterly_' . $i, $workPlanProgress->{'first_quarterly_' . $i} ?? '') }}" placeholder="Enter Value">
                            </div>
                        @endfor
                    </div>

                    <h5>Second Quarterly</h5>
                    <div class="row mb-3">
                        @for ($i = 1; $i <= 4; $i++)
                            <div class="col-md-3">
                                <label for="second_quarterly_{{ $i }}" class="form-label">Quarterly {{ $i }}</label>
                                <input type="number" name="second_quarterly_{{ $i }}" id="second_quarterly_{{ $i }}" class="form-control"
                                       value="{{ old('second_quarterly_' . $i, $workPlanProgress->{'second_quarterly_' . $i} ?? '') }}" placeholder="Enter Value">
                            </div>
                        @endfor
                    </div>

                    <h5>Third Quarterly</h5>
                    <div class="row mb-3">
                        @for ($i = 1; $i <= 4; $i++)
                            <div class="col-md-3">
                                <label for="third_quarterly_{{ $i }}" class="form-label">Quarterly {{ $i }}</label>
                                <input type="number" name="third_quarterly_{{ $i }}" id="third_quarterly_{{ $i }}" class="form-control"
                                       value="{{ old('third_quarterly_' . $i, $workPlanProgress->{'third_quarterly_' . $i} ?? '') }}" placeholder="Enter Value">
                            </div>
                        @endfor
                    </div>

                    <!-- Monthly Progress -->
                    <div class="form-group mb-3">
                        <label for="monthly_progress" class="form-label">Monthly Progress</label>
                        <input type="number" name="monthly_progress" id="monthly_progress" class="form-control"
                               value="{{ old('monthly_progress', $workPlanProgress->monthly_progress ?? '') }}" placeholder="Enter Monthly Progress">
                    </div>

                    <!-- Upto Month Progress -->
                    <div class="form-group mb-3">
                        <label for="upto_month_progress" class="form-label">Upto Month Progress</label>
                        <input type="number" name="upto_month_progress" id="upto_month_progress" class="form-control"
                               value="{{ old('upto_month_progress', $workPlanProgress->upto_month_progress ?? '') }}" placeholder="Enter Upto Month Progress">
                    </div>

                    <!-- Completed Word -->
                    <div class="form-group mb-3">
                        <label for="completed_word" class="form-label">Completed Word</label>
                        <input type="text" name="completed_word" id="completed_word" class="form-control"
                               value="{{ old('completed_word', $workPlanProgress->completed_word ?? '') }}" placeholder="Enter Completed Word">
                    </div>

                    <!-- Less Progress Reason -->
                    <div class="form-group mb-3">
                        <label for="less_progress_reason" class="form-label">Less Progress Reason</label>
                        <textarea name="less_progress_reason" id="less_progress_reason" rows="3" class="form-control" placeholder="Enter Reason">{{ old('less_progress_reason', $workPlanProgress->less_progress_reason ?? '') }}</textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary">{{ isset($workPlanProgress) ? 'Update' : 'Save' }} Work Plan Progress</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
