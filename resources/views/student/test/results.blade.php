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
<a href="#">Result</a>
</li>
</ul>
</div>
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
  <div class="row">
  <div class="col-lg-4">
    <div class="card-title d-inline-block">All Test Result</div>
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
        <th scope="col">Tittle</th>
        <th scope="col">Date</th>
        {{-- <th scope="col">Answer</th> --}}
        {{-- <th scope="col">View</th> --}}
        {{-- <th scope="col">Actions</th> --}}
      </tr>
      <tr>
        <td>1</td>
        <td>Test 1</td>
        <td>26 aug 2020</td>
        <td> <a class="btn btn-secondary btn-sm editbtn" href="#editModal" data-toggle="modal" ">
          <span class="btn-label">
          </span>
          Submit Marks
        </a></td>
      </tr>
    </thead>
    <tbody>
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





<!-- Edit Package Modal -->
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
<!---end edit model-->

    @endsection
    @section('scripts')
    <script>
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
  
  });
</script>
@endsection
