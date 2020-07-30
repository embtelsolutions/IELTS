@extends('teacher.layout')

@section('teacher-content')
<div class="page-header">
   <h4 class="page-title">Tests11</h4>
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
                  <div class="card-title d-inline-block">All1 Test</div>
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
                                 <th scope="col">Title</th>
                                 {{-- <th scope="col">Currency</th>
                                 <th scope="col">Price</th> --}}
                                 <th scope="col">Type</th>
                                 {{-- <th scope="col">Assign to</th> --}}
                                 <th scope="col">Actions</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($packages as $key => $package)
                              <tr>
                                 <td>
                                    <input type="checkbox" class="bulk-check" data-val="{{$package->id}}">
                                 </td>
                                 <td>{{strlen(convertUtf8($package->title)) > 30 ? convertUtf8(substr($package->title, 0, 30)) . '...' : convertUtf8($package->title)}}</td>
                                 <td>type</td>
                                 {{-- <td>{{convertUtf8($package->type)}}</td> --}}
                                 {{-- <td>
                                    <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#detailsModal{{$package->id}}"><i class="fas fa-eye"></i> View</button>
                                 </td> --}}
                                 {{-- <th scope="col">{{$package->serial_number}}</th> --}}
                                 <td>
                                    <a class="btn btn-secondary btn-sm editbtn" href="#editModal" data-toggle="modal" data-package_id="{{$package->id}}" data-title="{{$package->title}}" data-type="{{$package->type}}" data-description="{{ $package->description }}" >
                                    <span class="btn-label">
                                    <i class="fas fa-edit"></i>
                                    </span>
                                    Assign Now
                                    </a>
                                 </td>
                              </tr>
                              <!-- Services Modal -->
                              <div class="modal fade" id="detailsModal{{$package->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                 <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                       <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLongTitle">Details</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                          </button>
                                       </div>
                                       <div class="modal-body">
                                          {!! convertUtf8($package->description) !!}
                                       </div>
                                       <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                  @endif
               </div>
            </div>
         </div>
         <div class="card-footer">
            <div class="row">
               <div class="d-inline-block mx-auto">
                  {{$packages->appends(['language' => request()->input('language')])->links()}}
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Edit Package Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Edit Test</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form id="" class="" action="" method="POST">
               @csrf
               <input id="inpackage_id" type="hidden" name="package_id" value="">
               <div class="form-group">
                  <label for="">Title **</label>
                  <input id="title" type="text" class="form-control" name="title" value="Test 1" readonly>
                  <p id="eerrtitle" class="mb-0 text-danger em"></p>
               </div>
               <div class="form-group">
                  <label for="">Test Type</label>
                  {{-- Test type --}}
               <input id="" type="text" class="form-control" name="type" value="Writing"  readonly>
                  <p id="type-s" class="mb-0 text-danger em"></p>
                
               </div>
               <div class="form-group">
                  <label for="">Submitted by Student</label>
                  
               </div>
               
               <div class="form-group">
                  <label>Answer 1</label>
                  <textarea id="inmeta_description" class="form-control" name="answer_1" rows="20" cols="40" placeholder="" value readonly></textarea>
                  <p id="eerrmeta_description" class="mb-0 text-danger em"></p>
                  <span class="count"></span>
                  <br>
                  <button type="button" class="btn btn-secondary" id="count">count</button>

               </div>
               <div class="form-group">
                  <label>Marks</label>
                  <input id="" type="number" class="form-control" name="marks" value="">
                  <p id="eerrmeta_description" class="mb-0 text-danger em"></p>
               </div>
               <div class="form-group">
                  <label>Remarks</label>
                  <textarea id="inmeta_description" class="form-control" name="remarks" rows="10" cols="40" placeholder="Enter meta description"></textarea>
                  <p id="eerrmeta_description" class="mb-0 text-danger em"></p>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button id="updateBtn" type="button" class="btn btn-primary">Submit Marks</button>
         </div>
      </div>
   </div>
</div>

<!---end edit model-->
@endsection
@section('scripts')
<script>
   $(document).ready(function() {

      //
      $('#count').on({
         'click': function(){
            var value = $.trim($('[name="answer_1"]').val()),
                  count = value == '' ? 0 : value.split(' ').length;
                  // alert(count);
                  $('span.count').html(count);
         }
      });

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
