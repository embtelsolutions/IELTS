@extends('front.layout')

@section('pagename')
 - {{convertUtf8($page->name)}}
@endsection

@section('meta-keywords', "$page->meta_keywords")
@section('meta-description', "$page->meta_description")

@section('content')
  <!--   breadcrumb area start   -->
  <div class="breadcrumb-area about" style="background-image: url('{{asset('assets/front/img/' . $bs->breadcrumb)}}');background-size:cover;">
     <div class="container">
        <div class="service breadcrumb-txt">
           <div class="row">
              <div class="col-xl-7 col-lg-8 col-sm-10">
                 <span>{{convertUtf8($page->title)}}</span>
                 <h1>{{convertUtf8($page->subtitle)}}</h1>
                 <ul class="breadcumb">
                    <li><a href="{{route('front.index')}}">{{__('Home')}}</a></li>
                    <li>{{convertUtf8($page->name)}}</li>
                 </ul>
              </div>
           </div>
        </div>
     </div>
     <div class="breadcrumb-area-overlay"></div>
  </div>
  <!--   breadcrumb area end    -->


  <!--   about company section start   -->
  <div class="about-company-section">
     <div class="container">
        <div class="row">
           <div class="col-lg-12">
             {!! convertUtf8($page->body) !!}
           </div>
        </div>
     </div>
  </div>
  <!--   about company section end   -->
@endsection
