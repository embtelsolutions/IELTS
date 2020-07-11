@extends('student.layout')

@section('student-content')
<div class="page-header">
 <h4 class="page-title">Tests</h4>
 <ul class="breadcrumbs">
  <li class="nav-home">
   <a href="{{route('teacher.index')}}">
     <i class="flaticon-home"></i>
   </a>
 </li>
 <li class="separator">
   <i class="flaticon-right-arrow"></i>
 </li>
 <li class="nav-item">
   <a href="#">Test Management</a>
 </li>
 <li class="separator">
   <i class="flaticon-right-arrow"></i>
 </li>
 <li class="nav-item">
   <a href="#">Answer</a>
 </li>
</ul>
</div>
<div class="row">
 <div class="col-md-12">
  <div class="card">
   <div class="card-header">
    <div class="row">
     <div class="col-lg-4">
      <div class="card-title d-inline-block">All Test Answer</div>
    </div>
    <div class="col-lg-3">
      {{-- @if (!empty($langs))
        <select name="language" class="form-control" onchange="window.location='{{url()->current() . '?language='}}'+this.value">
         <option value="" selected disabled>Select a Language</option>
         @foreach ($langs as $lang)
         <option value="{{$lang->code}}" {{$lang->code == request()->input('language') ? 'selected' : ''}}>{{$lang->name}}</option>
         @endforeach
       </select>
       @endif --}}
     </div>
     {{-- <div class="col-lg-4 offset-lg-1 mt-2 mt-lg-0">
      <a href="#" class="btn btn-primary float-lg-right float-left btn-sm" data-toggle="modal" data-target="#createModal"><i class="fas fa-plus"></i> Add Test 5</a>
      <button class="btn btn-danger float-right btn-sm mr-2 d-none bulk-delete" data-href="{{route('admin.package.bulk.delete')}}"><i class="flaticon-interface-5"></i> Delete</button>
    </div>--}}
  </div>
</div>
<div class="card-body">
  <div class="row">
   <div class="col-lg-12">

     <div class="table-responsive">
      <table class="table table-striped mt-3">
       <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Student Name</th>
          {{-- <th scope="col">Currency</th>
          <th scope="col">Price</th> --}}
          <th scope="col">Tittle</th>
          <th scope="col">Date</th>
          <th scope="col">File</th>
          <th scope="col">View</th>
        </tr>
      </thead>
      <tbody>
       @foreach ($data as $row)
       <tr>
         <td>{{$row->id}}</td>
         <td>{{$row->name}}</td>
         <td>{{$row->title}}</td>
         <td>{{ Carbon\Carbon::parse($row->created_at)->format('Y-m-d') }}</td>
                                <!-- <td>
                                  <video src="{{ URL::to($row->video) }}" height="70px;" width="70px;" type="video/mp4">
                                  </td>-->
                                  <td>
                                    <video id="my-video" class="video-js" controls preload="auto" width="100" height="80" data-setup="{}">
                                      <source src="{{URL::to($row->video)}}" type='audio/mp3'>
                                      </video>
                                    </td>
                                    <td>
                                      <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#detailsModal{{$row->id}}"><i class="fas fa-eye"></i> View</button>
                                    </td>
                                   {{-- <td>

                                     <a class="btn btn-secondary btn-sm editbtn" href="#editModal" data-toggle="modal" data-package_id="{{$row->id}}" data-student_id="{{$row->student_id}}" data-teacher_id="{{$row->teacher_id}}" data-test_id="{{$row->test_id}}" data-title="{{$row->title}}">
                                      <span class="btn-label">
                                      </span>
                                      Submit Answer
                                    </a>


                                    <form class="deleteform d-inline-block" action="{{route('teacher.marks.update')}}" method="post">
                                     @csrf
                                     <input type="hidden" name="package_id" value="{{$row->id}}">
                                     <button type="submit" class="btn btn-danger btn-sm deletebtn">
                                       <span class="btn-label">
                                        <!-- <i class="fas fa-trash"></i>-->
                                      </span>
                                      Submit Marks
                                    </button>
                                  </form>
                                </td>--}}
                              </tr>




                              <div class="modal fade" id="detailsModal{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                               <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                 <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLongTitle">Marks</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="form-group">
                                  <label for="">Title **</label>
                                  <input id="intitle" type="text" class="form-control" name="title" value="{{$row->title}}" placeholder="Enter title" readonly>
                                  <p id="eerrtitle" class="mb-0 text-danger em"></p>
                                </div>
                                <div class="form-group">
                                  <label for="">Video **</label>
                                  
                                  <label class="custom-file">

                                    <video id="my-video" class="video-js" controls preload="auto" width="150" height="100" data-setup="{}">
                                      <source src="{{URL::to($row->video)}}" type='audio/mp3'>
                                      </video>
                                    </label>
                                    <p id="eerrtitle" class="mb-0 text-danger em"></p>
                                  </div>

                                  {{--   <div class="modal-body">
                                    {!! convertUtf8($row->teacher_id) !!}
                                  </div>--}}
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                                  </div>
                                </div>
                              </div>
                            </div>


                            @endforeach


                          </tbody>
                        </table>
                      </div>

                    </div>
                  </div>
                </div>
                {{-- <div class="card-footer">
                  <div class="row">
                   <div class="d-inline-block mx-auto">
                    {{$packages->appends(['language' => request()->input('language')])->links()}}
                  </div>
                </div>
              </div>--}}
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
           // console.log(url);
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
               $("form.modal-form .summernote").each(function() {
                 $(this).siblings('.note-editor').find('.note-editable').addClass('rtl text-right');
               });

             } else {
               $("form.modal-form input, form.modal-form select, form.modal-form textarea").removeClass('rtl');
               $("form.modal-form .summernote").siblings('.note-editor').find('.note-editable').removeClass('rtl text-right');
             }
           })
         });
     });
   </script>
   @endsection
