<!DOCTYPE html>
<html lang="en">

<head>
    <title>Restorant Salt Academy</title>

      <!-- Meta -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="CodedThemes">
      <meta name="keywords" content=" Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
      <meta name="author" content="CodedThemes">
      <!-- Favicon icon -->
      <link rel="icon" href="{{asset('front/assets/images/favicon.ico')}}" type="image/x-icon">
      <!-- Google font-->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="{{asset('front/assets/css/bootstrap/css/bootstrap.min.css')}}">
      <!-- themify-icons line icon -->
      <link rel="stylesheet" type="text/css" href="{{asset('front/assets/icon/themify-icons/themify-icons.css')}}">
      <!-- ico font -->
      <link rel="stylesheet" type="text/css" href="{{asset('front/assets/icon/icofont/css/icofont.css')}}">
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="{{asset('front/assets/css/style.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('front/assets/css/jquery.mCustomScrollbar.css')}}">
  </head>

  <body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">

                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            {{-- start navbar --}}

            @section('navbar')
                @include('layouts.front.inc.navbar')
            @show

             {{-- end navbar --}}

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">

                {{-- start sidebar --}}

                @section('sidebar')
                    @include('layouts.front.inc.sidebar')
                @show

                {{-- end sidebar --}}

                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">

                            @yield('content')

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<!-- Required Jquery -->
<script type="text/javascript" src="{{asset('front/assets/js/jquery/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('front/assets/js/jquery-ui/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('front/assets/js/popper.js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('front/assets/js/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="{{asset('front/assets/js/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
<!-- modernizr js -->
<script type="text/javascript" src="{{asset('front/assets/js/modernizr/modernizr.js')}}"></script>
<script type="text/javascript" src="{{asset('front/assets/js/modernizr/css-scrollbars.js')}}"></script>
<!-- classie js -->
<script type="text/javascript" src="{{asset('front/assets/js/classie/classie.js')}}"></script>
<!-- am chart -->
<script src="{{asset('front/assets/pages/widget/amchart/amcharts.min.js')}}"></script>
<script src="{{asset('front/assets/pages/widget/amchart/serial.min.js')}}"></script>
<!-- Todo js -->
<script type="text/javascript " src="{{asset('front/assets/pages/todo/todo.js')}}"></script>
<!-- Morris Chart js -->
<script src="{{asset('front/assets/js/raphael/raphael.min.js')}}"></script>
<script src="{{asset('front/assets/js/morris.js/morris.js')}}"></script>
<!-- Custom js -->
<script src="{{asset('front/assets/pages/chart/morris/morris-custom-chart.js') }}"></script>
<script type="text/javascript" src="{{asset('front/assets/pages/dashboard/custom-dashboard.js')}}"></script>
<script type="text/javascript" src="{{asset('front/assets/js/script.js')}}"></script>
<script type="text/javascript " src="{{asset('front/assets/js/SmoothScroll.js')}}"></script>
<script src="{{asset('front/assets/js/pcoded.min.js')}}"></script>
<script src="{{asset('front/assets/js/demo-12.js')}}"></script>
<script src="{{asset('front/assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script>
var $window = $(window);
var nav = $('.fixed-button');
    $window.scroll(function(){
        if ($window.scrollTop() >= 200) {
         nav.addClass('active');
     }
     else {
         nav.removeClass('active');
     }
 });
</script>
@yield('footer')

</body>

</html>
