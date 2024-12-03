@extends('layouts.app')

@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center mb-4">
            <div class="col-md-6">
                <h2 class="mb-0">View Committee Member</h2>
            </div>
            <div class="col-md-6 text-end">
                <a href="{{ route('admin.committeeMember.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>

    <div class="card shadow-sm mx-auto" style="max-width: 800px; border-radius: 10px;">
        <div class="card-body">
            <div class="d-flex flex-column align-items-center">
                <!-- Display Member's Photo -->
                @if ($committeeMember->photo)
                    <img src="{{ $committeeMember->photo }}" alt="{{ $committeeMember->name }}"
                         class="rounded-circle mb-3"
                         style="width: 150px; height: 150px; object-fit: cover; border: 4px solid #ddd;">
                @else
                    <img src="https://via.placeholder.com/150" alt="No Photo"
                         class="rounded-circle mb-3"
                         style="width: 150px; height: 150px; object-fit: cover; border: 4px solid #ddd;">
                @endif

                <!-- Display Member's Name -->
                <h3 class="mb-0">Name: {{ $committeeMember->name }}</h3>
                <h5>Committee: {{ $committeeMember->committee->name ?? '' }}</h5>
                <h5>Post: {{ $committeeMember->post }}</h5>
            </div>
            <hr>

            <!-- Member's Details -->
            <div class="row g-4">
                <div class="col-md-6">
                    <strong>Address:</strong>
                    <p>{{ $committeeMember->address ?? 'N/A' }}</p>
                </div>
                <div class="col-md-6">
                    <strong>Address (EN):</strong>
                    <p>{{ $committeeMember->address_en ?? 'N/A' }}</p>
                </div>
                <div class="col-md-6">
                    <strong>Phone:</strong>
                    <p>{{ $committeeMember->phone ?? 'N/A' }}</p>
                </div>

                <div class="col-md-6">
                    <strong>Post:</strong>
                    <p>{{ $committeeMember->post ?? 'N/A' }}</p>
                </div>
                <div class="col-md-6">
                    <strong>Post (EN):</strong>
                    <p>{{ $committeeMember->post_en ?? 'N/A' }}</p>
                </div>
                <div class="col-md-6">
                    <strong>Remarks:</strong>
                    <p>{{ $committeeMember->remarks ?? 'N/A' }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
