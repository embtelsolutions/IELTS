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
                     <h3>A leadership team with vision</h3>
                     <p>Our executives lead by example and guide us to accomplish great things everyday. Online learning offers a new way to explore</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="tabs container p-70">
            <div class="row">
               <div class="filter-div">
                  <ul class="teacher-filter">
                     <li class="active"><a href="javascript:void(0)">All</a></li>
                     <li><a href="javascript:void(0)">Reading</a></li>
                     <li><a href="javascript:void(0)">Speaking</a></li>
                     <li><a href="javascript:void(0)">Listening</a></li>
                     <li><a href="javascript:void(0)">Writing</a></li>
                     
                  </ul>
               </div>
            </div>
      </div>
      <div class="all-teachers">
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
