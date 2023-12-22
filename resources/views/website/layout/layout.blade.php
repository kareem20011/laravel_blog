<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> @yield('title' ,) {{$settings->translate(app()->getlocale())->title}} </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name ="description", content="@yield('meta_description', $settings->content)">
    <meta name ="keywords", content="@yield('meta_keywords', $settings->title)">
    <!-- Favicon -->
    <link href="{{ asset($settings->favicon) }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('front') }}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('front') }}/css/style.css" rel="stylesheet">

    <style>
        #logout_form a:hover{
            color: red;
            transition: all ease 0.2s;
        }
    </style>
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row align-items-center bg-light px-lg-5">
            <div class="col-12 col-md-8">
                <div class="d-flex justify-content-between">
                    <div class="bg-primary text-white text-center py-2" style="width: 100px;">{{__('words.tranding')}}</div>
                    <div class="owl-carousel owl-carousel-1 tranding-carousel position-relative d-inline-flex align-items-center ml-3"
                        style="width: calc(100% - 100px); padding-left: 90px;">

                        @foreach($lastFivePosts as $post)
                        <div class="text-truncate"><a href="{{route('post' , $post->id)}}" class="text-secondary">{{$post->title}}</a></div>
                        @endforeach

                    </div>
                </div>
            </div>

            <div class="col-md-4 text-right d-none d-md-block">
            {{ Date('D Y,M,d') }}
            </div>


        </div>
        <div class="row align-items-center py-2 px-lg-5">
            <div class="col-lg-4">
                <a href="#" class="navbar-brand d-none d-lg-block">
                    <img src="{{asset($settings->logo)}}" alt="" style="height: 70px">
                </a>
            </div>
            <div class="col-lg-8 text-center text-lg-right">
                <img class="img-fluid" src="{{asset($settings->favicon)}}" alt="" style="height: 70px">
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid p-0 mb-3">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-2 py-lg-0 px-lg-5">
            <a href="" class="navbar-brand d-block d-lg-none">
            <h1 class="m-0 display-5 text-uppercase"><span class="text-primary">Kar</span>eem</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">

                    <a href="{{route('index')}}" class="nav-item nav-link active">{{ __('words.home') }}</a>

                    @if(auth()->user())
                    <a href="{{route('dashboard.setting')}}" class="nav-item nav-link">{{ __('words.dashboard') }}</a>
                    @endif

                    @foreach($categories as $category )
                        <div class="nav-item dropdown">

                            <a @if(count($category->children) == 0) href="{{route('category', $category->id)}}" @else  href='#' @endif class="nav-link @if(count($category->children) > 0) dropdown-toggle @endif" @if(count($category->children) > 0)  data-toggle="dropdown" @endif>{{$category->title}}</a>
                            @if(count($category->children) > 0)
                                <div class="dropdown-menu rounded-0 m-0">

                                    @foreach($category->children as $child)
                                    <a href="" class="dropdown-item" style="font-size: 14px;"> {{$child->title}}</a>
                                    @endforeach


                                </div>
                            @endif
                        </div>
                    @endforeach

                </div>


                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="hidden-md-down">{{ LaravelLocalization::getCurrentLocaleNative() }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            <i class="fa-solid fa-earth-americas"></i>{{ $properties['native'] }}
                        </a>
                    @endforeach
                    </div>
                </div>

                <div class="nav-item" style="width: 100%; max-width: 300px;">
                    @if(empty(auth()->user()))
                    <a href="{{route('login')}}">{{__('words.login')}}</a>
                    <span>/</span>
                    <a href="{{route('register')}}">{{__('words.register')}}</a>
                    @elseif(auth()->user())

                    <form id="logout_form" method="post" action="{{route('logout')}}" >
                        @csrf
                        <a onclick="logout()" type="submit">{{__('words.logout')}}</a>
                    </form>

                    @endif
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    @yield('body')





    <!-- Footer Start -->
    <div class="container-fluid bg-light pt-5 px-sm-3 px-md-5">
        <div class="row">


            <div class="col-lg-4 col-md-6 mb-5">
                <a href="index.html" class="navbar-brand">
                    <img src="{{ asset($settings->logo) }}" alt="" style="height: 70px">
                </a>
                <p>{{ $settings->translate(app()->getlocale())->content }}</p>
                <div class="d-flex justify-content-start mt-4">

                    @if ($settings->facebook != '')
                        <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;"
                           target="_blank" href="https://{{ $settings->facebook }}"><i class="fab fa-facebook-f"></i></a>
                    @endif

                    @if ($settings->instagram != '')
                        <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;"
                            target="_blank" href="https://{{ $settings->instagram }}"><i class="fab fa-instagram"></i></a>
                    @endif

                    @if ($settings->email != '')
                        <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;"
                           target="_blank" href="https://{{ $settings->email }}"><i class="fab fa-google"></i></a>
                    @endif

                </div>
            </div>


            <div class="col-lg-4 col-md-6 mb-5">
                <h4 class="font-weight-bold mb-4">{{ __('words.category') }}</h4>
                <div class="d-flex flex-wrap m-n1">
                @foreach($categories as $category )
                    <a href="#" class="btn btn-sm btn-outline-secondary m-1">{{$category->title}}</a>
                @endforeach
                </div>
            </div>


            <div class="col-lg-4 col-md-6 mb-5">
                <h4 class="font-weight-bold mb-4">{{ __('words.tags') }}</h4>
                <div class="d-flex flex-wrap m-n1">
                @foreach($posts as $post )
                    @if(!empty($post->translate(app()->getlocale())->tags))
                    <a href="#" class="btn btn-sm btn-outline-secondary m-1">{{$post->translate(app()->getlocale())->tags}}</a>
                    @endif
                @endforeach
                </div>
            </div>


        </div>
    </div>
    <div class="container-fluid py-4 px-sm-3 px-md-5">
        <p class="m-0 text-center">
            &copy; <a class="font-weight-bold" href="#">Your Site Name</a>. All Rights Reserved.

            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
            Designed by <a class="font-weight-bold" href="https://htmlcodex.com">HTML Codex</a>
        </p>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-dark back-to-top"><i class="fa fa-angle-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('front') }}/lib/easing/easing.min.js"></script>
    <script src="{{ asset('front') }}/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('front') }}/mail/jqBootstrapValidation.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('front') }}/js/main.js"></script>

    <script>
        function logout(){
            document.getElementById('logout_form').submit();
        }
    </script>
</body>

</html>
