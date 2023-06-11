<nav class="navbar navbar-expand-lg navbar-dark shadow mt-2" style="background-color: {{$colors->nav}};">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main_nav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('welcome',['language'=>$language])}}">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                @foreach($sharedMenus as $sharedMenu)
                    <li class="nav-item dropdown" id="{{$loop->iteration}}">
                        <a class="nav-link {{$sharedMenu->menus_count>0 ? 'dropdown-toggle' : ''}}"
                           @if($sharedMenu->menus_count>0) data-bs-toggle="dropdown" @endif
                           @if($sharedMenu->menus_count>0)
                               href="#"
                           @else
                               href="@if(config('default.subDivision'))
                                            @if(!empty($sharedMenu->model))
                                                @switch($sharedMenu->type)
                                                    @case('category')
                                                        {{route('documentCategory', [$sharedMenu->model->slug,'language'=>$language])}}
                                                    @break

                                                    @case('subDivision')
                                                        {{route('subDivision', [$sharedMenu->model->slug,'language'=>$language])}}
                                                    @break

                                                    @default
                                                        {{route('officeDetail', [$sharedMenu->model->slug,'language'=>$language])}}
                                                    @endswitch
                                            @else
                                                {{route('static',[$sharedMenu->slug,'language'=>$language])}}
                                            @endif

                                   @else
                                   @if(!empty($sharedMenu->model))
                                   @switch($sharedMenu->type)
                                   @case('category')
                                   {{route('documentCategory', [$sharedMenu->model->slug,'language'=>$language])}}
                                   @break
                                   @default
                                   {{route('officeDetail', [$sharedMenu->model->slug,'language'=>$language])}}
                                   @endswitch
                                   @else
                                   {{route('static',[$sharedMenu->slug,'language'=>$language])}}
                                   @endif
                                   @endif


                                       "
                            @endif
                        >
                            @if(request()->language=='en')
                                {{$sharedMenu->title_en}}
                            @else
                                {{$sharedMenu->title}}
                            @endif
                        </a>
                        <ul class="dropdown-menu">
                            @foreach($sharedMenu->menus as $subMenu)
                                <li>
                                    <a class="dropdown-item"
                                       href="  @if(config('default.subDivision'))
                                               @if(!empty($subMenu->model))
                                                    @switch($subMenu->type)
                                                       @case('category')
                                                           {{route('documentCategory', [$subMenu->model->slug,'language'=>$language])}}
                                                           @break

                                                           @case('subDivision')
                                                           {{route('subDivision', [$subMenu->model->slug,'language'=>$language])}}
                                                           @break

                                                           @case('forestCategory')
                                                           {{route('forestCategory', [$subMenu->model->slug,'language'=>$language])}}
                                                           @break

                                                           @default
                                                           {{route('officeDetail', [$subMenu->model->slug,'language'=>$language])}}
                                                       @endswitch
                                               @else
                                                   {{route('static',[$subMenu->slug,'language'=>$language])}}
                                               @endif
                                               @else
                                               @if(!empty($subMenu->model))
                                               @switch($subMenu->type)
                                               @case('category')
                                               {{route('documentCategory', [$subMenu->model->slug,'language'=>$language])}}
                                               @break
                                               @default
                                               {{route('officeDetail', [$subMenu->model->slug,'language'=>$language])}}
                                               @endswitch
                                               @else
                                               {{route('static',[$subMenu->slug,'language'=>$language])}}
                                               @endif
                                               @endif
                                                "
                                    >
                                        @if(request()->language=='en')
                                            {{$subMenu->title_en}}
                                        @else
                                            {{$subMenu->title}}
                                        @endif

                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
