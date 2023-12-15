<!--
 * CoreUI - Open Source Bootstrap Admin Template
 * @version v1.0.0-alpha.2
 * @link http://coreui.io
 * Copyright (c) 2016 creativeLabs Łukasz Holeczek
 * @license MIT
 -->
 <!DOCTYPE html>
<html lang="IR-fa" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="CoreUI Bootstrap 4 Admin Template">
    <meta name="author" content="Lukasz Holeczek">
    <meta name="keyword" content="CoreUI Bootstrap 4 Admin Template">
    <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->
    <title>Laravel-blog</title>

    <!-- tailwindcss -->
    <script src="https://cdn.tailwindcss.com"></script>







    <!-- Icons -->
    <link href="{{asset('adminAssets/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('adminAssets/css/simple-line-icons.css')}}" rel="stylesheet">
    <!-- Main styles for this application -->
    <link href="{{asset('adminAssets/dest/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="{{asset('adminAssets/dest/mystyle.css')}}" rel="stylesheet">
</head>
<!-- BODY options, add following classes to body to change options
		1. 'compact-nav'     	  - Switch sidebar to minified version (width 50px)
		2. 'sidebar-nav'		  - Navigation on the left
			2.1. 'sidebar-off-canvas'	- Off-Canvas
				2.1.1 'sidebar-off-canvas-push'	- Off-Canvas which move content
				2.1.2 'sidebar-off-canvas-with-shadow'	- Add shadow to body elements
		3. 'fixed-nav'			  - Fixed navigation
		4. 'navbar-fixed'		  - Fixed navbar
	-->

<body class="navbar-fixed sidebar-nav fixed-nav">
    <header class="navbar">
        <div class="container-fluid">
            <button class="navbar-toggler mobile-toggler hidden-lg-up" type="button">&#9776;</button>
            <a class="navbar-brand" href="#"></a>
            <ul class="nav navbar-nav hidden-md-down">
                <li class="nav-item">
                    <a class="nav-link navbar-toggler layout-toggler" href="#">&#9776;</a>
                </li>

                <li class="nav-item p-x-1">
                    <a class="nav-link" href="{{route('dashboard.index')}}">{{__('words.dashboard')}}</a>
                </li>

            </ul>
            <ul style="margin-left: 2rem;" class="nav navbar-nav pull-left hidden-md-down d-flex">
                <li class="nav-item dropdown">
                    <a style="display: flex; justify-content: center;align-items:center;  " class="nav-link dropdown-toggle nav-link row" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        @if(empty($settings->logo))
                        <img id="user_logo" src="{{asset('adminAssets/img/notfound.png')}}" alt="">
                        @elseif($settings->logo)
                        <img src="{{asset($settings->logo)}}" id="user_logo" alt="...">

                        @endif
                        <span style="margin: 0 0.5rem;" class="hidden-md-down">{{Auth::user()->name;}}</span>
                        <span style="margin: 0 0.5rem;" class="hidden-md-down">{{Auth::user()->status;}}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-header text-xs-center">
                            <strong>Account</strong>
                        </div>
                        <a class="dropdown-item" href="#"><i class="fa fa-bell-o"></i> Updates<span class="tag tag-info">42</span></a>
                        <a class="dropdown-item" href="#"><i class="fa fa-envelope-o"></i> Messages<span class="tag tag-success">42</span></a>
                        <a class="dropdown-item" href="#"><i class="fa fa-tasks"></i> Tasks<span class="tag tag-danger">42</span></a>
                        <a class="dropdown-item" href="#"><i class="fa fa-comments"></i> Comments<span class="tag tag-warning">42</span></a>
                        <div class="dropdown-header text-xs-center">
                            <strong>Settings</strong>
                        </div>
                        <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a>
                        <a class="dropdown-item" href="#"><i class="fa fa-wrench"></i> Settings</a>
                        <a class="dropdown-item" href="#"><i class="fa fa-usd"></i> Payments<span class="tag tag-default">42</span></a>
                        <a class="dropdown-item" href="#"><i class="fa fa-file"></i> Projects<span class="tag tag-primary">42</span></a>
                        <div class="divider"></div>
                        <a class="dropdown-item" href="#"><i class="fa fa-shield"></i> Lock Account</a>
                        <a class="dropdown-item logout" href="#">
                            <form class="logout" method="post" action="{{route('logout')}}" >
                                @csrf
                                <button class="logout" type="submit"> <i class="fa fa-sign-out"></i> {{__('words.logout')}}</button>
                            </form>
                        </a>
                    </div>
                </li>


            </ul>
        </div>
    </header>

    <!-- Main content -->
    <main class="main">












    @yield('admin_content')














    </main>



    @include('dashboard.layouts.sidebar')




    <footer class="footer">
        <span class="text-left">
            <a href="http://coreui.io">CoreUI</a> &copy; creativeLabs.
        </span>
        <span class="pull-right">
            Powered by <a href="http://coreui.io">CoreUI</a>
        </span>
    </footer>
    <!-- Bootstrap and necessary plugins -->
    <script src="{{asset('adminAssets/js/libs/jquery.min.js')}}"></script>
    <script src="{{asset('adminAssets/js/libs/tether.min.js')}}"></script>
    <script src="{{asset('adminAssets/js/libs/bootstrap.min.js')}}"></script>
    <script src="{{asset('adminAssets/js/libs/pace.min.js')}}"></script>

    <!-- Plugins and scripts required by all views -->
    <script src="{{asset('adminAssets/js/libs/Chart.min.js')}}"></script>

    <!-- CoreUI main scripts -->

    <script src="{{asset('adminAssets/js/app.js')}}"></script>

    <!-- Plugins and scripts required by this views -->
    <!-- Custom scripts required by this view -->
    <script src="{{asset('adminAssets/js/views/main.js')}}"></script>

    <!-- Grunt watch plugin -->
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>

    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/jquery.dataTables.min.js" type="text/javascript"></script>


    <script>
function openCity(evt, cityName) {
  evt.preventDefault();
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>

@stack('javascript')

<!-- ckeditor -->

<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>

<script>
    let editor = document.querySelectorAll('#editor')
    for (let i = 0; i < editor.length; ++i) {
        ClassicEditor.create(editor[i])
        .catch((error) => {
          console.error(error);
        });

    }
</script>

</body>

</html>
