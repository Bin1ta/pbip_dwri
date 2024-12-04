<footer class="footer mt-2" style="background-color: {{$colors->scroller}}">
    <div class="footer-main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-2 col-md-2 col-lg-2">
                    <h6 class="footer-title mb-3">
                        {{__('Contacts')}}
                    </h6>
                    <h6 class="text-white text-bold">
                        @if(request()->language=='en')
                            {{ $header->office_name_en }}
                        @else
                            {{ $header->office_name }}
                        @endif
                    </h6>
                    <ul class="list mt-2">
                        <li class="text-white">
                            <i class="fa fa-map-marker"></i> @if(request()->language=='en')
                                {{ $header->office_address_en }}
                            @else
                                {{$header->office_address}}
                            @endif
                        </li>
                        <li class="text-white">
                            <i class="fa fa-phone"></i> {{ $header->office_phone }}
                        </li>
                        <li class="text-white">
                            <i class="fa fa-envelope"></i> {{ $header->office_email }}
                        </li>
                    </ul>
                    <div class="textwidget mt-4">
                        <span class="fa-stack fa-lg">
                                <a href="#"><i class="fa fa-circle-thin fa-stack-2x" style="color: #fff;"></i>
                                    <i class="fa fa-facebook fa-stack-1x" style="color: #fff;"></i></a>
                            </span><span class="fa-stack fa-lg">
                                <a href="#"><i class="fa fa-circle-thin fa-stack-2x" style="color: #fff;"></i>
                                    <i class="fa fa-twitter fa-stack-1x" style="color: #fff;"></i></a>
                            </span>
                        <span class="fa-stack fa-lg">
                                <a href="#"><i class="fa fa-circle-thin fa-stack-2x" style="color: #fff;"></i>
                                    <i class="fa fa-youtube fa-stack-1x" style="color: #fff;"></i></a>
                            </span>
                    </div>
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3 text-center">
                 @if($header->grievance_officer_id)
                    <div class="card-container1  card-03 ">
                        <h6 class="footer-title mb-3">
                        {{__('Grievance Hearing Officer')}}
                        </h6>
                        <div class="d-flex flex-column justify-content-center">
                            <div class="io-image">
                                <img class="rounded" src="{{$header->grievanceOfficer->photo ?? ''}}" height="120" style="object-fit:contain;"
                                     alt="{{$header->grievanceOfficer->name ?? ''}}">
                            </div>
                            <div>
                                @if(request()->language=='en')
                                <h6 class="text-white mt-2">{{$header->grievanceOfficer->name_en ?? ''}}</h6>
                                @else
                                    <h6 class="text-white mt-2">{{$header->grievanceOfficer->name ?? ''}}</h6>
                                @endif

                                <p class="text-white"><i class="fa fa-phone"></i> {{$header->grievanceOfficer->phone ?? ''}}</p>
                                <p class="text-white"><i class="fa fa-envelope"></i>  {{$header->grievanceOfficer->email ?? ''}}</p>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <h6 class="footer-title mb-3">{{__('Important Links')}}</h6>
                    <div class="home-contact-card">
                        <ul>
                            @foreach ($sharedLinks as $link)
                                <li>
                                    <a href="{{ $link->url }}" target="_blank">
                                        <h6>
                                            {{ request()->language=="en" ? $link->title_en : $link->title }}
                                        </h6>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <h6 class="footer-title mb-3">{{__('Our Map')}}</h6>
                    <div class="textwidget links">
                        <iframe src="{{$header->map_iframe}}" width="100%" height="250" style="border:0;"
                                allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright" style="background-color: {{$colors->footer}}">
        <span>Copyright © {{ $header->office_name ?? ''}}</span>
        <span>Last Updated: {{config('app.date')}}</span>
        <span>Visitors: {{$totalVisitors}}</span>
        <span>Developed By:
            <a href="https://ninjainfosys.com" target="blank">Ninja Infosys</a></span>
    </div>
</footer>
