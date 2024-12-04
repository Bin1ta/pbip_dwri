@extends('layouts.app')

@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>Edit Committee Category</h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="breadcrumb-wrapper mb-30">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.committeeCategory.index') }}">Committee Categories</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Edit
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-style mb-30">
                <form action="{{ route('admin.committeeCategory.update', $committeeCategory->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name (Nepali)</label>
                                <input type="text" class="form-control" id="name" name="title" value="{{ old('title', $committeeCategory->name) }}" required>
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name_en">Name (English)</label>
                                <input type="text" class="form-control" id="name_en" name="title" value="{{ old('title_en', $committeeCategory->name_en) }}" required>
                                @error('name_en')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="place" class="form-label">Place <span class="text-danger">*</span></label>
                                <select name="place" id="place" class="form-control" required>
                                    <option value="">Select Place</option>
                                    @foreach (\App\Enums\ProjectTypeEnum::cases() as $place)
                                        <option value="{{ $place->value }}"
                                            {{ old('place', $committeeCategory->place) == $place->value ? 'selected' : '' }}>
                                            {{ $place->label() }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('admin.committeeCategory.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
