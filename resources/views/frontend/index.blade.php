@extends('layouts.master')
@section('content')
    <section class="newsbar-section mt-2">
        <div class="container-fluid">
            <div class="newsbar-container" style="background-color: {{ $colors->scroller ?? '' }}">
                <div class="flex-shrink-0 newsbar-title pr-lg-3">{{ __('Latest News') }}</div>
                <div class="d-block jctkr-wrapper jctkr-initialized">
                    <ul class="marquee-list">
                        <marquee onmouseover="stop()" onmouseout="start()">
                            @foreach ($tickerFiles as $tickerFile)
                                <li>
                                    <a href="{{ route('documentDetail', [$tickerFile->slug, 'language' => $language]) }}">
                                        @if (request()->language == 'en')
                                            {{ $tickerFile->title_en }}
                                        @else
                                            {{ $tickerFile->title }}
                                        @endif {{ $tickerFile->published_date }}
                                        <span class="type">{{ __('New') }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </marquee>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="introduction mt-2" style="overflow-x: hidden">
        <div class="container-fluid">
            <div class=" @if (config('default.subDivision')) col-lg-12 @else col-lg-8 @endif order-1 order-lg-2">
                <div class="slider">
                    @foreach ($sliders as $index => $slider)
                        <div class="slides {{ $loop->first ? 'active' : '' }}"
                            style="background-image: url('{{ $slider->photo }}');">
                            <div class="overlay">
                                <h1>{{ $slider->title_en }}</h1>
                                <p>{{ request()->language == 'en' ? $slider->title_en : $slider->title }}</p>
                            </div>
                        </div>
                    @endforeach

                    <!-- Navigation Arrows -->
                    <div class="arrow left">&larr;</div>
                    <div class="arrow right">&rarr;</div>
                </div>
            </div>
        </div>
    </section>

    <section class="introduction mt-4">
        <div class="container-fluid">
            <div class="row">
                @if (config('default.subDivision'))
                    <div class="col-md-4 order-3 order-lg-1">
                        {{-- <h5 class="title-dark">{{ __('Sub Division Offices') }}</h5> --}}
                        <h5 class="text-white text-center" style="background-color: rgb(31, 31, 143); padding:10px;">
                            @if (request()->language == 'en')
                                {{ $officeDetail->title_en ?? '' }}
                            @else
                                {{ $officeDetail->title ?? '' }}
                            @endif
                        </h5>


                        <div class="col-sm-6 col-lg-12 mt-3">
                            <div class="card-01 h-100">

                                <p class="text-withlink p-2" style="font-size: 17px; text-align: justify;">
                                    @if (request()->language == 'en')
                                        {!! Str::words(strip_tags($officeDetail->description_en ?? ''), 100, '...') !!}
                                    @else
                                        {!! Str::words(strip_tags($officeDetail->description ?? ''), 100, '...') !!}
                                    @endif
                                    <a class="intro-title"
                                        href="{{ route('officeDetail', [$officeDetail->slug ?? '', 'language' => $language]) }}">
                                        {{ __('View More') }}
                                    </a>
                            </div>

                        </div>
                    </div>
                @endif
                @if (config('default.subDivision'))
                        <div class="col-md-4 order-3 order-lg-1">
                            <h5 class="text-white text-center" style="background-color: rgb(31, 31, 143); padding:10px;">
                                Main Canals
                            </h5>
                            <div class="cannel-carousel" id="customCarousel">
                                <div class="cannel-carousel-inner">
                                    @foreach ($canals as $index => $canal)
                                        <div class="cannel-carousel-item {{ $loop->first ? 'active' : '' }}" data-index="{{ $index }}">
                                            <div class="img-box">
                                                <img src="{{ $canal->photo }}" alt="{{ $canal->title }}" class="img-fluid" />
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <!-- Navigation Arrows -->
                                <button class="cannel-carousel-control prev" onclick="moveSlide(-1)">&#10094;</button>
                                <button class="cannel-carousel-control next" onclick="moveSlide(1)">&#10095;</button>
                            </div>
                        </div>

                    @endif

                <div class=" @if (config('default.subDivision')) col-md-4 @else col-lg-4 @endif  order-2 order-lg-3">
                    <div class="row">
                        <div class="col-sm-6 col-lg-12 mt-3 mt-md-0">
                            <div class="card-01">
                                @if ($header->chief_id ?? ('' || $header->information_officer_id ?? ''))
                                    <ul class="list-unstyled">
                                        <li class="align-items-center text-center">
                                            @if ($header->chief_id)
                                                <div class="avatar avatar-lg mt-2 mb-2">
                                                    <img src="{{ $header->chief->photo ?? '' }}"
                                                        alt="{{ $header->chief->name ?? '' }}">
                                                </div>
                                                <div class="textbox-01">
                                                    @if (request()->language == 'en')
                                                        <h6>{{ $header->chief->name_en ?? '' }}</h6>
                                                    @else
                                                        <h6>{{ $header->chief->name ?? '' }}</h6>
                                                    @endif
                                                    <p>{{ __('Office head') }}</p>
                                                    <p><i class="fa fa-phone"></i> {{ $header->chief->phone ?? '' }}</p>
                                                    <p><i class="fa fa-envelope"></i> {{ $header->chief->email ?? '' }}
                                                    </p>
                                                </div>
                                        </li>
                                @endif
                                @if ($header->information_officer_id)
                                    <li class="text-center">
                                        <div class="avatar avatar-lg text-center mt-2 mb-2">
                                            <img src="{{ $header->informationOfficer->photo ?? '' }}"
                                                alt="{{ $header->informationOfficer->name ?? '' }}">
                                        </div>
                                        <div class="textbox-01">
                                            @if (request()->language == 'en')
                                                <h6>{{ $header->informationOfficer->name_en ?? '' }}</h6>
                                            @else
                                                <h6>{{ $header->informationOfficer->name ?? '' }}</h6>
                                            @endif
                                            <p>{{ __('Information Officer') }}</p>
                                            <p>
                                                <i class="fa fa-phone"></i> {{ $header->informationOfficer->phone ?? '' }}
                                            </p>
                                            <p>
                                                <i class="fa fa-envelope"></i>
                                                {{ $header->informationOfficer->email ?? '' }}
                                            </p>
                                        </div>
                                    </li>
                                @endif
                                </ul>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('frontend.index.document')
    <section class="gallery-section mt-2">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="well-heading mb-1"
                        style="border-left: 10px solid #b31b1b; position: relative;background-color: #037555;">
                        {{ __('Photo Gallery') }}<h6 class="content_title"><span class="pull-right"></span>
                        </h6>
                    </div>
                    <div id="galleryCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            @foreach ($galleries as $gallery)
                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-img">
                                                <a
                                                    href="{{ route('photoGalleryDetails', [$gallery->slug, 'language' => $language]) }}">
                                                    <img src="{{ asset('storage/' . $gallery->photos->first()->images) }}"
                                                        style="width: 100%" class="img-fluid" alt="Image">
                                                </a>
                                            </div>
                                            <div class="carousel-caption d-none d-md-block">
                                                @if (request()->language == 'en')
                                                    {{ $gallery->title_en }}
                                                @else
                                                    {{ $gallery->title }}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev bg-transparent w-aut" href="#galleryCarousel" role="button"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next bg-transparent w-aut" href="#galleryCarousel" role="button"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12 wow fadeInRight m-b-15 ">
                    <div class="well-heading"
                        style="border-left: 10px solid #b31b1b; position: relative;background-color: #037555;">
                        {{ __('Audio Gallery') }}<h6 class="content_title"><span class="pull-right"></span>
                        </h6>
                    </div>
                    <br>
                    <div class="card-01 overflow-scroll" style="height: 240px;">
                        @foreach ($audios as $audio)
                            <audio controls="controls">
                                <source src="{{ $audio->file_url }}">
                            </audio>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    @if ($noticePopups->count() > 0)
        <div class="modal fade" id="noticeModal" tabindex="-1" aria-labelledby="noticeModal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="noticeModal"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @foreach ($noticePopups as $noticePopup)
                            @foreach ($noticePopup->files as $file)
                                @if ($file->extension == 'pdf')
                                    <iframe src="{{ asset('storage/' . $file->url) }}" frameborder="0"
                                        style="width:100%;height:600px;"></iframe>
                                @else
                                    <img src="{{ asset('storage/' . $file->url) }}" alt="" style="width:100%;">
                                @endif
                                <hr>
                            @endforeach
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    @endif
    @push('script')
        <script>
            const myCarousel = document.querySelector('#myCarousel');
            const carousel = new bootstrap.Carousel(myCarousel, {
                interval: 2000,
                wrap: false,
                loop: true
            });
        </script>
        <script>
            let items = document.querySelectorAll('#galleryCarousel .carousel-item')
            items.forEach((el) => {
                const minPerSlide = 4
                let next = el.nextElementSibling
                for (var i = 1; i < minPerSlide; i++) {
                    if (!next) {
                        // wrap carousel by using first child
                        next = items[0]
                    }
                    let cloneChild = next.cloneNode(true)
                    el.appendChild(cloneChild.children[0])
                    next = next.nextElementSibling
                }
            })
        </script>
        <script>
            let employee = document.querySelectorAll('#employeeCarousel .carousel-item')
            employee.forEach((el) => {
                const minPerSlide1 = 4
                let next = el.nextElementSibling
                for (var i = 1; i < minPerSlide1; i++) {
                    if (!next) {
                        // wrap carousel by using first child
                        next = employee[0]
                    }
                    let cloneChild = next.cloneNode(true)
                    el.appendChild(cloneChild.children[0])
                    next = next.nextElementSibling
                }
            })
        </script>
        <script>
            $(document).ready(function() {
                $("#noticeModal").modal("show");
                setTimeout(function() {
                    $('#noticeModal').modal('hide');
                }, 10000);
            });
        </script>

        <script>
            const slides = document.querySelectorAll('.slides');
            const leftArrow = document.querySelector('.arrow.left');
            const rightArrow = document.querySelector('.arrow.right');
            let currentIndex = 0;

            // Function to show slides
            function showSlide(index) {
                slides.forEach((slide, i) => {
                    slide.classList.remove('active', 'prev');
                    if (i === index) slide.classList.add('active');
                    if (i === (index - 1 + slides.length) % slides.length) slide.classList.add('prev');
                });
            }

            // Navigate Slides
            leftArrow.addEventListener('click', () => {
                currentIndex = (currentIndex - 1 + slides.length) % slides.length;
                showSlide(currentIndex);
            });

            rightArrow.addEventListener('click', () => {
                currentIndex = (currentIndex + 1) % slides.length;
                showSlide(currentIndex);
            });

            // Auto-Slide
            setInterval(() => {
                currentIndex = (currentIndex + 1) % slides.length;
                showSlide(currentIndex);
            }, 5000);

            // Ensuring active slide is properly reset
            document.addEventListener("DOMContentLoaded", () => {
                showSlide(currentIndex); // Ensuring the first slide is displayed correctly when the page loads
            });
        </script>



        <script>
            window.moveSlide = function(direction) {
                const carouselInner = document.querySelector('.cannel-carousel-inner');
                const items = document.querySelectorAll('.cannel-carousel-item');

                if (direction === 1) {
                    currentIndex++;
                    if (currentIndex >= items.length) {
                        carouselInner.appendChild(items[0]);
                        carouselInner.style.transition = 'none';
                        carouselInner.style.transform = `translateX(0)`;
                        currentIndex = 0;
                        setTimeout(() => {
                            carouselInner.style.transition = 'transform 0.5s ease';
                        });
                    } else {
                        carouselInner.style.transform = `translateX(-${currentIndex * 100}%)`;
                    }
                } else if (direction === -1) {
                    currentIndex--;
                    if (currentIndex < 0) {
                        carouselInner.prepend(items[items.length - 1]);
                        carouselInner.style.transition = 'none';
                        carouselInner.style.transform = `translateX(-100%)`;
                        currentIndex = 0;
                        setTimeout(() => {
                            carouselInner.style.transition = 'transform 0.5s ease';
                            carouselInner.style.transform = `translateX(0)`;
                        });
                    } else {
                        carouselInner.style.transform = `translateX(-${currentIndex * 100}%)`;
                    }
                }
            };
        </script>
    @endpush
@endsection
