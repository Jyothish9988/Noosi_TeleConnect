<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Noosi</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('user/assets/img/favicon.ico')}}">

	<!-- CSS here -->
	<link rel="stylesheet" href="{{asset('user/assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('user/assets/css/bootstrap-grid.min.css')}}">
	<link rel="stylesheet" href="{{asset('user/assets/css/bootstrap-reboot.min.css')}}">
	<link rel="stylesheet" href="{{asset('user/assets/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('user/assets/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('user/assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('user/assets/css/gijgo.css')}}">
    <link rel="stylesheet" href="{{asset('user/assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('user/assets/css/animated-headline.css')}}">
	<link rel="stylesheet" href="{{asset('user/assets/css/magnific-popup.css')}}">
	<link rel="stylesheet" href="{{asset('user/assets/css/fontawesome-all.min.css')}}">
	<link rel="stylesheet" href="{{asset('user/assets/css/themify-icons.css')}}">
	<link rel="stylesheet" href="{{asset('user/assets/css/slick.css')}}">
	<link rel="stylesheet" href="{{asset('user/assets/css/nice-select.css')}}">
	<link rel="stylesheet" href="{{asset('user/assets/css/style.css')}}">

</head>
<body>
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    NOOSI
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
<header>
    <!--? Header Start -->
    <div class="header-area">

        <div class="main-header header-sticky">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <!-- Logo -->
                    <div class="col-xl-2 col-lg-2 col-md-1">
                        <div class="logo">
                        <a href="#" class="btn header-btn">NOOSI TeleConnect</a>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-10 col-md-10">
                        <div class="menu-main d-flex align-items-center justify-content-end">
                            <!-- Main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                    <li class="nav-item">
			  @if (Route::has('login'))
                                @auth
                                    <a href="{{url('/redirect')}}" class="nav-link">Home</a>
                                @else
                                    <a href="{{url('/')}}" class="nav-link">Home</a>
                                @endauth
                                @endif
			</li>



	        <li class="nav-item">
				
				@if (Route::has('login'))
                                @auth
								<a href="{{ url('view_profile') }}" class="nav-link"><span>Profile</span></a>

                                @else
                                    
                                @endauth
                                @endif
			</li>

            
            <li class="nav-item">
				
				@if (Route::has('login'))
                                @auth
								<a href="{{ url('doctor') }}" class="nav-link"><span>Doctors</span></a>
								
								

                                @else
                                <a href="{{ url('doctor') }}" class="nav-link"><span>Doctors</span></a>
                                @endauth
                                @endif
			</li>

            <li class="nav-item">
				
				@if (Route::has('login'))
                                @auth
								<a href="{{ url('registration') }}" class="nav-link"><span>Register</span></a>
								
								

                                @else
                                    
                                @endauth
                                @endif
			</li>

            <li class="nav-item">
				
				@if (Route::has('login'))
                                @auth
								<a href="{{ url('patient') }}" class="nav-link"><span>Patients</span></a>
								
								

                                @else
                                    
                                @endauth
                                @endif
			</li>
            
	        <!-- <li class="nav-item">
				
				@if (Route::has('login'))
                                @auth
								<a href="{{ url('appoinments_view') }}" class="nav-link"><span>Appoinments</span></a>
								
								

                                @else
                                    
                                @endauth
                                @endif
			</li> -->


            
			<!-- <li class="nav-item">
				
				@if (Route::has('login'))
                                @auth
								<a href="{{ url('reviews_view') }}" class="nav-link"><span>Reviews</span></a>
								
								

                                @else
                                    
                                @endauth
                                @endif
			</li> -->

            <li class="nav-item">
				
				@if (Route::has('login'))
                                @auth
								
								
								

                                @else
                                <li class="nav-item"><a href="{{ url('contact') }}" class="nav-link"><span>Contact</span></a></li>
  
                                @endauth
                                @endif
			</li>

           
			
                                        
                                       
                                        @if (Route::has('login'))

@auth
    <li class="nav-item">
    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

<form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
@csrf
</form>

    </li>

@else

    <li ><a href="{{ route('login') }}" >Login</a></li>

    <!-- @if (Route::has('register'))

    <li><a href="{{ route('register') }}">Signup</a></li>
    @endif -->
@endauth

@endif
                                    </ul>
                                </nav>
                            </div>
                            <div class="header-right-btn f-right d-none d-lg-block ml-30">
                               
                            </div>
                        </div>
                    </div>   
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>