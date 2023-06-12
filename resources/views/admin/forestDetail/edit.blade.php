@extends('layouts.app')
@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>Forest Detail</h2>
                </div>
            </div>
            <!-- end col -->
            <div class="col-md-6">
                <div class="breadcrumb-wrapper mb-30">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.dashboard')}}">ड्यासबोर्ड</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.forestDetail.index')}}">
                                    Forest Detail List
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Update Forest Detail
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <div class="card-style mb-30">
        <form action="{{route('admin.forestDetail.update',$forestDetail)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="forest_category_id">वर्ग</label>
                        <select name="forest_category_id" id="forest_category_id" class="form-control">
                            <option value="">वर्ग छान्नुहोस्</option>
                            @foreach($forestCategories as $forestCategory)
                                <option value="{{$forestCategory->id}}" {{old('forest_category_id',$forestDetail->forest_category_id)==$forestCategory->id ? 'selected':''}}>{{$forestCategory->title}}</option>
                            @endforeach
                        </select>
                        @error('forest_category_id')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div><div class="col-md-6">
                    <div class="input-style-1">
                        <label for="forest_name">सामुदायिक वनको नाम</label>
                        <input type="text" id="forest_name" name="forest_name"
                               placeholder="सामुदायिक वनको नाम" value="{{old('forest_name',$forestDetail->forest_name)}}">
                        @error('forest_name')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                @if(config('default.dual_language'))
                    <div class="col-md-6">
                        <div class="input-style-1">
                            <label for="forest_name_en">सामुदायिक वनको नाम (English)</label>
                            <input type="text" id="forest_name_en" name="forest_name_en"
                                   placeholder="सामुदायिक वनको नाम (English)" value="{{old('forest_name_en',$forestDetail->forest_name_en)}}">
                            @error('forest_name_en')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                @endif
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="address">ठेगाना</label>
                        <input type="text" id="address" name="address"
                               placeholder="ठेगाना" value="{{old('address',$forestDetail->address)}}">
                        @error('address')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                @if(config('default.dual_language'))
                    <div class="col-md-6">
                        <div class="input-style-1">
                            <label for="address_en">ठेगाना (English)</label>
                            <input type="text" id="address_en" name="address_en"
                                   placeholder="ठेगाना (English)" value="{{old('address_en',$forestDetail->address_en)}}">
                            @error('address_en')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                @endif
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="house_hold">घरधुरी संख्या</label>
                        <input type="text" id="house_hold" name="house_hold"
                               placeholder="घरधुरी संख्या" value="{{old('house_hold',$forestDetail->house_hold)}}">
                        @error('house_hold')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="area">क्षेत्रफल (हेक्टरमा)</label>
                        <input type="number" step="any" id="area" name="area"
                               placeholder="क्षेत्रफल (हेक्टरमा)" value="{{old('area',$forestDetail->area)}}">
                        @error('area')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="approve_date">कार्ययोजना स्विकृत् मिति</label>
                        <input type="text" id="approve_date" name="approve_date"
                               placeholder="YYYY-MM-DD" value="{{old('approve_date',$forestDetail->approve_date)}}">
                        @error('approve_date')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="end_date">कार्ययोजना समाप्त मिति</label>
                        <input type="text" id="end_date" name="end_date"
                               placeholder="YYYY-MM-DD" value="{{old('end_date',$forestDetail->end_date)}}">
                        @error('end_date')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-sm btn-primary">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection
