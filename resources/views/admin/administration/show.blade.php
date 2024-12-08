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

                <div class="row">
                    @foreach($administration->docs as $doc)
                        <div class="col-md-6 mb-4 d-flex flex-column align-items-center">

                            <div class="card p-3 shadow-sm" style="width: 100%; position: relative;">
                                <div class="card-header">
                                    <form action="#" method="POST"
                                          style="position: absolute; top: 5px; right: 10px;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete"
                                                onclick="return confirm('Are you sure you want to delete this document?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                                <!-- Content -->
                                <div class="card-body">
                                    @if(Str::endsWith($doc->doc, ['jpg', 'jpeg', 'png', 'gif']))
                                        <img src="{{ asset('storage/' . $doc->doc) }}" alt="Document"
                                             style=" width:100%; height: 100%; object-fit: contain;">
                                    @elseif(Str::endsWith($doc->doc, ['pdf']))
                                        <iframe src="{{ asset('storage/' . $doc->doc) }}" style=" height: 540px; width: 100%"
                                                frameborder="0"></iframe>
                                    @else
                                        <a href="{{ asset('storage/' . $doc->doc) }}"
                                           target="_blank">{{ basename($doc->doc) }}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
