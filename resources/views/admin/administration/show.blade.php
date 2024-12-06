@extends('layouts.app')

@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ $administration->title }}</h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="breadcrumb-wrapper mb-30">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.administration.index', ['type' => $documentType]) }}">Administration List</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Details
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="card-style mb-30">
        <div class="card-body">
            <div class="row">
                <!-- Title -->
                <div class="col-md-6">
                    <p><strong>Title:</strong> {{ $administration->title }}</p>
                </div>

                <!-- Date -->
                <div class="col-md-6">
                    <p><strong>Date:</strong> {{ $administration->date }}</p>
                </div>

                <!-- Remarks -->
                <div class="col-md-12">
                    <p><strong>Remarks:</strong> {{ $administration->remarks }}</p>
                </div>

                <!-- Photo -->
                @if($administration->photo)
                    <div class="col-md-12">
                        <p><strong>Photo:</strong></p>
                        <iframe
                            src="{{ $administration->photo }}"
                            style="width: 100%; height: 500px; border: none;"
                            title="Photo Preview">
                        </iframe>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
