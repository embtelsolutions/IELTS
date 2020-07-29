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
  <div class="mt-2 mb-4">
    {{-- <h2 class="text-white pb-2">Welcome back, {{Auth::guard('admin')->user()->first_name}} {{Auth::guard('admin')->user()->last_name}}!</h2> --}}
  </div>
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
		
			<form action="{{route('newtest')}}" method="post" enctype="multipart/form-data">
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
						<label for="">Instruction*</label>
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
							<option>Listening</option>
							{{-- <option>Listening</option>
							<option>Writing</option>
							<option>Speaking</option> --}}
						</select>
						<p id="err_module_type" class="mb-0 text-danger em"></p>		
					</div>
					
					<!---/end Module type-->					
				</div>
				
				<!-- <hr style="color: white; background-color:white" /> -->

				<!--practice test form fields-->
<!---reading form -->
			<div id="reading_form" >
				<!-- <div class="col-lg-10">
                    <div class="card-title">Practice Test Listening</div>
                </div>
				<div class="row test_config">
					<div class="form-group col-md-4">
						<label for="">Instruction*</label>
						<textarea id="inst_module" class="form-control " name="inst_module" data-height="200" placeholder="Enter Instruction" rows="4" cols="50"></textarea>
						{{-- <p id="err_inst_module" class="mb-0 text-danger em"></p> --}}
					</div>
					<div class="form-group col-md-4">
						<label for="">Section Type</label>		
						<select class="form-control mg-10" id="section_type" name="test_type" readonly>
							<option>Audio</option>
							{{-- <option>Image</option> --}}
						</select>
						{{-- <p id="err_section_type" class="mb-0 text-danger em"></p>		 --}}
					</div>			
					
							
				</div> -->
			<div class="" id="paragraph">
				<!--section one-->	
				<div id="section_1" class="">
					<hr style="color: white; background-color:white" />
					<div class="row">
						<div class="col-lg-10">
							<div class="card-title">Section 1</div>
						</div>
						<div class="form-group col-md-6">
							<label for="">Instruction*</label>
							<textarea id="" class="form-control " name="instr_sec1" data-height="200" placeholder="Enter Instruction" rows="4" cols="50"></textarea>
							@error('instr_sec1')
								<p id="err_title" class="mb-0 text-danger em">{{ $message }}</p>
							@enderror
						</div>
						<div class="form-group col-md-2">
							<label for="">Time Limit </label>		
							<input type="text" id="module_time" name="sec1time" class="form-control " name="module_time" placeholder="hh:mm:ss">
							@error('sec1time')
								<p id="err_title" class="mb-0 text-danger em">{{ $message }}</p>
							@enderror
						</div>
						<div class="form-group col-md-4">
							<label for="">Audio*</label>
							<input type="file" accept="audio/*" id="img_reading" class="form-control " name="sec1audiofile" placeholder="Enter description" data-height="200" readonly>
							@error('sec1audiofile')
								<p id="err_title" class="mb-0 text-danger em">{{ $message }}</p>
							@enderror
						</div>	
					</div>
					<div class="row section_one_que" id="sec_que_1">
						<!--- question one-->
						<div class="form-group col-md-4">
							<label for="field" class="question_name">Question 1*</label>
							<input id="" type="text" class="form-control" name="sec1_que[]" value="" placeholder="Enter question">
							@error('sec1_que.0')
								<p id="err_title" class="mb-0 text-danger em">{{ $message }}</p>
							@enderror
							<br>
							<select class="form-control mg-10 type" onchange="myfun(this.id);" id="sec1que1" name="sec1_qtype[]" data-type="type">
								<option>MCQ</option>
								<option>Blank</option>
							</select>
						</div>
						<!--if question is mcq-->
						<div class="form-group col-md-4" id="mcq">
							<label for="">MCQ <span>(sapareted by ";")</span></label>
							<textarea id="" class="form-control option" name="sec1_mcq[]" data-height="200" placeholder="Enter option" rows="4" cols="50"></textarea>
							@error('sec1_mcq.0')
								<p id="err_title" class="mb-0 text-danger em">{{ $message }}</p>
							@enderror
						</div>
						<div class="form-group col-md-4" id="">
							<label for="">Answer*</label>
							<input id="" type="text" class="form-control option-ans" name="sec1_ans[]" value="" placeholder="Enter Answer">
							@error('sec1_ans.0')
								<p id="err_title" class="mb-0 text-danger em">{{ $message }}</p>
							@enderror
						</div>
						<!----end mcq-->
					</div>

					<div class="row addquestion_1">
						<div class="modal-footer">
							<button id="add_que_1" type="button" class="btn btn-primary">Add Question</button>
							{{-- <button type="button" id="remove_que"class="btn btn-secondary">Remove Question</button> --}}
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
						<div class="form-group col-md-6">
							<label for="">Instruction*</label>
							<textarea id="" class="form-control " name="instr_sec2" data-height="200" placeholder="Enter Instruction" rows="4" cols="50"></textarea>
							{{-- <p id="err_inst_module" class="mb-0 text-danger em"></p> --}}
						</div>
						<div class="form-group col-md-2">
							<label for="">Time Limit</label>		
							<input type="text" id="module_time" class="form-control " name="sec2time" placeholder="hh:mm:ss">
							@error('sec2time')
								<p id="err_title" class="mb-0 text-danger em">{{ $message }}</p>
							@enderror	
						</div>
						<div class="form-group col-md-4">
							<label for="">Audio*</label>
							<input type="file" accept="audio/*" id="img_reading" class="form-control " name="sec2audiofile" placeholder="Enter description" data-height="200" readonly>
							@error('sec2audiofile')
								<p id="err_title" class="mb-0 text-danger em">{{ $message }}</p>
							@enderror
						</div>	
					</div>
						{{-- <hr style="color: white; background-color:white" /> --}}
					<div class="row section_two_que" id="sec2_que_1">
						<!--- question one-->
						<div class="form-group col-md-4">
							<label for="field" class="question_name">Question 1*</label>
							<input id="" type="text" class="form-control" name="sec2_que[]" value="" placeholder="Enter question">
							@error('sec2_que.0')
								<p id="err_title" class="mb-0 text-danger em">{{ $message }}</p>
							@enderror
							<br>
							<select class="form-control mg-10" onchange="myfun(this.id);" id="sec2que1" name="sec2_qtype[]">
								<option>MCQ</option>
								<option>Blank</option>
							</select>
						</div>
						<!--if question is mcq-->
						<div class="form-group col-md-4" id="">
							<label for="">MCQ *</label>
							<textarea id="" class="form-control " name="sec2_mcq[]" data-height="200" placeholder="Enter option" rows="4" cols="50"></textarea>
							@error('sec2_mcq.0')
								<p id="err_title" class="mb-0 text-danger em">{{ $message }}</p>
							@enderror
						</div>
						<div class="form-group col-md-4" id="">
							<label for="">Answer*</label>
							<input id="" type="text" class="form-control" name="sec2_ans[]" value="" placeholder="Enter Answer">
							@error('sec2_ans.0')
								<p id="err_title" class="mb-0 text-danger em">{{ $message }}</p>
							@enderror
						</div>
						<!----end mcq-->

						<!----if question is blank-->
						
						<!----end question is blank-->
					</div>

					<div class="row addquestion_2">
						<div class="modal-footer">
							<button id="add_que_2" type="button" class="btn btn-primary">Add Question</button>
							{{-- <button type="button" id="remove_que"class="btn btn-secondary">Remove Question</button> --}}
						</div>
					</div>
				
				</div>
				<!--end section two-->
				<!--start section three-->
				<div id="section_3" class="">
					<hr style="color: white; background-color:white" />
					<div class="row">
						<div class="col-lg-10">
							<div class="card-title">Section 3</div>
						</div>
						<div class="form-group col-md-6">
							<label for="">Instruction*</label>
							<textarea id="" class="form-control " name="instr_sec3" data-height="200" placeholder="Enter Instruction" rows="4" cols="50"></textarea>
							{{-- <p id="err_inst_module" class="mb-0 text-danger em"></p> --}}
						</div>
						<div class="form-group col-md-2">
							<label for="">Time Limit</label>		
							<input type="text" id="module_time" class="form-control " name="sec3time" placeholder="hh:mm:ss">
							@error('sec3time')
								<p id="err_title" class="mb-0 text-danger em">{{ $message }}</p>
							@enderror	
						</div>
						<div class="form-group col-md-4">
							<label for="">Audio*</label>
							<input type="file" accept="audio/*" id="img_reading" class="form-control " name="sec3audiofile" placeholder="Enter description" data-height="200" readonly>
							@error('sec2audiofile')
								<p id="err_title" class="mb-0 text-danger em">{{ $message }}</p>
							@enderror
						</div>
					</div>
					
					<div class="row section_three_que" id="sec3_que_1">
						<!--- question one-->
						<div class="form-group col-md-4">
							<label for="field" class="question_name">Question 1*</label>
							<input id="" type="text" class="form-control" name="sec3_que[]" value="" placeholder="Enter question">
							@error('sec3_que.0')
								<p id="err_title" class="mb-0 text-danger em">{{ $message }}</p>
							@enderror
							<br>
							<select class="form-control mg-10" id="sec3que1" onchange="myfun(this.id);" name="sec3_qtype[]">
								<option>MCQ</option>
								<option>Blank</option>
							</select>
						</div>
						<!--if question is mcq-->
						<div class="form-group col-md-4" id="">
							<label for="">MCQ *</label>
							<textarea id="" class="form-control " name="sec3_mcq[]" data-height="200" placeholder="Enter option" rows="4" cols="50"></textarea>
							@error('sec3_mcq.0')
								<p id="err_title" class="mb-0 text-danger em">{{ $message }}</p>
							@enderror
						</div>
						<div class="form-group col-md-4" id="">
							<label for="">Answer*</label>
							<input id="" type="text" class="form-control" name="sec3_ans[]" value="" placeholder="Enter Answer">
							@error('sec3_ans.0')
								<p id="err_title" class="mb-0 text-danger em">{{ $message }}</p>
							@enderror
						</div>
						<!----end mcq-->

						<!----if question is blank-->
						
						<!----end question is blank-->
					</div>

					<div class="row addquestion_3">
						<div class="modal-footer">
							<button id="add_que_3" type="button" class="btn btn-primary">Add Question</button>
							{{-- <button type="button" id="remove_que"class="btn btn-secondary">Remove Question</button> --}}
						</div>
					</div>
				
				</div>
				<!--end section three-->
				<!--start section four-->
				<div id="section_4" class="">
					<hr style="color: white; background-color:white" />
					<div class="row">
						<div class="col-lg-10">
							<div class="card-title">Section 4</div>
						</div>
						<div class="form-group col-md-6">
							<label for="">Instruction*</label>
							<textarea id="" class="form-control " name="instr_sec4" data-height="200" placeholder="Enter Instruction" rows="4" cols="50"></textarea>
							<p id="err_inst_module" class="mb-0 text-danger em"></p>
						</div>
						<div class="form-group col-md-2">
							<label for="">Time Limit</label>		
							<input type="text" id="module_time" class="form-control " name="sec4time" placeholder="hh:mm:ss">
							@error('sec4time')
								<p id="err_title" class="mb-0 text-danger em">{{ $message }}</p>
							@enderror	
						</div>
						<div class="form-group col-md-4">
							<label for="">Audio*</label>
							<input type="file" accept="audio/*" id="img_reading" class="form-control " name="sec4audiofile" placeholder="Enter description" data-height="200" readonly>
							@error('sec4audiofile')
								<p id="err_title" class="mb-0 text-danger em">{{ $message }}</p>
							@enderror
						</div>
					</div>
						
					<div class="row section_four_que" id="sec4_que_1">
						<!--- question one-->
						<div class="form-group col-md-4">
							<label for="field" class="">Question 1*</label>
							<input id="" type="text" class="form-control" name="sec4_que[]" value="" placeholder="Enter question">
							@error('sec4_que.0')
								<p id="err_title" class="mb-0 text-danger em">{{ $message }}</p>
							@enderror
							<br>
							<select class="form-control mg-10" onchange="myfun(this.id);" id="sec4que1" name="sec4_qtype[]">
								<option>MCQ</option>
								<option>Blank</option>
							</select>
						</div>
						<!--if question is mcq-->
						<div class="form-group col-md-4" id="">
							<label for="">MCQ *</label>
							<textarea id="" class="form-control " name="sec4_mcq[]" data-height="200" placeholder="Enter option" rows="4" cols="50"></textarea>
							@error('sec4_mcq.0')
								<p id="err_title" class="mb-0 text-danger em">{{ $message }}</p>
							@enderror
						</div>
						<div class="form-group col-md-4" id="">
							<label for="">Answer*</label>
							<input id="" type="text" class="form-control" name="sec4_ans[]" value="" placeholder="Enter Answer">
							@error('sec4_ans.0')
								<p id="err_title" class="mb-0 text-danger em">{{ $message }}</p>
							@enderror
						</div>
						<!----end mcq-->

						<!----if question is blank-->
						
						<!----end question is blank-->
					</div>

					<div class="row addquestion_4">
						<div class="modal-footer">
							<button id="add_que_4" type="button" class="btn btn-primary">Add Question</button>
							{{-- <button type="button" id="remove_que"class="btn btn-secondary">Remove Question</button> --}}
						</div>
					</div>
				
				</div>
				<!--end section four-->
			</div>
				<!--Start image test-->
				
				<!--end image test-->
				{{-- <div class="service_box">
					<div class="form">
						<form class="cmxform">
							<label>EL POS :</label>
							<input type="checkbox">
							 <!-----------------------
							  multiple textboxes shall be added here as
							  <input type="text" class="someclass"> ---x> textbox 1
							  <input type="text" class="someclass"> ---x> textbox 2
							  ----------------------->
							<button id="add">Add</button>
						</form>
					</div>
				</div> --}}
			
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
<script>
function myfun(id){
	var qtype=$('#'+id).val();
	if(qtype=='Blank')
	{
		
		var a=$('#'+id).parent().next().find('textarea').attr('readonly', true);
		$('#'+id).parent().next().find('textarea').val('None');
	}
	else{
		var a=$('#'+id).parent().next().find('textarea').attr('readonly', false);
		$('#'+id).parent().next().find('textarea').val('');
	}

}
	$(document).ready(function(){

		var i = $('.section_one_que').length +1;
		$(function() {
			$('#add_que_1').click(function(){
				$(`<div class="row section_one_que" id="sec_que_`+ i +`">
							<!--- question one-->
							<div class="form-group col-md-4">
								<label for="field" class="">Question `+ i +`*</label>
								<input id="sec1_que`+ i +`" type="text" class="form-control" name="sec1_que[]" value="" placeholder="Enter question">
								
								<br>
								<select class="form-control mg-10" onchange="myfun(this.id);" id="sec1_que`+ i +`_que_type" name="sec1_qtype[]" data-type="type">
									<option>MCQ</option>
									<option>Blank</option>
								</select>
							</div>
							<!--if question is mcq-->
							<div class="form-group col-md-4" id="sec1_que`+ i +`_option_div">
								<label for="">MCQ *</label>
								<textarea id="sec1_que`+ i +`_option" class="form-control " name="sec1_mcq[]" data-height="200" placeholder="Enter option" rows="4" cols="50"></textarea>
								
							</div>
							<div class="form-group col-md-4" id="sec1_mcq_answer_`+ i +`_div">
								<label for="">Answer*</label>
								<input id="sec1_que`+ i +`_answer_mcq" type="text" class="form-control" name="sec1_ans[]" value="" placeholder="Enter Answer">
								
							</div>
							<!----end mcq-->

							<!----if question is blank-->
						
							<!----end question is blank-->
						</div>`).append( $('<button/></div>').addClass( 'remove btn btn-secondary' ).text( 'Remove' ) ).insertBefore($('.row.addquestion_1'));
						
						i++;
						return false;
				});

			$(document).on('click', 'button.remove', function( e ) {
				e.preventDefault();
				$(this).closest( 'div.row' ).remove();
				i--;
			});
			

		});

		var i2 = $('.section_two_que').length + 1;
		$(function() {
			$('#add_que_2').click(function(){
				$(`<div class="row section_two_que" id="sec2_que_`+ i2 +`">
							<!--- question one-->
							<div class="form-group col-md-4">
								<label for="field" class="">Question `+ i2 +`*</label>
								<input id="sec2_que`+ i2 +`" type="text" class="form-control" name="sec2_que[]" value="" placeholder="Enter question">
								
								<br>
								<select class="form-control mg-10" id="sec2_que`+ i2 +`_que_type" onchange="myfun(this.id);" name="sec2_qtype[]">
									<option>MCQ</option>
									<option>Blank</option>
								</select>
							</div>
							<!--if question is mcq-->
							<div class="form-group col-md-4" id="sec2_que`+ i2 +`_option_div">
								<label for="">MCQ *</label>
								<textarea id="sec2_que`+ i2 +`_option" class="form-control " name="sec2_mcq[]`+ i2 +`_option" data-height="200" placeholder="Enter option" rows="4" cols="50"></textarea>
								
							</div>
							<div class="form-group col-md-4" id="sec2_mcq_answer_`+ i2 +`_div">
								<label for="">Answer*</label>
								<input id="sec2_que`+ i2 +`_answer_mcq" type="text" class="form-control" name="sec2_ans[]" value="" placeholder="Enter Answer">
								
							</div>
							<!----end mcq-->

							<!----end question is blank-->
						</div>`).append( $('<button/>').addClass( 'remove2 btn btn-secondary' ).text( 'Remove' ) ).insertBefore($('.row.addquestion_2'));
						
						i2++;
						return false;
				});

			$(document).on('click', 'button.remove2', function( e ) {
				e.preventDefault();
				$(this).closest( 'div.row' ).remove();
				i2--;
			});

		});

var i3 = $('.section_three_que').length +1;
		$(function() {
			$('#add_que_3').click(function(){
			
				$(`<div class="row section_three_que" id="sec3_que_`+ i3 +`">
							<!--- question one-->
							<div class="form-group col-md-4">
								<label for="field" class="">Question `+ i3 +`*</label>
								<input id="sec4_que`+ i3 +`" type="text" class="form-control" name="sec3_que[]" value="" placeholder="Enter question">
								
								<br>
								<select class="form-control mg-10" id="sec3_que`+ i3 +`_que_type" onchange="myfun(this.id);" name="sec3_qtype[]">
									<option>MCQ</option>
									<option>Blank</option>
								</select>
							</div>
							<!--if question is mcq-->
							<div class="form-group col-md-4" id="sec3_que`+ i3 +`_option_div">
								<label for="">MCQ *</label>
								<textarea id="sec3_que`+ i3 +`_option" class="form-control " name="sec3_mcq[]" data-height="200" placeholder="Enter option" rows="4" cols="50"></textarea>
								
							</div>
							<div class="form-group col-md-4" id="sec3_mcq_answer_`+ i3 +`_div">
								<label for="">Answer*</label>
								<input id="sec3_ans[]" name="sec3_ans[]" type="text" class="form-control" name="sec3_que`+ i3+`_answer_mcq" value="" placeholder="Enter Answer">
								
							</div>
							<!----end mcq-->

							
							<!----end question is blank-->
						</div>`).append( $('<button/></div>').addClass( 'remove3 btn btn-secondary' ).text( 'Remove' ) ).insertBefore($('.row.addquestion_3'));
						i3++;
						return false;
			});

			$(document).on('click', 'button.remove3', function( e ) {
				e.preventDefault();
				$(this).closest( 'div.row' ).remove();
				i3--;
			});
		});
		
		var i4 = $('.section_four_que').length +1;
		$(function() {
			$('#add_que_4').click(function(){
				$(`<div class="row section_four_que" id="sec4_que_`+ i4 +`">
							<!--- question one-->
							<div class="form-group col-md-4">
								<label for="field" class="">Question `+ i4 +`*</label>
								<input id="sec4_que`+ i4 +`" type="text" class="form-control" name="sec4_que[]" value="" placeholder="Enter question">
								
								<br>
								<select class="form-control mg-10" id="sec4_que`+ i4 +`_que_type" onchange="myfun(this.id);" name="sec4_qtype[]">
									<option>MCQ</option>
									<option>Blank</option>
								</select>
							</div>
							<!--if question is mcq-->
							<div class="form-group col-md-4"  id="">
								<label for="">MCQ *</label>
								<textarea id="sec4_que`+ i4 +`_option" class="form-control " name="sec4_mcq[]" data-height="200" placeholder="Enter option" rows="4" cols="50"></textarea>
								
							</div>
							<div class="form-group col-md-4" id="">
								<label for="">Answer*</label>
								<input id="sec4_que`+ i4 +`_answer_mcq" type="text" class="form-control" name="sec4_ans[]" value="" placeholder="Enter Answer">
								
							</div>
							<!----end mcq-->

							
							<!----end question is blank-->
						</div>`).append( $('<button/></div>').addClass( 'remove4 btn btn-secondary' ).text( 'Remove' ) ).insertBefore($('.row.addquestion_4'));
						
						i4++;
						return false;
				});
				$(document).on('click', 'button.remove4', function( e ) {
					e.preventDefault();
					$(this).closest( 'div.row' ).remove();
					i4--;
				});
		});
		

		
	
		// function change_ans_type(i){
			
		// 	$('#sec4_que'+ i +'_que_type').change(function(i) {

		// 		if($('#sec4_que'+ i +'_que_type').val() == "Blank"){
		// 				$('#sec4_blank_'+ i +'_div').removeClass('d-none');
		// 				$('#sec4_mcq_answer_'+ i +'_div').addClass('d-none');
		// 				$('#sec4_que'+ i +'_option_div').addClass('d-none');
		// 		}else{
		// 			$('#sec4_blank_'+ i +'_div').addClass('d-none');
		// 				$('#sec4_mcq_answer_'+ i +'_div').removeClass('d-none');
		// 				$('#sec4_que'+ i +'_option_div').removeClass('d-none');
		// 		}
		// 	});
		// }
		// }
		// $('input[type="text"]').each(function() {
		// 			var x = 1;
		// 			$(this).attr("name", x++);
		// 			// $(this).replaceWith(rep);
					
		// });

	// function ParaTypeQuetion(){
	// 	$('#section_type').change(function() {
	// 		// $(this).val() will work here
					
	// 		if($('#section_type').val() == "Paragraph"){
	// 				$('#paragraph').removeClass('d-none');
	// 				$('#image').addClass('d-none');
	// 		}else{
	// 			$('#paragraph').addClass('d-none');
	// 			$('#image').removeClass('d-none');
				
	// 		}
	// 	});
	// 			// question one_type   
	// 		$('#que_one_type').change(function() {
	// 		if($('#que_one_type').val() == "Blank"){
	// 				$('#ans_blank_one_div').removeClass('d-none');
	// 				$('#mcq_option_one_div').addClass('d-none');
	// 				$('#ans_mcq_one_div').addClass('d-none');
	// 		}else{
	// 			$('#ans_blank_one_div').addClass('d-none');
	// 			$('#mcq_option_one_div').removeClass('d-none');
	// 			$('#ans_mcq_one_div').removeClass('d-none'); 
	// 		}
	// 	});

	// 	// question two  
	// 	$('#que_two_type').change(function() {
	// 		if($('#que_two_type').val() == "Blank"){
	// 				$('#ans_blank_two_div').removeClass('d-none');
	// 				$('#mcq_option_two_div').addClass('d-none');
	// 				$('#ans_mcq_two_div').addClass('d-none');
	// 		}else{
	// 			$('#ans_blank_two_div').addClass('d-none');
	// 			$('#mcq_option_two_div').removeClass('d-none');
	// 			$('#ans_mcq_two_div').removeClass('d-none'); 
	// 		}
	// 	});
	// 		// question three  
	// 		$('#que_three_type').change(function() {
	// 		if($('#que_three_type').val() == "Blank"){
	// 				$('#ans_blank_three_div').removeClass('d-none');
	// 				$('#mcq_option_three_div').addClass('d-none');
	// 				$('#ans_mcq_three_div').addClass('d-none');
	// 		}else{
	// 			$('#ans_blank_three_div').addClass('d-none');
	// 			$('#mcq_option_three_div').removeClass('d-none');
	// 			$('#ans_mcq_three_div').removeClass('d-none'); 
	// 		}
	// 		});

	// 		// question four  
	// 		$('#que_four_type').change(function() {
	// 		if($('#que_four_type').val() == "Blank"){
	// 				$('#ans_blank_four_div').removeClass('d-none');
	// 				$('#mcq_option_four_div').addClass('d-none');
	// 				$('#ans_mcq_four_div').addClass('d-none');
	// 		}else{
	// 			$('#ans_blank_four_div').addClass('d-none');
	// 			$('#mcq_option_four_div').removeClass('d-none');
	// 			$('#ans_mcq_four_div').removeClass('d-none'); 
	// 		}
	// 	});
	// }
	// ImageTypeQuetion();
	// function ImageTypeQuetion(){

	// 		// question one_type   
	// 	$('#img_que_one_type').change(function() {
	// 		if($('#img_que_one_type').val() == "Blank"){
	// 				$('#img_ans_blank_one_div').removeClass('d-none');
	// 				$('#img_mcq_option_one_div').addClass('d-none');
	// 				$('#img_ans_mcq_one_div').addClass('d-none');
	// 		}else{
	// 			$('#img_ans_blank_one_div').addClass('d-none');
	// 			$('#img_mcq_option_one_div').removeClass('d-none');
	// 			$('#img_ans_mcq_one_div').removeClass('d-none'); 
	// 		}
	// 	});

	// 	// question two  
	// 	$('#img_que_two_type').change(function() {
	// 		if($('#img_que_two_type').val() == "Blank"){
	// 				$('#img_ans_blank_two_div').removeClass('d-none');
	// 				$('#img_mcq_option_two_div').addClass('d-none');
	// 				$('#img_ans_mcq_two_div').addClass('d-none');
	// 		}else{
	// 			$('#img_ans_blank_two_div').addClass('d-none');
	// 			$('#img_mcq_option_two_div').removeClass('d-none');
	// 			$('#img_ans_mcq_two_div').removeClass('d-none'); 
	// 		}
	// 	});
	// 	// question three  
	// 	$('#img_que_three_type').change(function() {
	// 		if($('#img_que_three_type').val() == "Blank"){
	// 				$('#img_ans_blank_three_div').removeClass('d-none');
	// 				$('#img_mcq_option_three_div').addClass('d-none');
	// 				$('#img_ans_mcq_three_div').addClass('d-none');
	// 		}else{
	// 			$('#img_ans_blank_three_div').addClass('d-none');
	// 			$('#img_mcq_option_three_div').removeClass('d-none');
	// 			$('#img_ans_mcq_three_div').removeClass('d-none'); 
	// 		}
	// 	});

	// 	// question four  
	// 	$('#img_que_four_type').change(function() {
	// 		if($('#img_que_four_type').val() == "Blank"){
	// 				$('#img_ans_blank_four_div').removeClass('d-none');
	// 				$('#img_mcq_option_four_div').addClass('d-none');
	// 				$('#img_ans_mcq_four_div').addClass('d-none');
	// 		}else{
	// 			$('#img_ans_blank_four_div').addClass('d-none');
	// 			$('#img_mcq_option_four_div').removeClass('d-none');
	// 			$('#img_ans_mcq_four_div').removeClass('d-none'); 
	// 		}
	// 	});

	// }

   	})

</script>
@endpush