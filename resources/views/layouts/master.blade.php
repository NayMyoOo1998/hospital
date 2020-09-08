<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <title>@yield('title')</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- fontawsome cdn  -->
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!-- Font Awesome JS -->
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    
</head>

<body>
    <div class="row">
        <div class="col-md-12">
            <div class="wrapper">
                <!-- Sidebar  -->
                <nav id="sidebar">
                    <div class="sidebar-header">
                        <h3>Hospital Management System</h3>
                        <strong>HMS</strong>
                    </div>

                    <ul class="list-unstyled components">
                        <li class=" text-dark">
                            <a href="{{url('/')}}">
                                <i class="fa fa-tachometer"></i>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                Labs
                            </a>
                            <ul class="collapse list-unstyled" id="pageSubmenu">
                                <li>
                                    <a href="{{url('labs-list')}}"><i class="fa fa-th-list pr-1" aria-hidden="true"></i>Labs List</a>
                                </li>
                                <li>
                                    <a href="{{url('add-labs')}}"><i class="fa fa-plus-square pr-1" aria-hidden="true"></i>Add Lab</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#test" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                Tests Template
                            </a>
                            <ul class="collapse list-unstyled" id="test">
                                <!-- <li>
                                    <a href="#"></a>
                                </li> -->
                                <li>
                                    <a href="{{url('test-list')}}"><i class="fa fa-th-list pr-1" aria-hidden="true"></i>Test List</a>
                                </li>
                                <!-- <li>
                                    <a href="{{url('add-test')}}"><i class="fa fa-plus-square pr-1" aria-hidden="true"></i>Add Test</a>
                                </li> -->
                            </ul>
                        </li>
                        <li>
                            <a href="#patients" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                Patients
                            </a>
                            <ul class="collapse list-unstyled" id="patients">
                                <li>
                                    <a href="{{url('patients-list')}}"><i class="fa fa-th-list pr-1" aria-hidden="true"></i>List</a>
                                </li>
                                @if(Auth::user()->role == 'doctor')
                                <li>
                                    <a href="{{url('add-patients')}}"><i class="fa fa-plus-square pr-1" aria-hidden="true"></i>Add Patients</a>
                                </li>
                                @endif

                            </ul>
                        </li>
                        <li>
                            <a href="{{url('report')}}">
                                <i class="fas fa-paper-plane"></i>
                                Report
                            </a>
                        </li>
                    </ul>

                    <!-- <ul class="list-unstyled CTAs">
                        <li>
                            <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
                        </li>
                        <li>
                            <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
                        </li>
                    </ul> -->
                </nav>

                <!-- Page Content  -->
                <div id="content">

                    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
                        <div class="container-fluid">

                            <button type="button" id="sidebarCollapse" class="btn btn-info">
                                <i class="fas fa-align-left"></i>
                                <span></span>
                            </button>
                            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="fas fa-align-justify"></i>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <!-- Left Side Of Navbar -->
                                <ul class="navbar-nav mr-auto">

                                </ul>

                                <!-- Right Side Of Navbar -->
                                <ul class="navbar-nav ml-auto">
                                    <!-- Authentication Links -->
                                    @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                    @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                    @endif
                                    @else
                                    <span>{{ Auth::user()->name }}</span>
                                    <li class="nav-item dropdown pl-3">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle pr-3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                            <a href="#" class="dropdown-item">Settings</a>
                                        </div>
                                    </li>
                                    @endguest
                                </ul>
                            </div>
                        </div>
                    </nav>

                    @yield('content')
                </div>
            </div>
            
            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
            <!-- Popper.JS -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
            <!-- Bootstrap JS -->
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
            <!-- custom  -->
            <script src="{{asset('js/labs-list.js')}}"></script>
            <script src = "{{asset('js/patients-search.js')}}"></script>
            

            <script type="text/javascript">
                $(document).ready(function() {
                    $('#sidebarCollapse').on('click', function() {
                        $('#sidebar').toggleClass('active');
                    });
                });

                
            </script>
</body>

</html>