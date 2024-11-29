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
                        <label for="work_name">कामको नाम*</label>
                        <input type="text" id="work_name" name="work_name" placeholder="कामको नाम*"
                            value="{{ old('work_name',$contractProgress->work_name) }}">
                        @error('work_name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="work_name_en">कामको नाम (English)*</label>
                        <input type="text" id="work_name_en" name="work_name_en" placeholder="कामको नाम (English)"
                            value="{{ old('work_name_en',$contractProgress->work_name_en) }}">
                        @error('work_name_en')
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
                @if (config('default.dual_language'))
                    <div class="col-md-6">
                        <div class="input-style-1">
                            <label for="contractor_name"> ठेकेदारको नाम*</label>
                            <input type="text" id="contractor_name" name="contractor_name" placeholder=" ठेकेदारको नाम"
                                value="{{ old('contractor_name',$contractProgress->contractor_name) }}">
                            @error('contractor_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-style-1">
                            <label for="contractor_name_en"> ठेकेदारको नाम*(English)</label>
                            <input type="text" id="contractor_name_en" name="contractor_name_en"
                                placeholder=" ठेकेदारको नाम English" value="{{ old('contractor_name_en',$contractProgress->contractor_name_en) }}">
                            @error('contractor_name_en')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                @endif
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
                        <label for="agreement_date">सम्झौता मिति*</label>
                        <input type="text" id="agreement_date" class="nepali-date" name="agreement_date"
                            placeholder="सम्झौता मिति" value="{{ old('agreement_date',$contractProgress->agreement_date) }}">
                        @error('agreement_date')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="completion_date">पूरा हुने मिति*</label>
                        <input type="text" id="completion_date" class="nepali-date" name="completion_date"
                            placeholder="पूरा हुने मिति" value="{{ old('completion_date',$contractProgress->completion_date) }}">
                        @error('completion_date')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="completion_date_due">पूरा बाँकी हुने मिति</label>
                        <input type="text" id="completion_date_due" class="nepali-date" name="completion_date_due"
                            placeholder="पूरा बाँकी हुने मिति" value="{{ old('completion_date_due',$contractProgress->completion_date_due) }}">
                        @error('completion_date_due')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="time_extended_reserved">Times Extended Reversed</label>
                        <input type="text" id="time_extended_reserved" name="time_extended_reserved"
                            placeholder='Times Extended Reversed' value="{{ old('time_extended_reserved', $contractProgress->time_extended_reserved )}}">
                        @error('time_extended_reserved')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="financial_progress_amount">आर्थिक प्रगति रकम</label>
                        <input type="number" id="financial_progress_amount" name="financial_progress_amount"
                            placeholder='आर्थिक प्रगति रकम' value="{{ old('financial_progress_amount',$contractProgress->financial_progress_amount) }}">
                        @error('financial_progress_amount')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="financial_progress_Percent">आर्थिक प्रगति प्रतिशत</label>
                        <input type="number" id="financial_progress_Percent" name="financial_progress_Percent"
                            placeholder="आर्थिक प्रगति प्रतिशत"
                            value="{{ old('financial_progress_Percent', $contractProgress->financial_progress_Percent) }}">
                        @error('financial_progress_Percent')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="financial_progress_date">आर्थिक प्रगति मिति</label>
                        <input type="text" id="financial_progress_date" class="nepali-date"
                            name="financial_progress_date" placeholder="आर्थिक प्रगति मिति"
                            value="{{ old('financial_progress_date', $contractProgress->financial_progress_date) }}">
                        @error('financial_progress_date')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="physical_progress_Percent">भौतिक प्रगति प्रतिशत</label>
                        <input type="number" id="physical_progress_percent" name="physical_progress_percent"
                        placeholder="भौतिक प्रगति प्रतिशत" value="{{ old('physical_progress_percent',$contractProgress->physical_progress_percent) }}">
                        @error('physical_progress_percent')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="physical_progress_date">Physical Progress Date(भौतिक प्रगति मिति)</label>
                        <input type="text" id="physical_progress_date" class="nepali-date"
                            name="physical_progress_date" placeholder="भौतिक प्रगति मिति"
                            value="{{ old('physical_progress_date',$contractProgress->physical_progress_date) }}">
                        @error('physical_progress_date')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="input-style-1">
                        <label for="remarks">कैफियत</label>
                        <textarea name="remarks" id="remarks" cols="30" rows="4" placeholder="विवरण">{{ old('remarks',$contractProgress->remarks) }}</textarea>
                        @error('remarks')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="input-style-1">
                        <label for="remarks_en">कैफियत (English)</label>
                        <textarea name="remarks_en" id="remarks_en" cols="30" rows="4" placeholder="विवरण English">{{ old('remarks_en',$contractProgress->remarks_en ) }}</textarea>
                        @error('remarks_en')
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
