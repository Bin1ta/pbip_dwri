@extends('layouts.app')
@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>सम्झौता प्रगति अपडेट गर्नुहोस</h2>
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
                                    सम्झौता प्रगति लिस्ट
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                सम्झौता प्रगति अपडेट गर्नुहोस
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
        <form action="{{ route('admin.contract-progress.update',$contractProgress) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="work_name">Work Name*</label>
                        <input type="text" id="work_name" name="work_name" placeholder="कामको नाम*"
                            value="{{ old('work_name',$contractProgress->work_name) }}">
                        @error('work_name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="contract_id">Contract Id</label>
                        <input type="text" id="contract_id" name="contract_id" placeholder="Contract id"
                            value="{{ old('contract_id',$contractProgress->contract_id) }}">
                        @error('contract_id')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                    <div class="col-md-6">
                        <div class="input-style-1">
                            <label for="contractor_name"> Contractor Name*</label>
                            <input type="text" id="contractor_name" name="contractor_name" placeholder=" ठेकेदारको नाम"
                                value="{{ old('contractor_name',$contractProgress->contractor_name) }}">
                            @error('contractor_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>


                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="contractor_amount">Contractor Amount*</label>
                        <input type="number" id="contractor_amount" name="contractor_amount"
                            placeholder="Contractor Amount " value="{{ old('contractor_amount',$contractProgress->contractor_amount) }}">
                        @error('contractor_amount')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="agreement_date">Agreement Date*</label>
                        <input type="text" id="agreement_date" class="nepali-date" name="agreement_date"
                            placeholder="Agreement Date" value="{{ old('agreement_date',$contractProgress->agreement_date) }}">
                        @error('agreement_date')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="completion_date">Completion Date*</label>
                        <input type="text" id="completion_date" class="nepali-date" name="completion_date"
                            placeholder="Completion Date" value="{{ old('completion_date',$contractProgress->completion_date) }}">
                        @error('completion_date')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="completion_date_due">Completion Date Due</label>
                        <input type="text" id="completion_date_due" class="nepali-date" name="completion_date_due"
                            placeholder="Completion Date Due" value="{{ old('completion_date_due',$contractProgress->completion_date_due) }}">
                        @error('completion_date_due')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="times_extended">Times Extended</label>
                        <input type="text" id="times_extended" name="times_extended"
                            placeholder='Times Extended Reversed' value="{{ old('times_extended', $contractProgress->times_extended )}}">
                        @error('times_extended')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="times_extended_reserved">Times Extended Reversed</label>
                        <input type="text" id="times_extended_reserved" name="times_extended_reversed"
                            placeholder='Times Extended Reversed' value="{{ old('times_extended_reversed', $contractProgress->times_extended_reversed )}}">
                        @error('times_extended_reserved')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="financial_progress_amount">Financial Progress Amount</label>
                        <input type="number" id="financial_progress_amount" name="financial_progress_amount"
                            placeholder='Financial Progress Amount' value="{{ old('financial_progress_amount',$contractProgress->financial_progress_amount) }}">
                        @error('financial_progress_amount')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="financial_progress_Percent">Financial Progress Percent</label>
                        <input type="number" id="financial_progress_Percent" name="financial_progress_percent"
                            placeholder="Financial Progress Percent"
                            value="{{ old('financial_progress_percent', $contractProgress->financial_progress_percent) }}">
                        @error('financial_progress_percent')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="financial_progress_date">Financial Progress Date</label>
                        <input type="text" id="financial_progress_date" class="nepali-date"
                            name="financial_progress_date" placeholder='Financial Progress Date'
                            value="{{ old('financial_progress_date', $contractProgress->financial_progress_date) }}">
                        @error('financial_progress_date')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="physical_progress_Percent">Physical Progress Percent</label>
                        <input type="number" id="physical_progress_percent" name="physical_progress_percent"
                        placeholder="Physical Progress Percent" value="{{ old('physical_progress_percent',$contractProgress->physical_progress_percent) }}">
                        @error('physical_progress_percent')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="physical_progress_date">Physical Progress Date</label>
                        <input type="text" id="physical_progress_date" class="nepali-date"
                            name="physical_progress_date" placeholder="Physical Progress Date"
                            value="{{ old('physical_progress_date',$contractProgress->physical_progress_date) }}">
                        @error('physical_progress_date')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="input-style-1">
                        <label for="remarks">Remarks</label>
                        <textarea name="remarks" id="remarks" cols="30" rows="4" placeholder="remarks">{{ old('remarks',$contractProgress->remarks) }}</textarea>
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
