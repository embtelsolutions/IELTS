@extends('front.layout')

@section('pagename')
 - {{__('Team Members')}}
@endsection

@section('meta-keywords', "$be->team_meta_keywords")
@section('meta-description', "$be->team_meta_description")

@section('content')
  <!--   breadcrumb area start   -->
  <div class="team-page">
      <div class="title-section">
            <div class="container">
               <div class="row justify-content-center">
                  <div class="col-md-6">
                     <div class="text-center">
                        {{-- <h3>{{convertUtf8($bs->team_title)}}</h3> --}}
                        <h3>{{convertUtf8($bs->team_section_title)}}</h3>
                        <p>{{convertUtf8($bs->team_section_subtitle)}}</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="tabs container p-70">
               <div class="row">
                  <div class="filter-div">
                     <ul class="teacher-filter">
                        <li id="btn_all"class="active"><a href="javascript:void(0)">All</a></li>
                        <li id="btn_reading"><a href="javascript:void(0)">Reading</a></li>
                        <li id="btn_speaking"><a href="javascript:void(0)">Speaking</a></li>
                        <li id="btn_listening"><a href="javascript:void(0)">Listening</a></li>
                        <li id="btn_writing"><a href="javascript:void(0)">Writing</a></li>
                        
                     </ul>
                  </div>
               </div>
         </div>
         <div class="all-teachers" id="all-teachers">
            <div class="container">
               <div class="row">
                  @foreach ($members as $key => $member)
                     <div class="col-lg-3 col-sm-6">
                        <div class="single-teacher">
                           <div class="teacher-img-wrapper">
                              <img src="{{asset('assets/front/img/members/'.$member->image)}}" alt="">
                           </div>
                           <div class="teacher-info">
                              <h4 class="teacher-name">{{convertUtf8($member->name)}}</h4>
                              <p>{{convertUtf8($member->rank)}}</p>
                           </div>
                           <div class="t-social-accounts">
                              <ul class="t-social-account-lists">
                                 @if (!empty($member->facebook))
                                    <li class="single-social-account"><a href="{{$member->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                                 @endif
                                 @if (!empty($member->twitter))
                                    <li class="single-social-account"><a href="{{$member->twitter}}"><i class="fab fa-twitter"></i></a></li>
                                 @endif
                                 @if (!empty($member->linkedin))
                                    <li class="single-social-account"><a href="{{$member->linkedin}}"><i class="fab fa-linkedin-in"></i></a></li>
                                 @endif
                                 @if (!empty($member->instagram))
                                    <li class="single-social-account"><a href="{{$member->instagram}}"><i class="fab fa-instagram"></i></a></li>
                                 @endif
                              </ul>
                           </div>
                        </div>
                     </div>
                  @endforeach
               </div>
            </div>
         </div>
         {{--reading data--}}
         <div class="all-teachers d-none" id="reading">
            <div class="container">
               <div class="row">
                  @foreach ($reading as $key => $member)
                     <div class="col-lg-3 col-sm-6">
                        <div class="single-teacher">
                           <div class="teacher-img-wrapper">
                              <img src="{{asset('assets/front/img/members/'.$member->image)}}" alt="">
                           </div>
                           <div class="teacher-info">
                              <h4 class="teacher-name">{{convertUtf8($member->name)}}</h4>
                              <p>{{convertUtf8($member->rank)}}</p>
                           </div>
                           <div class="t-social-accounts">
                              <ul class="t-social-account-lists">
                                 @if (!empty($member->facebook))
                                    <li class="single-social-account"><a href="{{$member->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                                 @endif
                                 @if (!empty($member->twitter))
                                    <li class="single-social-account"><a href="{{$member->twitter}}"><i class="fab fa-twitter"></i></a></li>
                                 @endif
                                 @if (!empty($member->linkedin))
                                    <li class="single-social-account"><a href="{{$member->linkedin}}"><i class="fab fa-linkedin-in"></i></a></li>
                                 @endif
                                 @if (!empty($member->instagram))
                                    <li class="single-social-account"><a href="{{$member->instagram}}"><i class="fab fa-instagram"></i></a></li>
                                 @endif
                              </ul>
                           </div>
                        </div>
                     </div>
                  @endforeach
               </div>
            </div>
         </div>

         {{--writing data--}}
         <div class="all-teachers d-none" id="writing">
            <div class="container">
               <div class="row">
                  @foreach ($Writing as $key => $member)
                     <div class="col-lg-3 col-sm-6">
                        <div class="single-teacher">
                           <div class="teacher-img-wrapper">
                              <img src="{{asset('assets/front/img/members/'.$member->image)}}" alt="">
                           </div>
                           <div class="teacher-info">
                              <h4 class="teacher-name">{{convertUtf8($member->name)}}</h4>
                              <p>{{convertUtf8($member->rank)}}</p>
                           </div>
                           <div class="t-social-accounts">
                              <ul class="t-social-account-lists">
                                 @if (!empty($member->facebook))
                                    <li class="single-social-account"><a href="{{$member->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                                 @endif
                                 @if (!empty($member->twitter))
                                    <li class="single-social-account"><a href="{{$member->twitter}}"><i class="fab fa-twitter"></i></a></li>
                                 @endif
                                 @if (!empty($member->linkedin))
                                    <li class="single-social-account"><a href="{{$member->linkedin}}"><i class="fab fa-linkedin-in"></i></a></li>
                                 @endif
                                 @if (!empty($member->instagram))
                                    <li class="single-social-account"><a href="{{$member->instagram}}"><i class="fab fa-instagram"></i></a></li>
                                 @endif
                              </ul>
                           </div>
                        </div>
                     </div>
                  @endforeach
               </div>
            </div>
         </div>

         {{--listing data--}}
         <div class="all-teachers d-none" id="listing">
            <div class="container">
               <div class="row">
                  @foreach ($listning as $key => $member)
                     <div class="col-lg-3 col-sm-6">
                        <div class="single-teacher">
                           <div class="teacher-img-wrapper">
                              <img src="{{asset('assets/front/img/members/'.$member->image)}}" alt="">
                           </div>
                           <div class="teacher-info">
                              <h4 class="teacher-name">{{convertUtf8($member->name)}}</h4>
                              <p>{{convertUtf8($member->rank)}}</p>
                           </div>
                           <div class="t-social-accounts">
                              <ul class="t-social-account-lists">
                                 @if (!empty($member->facebook))
                                    <li class="single-social-account"><a href="{{$member->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                                 @endif
                                 @if (!empty($member->twitter))
                                    <li class="single-social-account"><a href="{{$member->twitter}}"><i class="fab fa-twitter"></i></a></li>
                                 @endif
                                 @if (!empty($member->linkedin))
                                    <li class="single-social-account"><a href="{{$member->linkedin}}"><i class="fab fa-linkedin-in"></i></a></li>
                                 @endif
                                 @if (!empty($member->instagram))
                                    <li class="single-social-account"><a href="{{$member->instagram}}"><i class="fab fa-instagram"></i></a></li>
                                 @endif
                              </ul>
                           </div>
                        </div>
                     </div>
                  @endforeach
               </div>
            </div>
         </div>

         {{--speaking data--}}
         <div class="all-teachers d-none" id="speaking">
            <div class="container">
               <div class="row">
                  @foreach ($speaking as $key => $member)
                     <div class="col-lg-3 col-sm-6">
                        <div class="single-teacher">
                           <div class="teacher-img-wrapper">
                              <img src="{{asset('assets/front/img/members/'.$member->image)}}" alt="">
                           </div>
                           <div class="teacher-info">
                              <h4 class="teacher-name">{{convertUtf8($member->name)}}</h4>
                              <p>{{convertUtf8($member->rank)}}</p>
                           </div>
                           <div class="t-social-accounts">
                              <ul class="t-social-account-lists">
                                 @if (!empty($member->facebook))
                                    <li class="single-social-account"><a href="{{$member->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                                 @endif
                                 @if (!empty($member->twitter))
                                    <li class="single-social-account"><a href="{{$member->twitter}}"><i class="fab fa-twitter"></i></a></li>
                                 @endif
                                 @if (!empty($member->linkedin))
                                    <li class="single-social-account"><a href="{{$member->linkedin}}"><i class="fab fa-linkedin-in"></i></a></li>
                                 @endif
                                 @if (!empty($member->instagram))
                                    <li class="single-social-account"><a href="{{$member->instagram}}"><i class="fab fa-instagram"></i></a></li>
                                 @endif
                              </ul>
                           </div>
                        </div>
                     </div>
                  @endforeach
               </div>
            </div>
         </div>
  </div>
  <!--   breadcrumb area end    -->


  <!--   team page start   -->
  {{-- <div class="team-page">
    <div class="container">
      <div class="row">
        @foreach ($members as $key => $member)
          <div class="col-lg-3 col-sm-6">
            <div class="single-team-member">
               <div class="team-img-wrapper">
                  <img src="{{asset('assets/front/img/members/'.$member->image)}}" alt="">
                  <div class="social-accounts">
                     <ul class="social-account-lists">
                        @if (!empty($member->facebook))
                          <li class="single-social-account"><a href="{{$member->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                        @endif
                        @if (!empty($member->twitter))
                          <li class="single-social-account"><a href="{{$member->twitter}}"><i class="fab fa-twitter"></i></a></li>
                        @endif
                        @if (!empty($member->linkedin))
                          <li class="single-social-account"><a href="{{$member->linkedin}}"><i class="fab fa-linkedin-in"></i></a></li>
                        @endif
                        @if (!empty($member->instagram))
                          <li class="single-social-account"><a href="{{$member->instagram}}"><i class="fab fa-instagram"></i></a></li>
                        @endif
                     </ul>
                  </div>
               </div>
               <div class="member-info">
                  <h5 class="member-name">{{convertUtf8($member->name)}}</h5>
                  <small>{{convertUtf8($member->rank)}}</small>
               </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div> --}}
  <!--   team page end   -->
@endsection
@push('before-scripts')
<script>
   $(document).ready(function(){

      $('.main-navigation ul li a').click(function() {
            $('.main-navigation ul li a').removeClass('active');
            $(this).addClass('active');
         });

      $('#btn_reading').click(function(){
         $(this).addClass('active');
         $('#all-teachers').addClass('d-none');
         $('#writing').addClass('d-none');
         $('#listing').addClass('d-none');
         $('#speaking').addClass('d-none');

         $('#reading').removeClass('d-none');
         /*buttons*/
         $('#btn_writing').removeClass('active');
         $('#btn_listening').removeClass('active');
         $('#btn_speaking').removeClass('active');
         $('#btn_all').removeClass('active');
      })
      $('#btn_writing').click(function(){
         $(this).addClass('active');
         $('#all-teachers').addClass('d-none');
         $('#reading').addClass('d-none');
         $('#listing').addClass('d-none');
         $('#speaking').addClass('d-none');

         $('#writing').removeClass('d-none');
           /*buttons*/
         $('#btn_reading').removeClass('active');
         $('#btn_listening').removeClass('active');
         $('#btn_speaking').removeClass('active');
         $('#btn_all').removeClass('active');
         
      })
      $('#btn_listening').click(function(){
         $(this).addClass('active');
         $('#all-teachers').addClass('d-none');
         $('#reading').addClass('d-none');
         $('#writing').addClass('d-none');
         $('#speaking').addClass('d-none');

         $('#listing').removeClass('d-none');
           /*buttons*/
         $('#btn_reading').removeClass('active');
         $('#btn_writing').removeClass('active');
         $('#btn_speaking').removeClass('active');
         $('#btn_all').removeClass('active');
      })

      $('#btn_speaking').click(function(){
         $(this).addClass('active');
         $('#all-teachers').addClass('d-none');
         $('#reading').addClass('d-none');
         $('#writing').addClass('d-none');
         $('#speaking').addClass('d-none');

         $('#speaking').removeClass('d-none');
           /*buttons*/
         $('#btn_reading').removeClass('active');
         $('#btn_writing').removeClass('active');
         $('#btn_listening').removeClass('active');
         $('#btn_all').removeClass('active');
      })

      $('#btn_all').click(function(){
         $(this).addClass('active');
         $('#all-teachers').removeClass('d-none');
         $('#reading').addClass('d-none');
         $('#writing').addClass('d-none');
         $('#speaking').addClass('d-none');

         $('#speaking').addClass('d-none');
           /*buttons*/
         $('#btn_reading').removeClass('active');
         $('#btn_writing').removeClass('active');
         $('#btn_listening').removeClass('active');
         $('#btn_speaking').removeClass('active');
      })

   })
</script>
@endpush
