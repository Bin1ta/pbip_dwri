<section class="document-section mt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                @if($header->document_list_type=="list")
                    @include("frontend.index.list")
                @else
                    @include("frontend.index.card")
                @endif
            </div>
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 wow fadeInRight m-b-15">
                        <div class="well-heading"
                             style="border-left: 10px solid #b31b1b; position: relative;background-color: {{$colors->nav}};">
                            {{__('Related Information')}}<h6 class="content_title"><span class="pull-right"></span>
                            </h6>
                        </div>
                        <br>
                    </div>
                </div>
                <div class="clearall"></div>
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="blockmenu" style="background-color: {{$colors->nav}}">
                            <a href="{{route('static',["faq",'language'=>$language])}}">
                                <span class="block-icon"><i class="fa fa-question-circle"></i></span>
                                <div class="block-content">
                                    <div class="block-content-title"
                                         style="color: #fff;">{{__('Frequently Asked Questions')}}</div>
                                </div>
                            </a>
                        </div>
                        <!--button end-->
                        <!--button start-->
                        <div class="blockmenu" style="background-color: {{$colors->nav}}">
                            <a href="#">
                                <span class="block-icon"><i class="fa fa-envelope"></i></span>
                                <div class="block-content">
                                    <div class="block-content-title" style="color: #fff;">{{ __('Check Mail') }}</div>
                                </div>
                            </a>
                        </div>
                        <!--button end-->
                        <!--button start-->
                        <div class="blockmenu" style="background-color: {{$colors->nav}}">
                            <a href="{{route('static',["bill",'language'=>$language])}}">
                                <span class="block-icon"><i class="fa fa-calculator"></i></span>
                                <div class="block-content">
                                    <div class="block-content-title"
                                         style="color: #fff;">
                                        {{__('Bill Publicity')}}
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!--button end-->
                        <div class="blockmenu" style="background-color: {{$colors->nav}}">
                            <a href="https://twitter.com/">
                                <span class="block-icon"><i class="fa fa-twitter"></i></span>
                                <div class="block-content">
                                    <div class="block-content-title" style="color: #fff;">{{ __('Twitter Link') }}</div>
                                </div>
                            </a>
                        </div>
                        <!--button start-->

                        <!--button end-->
                        <!--button start-->
                        <div class="blockmenu" style="background-color: {{$colors->nav}}">
                            <a href="{{route('static',["links",'language'=>$language])}}">
                                <span class="block-icon"><i class="fa fa-link"></i></span>
                                <div class="block-content">
                                    <div class="block-content-title" style="color: #fff;">
                                        {{__('Links')}}
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!--button end-->
                    </div>
                </div>
                <div class="clearall"></div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class=" col-sm-12 col-xs-12 wow fadeInRight m-b-15">
                        <div class="well-heading"
                             style="border-left: 10px solid #b31b1b; position: relative;background-color: {{$colors->nav}};">
                            {{__('Employee Detail')}}<h6 class="content_title"><span class="pull-right"></span>
                            </h6>
                        </div>
                        <br>
                    </div>

                <div class="row justify-content-center" style="overflow-x: hidden">
                    <div id="employeeCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            @foreach($employees as $employee)
                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                    <div class="col-md-3">
                                        <div class="card1 mt-2">
                                            <div class="avatar avatar-lg-1 mt-2 mb-2">
                                                <img src="{{ $employee->photo ?? '' }}"
                                                     alt="{{ $employee->name ?? '' }} " class="rounded-0">
                                            </div>
                                            <div class="textbox-01 mt-4">
                                                @if(request()->language == 'en')
                                                    <strong>{{ $employee->name_en }}</strong><br>
                                                @else
                                                    <strong>{{ $employee->name }}</strong><br>
                                                @endif
                                                <p><i class="fa fa-phone"></i> {{ $employee->phone ?? '' }}</p>
                                                <p><i class="fa fa-envelope"></i> {{ $employee->email ?? '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <a class="carousel-control-prev bg-transparent w-auto" href="#employeeCarousel" role="button"
                           data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next bg-transparent w-auto" href="#employeeCarousel" role="button"
                           data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>
                </div>
                </div>
                <div class="col-md-3">
                    @if($header->facebook_iframe)
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 wow fadeInRight m-b-15">
                                <div class="well-heading"
                                     style="border-left: 10px solid #b31b1b; position: relative;background-color: {{$colors->nav}};">
                                    {{__('Facebook')}}<h6 class="content_title"><span class="pull-right"></span>
                                    </h6>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="clearall"></div>
                        <div class="row">
                            <iframe src="{{$header->facebook_iframe}}" width="340" height="280"
                                    style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                                    allowfullscreen="true"
                                    allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</section>
