<footer class="footer mt-2" style="background-color: {{ $colors->scroller }}">
    <div class="footer-main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-2 col-md-2 col-lg-2">
                    <h6 class="footer-title mb-3">
                        {{ __('Contacts') }}
                    </h6>
                    <h6 class="text-white text-bold">
                        @if (request()->language == 'en')
                            {{ $header->office_name_en }}
                        @else
                            {{ $header->office_name }}
                        @endif
                    </h6>
                    <ul class="list mt-2">
                        <li class="text-white">
                            <i class="fa fa-map-marker"></i>
                            @if (request()->language == 'en')
                                {{ $header->office_address_en }}
                            @else
                                {{ $header->office_address }}
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
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <div class="footer-title mb-3 ">
                        <h6><b>{{ __('Related Information') }}</b></h6>
                        <h6 class="text-white text-bold mt-2">
                            <ul style="color: white; padding-left: 20px; margin-top: 20px; list-style:none">
                                <li style="margin-bottom: 10px;">

                                    <a href="{{ route('static', ['faq', 'language' => $language]) }}"
                                        style="color: white; text-decoration: none;"
                                        onmouseover="this.style.color='#000102'" onmouseout="this.style.color='white'">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="currentColor"
                                            class="icon icon-tabler icons-tabler-filled icon-tabler-arrow-badge-right">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M7 6l-.112 .006a1 1 0 0 0 -.669 1.619l3.501 4.375l-3.5 4.375a1 1 0 0 0 .78 1.625h6a1 1 0 0 0 .78 -.375l4 -5a1 1 0 0 0 0 -1.25l-4 -5a1 1 0 0 0 -.78 -.375h-6z" />
                                        </svg>
                                        {{ __('Frequently Asked Questions') }}
                                    </a>
                                </li>
                                <li style="margin-bottom: 10px;">
                                    <a href="#" style="color: white; text-decoration: none;"
                                        onmouseover="this.style.color='#000102'" onmouseout="this.style.color='white'">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="currentColor"
                                            class="icon icon-tabler icons-tabler-filled icon-tabler-arrow-badge-right">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M7 6l-.112 .006a1 1 0 0 0 -.669 1.619l3.501 4.375l-3.5 4.375a1 1 0 0 0 .78 1.625h6a1 1 0 0 0 .78 -.375l4 -5a1 1 0 0 0 0 -1.25l-4 -5a1 1 0 0 0 -.78 -.375h-6z" />
                                        </svg>
                                        {{ __('Check Mail') }}
                                    </a>
                                </li>
                                <li style="margin-bottom: 10px;">
                                    <a href="{{ route('static', ['bill', 'language' => $language]) }}"
                                        style="color: white; text-decoration: none;"
                                        onmouseover="this.style.color='#000102'" onmouseout="this.style.color='white'">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="currentColor"
                                            class="icon icon-tabler icons-tabler-filled icon-tabler-arrow-badge-right">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M7 6l-.112 .006a1 1 0 0 0 -.669 1.619l3.501 4.375l-3.5 4.375a1 1 0 0 0 .78 1.625h6a1 1 0 0 0 .78 -.375l4 -5a1 1 0 0 0 0 -1.25l-4 -5a1 1 0 0 0 -.78 -.375h-6z" />
                                        </svg>
                                        {{ __('Bill Publicity') }}
                                    </a>
                                </li>
                                <li style="margin-bottom: 10px;">
                                    <a href="https://twitter.com/" style="color: white; text-decoration: none;"
                                        onmouseover="this.style.color='#000102'" onmouseout="this.style.color='white'">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="currentColor"
                                            class="icon icon-tabler icons-tabler-filled icon-tabler-arrow-badge-right">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M7 6l-.112 .006a1 1 0 0 0 -.669 1.619l3.501 4.375l-3.5 4.375a1 1 0 0 0 .78 1.625h6a1 1 0 0 0 .78 -.375l4 -5a1 1 0 0 0 0 -1.25l-4 -5a1 1 0 0 0 -.78 -.375h-6z" />
                                        </svg>
                                        {{ __('Twitter Link') }}
                                    </a>
                                </li>
                                <li style="margin-bottom: 10px;">
                                    <a href="{{ route('static', ['links', 'language' => $language]) }}"
                                        style="color: white; text-decoration: none;"
                                        onmouseover="this.style.color='#000102'" onmouseout="this.style.color='white'">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="currentColor"
                                            class="icon icon-tabler icons-tabler-filled icon-tabler-arrow-badge-right">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M7 6l-.112 .006a1 1 0 0 0 -.669 1.619l3.501 4.375l-3.5 4.375a1 1 0 0 0 .78 1.625h6a1 1 0 0 0 .78 -.375l4 -5a1 1 0 0 0 0 -1.25l-4 -5a1 1 0 0 0 -.78 -.375h-6z" />
                                        </svg>
                                        {{ __('Links') }}
                                    </a>
                                </li>
                            </ul>
                        </h6>
                    </div>


                </div>

                <div class="col-sm-4 col-md-4 col-lg-4">
                    <h6 class="footer-title mb-3">{{ __('Important Links') }}</h6>
                    <div class="home-contact-card">
                        <ul>
                            @foreach ($sharedLinks as $link)
                                <li>
                                    <a href="{{ $link->url }}" target="_blank">
                                        <h6>
                                            {{ request()->language == 'en' ? $link->title_en : $link->title }}
                                        </h6>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <h6 class="footer-title mb-3">{{ __('Our Map') }}</h6>
                    <div class="textwidget links">
                        <iframe src="{{ $header->map_iframe }}" width="100%" height="250" style="border:0;"
                            allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright" style="background-color: {{ $colors->footer }}">
        <span>Copyright © {{ $header->office_name ?? '' }}</span>
        <span>Last Updated: {{ config('app.date') }}</span>
        <span>Visitors: {{ $totalVisitors }}</span>
        <span>Developed By:
            <a href="https://ninjainfosys.com" target="blank">Ninja Infosys</a></span>
    </div>
</footer>
