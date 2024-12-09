@extends('layouts.app')

@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center mb-4">
            <div class="col-md-6">
                <h2 class="mb-0">Add Committee Member</h2>
            </div>
        </div>
    </div>

    <div class="card-style mb-30">
        <form action="{{ route('admin.committeeMember.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-4">
                <!-- Committee -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="committee_id" class="form-label">Committee <span
                                class="text-danger">*</span></label>
                        <select name="committee_id" id="committee_id" class="form-control" >
                            <option value="">Select Committee</option>
                            @foreach ($committees as $committee)
                                <option value="{{ $committee->id }}">{{ $committee->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Name -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name" class="form-label">Name </label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}"
                               >
                    </div>
                </div>

                <!-- Name (EN) -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name_en" class="form-label">Name (EN)</label>
                        <input type="text" name="name_en" id="name_en" class="form-control"
                               value="{{ old('name_en') }}">
                    </div>
                </div>

                <!-- Address -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="address" class="form-label">Address </label>
                        <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}"
                               >
                    </div>
                </div>

                <!-- Address (EN) -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="address_en" class="form-label">Address (EN)</label>
                        <input type="text" name="address_en" id="address_en" class="form-control"
                               value="{{ old('address_en') }}">
                    </div>
                </div>

                <!-- Phone -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}"
                               >
                    </div>
                </div>

                <!-- Photo -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="photo" class="form-label">Photo</label>
                        <input type="file" name="photo" id="photo" class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="post" class="form-label">Post </label>
                        <input type="text" name="post" id="post" class="form-control" value="{{ old('post') }}"
                               >
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="post_en" class="form-label">Post (EN)</label>
                        <input type="text" name="post_en" id="post_en" class="form-control"
                               value="{{ old('post_en') }}">
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label for="remarks" class="form-label">Remarks</label>
                        <input type="text" name="remarks" id="remarks" class="form-control"
                               value="{{ old('post_en') }}">
                    </div>
                </div>
            </div>

            <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('admin.committeeMember.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
