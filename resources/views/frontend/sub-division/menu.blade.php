<section class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                    aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('subDivisionDetail',[$subDivision->slug,'language'=>$language])}}"><i
                                class="fa fa-home"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('subDivision.subDivisionStaffs',[$subDivision->slug,'language'=>$language])}}">{{__('Employees')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('subDivision.subDivisionDocuments',[$subDivision->slug,'language'=>$language])}}">
                          {{__('Notice / Publications')}}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('subDivision.subDivisionSmuggling',[$subDivision->slug,'language'=>$language])}}">{{__('Smuggling')}}</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="{{route('subDivision.subDivisionSmuggling',[$subDivision->slug,'language'=>$language])}}">{{__('Forest Detail')}}</a>
                        <ul class="dropdown-menu">
                            <li>
                                @foreach($subDivision->forestCategories as $forestCategory)
                                    <a class="dropdown-item" href="{{route('forestCategory.subDivisionForestCategory',[$subDivision,$forestCategory->slug,'language'=>$language])}}">
                                        {{request()->language=='en' ? $forestCategory->title_en : $forestCategory->title}}
                                    </a>
                                @endforeach

                            </li>
                        </ul>

                    </li>
                </ul>
            </div>
        </div>
    </nav>
</section>
