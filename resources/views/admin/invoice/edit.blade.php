@extends('layouts.app')
@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>चलानी</h2>
                </div>
            </div>
            <!-- end col -->
            <div class="col-md-6">
                <div class="breadcrumb-wrapper mb-30">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.dashboard')}}">ड्यासबोर्ड</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.invoice.index')}}">
                                    चलानी लिस्ट
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                चलानी थप्नुहोस
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <div class="card-style mb-30">
        <form action="{{route('admin.invoice.update', $invoice)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="invoice_no">चलानी नं. * </label>
                        <input type="text" id="invoice_no" name="invoice_no"
                               placeholder="चलानी नं. * " value="{{old('invoice_no', $invoice->invoice_no)}}">
                        @error('invoice_no')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="date">मिति</label>
                        <input type="text" id="date" name="date"
                               placeholder="मिति" class="nepali-date" value="{{old('date', $invoice->date)}}">
                        @error('date')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="letter_count">पत्र संख्या </label>
                        <input type="text" id="letter_count" name="letter_count"
                               placeholder="पत्र संख्या " value="{{old('letter_count', $invoice->letter_count)}}">
                        @error('letter_count')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="rec_name">पत्र पाउने व्यक्ति वा कार्यालयको नाम, ठेगाना * </label>
                        <input type="text" id="rec_name" name="rec_name"
                               placeholder="पत्र पाउने व्यक्ति वा कार्यालयको नाम, ठेगाना * " value="{{old('rec_name', $invoice->rec_name)}}">
                        @error('rec_name')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="input-style-1">
                        <label for="subject">विषय</label>
                        <input type="text" id="subject" name="subject"
                               placeholder="विषय" value="{{old('subject', $invoice->subject)}}">
                        @error('subject')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="deliver_type">पठाएको साधन</label>
                        <input type="text" id="deliver_type" name="deliver_type"
                               placeholder="पठाएको साधन" value="{{old('deliver_type', $invoice->deliver_type)}}">
                        @error('deliver_type')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="photo">फोटो</label>
                        <input type="file" id="photo" name="photo">
                        @error('photo')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="input-style-1">
                        <label for="remarks">कैफियत</label>
                        <textarea type="text" class="form-control" id="remarks" name="remarks" rows="3" placeholder="कैफियत">{{old('remarks', $invoice->remarks)}}</textarea>
                        @error('remarks')
                        <p class="text-danger">{{$message}}</p>
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
