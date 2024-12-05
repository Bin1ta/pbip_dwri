@extends('layouts.master')

@section('content')
    <!-- Breadcrumb Navigation -->
    <div class="container-fluid mt-2">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('welcome') }}"><i class="fa fa-home"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    @if(request()->language == 'en')
                        {{ $committeeCategory->title_en ?? '' }}
                    @else
                        {{ $committeeCategory->title ?? '' }}
                    @endif
                </li>
            </ol>
        </nav>
    </div>

    <!-- Heading -->
    <div class="container-fluid">
        <div class="col-md-12 mb-4">
            <div class="well-heading"
                 style="border-left: 10px solid #b31b1b; background-color: {{ $colors->nav }}; position: relative;">
                <i class="fa fa-clipboard"></i>
                @if(request()->language == 'en')
                    {{ $committeeCategory->title_en ?? '' }}
                @else
                    {{ $committeeCategory->title ?? '' }}
                @endif
            </div>
        </div>

        <!-- Table Heading -->
        <h4 style="padding: 10px; font-weight: bold;">
            @if(request()->language == 'en')
                {{ $committeeCategory->title_en ?? '' }}
            @else
                {{ $committeeCategory->title ?? '' }}
            @endif
        </h4>

        <!-- Committee Members Table -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered" style="width: 100%;">
                <thead>
                    <tr>
                        <th>क्र.स</th>
                        <th>नाम, थर</th>
                        <th>ठेगाना</th>
                        <th>पद</th>
                        <th>सम्पर्क नं.</th>
                        <th>फोटो</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($committees as $committee)
                        @foreach ($committee->committeeMembers as $key => $committeeMember)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $committeeMember->name }}</td>
                                <td>{{ $committeeMember->address ?? 'N/A' }}</td>
                                <td>{{ $committeeMember->position ?? 'N/A' }}</td>
                                <td>{{ $committeeMember->contact ?? 'N/A' }}</td>
                                <td>
                                    <img src="{{ $committeeMember->photo_url ?? asset('default-avatar.png') }}"
                                         alt="{{ $committeeMember->name }}"
                                         width="100"
                                         style="object-fit: contain;">
                                </td>
                            </tr>
                        @endforeach
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No Committee Members Found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            {{ $committees->links() }}
        </div>
    </div>
@endsection
    