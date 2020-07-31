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
<!-- Edit Package Modal -->
<div class="" id="" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="" role="">
     <div class="">
        <div class="">
         
        </div>
        <div class="">
           <form id="" class="" onSubmit="return myfun()" action="{{url('submitWritingResult')}}" method="POST">
              @csrf
              <input id="inpackage_id" type="hidden" name="package_id" value="">
              <div class="form-group">
                 <label for="">Title **</label>
                 <input id="title" type="text" class="form-control" name="title" value="{{$test->title}}" readonly>
                 <p id="eerrtitle" class="mb-0 text-danger em"></p>
              </div>
              <div class="form-group">
                 <label for="">Test Type</label>
                 {{-- Test type --}}
              <input id="" type="text" class="form-control" name="" value="Writing"  readonly>
                 <p id="type-s" class="mb-0 text-danger em"></p>
               
              </div>
              <div class="form-group">
                 <label for="">Submitted by Student</label>
                 
              </div>
              <?php $i=0; ?>
              @foreach($data as $d)
              <?php $i++;?>
              <div class="form-group">
                
                <hr style="background: white;color:white"/>
                  <h1>{{$d->name}}</h1>
                  <br>
                  <div class="form-group">
                    <label for="">Question **</label>
                    <input id="title" type="text" class="form-control" name="title" value="{{$d->question}}" readonly>
                    <p id="eerrtitle" class="mb-0 text-danger em"></p>
                  </div>
                 <label>Answer {{$i}}</label>
                 <textarea id="inmeta_description" class="form-control" name="answer_1" rows="20" cols="40" placeholder="" value="" readonly>{{$d->answer}}</textarea>
                 <p id="eerrmeta_description" class="mb-0 text-danger em"></p>
                 <span class="count"></span>
                 <br>
                 <button type="button" class="btn btn-secondary" id="count_word">count</button>

              </div>
              <input type="hidden" name="sid" value="{{$d->sid}}">
              <input type="hidden" name="aid[]" value="{{$d->aid}}">
              <div class="form-group">
                 <label>Marks</label>
                 <input id="marks{{$i}}" type="number" class="form-control" name="marks[]" value="">
                 <p id="err{{$i}}" class="mb-0 text-danger em"></p>
              </div>
              <div class="form-group">
                 <label>Remarks</label>
                 <textarea id="inmeta_description" class="form-control" name="remarks[]" rows="10" cols="40" placeholder="Enter meta description"></textarea>
                 <p id="eerrmeta_description" class="mb-0 text-danger em"></p>
              </div>
              @endforeach
             
           
        </div>
        <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           <button  id="" type="submit" class="btn btn-primary">Submit Marks</button>
        </div>
        </form>
     </div>
  </div>
</div>
<!---end edit model-->

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
      function myfun()
      {
        if($('#marks1').val()=="")
        {
          $('#err1').html("Please enter marks");
          return false;
        }
        if($('#marks1').val()<0)
        {
          $('#err1').html("Please enter valid marks");
          return false;
        }
        if($('#marks2').val()=="")
        {
          $('#err2').html("Please enter marks");
          return false;
        }
        if($('#marks2').val()<0)
        {
          $('#err2').html("Please enter valid marks");
          return false;
        }
      }
      $(document).ready(function() {


        //
          //
      $('#count_word').on({
         'click': function(){
            var value = $.trim($('[name="answer_1"]').val()),
                  count = value == '' ? 0 : value.split(' ').length;
                  // alert(count);
                  $('span.count').html(count);
         }
      });
      $('#count_word_2').on({
         'click': function(){
            var value = $.trim($('[name="answer_2"]').val()),
                  count = value == '' ? 0 : value.split(' ').length;
                  // alert(count);
                  $('span.count_2').html(count);
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
