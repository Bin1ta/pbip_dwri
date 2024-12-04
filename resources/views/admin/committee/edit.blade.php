@extends('layouts.app')

@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center mb-4">
            <div class="col-md-6">
                <h2 class="mb-0">Edit Committee</h2>
            </div>

        </div>
    </div>

    <div class="card-style mb-30">
        <form action="{{ route('admin.committee.update', $committee) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="committee_category_id" class="form-label">Category <span class="text-danger">*</span></label>
                        <select name="committee_category_id" id="committee_category_id" class="form-control" required>
                            <option value="">Select Category</option>
                            @foreach ($committeeCategory as $category)
                                <option value="{{ $category->id }}"
                                    {{ $committee->committee_category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control"
                               value="{{ old('name', $committee->name) }}" placeholder="Enter committee name" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name_en" class="form-label">Name (EN)</label>
                        <input type="text" name="name_en" id="name_en" class="form-control"
                               value="{{ old('name_en', $committee->name_en) }}" placeholder="Enter English name">
                    </div>
                </div>


            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('admin.committee.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
