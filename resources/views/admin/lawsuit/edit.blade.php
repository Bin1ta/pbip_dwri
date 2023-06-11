@extends('layouts.app')
@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>Lawsuit</h2>
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
                                <a href="{{route('admin.lawsuit.index')}}">
                                    Lawsuit List
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Update Lawsuit
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
        <form action="{{route('admin.lawsuit.update',$lawsuit)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="type">मुद्दाको किसिम</label>
                        <input type="text" id="type" name="type"
                               placeholder="मुद्दाको किसिम" value="{{old('type',$lawsuit->type)}}">
                        @error('type')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                @if(config('default.dual_language'))
                    <div class="col-md-6">
                        <div class="input-style-1">
                            <label for="type_en">मुद्दाको किसिम (English)</label>
                            <input type="text" id="type_en" name="type_en"
                                   placeholder="मुद्दाको किसिम (English)" value="{{old('type_en',$lawsuit->type_en)}}">
                            @error('type_en')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                @endif
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="bigo">बिगो</label>
                        <input type="text" id="bigo" name="bigo"
                               placeholder="बिगो" value="{{old('bigo',$lawsuit->bigo)}}">
                        @error('bigo')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                @if(config('default.dual_language'))
                    <div class="col-md-6">
                        <div class="input-style-1">
                            <label for="bigo_en">बिगो (English)</label>
                            <input type="text" id="bigo_en" name="bigo_en"
                                   placeholder="बिगो (English)" value="{{old('bigo_en',$lawsuit->bigo_en)}}">
                            @error('bigo_en')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                @endif
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="fine">जरिवाना</label>
                        <input type="text" id="fine" name="fine"
                               placeholder="जरिवाना" value="{{old('fine',$lawsuit->fine)}}">
                        @error('fine')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="jailed">कैद</label>
                        <input type="text" id="jailed" name="jailed"
                               placeholder="कैद" value="{{old('jailed',$lawsuit->jailed)}}">
                        @error('jailed')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="reg_date">दर्ता मिति</label>
                        <input type="text" id="reg_date" name="reg_date"
                               placeholder="दर्ता मिति" value="{{old('reg_date',$lawsuit->reg_date)}}">
                        @error('reg_date')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="reg_body">दर्ता भएको निकाय</label>
                        <input type="text" id="reg_body" name="reg_body"
                               placeholder="दर्ता भएको निकाय" value="{{old('reg_body',$lawsuit->reg_body)}}">
                        @error('reg_body')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="accused">अभियुवकको संख्या</label>
                        <input type="text" id="accused" name="accused"
                               placeholder="अभियुवकको संख्या" value="{{old('accused',$lawsuit->accused)}}">
                        @error('accused')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-style-1">
                        <label for="remarks">कैफियत</label>
                        <input type="text" id="remarks" name="remarks"
                               placeholder="कैफियत" value="{{old('remarks',$lawsuit->remarks)}}">
                        @error('remarks')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                @if(config('default.dual_language'))
                    <div class="col-md-6">
                        <div class="input-style-1">
                            <label for="remarks_en">कैफियत (English)</label>
                            <input type="text" id="remarks_en" name="remarks_en"
                                   placeholder="कैफियत (English)" value="{{old('remarks_en',$lawsuit->remarks_en)}}">
                            @error('remarks_en')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                @endif
                <div class="col-md-12">
                    <button type="submit" class="btn btn-sm btn-primary">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection
