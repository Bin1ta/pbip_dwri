@extends('layouts.app')
@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>Current Contract थप्नुहोस</h2>
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
                                    Current Contract लिस्ट
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Current Contract थप्नुहोस
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
        <form action="{{ route('admin.current-contract.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input type="text" id="name" name="name" placeholder="Work name*"
                            value="{{ old('name') }}">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="place" class="form-label">Place <span class="text-danger">*</span></label>
                        <select name="place_id" id="place" class="form-control" required>
                            <option value="">Select Place</option>
                            @foreach (\App\Enums\ProjectTypeEnum::cases() as $place)
                                <option value="{{ $place->value }}"> {{ $place->label() }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="work">Work Name <span class="text-danger">*</span></label>
                        <input type="text" id="work" name="work" placeholder="Work name*"
                            value="{{ old('work') }}">
                        @error('work')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="identification_no">Identification No. <span class="text-danger">*</span></label>
                        <input type="text" id="identification_no" name="identification_no" placeholder="Contract id"
                            value="{{ old('identification_no') }}">
                        @error('identification_no')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="contractor_detail"> Contractor Detail <span class="text-danger">*</span></label>
                        <input type="text" id="contractor_detail" name="contractor_detail" placeholder=" Contractor detail"
                            value="{{ old('contractor_detail') }}">
                        @error('contractor_detail')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="agreement_date">Agreement Date <span class="text-danger">*</span></label>
                        <input type="text" id="agreement_date" name="agreement_date" class="nepali-date"
                            placeholder="agreement date " value="{{ old('agreement_date') }}">
                        @error('agreement_date')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="agreement_amount">Agreement Amount <span class="text-danger">*</span></label>
                        <input type="text" id="agreement_amount"  name="agreement_amount"
                            placeholder="completion date" value="{{ old('agreement_amount') }}">
                        @error('agreement_amount')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="completion_date">Completion Date <span class="text-danger">*</span></label>
                        <input type="text" id="completion_date" class="nepali-date" name="completion_date"
                            placeholder="completion date " value="{{ old('completion_date') }}">
                        @error('completion_date')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="extension_time">Extension Time </label>
                        <input type="text" id="extension_time"  name="extension_time"
                            placeholder="extension time" value="{{ old('extension_time') }}">
                        @error('extension_time')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="extension_duration">Extension Duration</label>
                        <input type="text" id="extension_duration" name="extension_duration"
                            placeholder="Times Extended Reversed" value="{{ old('extension_duration') }}">
                        @error('extension_duration')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="completion_date_revised">Commpletion date revised</label>
                        <input type="text" id="completion_date_revised" name="completion_date_revised" class="nepali-date"
                            placeholder="yyyy/mm/dd" value="{{ old('completion_date_revised') }}">
                        @error('completion_date_revised')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="updated_progress">Updated Progress </label>
                        <input type="text" id="updated_progress" name="updated_progress"
                            placeholder='updated Progress' value="{{ old('updated_progress') }}">
                        @error('updated_progress')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="authorised_person">Authorized Person</label>
                        <input type="text" id="authorised_person" name="authorised_person"
                            placeholder="Authorized Person" value="{{ old('authorised_person') }}">
                        @error('authorised_person')
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
