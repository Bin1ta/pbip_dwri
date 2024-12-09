@extends('layouts.app')

@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ isset($invoice) ? 'चलानी सम्पादन गर्नुहोस्' : 'चलानी थप्नुहोस्' }}</h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="breadcrumb-wrapper mb-30">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">ड्यासबोर्ड</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.invoice.index') }}">चलानी लिस्ट</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ isset($invoice) ? 'सम्पादन गर्नुहोस्' : 'थप्नुहोस्' }}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="card-style mb-30">
        <form
            action="{{ isset($invoice) ? route('admin.invoice.update', $invoice->id) : route('admin.invoice.store') }}"
            method="POST"
            enctype="multipart/form-data">
            @csrf
            @if(isset($invoice))
                @method('PUT')
            @endif

            <div class="row">
                <!-- Invoice Number -->
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="invoice_no">चलानी.नं. *</label>
                        <input
                            type="text"
                            id="invoice_no"
                            name="invoice_no"
                            placeholder="चलानी.नं. *"
                            value="{{ old('invoice_no', $invoice->invoice_no ?? '') }}">
                        @error('invoice_no')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Date -->
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="date">मिति</label>
                        <input
                            type="text"
                            id="date"
                            name="date"
                            class="nepali-date"
                            placeholder="मिति"
                            value="{{ old('date', $invoice->date ?? '') }}">
                        @error('date')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Letter Count -->
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="letter_count">पत्र संख्या</label>
                        <input
                            type="text"
                            id="letter_count"
                            name="letter_count"
                            placeholder="पत्र संख्या"
                            value="{{ old('letter_count', $invoice->letter_count ?? '') }}">
                        @error('letter_count')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Recipient Name -->
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="rec_name">पत्र पाउने व्यक्ति वा कार्यालयको नाम, ठेगाना *</label>
                        <input
                            type="text"
                            id="rec_name"
                            name="rec_name"
                            placeholder="पत्र पाउने व्यक्ति वा कार्यालयको नाम, ठेगाना *"
                            value="{{ old('rec_name', $invoice->rec_name ?? '') }}">
                        @error('rec_name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Subject -->
                <div class="col-md-12">
                    <div class="input-style-1">
                        <label for="subject">विषय</label>
                        <input
                            type="text"
                            id="subject"
                            name="subject"
                            placeholder="विषय"
                            value="{{ old('subject', $invoice->subject ?? '') }}">
                        @error('subject')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Delivery Type -->
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="deliver_type">पठाएको साधन</label>
                        <input
                            type="text"
                            id="deliver_type"
                            name="deliver_type"
                            placeholder="पठाएको साधन"
                            value="{{ old('deliver_type', $invoice->deliver_type ?? '') }}">
                        @error('deliver_type')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Photo -->
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="docs">पत्रको फोटो  </label>
                        <input type="file" id="docs" name="docs[]" class="form-control" placeholder="पत्रको फोटो"   multiple>
                        @error('docs')
                        <div class="error text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>

                <!-- Remarks -->
                <div class="col-md-12">
                    <div class="input-style-1">
                        <label for="remarks">कैफियत</label>
                        <textarea
                            class="form-control"
                            id="remarks"
                            name="remarks"
                            rows="3"
                            placeholder="कैफियत">{{ old('remarks', $invoice->remarks ?? '') }}</textarea>
                        @error('remarks')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="col-md-12">
                    <button type="submit" class="btn btn-sm btn-primary">
                        {{ isset($invoice) ? 'अपडेट गर्नुहोस्' : 'थप्नुहोस्' }}
                    </button>
                </div>
            </div>
        </form>
    </div>

    @push('script')
        <script src="http://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/js/nepali.datepicker.v3.7.min.js"></script>
        <script>
            $(".nepali-date").nepaliDatePicker({
                ndpYear: true,
                ndpMonth: true,
                ndpYearCount: 10
            });
        </script>
    @endpush
@endsection
