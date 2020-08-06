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
    <link rel="stylesheet" href="{{asset('assets/admin/css/register-teacher.css')}}">
    <link rel="stylesheet" href="{{asset('ielts-assets/selectize/css/selectize.bootstrap3.css')}}">
    
   
    
  </head>
  <body>
    <a class="home-link text-right" href="{{route('front.index')}}">Back to Website</a>
    <div class="container">
      <div class="text-center mb-4">
        <img class="login-logo" src="{{asset('assets/front/img/'.$bs->logo)}}" alt="">
      </div>
      <div class="form">
        <div class="form_header mb-2">
          <h2 class="text-dark alert alert-warning font-weight-bold text-center">Teacher Registration Form </h2>
        </div>


        @if($message = session('message'))
          <div class="alert alert-success">{!! $message !!}</div>
      @endif
        @if (session()->has('errors'))
          <div class="alert alert-danger fade show" role="alert" style="font-size: 14px;">
            <strong>Oops!</strong> {{session('alert')}}
          </div>
        @endif
        <form onsubmit="return submitFrom()" action="{{route('admin.register-techer.post')}}" method="POST" enctype="multipart/form-data">
          @csrf
           {{-- usernam --}}
           <label for="name" class="text-white">Name</label>
           <input type="text" name="name" placeholder="Name"/>
           @if ($errors->has('name'))
             <p class="text-danger text-left">{{$errors->first('name')}}</p>
           @endif
            {{-- Qualification --}}
           <label for="qualification" class="text-white">Qualification</label>
          <input type="text" name="qualification" placeholder="Qualification"/>
          @if ($errors->has('qualification'))
            <p class="text-danger text-left">{{$errors->first('qualification')}}</p>
          @endif
          {{--Experience--}}
          <label for="experience" class="text-white">Experience</label>
          <input type="number" name="experience" placeholder="Experience"/>
          @if ($errors->has('experience'))
            <p class="text-danger text-left">{{$errors->first('experience')}}</p>
          @endif
          {{--upload photo--}}
          <label for="photo" class="text-white">Upload Photo</label>
          <input type="file" name="photo" placeholder="" accept="image/png, image/jpeg"/>
          @if ($errors->has('photo'))
            <p class="text-danger text-left">{{$errors->first('photo')}}</p>
          @endif
           {{--upload video--}}
          <label for="video" class="text-white">Upload Video(Optional)</label>
           <input type="file" name="video" placeholder="Experience" accept="video/mp4, video/avi" />
           @if ($errors->has('qualification'))
             <p class="text-danger text-left">{{$errors->first('video')}}</p>
           @endif
           {{-- subject you teach --}}
          <label for="subjects" class="text-white">Subject you teach</label>
          <input type="text" id="subjects" name="subjects" class="subjects mb-3" value="Reading">
          @if ($errors->has('subjects'))
          <p class="text-danger text-left">{{$errors->first('subjects')}}</p>
        @endif
          {{-- About --}}

          <label for="about" class="text-white">About </label>
          <textarea class="d-block mb-3"  rows="10" cols="70" name="about" placeholder="Detail info. (description) About Rate, timings, others. From?"></textarea>
          @if ($errors->has('about'))
            <p class="text-danger text-left">{{$errors->first('about')}}</p>
          @endif
          {{-- Contact No --}}
          <label for="contact" class="text-white">Mobile No.(optional) </label>
          <input type="tel" name="contact_no" placeholder="919876543210"/>
          @if ($errors->has('contact_no'))
            <p class="text-danger text-left">{{$errors->first('contact_no')}}</p>
          @endif
          {{-- email --}}
          <label for="contact" class="text-white">Email Address </label>
          <input type="email" name="email" placeholder="example@email.com"/>
          @if ($errors->has('email'))
            <p class="text-danger text-left">{{$errors->first('email')}}</p>
          @endif
          
          <label for="Type" class="text-white">Teacher Type</label>
          <select onchange="Teachertype()" class="form-control" id="Ttype" name="Type">
            <option>General</option>
            <option>Institution</option>
          </select>
          <div class="d-none" id="icode">
          <label for="icode" class="text-white">Institute Code</label>
          <input type="text" id="Inscode" name="icode" placeholder="Institute code"/>
          <p class="text-danger text-left" id="erricode"></p>
          </div>
          <label for="password" class="text-white">Password</label>
          <input type="password" name="password" placeholder="Enter Password"/>
          @if ($errors->has('password'))
            <p class="text-danger text-left">{{$errors->first('password')}}</p>
          @endif
          <label for="confirm_pass" class="text-white">Confirm Password</label>
          <input type="password" name="confirm_pass" placeholder="Re-enter Password"/>
          @if ($errors->has('confirm_pass'))
            <p class="text-danger text-left">{{$errors->first('confirm_pass')}}</p>
          @endif
          <button type="submit">Register</button>
        </form>
        <a class="forget-link text-center" href="{{route('admin.login-user')}}">or Sigin Now</a>
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
     <!-- Selectize -->
     <script src="{{asset('ielts-assets/selectize/js/standalone/selectize.min.js')}}"></script>


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
      $('.subjects').selectize({
					plugins: ['remove_button'],
					persist: false,
					create: true,
					render: {
						item: function(data, escape) {
							return '<div>"' + escape(data.text) + '"</div>';
						}
					},
					onDelete: function(values) {
						// return confirm(values.length > 1 ? 'Are you sure you want to remove these ' + values.length + ' items?' : 'Are you sure you want to remove "' + values[0] + '"?');
					}
				});
      
         $(document).ready(function(){
          setTimeout(function(){
              $(".alert-success").fadeIn(400);
          }, 5000)
      });
    </script>
    <script>
      function Teachertype(){
        var Ttype=$('#Ttype').val();
        if(Ttype=="Institution")
        {
          $('#icode').removeClass('d-none');
        }
        else{
          $('#icode').addClass('d-none');
        }
      }
      function submitFrom(){
        var Ttype=$('#Ttype').val();
        if(Ttype=="Institution")
        {
          var icode=$('#Inscode').val();
          if(icode==""){
            $('#erricode').html("Please Enter Institution code");
          }
         
        }
      }
    </script>
  </body>
</html>
