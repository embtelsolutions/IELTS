<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Test</title>

    <link rel="shortcut icon" href="{{asset('assets/front/img/'.$bs->favicon)}}" type="image/x-icon">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{asset('assets/front/css/bootstrap.min.css')}}">
    <!-- plugin css -->
    <link rel="stylesheet" href="{{asset('assets/front/css/plugin.min.css')}}">
    @yield('styles')
    <!-- main css -->
    <link rel="stylesheet" href="{{asset('assets/front/css/style.css')}}">
     <!-- CSS ========================= -->
    <!-- Fonts CSS -->
    <link rel="stylesheet" href="{{asset('ielts-assets/css/bicon.min.css')}}">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{asset('ielts-assets/css/plugins.css')}}">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('ielts-assets/css/customs.css')}}">
    <link rel="stylesheet" href="{{asset('ielts-assets/css/student-paper.css')}}">
    <link rel="stylesheet" href="{{asset('ielts-assets/css/simplePagination.css')}}">
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>  
    <script src="{{asset('ielts-assets/js/jquery.simplePagination.js')}}"  type="text/javascript"></script>
    <script src="{{asset('ielts-assets/js/jquery.simple.timer.js')}}"  type="text/javascript"></script>
    {{-- <script src="{{asset('ielts-assets/js/jquery.js')}}"  type="text/javascript"></script> --}}
</head>
    <div class="header">

    </div>
    <div class="topbar">
        <div class="container-fluid">
            <div class="row">
               <div class="col-md-4 d-block text-left">
                   <div class="logo">
                       <img class="" src="{{asset('ielts-assets/images/logo.png')}}">
                   </div>
               </div>
               <div class="col-md-4 d-block text-center">
                   <div class="timer">
                        <div class="timer_img">
                            <img class="clock" src="{{asset('ielts-assets/images/clock.svg')}}">
                        </div>
                        <div class="timer_count">
                            <h3 class="time"   data-minutes-left="60"></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-block text-right">
                    <div class="help">
                        <div class="help_img">
                            <img class="" src="{{asset('ielts-assets/images/question.svg')}}">
                        </div>
                        <div class="help_txt">
                            <a href="javascript:void"><h3>Help</h3></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<body>
    
    @yield('student-test')

    @stack('before-scripts')
   
   
</body>

</html>