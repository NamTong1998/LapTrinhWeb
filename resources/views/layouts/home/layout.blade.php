<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>@yield('title')</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CMuli:400,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{ asset('home/css/bootstrap.min.css') }}" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('home/css/font-awesome.min.css') }}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('home/css/style.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('home/css/custom.css') }}" />
@yield('css')
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<!-- HEADER -->
<header id="header" style=" background-image: linear-gradient(45deg,rgb(2,33,64,0.8) 50%,rgb(45,95,93,0.85)),url(' {{ asset('home/img/hana2.jpg') }} '); ">
    <!-- NAV -->
    <div id="nav">
        <!-- Top Nav -->
        <div id="nav-top">
            <div class="container">
                <!-- logo -->
                <div class="nav-logo">

                    <a href="{{ route('home_main') }}" class="logo"><img src="{{ asset('home/img/banner.jpg') }}" alt=""></a>
                </div>
                <!-- /logo -->

                <!-- search & aside toggle -->
                <div class="nav-btns">
                    <!-- Authentication Links -->
                    @guest
                        <a class="btn btn-default" href="{{ route('login') }}" role="button">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="btn btn-default" href="{{ route('register') }}" role="button">{{ __('Register') }}</a>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                             <i class="fa fa-user"></i>   {{ Auth::user()->user_name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <div>
                                    <a class="dropdown-item" href="{{ route('home_profile_view') }}">
                                         <i class="fa fa-folder-open"> </i> &nbsp;&nbsp; My Profile
                                    </a>
                                </div>
                               

                                @if(Auth::user()->is_admin === 1)
                                <div>
                                    <a class="dropdown-item" href="{{ route('admin_index') }}">
                                        <i class="fa  fa-thumbs-o-up"> </i> &nbsp;&nbsp; Go to Admin Page
                                    </a>
                                </div>
                                @endif


                                @if(Auth::user()->role->name === "Author")
                                <div>
                                    <a class="dropdown-item" href="{{ route('author_index') }}">
                                        <i class="fa   fa-pencil"> </i> &nbsp;&nbsp; Go to Author Page
                                    </a>
                                </div>
                                @endif


                                <div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <i class="fa fa-power-off"> </i> &nbsp;&nbsp; {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </li>
                    @endguest
                    <button class="aside-btn"><i style="color: #ffffff;" class="fa fa-bars"></i></button>
                    <button class="search-btn"><i style="color: #ffffff;" class="fa fa-search"></i></button>
                    <div id="nav-search">
                        <form method="post" action="{{ route('home_search') }}">
                            @csrf
                            <input class="input" name="search" placeholder="Enter your search...">
                        </form>
                        <button class="nav-close search-close">
                            <span></span>
                        </button>
                    </div>
                </div>
                <!-- /search & aside toggle -->
            </div>
        <!-- /Top Nav -->
        </div>
        <!-- Slide Nav -->
        

        <!-- Main Nav -->
        <div id="nav-bottom">
            <div class="container">
                <!-- nav -->
               
                <ul class="nav-menu">

                    <li><a class="btn btn-primary" href="{{ route('home_main') }}"><i class="fa fa-home"></i> Home </a>  </li>

                    @foreach($categories as $category)
                    <li class="has-dropdown">
                        <a style="color: white;" href="{{ route('home_news_byCategory', ["id" => $category->id]) }}"> {{ $category->name }} </a>
                        <div class="dropdown">
                            <div class="dropdown-body">
                                <ul class="dropdown-list">
                                    @foreach($articles_m->where('category_id', $category->id)->take(4) as $item )
                                        <li> <a href="{{route('home_newsDetail', ["id" => $item->id]) }}"> {{$item -> summary}} </a> </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </li>
                    @endforeach

                    <li class="has-dropdown">
                        <a style="color: white;" href="{{ route('home_video_list') }}"> Videos </a>
                        <div class="dropdown">
                            <div class="dropdown-body">
                                <ul class="dropdown-list">
                                    @foreach( $videos as $video )
                                        <li> <a href="{{ route('home_video_show', ["id" => $video->id]) }}"> {{ $video->title }} </a> </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
                <!-- /nav -->
            </div>
        </div>
        <!-- /Main Nav -->

        <!-- Aside Nav -->
        <div id="nav-aside">
            <ul class="nav-aside-menu">
               
            </ul>
            <button class="nav-close nav-aside-close"><span></span></button>
        </div>
        <!-- /Aside Nav -->
    </div>
    <!-- /NAV -->
</header>
<!-- /HEADER -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        @yield('slide')
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-md-8">
                @yield('content')
            </div>



            <div class="col-md-4">
                <h3 class="module-title "><span> Other News </span></h3>
                
                <div id="slideshow">
                    <ul>
                        @foreach( $articles as $item )
                        <li> <a href="{{ route('home_newsDetail', ["id" => $item->id]) }}"> <i class="fa fa-tags"> </i> {{ $item->summary }} </a> </li> <br/>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->


<!-- FOOTER -->
<footer id="footer">
    <!-- container -->
    <div class="container">

        <!-- row -->
        <div class="footer-bottom row">
          
            <div class="col-md-6 col-md-push-3 text-center">
                <div class="footer-copyright">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> VietTESOL Association | All Right Reserved
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</footer>
<!-- /FOOTER -->

<!-- jQuery Plugins -->
<script src="{{ asset('home/js/jquery.min.js') }}"></script>
<script src="{{ asset('home/js/bootstrap.min.js') }}"></script>
<!-- <script src="{{ asset('js/jquery.stellar.min.js') }}"></script> -->
<script src="{{ asset('home/js/main.js') }}"></script>
<script src="{{ asset('home/js/custom.js') }}"></script>
@yield('js')
</body>

</html>