@extends('layouts.app')

@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ $title?->label() }}</h2>
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
                                <a href="{{ route('admin.administration.index', [$title?->value]) }}">
                                    {{ $title?->label() }} लिस्ट
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ isset($administration) ? 'सम्पादन गर्नुहोस्' : 'थप्नुहोस्' }}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="card-style mb-30">
        <form
            action="{{ isset($administration) ? route('admin.administration.update', [$title?->value,  $administration->id]) : route('admin.administration.store', [$title?->value]) }}"
            method="POST"
            enctype="multipart/form-data">
            @csrf
            @if(isset($administration))
                @method('PUT')
            @endif

            <div class="row">
                <!-- Title -->
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="title">शिर्षक</label>
                        <input
                            type="text"
                            id="title"
                            name="title"
                            placeholder="शिर्षक"
                            value="{{ old('title', $administration->title ?? '') }}">
                        @error('title')
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
                            value="{{ old('date', $administration->date ?? '') }}">
                        @error('date')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Photo -->
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="photo">फोटो</label>
                        <input
                            type="file"
                            id="photo"
                            name="photo">
                        @error('photo')
                        <p class="text-danger">{{ $message }}</p>
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
                            placeholder="कैफियत">{{ old('remarks', $administration->remarks ?? '') }}</textarea>
                        @error('remarks')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="col-md-12">
                    <button type="submit" class="btn btn-sm btn-primary">
                        {{ isset($administration) ? 'अपडेट गर्नुहोस्' : 'थप्नुहोस्' }}
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
