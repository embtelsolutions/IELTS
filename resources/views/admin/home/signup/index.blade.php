@extends('admin.layout')

@if(!empty($abs->language) && $abs->language->rtl == 1)
@section('styles')
<style>
    form:not(.modal-form) input,
    form:not(.modal-form) textarea,
    form:not(.modal-form) select,
    select[name='language'] {
        direction: rtl;
    }
    form:not(.modal-form) .note-editor.note-frame .note-editing-area .note-editable {
        direction: rtl;
        text-align: right;
    }
</style>
@endsection
@endif

@section('content')
  <div class="page-header">
    <h4 class="page-title">Signup</h4>
    <ul class="breadcrumbs">
      <li class="nav-home">
        <a href="{{route('admin.dashboard')}}">
          <i class="flaticon-home"></i>
        </a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Home Page</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Signup</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-10">
                    <div class="card-title">Signup Content</div>
                </div>
                <div class="col-lg-2">
                    @if (!empty($langs))
                        <select name="language" class="form-control" onchange="window.location='{{url()->current() . '?language='}}'+this.value">
                            <option value="" selected disabled>Select a Language</option>
                            @foreach ($langs as $lang)
                                <option value="{{$lang->code}}" {{$lang->code == request()->input('language') ? 'selected' : ''}}>{{$lang->name}}</option>
                            @endforeach
                        </select>
                    @endif
                </div>
            </div>
        </div>
        <form class="" action="{{route('admin.footersigup.update', $lang_id)}}" method="post">
          @csrf
             <!--signup as teacher-->
          <div class="card-body">
            <div class="col-lg-10">
              <div class="card-title" style="color:#798dc2">Signup As Teacher</div>
          </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                    <label>Title **</label>
                    <input class="form-control" name="signup_text_one" value="{{$abs->title_one}}" placeholder="Enter Title">
                    @if ($errors->has('testimonial_section_title'))
                      <p class="mb-0 text-danger">{{$errors->first('testimonial_section_title')}}</p>
                    @endif
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                    <label>Description **</label>
                    <input class="form-control" name="signup_description_one" value="{{$abs->description_one}}" placeholder="Enter Subtitle">
                    @if ($errors->has('testimonial_section_subtitle'))
                      <p class="mb-0 text-danger">{{$errors->first('testimonial_section_subtitle')}}</p>
                    @endif
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                    <label>Button text **</label>
                    <input class="form-control" name="signup_button_text_one" value="{{$abs->button_text_one}}" placeholder="Enter Button Label">
                    @if ($errors->has('testimonial_section_title'))
                      <p class="mb-0 text-danger">{{$errors->first('testimonial_section_title')}}</p>
                    @endif
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                    <label>Button url **</label>
                    <input class="form-control" name="signup_button_url_one" value="{{$abs->button_url_one}}" placeholder="Enter Url">
                    @if ($errors->has('testimonial_section_subtitle'))
                      <p class="mb-0 text-danger">{{$errors->first('testimonial_section_subtitle')}}</p>
                    @endif
                </div>
              </div>
            </div>
          </div>

          <!--signup as student-->
          <div class="card-body">
            <div class="col-lg-10">
              <div class="card-title"  style="color:#798dc2">Signup As Student</div>
          </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                    <label>Title **</label>
                    <input class="form-control" name="signup_text_two" value="{{$abs->title_two}}" placeholder="Enter Title">
                    @if ($errors->has('testimonial_section_title'))
                      <p class="mb-0 text-danger">{{$errors->first('testimonial_section_title')}}</p>
                    @endif
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                    <label>Description **</label>
                    <input class="form-control" name="signup_description_two" value="{{$abs->description_two}}" placeholder="Enter Subtitle">
                    @if ($errors->has('testimonial_section_subtitle'))
                      <p class="mb-0 text-danger">{{$errors->first('testimonial_section_subtitle')}}</p>
                    @endif
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                    <label>Button text **</label>
                    <input class="form-control" name="signup_button_text_two" value="{{$abs->button_text_two}}" placeholder="Enter Button Label">
                    @if ($errors->has('testimonial_section_title'))
                      <p class="mb-0 text-danger">{{$errors->first('testimonial_section_title')}}</p>
                    @endif
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                    <label>Button url **</label>
                    <input class="form-control" name="signup_button_url_two" value="{{$abs->button_url_two}}" placeholder="Enter Url">
                    @if ($errors->has('testimonial_section_subtitle'))
                      <p class="mb-0 text-danger">{{$errors->first('testimonial_section_subtitle')}}</p>
                    @endif
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="form">
              <div class="form-group from-show-notify row">
                <div class="col-12 text-center">
                  <button type="submit" id="displayNotif" class="btn btn-success">Update</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>

@endsection


@section('scripts')
<script>
$(document).ready(function() {

    // make input fields RTL
    $("select[name='language_id']").on('change', function() {

        $(".request-loader").addClass("show");

        let url = "{{url('/')}}/admin/rtlcheck/" + $(this).val();
        console.log(url);
        $.get(url, function(data) {
            $(".request-loader").removeClass("show");
            if (data == 1) {
                $("form.modal-form input").each(function() {
                    if (!$(this).hasClass('ltr')) {
                        $(this).addClass('rtl');
                    }
                });
                $("form.modal-form select").each(function() {
                    if (!$(this).hasClass('ltr')) {
                        $(this).addClass('rtl');
                    }
                });
                $("form.modal-form textarea").each(function() {
                    if (!$(this).hasClass('ltr')) {
                        $(this).addClass('rtl');
                    }
                });
                $("form.modal-form .nicEdit-main").each(function() {
                    $(this).addClass('rtl text-right');
                });

            } else {
                $("form.modal-form input, form.modal-form select, form.modal-form textarea").removeClass('rtl');
                $("form.modal-form .nicEdit-main").removeClass('rtl text-right');
            }
        })
    });
});
</script>
@endsection
