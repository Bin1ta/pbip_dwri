@extends('layouts.app')
@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>दर्ता</h2>
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
                                <a href="{{route('admin.registration.index')}}">
                                    दर्ता लिस्ट
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                दर्ता थप्नुहोस
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
        <form action="{{route('admin.registration.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
               <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="reg_no">दर्ता नं</label>
                        <input type="text" id="reg_no" name="reg_no"
                               placeholder="दर्ता नं" value="{{old('reg_no')}}">
                        @error('reg_no')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="date">मिति</label>
                        <input type="text" id="date" name="date"
                               placeholder="मिति" class="nepali-date" value="{{old('date')}}">
                        @error('date')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="letter_count">प्राप्त पत्रको पत्र संख्या </label>
                        <input type="text" id="letter_count" name="letter_count"
                               placeholder="प्राप्त पत्रको पत्र संख्या " value="{{old('letter_count')}}">
                        @error('letter_count')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="invoice_no">प्राप्त पत्रको च.नं. * </label>
                        <input type="text" id="invoice_no" name="invoice_no"
                               placeholder="प्राप्त पत्रको च.नं. * " value="{{old('invoice_no')}}">
                        @error('invoice_no')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="rec_date">प्राप्त भएको मिति</label>
                        <input type="text" id="rec_date" name="rec_date"
                               placeholder="प्राप्त भएको मिति" class="nepali-date" value="{{old('rec_date')}}">
                        @error('rec_date')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="sender_name">पठाउने व्यक्तिको वा कार्यालय* </label>
                        <input type="text" id="sender_name" name="sender_name"
                               placeholder="पठाउने व्यक्तिको वा कार्यालय* " value="{{old('sender_name')}}">
                        @error('sender_name')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="address">ठेगाना</label>
                        <input type="text" id="address" name="address"
                               placeholder="ठेगाना" value="{{old('address')}}">
                        @error('address')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="subject">विषय</label>
                        <input type="text" id="subject" name="subject"
                               placeholder="विषय" value="{{old('subject')}}">
                        @error('subject')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="department">बुझायको शाखा*</label>
                        <input type="text" id="department" name="department"
                               placeholder="बुझायको शाखा* " value="{{old('department')}}">
                        @error('department')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
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
                <div class="col-md-12">
                    <div class="input-style-1">
                        <label for="remarks">कैफियत</label>
                        <textarea type="text" class="form-control" id="remarks" name="remarks" rows="3" placeholder="कैफियत" value="{{old('remarks')}}"></textarea>
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
