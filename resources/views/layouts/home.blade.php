<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>



    <!--===============================================================================================-->	
    <link rel="icon" type="image/png" href="{{ asset('build/assets/images/icons/favicon.png') }}"/>
    <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="{{ asset('build/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="{{ asset('build/assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="{{ asset('build/assets/fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="{{ asset('build/assets/fonts/linearicons-v1.0.0/icon-font.min.css') }}">
    <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="{{ asset('build/assets/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->	
      <link rel="stylesheet" type="text/css" href="{{ asset('build/assets/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="{{ asset('build/assets/vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="{{ asset('build/assets/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->	
      <link rel="stylesheet" type="text/css" href="{{ asset('build/assets/vendor/daterangepicker/daterangepicker.css') }}">
    <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="{{ asset('build/assets/vendor/slick/slick.css') }}">
    <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="{{ asset('build/assets/vendor/MagnificPopup/magnific-popup.css') }}">
    <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="{{ asset('build/assets/vendor/perfect-scrollbar/perfect-scrollbar.css') }}">
  
  <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('build/assets/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('build/assets/css/main.css') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="animsition">
	<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
      <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
              <img src="{{ asset('build/assets/images/icons/logo-01.png') }}" alt="LOGO">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">{{ __('Home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">{{ __('Product') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">{{ __('Blog') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">{{ __('About') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">{{ __('Contact') }}</a>
                    </li>

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                  <div class="wrap-icon-header flex-w flex-r-m">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                      <i class="zmdi zmdi-search"></i>
                    </div>
        

                    <a href="{{ route('cart') }}"><div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="2">
                      <i class="zmdi zmdi-shopping-cart"></i>
                    </div></a>
        
                    <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="0">
                      <i class="zmdi zmdi-favorite-outline"></i>
                    </a>
                  </div>
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                {{-- if user also in admin table show the item --}}
                                @if (Auth::user()->pegawai(true))
                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                    Admin Dashboard
                                  </a>
                                    
                                @endif

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    </div>
    		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="{{ asset('build/assets/images/icons/icon-close2.png') }}" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>
    </header>


        <main class="py-4">
            @yield('content')
        </main>

<!--===============================================================================================-->	
<script src="{{ asset('build/assets/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('build/assets/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('build/assets/vendor/bootstrap/js/popper.js') }}"></script>
<script src="{{ asset('build/assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('build/assets/vendor/select2/select2.min.js') }}"></script>

    <script>
      $(".js-select2").each(function(){
        $(this).select2({
          minimumResultsForSearch: 20,
          dropdownParent: $(this).next('.dropDownSelect2')
        });
      })
    </script>
  <!--===============================================================================================-->
  <script src="{{ asset('build/assets/vendor/daterangepicker/moment.min.js') }}"></script>
  <script src="{{ asset('build/assets/vendor/daterangepicker/daterangepicker.js') }}"></script>
  <!--===============================================================================================-->
  <script src="{{ asset('build/assets/vendor/slick/slick.min.js') }}"></script>
  <script src="{{ asset('build/assets/js/slick-custom.js') }}"></script>
  
  <!--===============================================================================================-->
    <script src="{{ asset('build/assets/vendor/parallax100/parallax100.js') }}"></script>
    <script>
          $('.parallax100').parallax100();
    </script>
  <!--===============================================================================================-->
    <script src="{{ asset('build/assets/vendor/MagnificPopup/jquery.magnific-popup.min.js') }}"></script>
    <script>
      $('.gallery-lb').each(function() { // the containers for all your galleries
        $(this).magnificPopup({
              delegate: 'a', // the selector for gallery item
              type: 'image',
              gallery: {
                enabled:true
              },
              mainClass: 'mfp-fade'
          });
      });
    </script>
  <!--===============================================================================================-->
    <script src="{{ asset('build/assets/vendor/isotope/isotope.pkgd.min.js') }}"></script>
  <!--===============================================================================================-->
    <script src="{{ asset('build/assets/vendor/sweetalert/sweetalert.min.js') }}"></script>
    <script>
      $('.js-addwish-b2').on('click', function(e){
        e.preventDefault();
      });
  
      $('.js-addwish-b2').each(function(){
        var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
        $(this).on('click', function(){
          swal(nameProduct, "is added to wishlist !", "success");
  
          $(this).addClass('js-addedwish-b2');
          $(this).off('click');
        });
      });
  
      $('.js-addwish-detail').each(function(){
        var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();
  
        $(this).on('click', function(){
          swal(nameProduct, "is added to wishlist !", "success");
  
          $(this).addClass('js-addedwish-detail');
          $(this).off('click');
        });
      });
  
      /*---------------------------------------------*/
  
      $('.js-addcart-detail').each(function(){
        var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
        $(this).on('click', function(){
          swal(nameProduct, "is added to cart !", "success");
        });
      });
    
    </script>
  <!--===============================================================================================-->
    <script src="{{ asset('build/assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script>
      $('.js-pscroll').each(function(){
        $(this).css('position','relative');
        $(this).css('overflow','hidden');
        var ps = new PerfectScrollbar(this, {
          wheelSpeed: 1,
          scrollingThreshold: 1000,
          wheelPropagation: false,
        });
  
        $(window).on('resize', function(){
          ps.update();
        })
      });
    </script>
  <!--===============================================================================================-->
    <script src="{{ asset('build/assets/js/main.js') }}"></script>
</body>
</html>
