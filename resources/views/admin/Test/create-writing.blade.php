@extends('admin.layout')
<style>
	.p-body {
    padding-left: 18px!important;
    padding-right: 18px!important;
}
button.remove{
    margin-left: 16px;
}
</style>
@section('content')
  
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
		  <a href="#">Create Test</a>
	   </li>
	</ul>
 </div>

 <div class="row">
<<<<<<< HEAD

=======
>>>>>>> 0a406984e2dbe353e9acfea932f95590cab7201b
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-10">
                    <div class="card-title">Create Test</div>
                </div>
                <div class="col-lg-2">
                   
                </div>
            </div>
        </div>
        <div class="card-body p-body pt-5 pb-4">
			<form action="{{route('writing')}}" method="post">
			@csrf
				<div class="row">
					<div class="form-group col-md-4">
						<label for="">Test Title*</label>
						<input id="" type="text" class="form-control" name="title" value="" placeholder="Enter title">
						@error('title')
							<p id="err_title" class="mb-0 text-danger em">{{ $message }}</p>
						@enderror
					</div>
					<div class="form-group col-md-4">
						<label for="">Time*</label>
						<input type="text" id="" class="form-control " name="test_time" placeholder="hh:mm:ss">
						@error('test_time')
							<p id="err_title" class="mb-0 text-danger em">{{ $message }}</p>
						@enderror
					</div>
					<div class="form-group col-md-4">
						<label for="">Instruction (saprated by ";")</label>
						<textarea id="" class="form-control " name="inst_test" data-height="200" placeholder="Enter instruction" rows="4" cols="50"></textarea>
						@error('inst_test')
							<p id="err_title" class="mb-0 text-danger em">{{ $message }}</p>
						@enderror
					</div>
				</div>

				
				<div class="row">
					<!-- Test type  Practice/Full-->
					<div class="form-group col-md-4">
						<label for="">Test Type</label>		
						<select class="form-control mg-10" id="test_type" name="test_type" readonly>
							<option>Practice</option>
							{{-- <option>Full</option> --}}
						</select>
						<p id="err_test_type" class="mb-0 text-danger em"></p>		
					</div>
					<!---/end test type-->

					<!-- Module type -->
					<div class="form-group col-md-4">
						<label for="">Module Type</label>		
						<select class="form-control mg-10" id="module_type" name="module_type" readonly>
							<option>Writing</option>
							{{-- <option>Listening</option>
							<option>Writing</option>
							<option>Speaking</option> --}}
						</select>
						<p id="err_module_type" class="mb-0 text-danger em"></p>		
					</div>
					
					<!---/end Module type-->					
				</div>
				
				
				<!--practice test form fields-->
<!---reading form -->
			<div id="writing_form" >
				
				
							
				</div>
			<div class="" id="paragraph">
				<!--section one-->	
				<div id="section_1" class="">
					<hr style="color: white; background-color:white" />
					<div class="row">
						<div class="col-lg-10">
							<div class="card-title">Section 1</div>

						</div>
						<div class="col-lg-2">
							<div class="card-title">Time 
								<input type="text" id="section_time" class="form-control " name="sec1_time" placeholder="hh:mm:ss">
							</div>
							@error('sec1_time')
								<p id="err_title" class="mb-0 text-danger em">{{ $message }}</p>
							@enderror
						</div>
						<div class="form-group col-md-4">
							<label for="">Instruction (saprated by ";")</label>
							<textarea id="" class="form-control " name="sec1_instr" data-height="200" placeholder="Enter Instruction" rows="4" cols="50"></textarea>
							@error('sec1_instr')
								<p id="err_title" class="mb-0 text-danger em">{{ $message }}</p>
							@enderror
						</div>
						<div class="form-group col-md-4">
							<label for="">Topic*</label>
							<textarea id="" class="form-control " name="sec1_topic" data-height="200" placeholder="Enter Topic" rows="4" cols="50"></textarea>
							@error('sec1_topic')
								<p id="err_title" class="mb-0 text-danger em">{{ $message }}</p>
							@enderror
						</div>
						<div class="form-group col-md-4">
							<label for="">Image (Optional)</label>
							<input type="file" accept="image/*" id="img_write" class="form-control " name="sec1_img" placeholder="Enter description" data-height="200" readonly>
							@error('sec1_img')
								<p id="err_title" class="mb-0 text-danger em">{{ $message }}</p>
							@enderror
						 </div>	
					</div>
					<div class="row section_one_que" id="sec_que_1">
						<!--- question one-->
						<div class="form-group col-md-6">
							<label for="field" class="question_name">Question 1*</label>
							<input id="" type="text" class="form-control" name="sec1_que" value="" placeholder="Enter question">
							@error('sec1_que')
								<p id="err_title" class="mb-0 text-danger em">{{ $message }}</p>
							@enderror
							<br>
						</div>
						
					</div>

					
					
				</div>
				<!--end section one-->
				<!--start section two-->
				<div id="section_2" class="">
					<hr style="color: white; background-color:white" />
					<div class="row">
						<div class="col-lg-10">
							<div class="card-title">Section 2</div>
						</div>
						<div class="col-lg-2">
							<div class="card-title">Time 
								<input type="text" id="section_time" class="form-control " name="sec2_time" placeholder="hh:mm:ss">
							</div>
							@error('sec2_time')
								<p id="err_title" class="mb-0 text-danger em">{{ $message }}</p>
							@enderror
						</div>
						<div class="form-group col-md-4">
							<label for="">Instruction (saprated by ";")</label>
							<textarea id="" class="form-control " name="sec2_instr" data-height="200" placeholder="Enter Instruction" rows="4" cols="50"></textarea>
							@error('sec2_instr')
								<p id="err_title" class="mb-0 text-danger em">{{ $message }}</p>
							@enderror
						</div>
						<div class="form-group col-md-4">
							<label for="">Topic*</label>
							<textarea id="" class="form-control " name="sec2_topic" data-height="200" placeholder="Enter Topic" rows="4" cols="50"></textarea>
							@error('sec2_topic')
								<p id="err_title" class="mb-0 text-danger em">{{ $message }}</p>
							@enderror
						</div>
						<div class="form-group col-md-4">
							<label for="">Image (Optional)</label>
							<input type="file" accept="image/*" id="sec_img_write" class="form-control " name="sec2_img" placeholder="Enter description" data-height="200" readonly>
							@error('sec2_img')
								<p id="err_title" class="mb-0 text-danger em">{{ $message }}</p>
							@enderror
						 </div>	
					</div>
						{{-- <hr style="color: white; background-color:white" /> --}}
					<div class="row section_two_que" id="sec2_que_1">
						<!--- question one-->
						<div class="form-group col-md-6">
							<label for="field" class="question_name">Question 1*</label>
							<textarea id="" type="text" class="form-control" name="sec2_que" value="" placeholder="Enter question"></textarea>
							@error('sec2_que')
								<p id="err_title" class="mb-0 text-danger em">{{ $message }}</p>
							@enderror
							<br>
							
						</div>
						<!--if question is mcq-->
						
						<!----end mcq-->

						<!----if question is blank-->
						
						<!----end question is blank-->
					</div>

					
				
				</div>
				<!--end section two-->
				<!--start section three-->
				
				<!--end section four-->
			</div>
			<!--end Practice test form fields-->	
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary">Cancel</button>
				<button id="" type="submit" class="btn btn-primary">Submit</button>
			 </div>
			</form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('after-script')
@endpush