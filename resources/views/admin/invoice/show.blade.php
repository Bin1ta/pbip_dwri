@extends('layouts.app')

@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h1>चलानी</h1>
                </div>
            </div>
            <div class="col-md-6">
                <div class="breadcrumb-wrapper mb-30">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">डस्वोर्ड</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.invoice.index') }}">चलानी लिस्ट</a>
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
            <div class="card border-dark mb-3">
                <div class="card-header bg-dark text-white">
                    दर्ता विवरण
                </div>
        <div class="card-body">

                    <div class="row mb-3">
                        <div class="col-md-4"><strong>चलानी नं.</strong></div>
                        <div class="col-md-8">{{ $invoice->invoice_no }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4"><strong>मिति</strong></div>
                        <div class="col-md-8">{{ $invoice->date }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4"><strong>पत्र संख्या</strong></div>
                        <div class="col-md-8">{{ $invoice->letter_count }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4"><strong>पत्र पाउने व्यक्ति वा कार्यालयको नाम, ठेगाना</strong></div>
                        <div class="col-md-8">{{ $invoice->rec_name }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4"><strong>विषय</strong></div>
                        <div class="col-md-8">{{ $invoice->subject }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4"><strong>पठाएको साधन</strong></div>
                        <div class="col-md-8">{{ $invoice->deliver_type }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4"><strong>विवरण</strong></div>
                        <div class="col-md-8">{{ $invoice->remarks }}</div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($invoice->docs as $doc)
                    <div class="col-md-6 mb-4 d-flex flex-column align-items-center">

                        <div class="card p-3 shadow-sm" style="width: 100%; position: relative;">
                            <div class="card-header">
                                <form action="{{ route('admin.invoice.deletePhoto', $doc->id) }}" method="POST"
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
@endsection
