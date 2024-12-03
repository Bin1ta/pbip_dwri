@extends('layouts.app')
@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h3>Total Progress Add</h3>
                </div>
            </div>
            <!-- end col -->
            <div class="col-md-6">
                <div class="breadcrumb-wrapper mb-30">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">ड्यासबोर्ड</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.contract-progress.index') }}">
                                    Total Progress List
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Total Progress Add
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card-style mb-30">
        <form action="{{ route('admin.total-progress.update',$totalProgress) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="year">Year <span class="text-danger">*</span></label>
                        <input type="text" id="year" name="year" placeholder="year"
                            value="{{ old('year',$totalProgress->year) }}">
                        @error('year')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="periodicity" class="form-label">Periodicity <span class="text-danger">*</span></label>
                        <input type="text" id="periodicity" name="periodicity" placeholder="periodicity"
                        value="{{ old('periodicity',$totalProgress->periodicity) }}">
                        @error('periodicity')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="financial_progress_periodic">Financial progress periodic</label>
                        <input type="text" id="financial_progress_periodic" name="financial_progress_periodic" placeholder="financial_progress_periodic name"
                            value="{{ old('financial_progress_periodic',$totalProgress->financial_progress_periodic) }}">
                        @error('financial_progress_periodic')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="financial_progress_cumulative">Financial progress cumulative</label>
                        <input type="text" id="financial_progress_cumulative" name="financial_progress_cumulative" placeholder="Financial progress cumulative"
                            value="{{ old('financial_progress_cumulative',$totalProgress->financial_progress_cumulative) }}">
                        @error('financial_progress_cumulative')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="financial_progress_rs"> Financial progress Amount</label>
                        <input type="text" id="financial_progress_rs" name="financial_progress_rs" placeholder="Rs.123****"
                            value="{{ old('financial_progress_rs',$totalProgress->financial_progress_rs) }}">
                        @error('financial_progress_rs')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="periodic_percentage">periodic_percentage</label>
                        <input type="text" id="periodic_percentage"  name="periodic_percentage"
                            placeholder="Enter number" value="{{ old('periodic_percentage',$totalProgress->periodic_percentage) }}">
                        @error('periodic_percentage')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="yearly_percentage">Yearly percentage</label>
                        <input type="text" id="yearly_percentage"  name="yearly_percentage"
                            placeholder="yearly percentage" value="{{ old('yearly_percentage',$totalProgress->yearly_percentage) }}">
                        @error('yearly_percentage')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="periodic_physical_progress">periodic physical progress</label>
                        <input type="text" id="periodic_physical_progress"  name="periodic_physical_progress"
                            placeholder="periodic physical progress " value="{{ old('periodic_physical_progress',$totalProgress->periodic_physical_progress) }}">
                        @error('periodic_physical_progress')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="periodic_physical_cumulative">periodic physical Cumulative</label>
                        <input type="text" id="periodic_physical_cumulative"  name="periodic physical cumulative"
                            placeholder="periodic physical progress " value="{{ old('periodic_physical_cumulative',$totalProgress->periodic_physical_cumulative) }}">
                        @error('periodic_physical_cumulative')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="input-style-1">
                        <label for="remarks">Remarks</label>
                        <textarea name="remarks" id="remarks" cols="30" rows="4" placeholder="remarks">{{ old('remarks',$totalProgress->remarks) }}</textarea>
                        @error('remarks')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-sm btn-primary">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
    @push('script')
        <!-- Nepali Date Picker Js -->
        <script src="http://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/js/nepali.datepicker.v3.7.min.js"
            type="text/javascript"></script>
        <script type="text/javascript">
            $(".nepali-date").nepaliDatePicker({
                ndpYear: true,
                ndpMonth: true,
                ndpYearCount: 10
            })
        </script>
    @endpush
@endsection
