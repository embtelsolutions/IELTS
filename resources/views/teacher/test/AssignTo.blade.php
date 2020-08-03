@extends('teacher.layout')
@section('teacher-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
@endsection
@section('teacher-content')
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
         <a href="#">Tests</a>
      </li>
   </ul>
</div>
<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
            <div class="row">
               <div class="col-lg-4">
                  <div class="card-title d-inline-block">All Test</div>
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
                  <a href="#" class="btn btn-primary float-lg-right float-left btn-sm" data-toggle="modal" data-target="#createModal"><i class="fas fa-plus"></i> Add Test</a>
                  <button class="btn btn-danger float-right btn-sm mr-2 d-none bulk-delete" data-href="{{route('admin.package.bulk.delete')}}"><i class="flaticon-interface-5"></i> Delete</button>
               </div> --}}
            </div>
         </div>
         <div class="card-body">
            <div class="row">
               <div class="col-lg-12">
                 
                  <div class="" id="" tabindex="-1" role="" aria-labelledby="" aria-hidden="true">
                     <div class="" role="">
                        <div class="">
                           <div class="">
                              <form id="" class="" action="{{route('teacher.test.assign-to')}}" method="POST">
                                 @csrf
                                 <input id="inpackage_id" type="hidden" name="package_id" value="{{$packages->id}}">
                                 <div class="form-group">
                                    <label for="">Title **</label>
                                 <input id="intitle" type="text" class="form-control" name="title" value="{{$packages->title}}" readonly>
                                    <p id="eerrtitle" class="mb-0 text-danger em"></p>
                                 </div>
                                 <div class="form-group">
                                    <label for="">Test Type</label>
                                    {{-- Test type --}}
                                 <input id="intype" type="text" class="form-control" name="type" value="{{$packages->test_type}}"  readonly>
                                    <p id="type-s" class="mb-0 text-danger em"></p>
                                    
                                 </div>
                              
                                 <div class="form-group">
                                    <label for="">Already Assigned </label>
                                       <select class="form-control mg-10" id="update_stud" name="students[]" multiple="false" readonly="true">
                                       @if (count($assinged) == 0)
                                             <option class="text-center">NO USER ASSIGNED</option>
                                       @else
                                             @foreach($assinged as $student)
                                             <option value="{{$student->id}}" selected>{{$student->name}}</option>
                                          @endforeach
                                       @endif
                                       </select>
                                 </div>
                  
                                 <div class="form-group">
                                 <label for="">Assign to </label>
                                    <select class="form-control mg-10" id="type" name="students[]" multiple="false" >
                                          @foreach($students as $student)
                                             @if (count($assinged) == 0)
                                                <option value="{{$student->id}}" >{{$student->name}}</option>
                                             @else
                                                @foreach($assinged as $astu)
                                                   @if($astu->id != $student->id)
                                                      <option value="{{$student->id}}" >{{$student->name}}</option>
                                                   @endif
                                                @endforeach
                                             @endif
                                          @endforeach
                                         
                                    </select>
                                 </div>
                              
                           </div>
                           <div class="modal-footer">
                              <a type="button" class="btn btn-secondary text-white" href="{{route('teacher.test.assign')}}">Close</a>
                              <input type="submit" class="btn btn-primary" value="Save Changes"/>
                              {{-- <button id="updateBtn" type="button" class="btn btn-primary">Save Changes</button> --}}
                           </div>
                        </form>
                        </div>
                     </div>
                  </div>
                
               </div>
            </div>
         </div>
         <div class="card-footer">
            <div class="row">
               <div class="d-inline-block mx-auto">
                  
               </div>
            </div>
         </div>
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
