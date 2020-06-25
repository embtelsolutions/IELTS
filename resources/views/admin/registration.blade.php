<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
  	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <title>{{$bs->website_title}}</title>
  	<link rel="icon" href="{{asset('assets/front/img/'.$bs->favicon)}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/login.css')}}">
    <link rel="stylesheet" href=" https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   
    
  </head>
  <body>
    <a class="home-link text-right" href="{{route('front.index')}}">Back to Website</a>
    <div class="login-page">
      <div class="text-center mb-4">
        <img class="login-logo" src="{{asset('assets/front/img/'.$bs->logo)}}" alt="">
      </div>
      <div class="form">
        @if($message = session('message'))
          <div class="alert alert-success">{!! $message !!}</div>
      @endif
        @if (session()->has('errors'))
          <div class="alert alert-danger fade show" role="alert" style="font-size: 14px;">
            <strong>Oops!</strong> {{session('alert')}}
          </div>
        @endif
        <form action="{{route('admin.register.post')}}" method="POST">
          @csrf
          {{-- usernam --}}
          <input type="text" name="name" placeholder="Name"/>
          @if ($errors->has('name'))
            <p class="text-danger text-left">{{$errors->first('name')}}</p>
          @endif
          {{-- email --}}
          <input type="email" name="email" placeholder="example@email.com"/>
          @if ($errors->has('email'))
            <p class="text-danger text-left">{{$errors->first('email')}}</p>
          @endif
          {{-- user type --}}
          <select class="form-control mg-10" id="type" name="role">
            <option>Teacher</option>
            <option>Student</option>
            <option>Institution</option>
          </select>

          {{-- password --}}
          <input type="password" name="password" placeholder="password"/>
          @if ($errors->has('password'))
            <p class="text-danger text-left">{{$errors->first('password')}}</p>
          @endif

          <button type="submit">Register</button>
        </form>
        <a class="forget-link" href="{{route('admin.login-user')}}">or Sigin Now</a>
        {{-- <a class="forget-link" href="{{route('admin.forget.form')}}">Forgot Password / Username ?</a> --}}
      </div>
    </div>


    <!-- jquery js -->
    <script src="{{asset('assets/front/js/jquery-3.3.1.min.js')}}"></script>
    <!-- popper js -->
    <script src="{{asset('assets/front/js/popper.min.js')}}"></script>
    <!-- bootstrap js -->
    <script src="{{asset('assets/front/js/bootstrap.min.js')}}"></script>
    <!-- Bootstrap Notify -->
    <script src="{{asset('assets/admin/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

    @if (session()->has('warning'))
    <script>
      var content = {};

      content.message = '{{session('warning')}}';
      content.title = 'Sorry!';
      content.icon = 'fa fa-bell';

      $.notify(content,{
        type: 'warning',
        placement: {
          from: 'top',
          align: 'right'
        },
        showProgressbar: true,
        time: 1000,
        delay: 4000,
      });

     
    </script>
    @endif
    <script>

         $(document).ready(function(){
          setTimeout(function(){
              $(".alert-success").fadeIn(400);
          }, 5000)
      });
    </script>
  </body>
</html>
