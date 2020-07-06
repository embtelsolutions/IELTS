@extends('teacher.layout')

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
                  <div class="card-title d-inline-block">All Test4</div>
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
               <div class="col-lg-4 offset-lg-1 mt-2 mt-lg-0">
                  <a href="#" class="btn btn-primary float-lg-right float-left btn-sm" data-toggle="modal" data-target="#createModal"><i class="fas fa-plus"></i> Add Test 5</a>
                  <button class="btn btn-danger float-right btn-sm mr-2 d-none bulk-delete" data-href="{{route('admin.package.bulk.delete')}}"><i class="flaticon-interface-5"></i> Delete</button>
               </div>
            </div>
         </div>
         <div class="card-body">
            <div class="row">
               <div class="col-lg-12">
                  @if (count($packages) == 0)
                     <h3 class="text-center">NO TEST FOUND</h3>
                  @else
                     <div class="table-responsive">
                        <table class="table table-striped mt-3">
                           <thead>
                              <tr>
                                 <th scope="col">
                                    <input type="checkbox" class="bulk-check" data-val="all">
                                 </th>
                                 <th scope="col">Student Id</th>
                                 {{-- <th scope="col">Currency</th>
                                 <th scope="col">Price</th> --}}
                                 <th scope="col">Test Id</th>
                                 <th scope="col">Teacher Id</th>
                                 <th scope="col">File</th>
                                 <th scope="col">Actions</th>
                              </tr>
                           </thead>
                           <tbody>
                           	 @foreach ($packages as $key => $package)
                           	<tr>
                                 <td>
                                    <input type="checkbox" class="bulk-check" data-val="{{$package->id}}">
                                 </td>
                                 <td>{!!convertUtf8($package->student_id)!!}</td>
                                 <td>{!!convertUtf8($package->test_id)!!}</td>
                                 <td>{!!convertUtf8($package->teacher_id)!!}</td>
                                 <td>file</td>
                                 <td>
                                 	 <form class="deleteform d-inline-block" action="{{route('teacher.test.delete')}}" method="post">
                                       @csrf
                                       <input type="hidden" name="package_id" value="{{$package->id}}">
                                       <button type="submit" class="btn btn-danger btn-sm deletebtn">
                                       <span class="btn-label">
                                       <i class="fas fa-trash"></i>
                                       </span>
                                       Delete
                                       </button>
                                    </form>
                                 </td>
                             </tr>

                         
                               @endforeach


                           </tbody>
                        </table>
                     </div>
                  @endif
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
