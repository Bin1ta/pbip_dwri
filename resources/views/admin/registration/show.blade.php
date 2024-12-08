@extends('layouts.app')

@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h1>दर्ता</h1>
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
                                <a href="{{ route('admin.registration.index') }}">दर्ता लिस्ट</a>
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
                        <div class="col-md-4 font-weight-bold">दर्ता नं.</div>
                        <div class="col-md-8">{{ $registration->reg_no }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">मिति</div>
                        <div class="col-md-8">{{ $registration->rec_date }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">पत्र संख्या</div>
                        <div class="col-md-8">{{ $registration->letter_count }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">पत्र पठाउने व्यक्ति वा कार्यालयको नाम, ठेगाना</div>
                        <div class="col-md-8">{{ $registration->sender_name }}, {{ $registration->address }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">विषय</div>
                        <div class="col-md-8">{{ $registration->subject }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">विवरण</div>
                        <div class="col-md-8">{{ $registration->remarks }}</div>
                    </div>
                </div>
            </div>


            <div class="row">
                @foreach($registration->docs as $doc)
                    <div class="col-md-6 mb-4 d-flex flex-column align-items-center">

                        <div class="card p-3 shadow-sm" style="width: 100%; position: relative;">
                            <div class="card-header">
                                <form action="{{ route('admin.registration.deletePhoto', $doc->id) }}" method="POST"
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
