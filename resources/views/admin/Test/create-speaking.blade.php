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
			<form action="" method="post">
				<div class="row">
					<div class="form-group col-md-4">
						<label for="">Test Title*</label>
						<input id="" type="text" class="form-control" name="title" value="" placeholder="Enter title">
						<p id="err_title" class="mb-0 text-danger em"></p>
					</div>
					<div class="form-group col-md-4">
						<label for="">Time*</label>
						<input type="text" id="" class="form-control " name="test_time" placeholder="Enter description">
						<p id="err_test_time" class="mb-0 text-danger em"></p>
					</div>
					<div class="form-group col-md-4">
						<label for="">Instruction*</label>
						<textarea id="" class="form-control " name="inst_test" data-height="200" placeholder="Enter instruction" rows="4" cols="50"></textarea>
						<p id="err_inst_test" class="mb-0 text-danger em"></p>
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
						{{-- <p id="err_test_type" class="mb-0 text-danger em"></p>		 --}}
					</div>
					<!---/end test type-->

					<!-- Module type -->
					<div class="form-group col-md-4">
						<label for="">Module Type</label>		
						<select class="form-control mg-10" id="module_type" name="module_type" readonly>
							<option>Speaking</option>
							{{-- <option>Listening</option>
							<option>Writing</option>
							<option>Speaking</option> --}}
						</select>
						<p id="err_module_type" class="mb-0 text-danger em"></p>		
					</div>
					{{-- <div class="form-group col-md-4">
						<label for="">Time Limit For each section</label>		
						<input type="text" id="module_time" class="form-control " name="module_time" placeholder="Enter time">
						<p id="err_module_time" class="mb-0 text-danger em"></p>		
					</div> --}}
					<!---/end Module type-->					
				</div>
				
				<hr style="color: white; background-color:white" />

				<!--practice test form fields--->
<!---reading form --->
			<div id="speaking_form" >
				<div class="col-lg-10">
                    <div class="card-title">Practice Test Speaking</div>
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
							<option>Paragraph</option>
							{{-- <option>Image</option> --}}
						</select>
						{{-- <p id="err_section_type" class="mb-0 text-danger em"></p>		 --}}
					</div>	
							
				
							
				</div>
			<div class="" id="paragraph">
				<!--section one--->	
				<div id="section_1" class="">
					<hr style="color: white; background-color:white" />
					<div class="row">
						<div class="col-lg-10">
							<div class="card-title">Section 1</div>

						</div>
						<div class="col-lg-2">
							<div class="card-title">Time 
								<input type="number" id="section_time" class="form-control " name="section_time	" placeholder="Enter time">
							</div>
						</div>
						<div class="form-group col-md-4">
							<label for="">Instruction*</label>
							<textarea id="" class="form-control " name="" data-height="200" placeholder="Enter Instruction" rows="4" cols="50"></textarea>
							{{-- <p id="err_inst_module" class="mb-0 text-danger em"></p> --}}
						</div>
						<div class="form-group col-md-4">
							<label for="">Topic*</label>
							<textarea id="" class="form-control " name="" data-height="200" placeholder="Enter Instruction" rows="4" cols="50"></textarea>
							{{-- <p id="err_inst_module" class="mb-0 text-danger em"></p> --}}
						</div>
						<div class="form-group col-md-4">
							<label for="">Image (Optional)</label>
							<input type="file" accept="image/*" id="img_write" class="form-control " name="img_write" placeholder="Enter description" data-height="200" readonly>
							<p id="err_image_reading" class="mb-0 text-danger em"></p>
						 </div>	
					</div>
					<div class="row section_one_que" id="sec_que_1">
						<!--- question one--->
						<div class="form-group col-md-4">
							<label for="field" class="question_name">Question 1*</label>
							<input id="" type="text" class="form-control" name="" value="" placeholder="Enter question">
							{{-- <p id="err_que_one" class="mb-0 text-danger em"></p> --}}
							<br>
							<select class="form-control mg-10 type" id="" name="" data-type="type">
								<option>MCQ</option>
								<option>Blank</option>
							</select>
						</div>
						<!--if question is mcq--->
						<div class="form-group col-md-4" id="">
							<label for="">MCQ *</label>
							<textarea id="" class="form-control option" name="" data-height="200" placeholder="Enter option" rows="4" cols="50"></textarea>
							{{-- <p id="err_mcq_option_one" class="mb-0 text-danger em"></p> --}}
						</div>
						<div class="form-group col-md-4" id="">
							<label for="">Answer*</label>
							<input id="" type="text" class="form-control option-ans" name="" value="" placeholder="Enter Answer">
							{{-- <p id="err_ans_one" class="mb-0 text-danger em"></p> --}}
						</div>
						<!----end mcq--->

						<!----if question is blank--->
						<div class="form-group col-md-4 d-none" id="">
							<label for="">Answer*</label>
							<input id="" type="text" class="form-control ans" name="" value="" placeholder="Enter Answer" >
							{{-- <p id="err_ans_two" class="mb-0 text-danger em"></p> --}}
						</div>
						<!----end question is blank--->
					</div>

					<div class="row addquestion_1">
						<div class="modal-footer">
							<button id="add_que_1" type="button" class="btn btn-primary">Add Question</button>
							{{-- <button type="button" id="remove_que"class="btn btn-secondary">Remove Question</button> --}}
						</div>
					</div>
					
				</div>
				<!--end section one--->
				<!--start section two--->
				<div id="section_2" class="">
					<hr style="color: white; background-color:white" />
					<div class="row">
						<div class="col-lg-10">
							<div class="card-title">Section 2</div>
						</div>
						<div class="col-lg-2">
							<div class="card-title">Time 
								<input type="number" id="section_time" class="form-control " name="section_time	" placeholder="Enter time">
							</div>
						</div>
						<div class="form-group col-md-4">
							<label for="">Instruction*</label>
							<textarea id="" class="form-control " name="" data-height="200" placeholder="Enter Instruction" rows="4" cols="50"></textarea>
							{{-- <p id="err_inst_module" class="mb-0 text-danger em"></p> --}}
						</div>
						<div class="form-group col-md-4">
							<label for="">Topic*</label>
							<textarea id="" class="form-control " name="" data-height="200" placeholder="Enter Instruction" rows="4" cols="50"></textarea>
							{{-- <p id="err_inst_module" class="mb-0 text-danger em"></p> --}}
						</div>
						<div class="form-group col-md-4">
							<label for="">Image (Optional)</label>
							<input type="file" accept="image/*" id="sec_img_write" class="form-control " name="img_write" placeholder="Enter description" data-height="200" readonly>
							<p id="err_image_reading" class="mb-0 text-danger em"></p>
						 </div>	
					</div>
						{{-- <hr style="color: white; background-color:white" /> --}}
					<div class="row section_two_que" id="sec2_que_1">
						<!--- question one--->
						<div class="form-group col-md-4">
							<label for="field" class="question_name">Question 1*</label>
							<input id="" type="text" class="form-control" name="" value="" placeholder="Enter question">
							{{-- <p id="err_que_one" class="mb-0 text-danger em"></p> --}}
							<br>
							<select class="form-control mg-10" id="" name="">
								<option>MCQ</option>
								<option>Blank</option>
							</select>
						</div>
						<!--if question is mcq--->
						<div class="form-group col-md-4" id="">
							<label for="">MCQ *</label>
							<textarea id="" class="form-control " name="" data-height="200" placeholder="Enter option" rows="4" cols="50"></textarea>
							{{-- <p id="err_mcq_option_one" class="mb-0 text-danger em"></p> --}}
						</div>
						<div class="form-group col-md-4" id="">
							<label for="">Answer*</label>
							<input id="" type="text" class="form-control" name="" value="" placeholder="Enter Answer">
							{{-- <p id="err_ans_one" class="mb-0 text-danger em"></p> --}}
						</div>
						<!----end mcq--->

						<!----if question is blank--->
						<div class="form-group col-md-4 d-none" id="">
							<label for="">Answer*</label>
							<input id="" type="text" class="form-control" name="" value="" placeholder="Enter Answer">
							<p id="" class="mb-0 text-danger em"></p>
						</div>
						<!----end question is blank--->
					</div>

					<div class="row addquestion_2">
						<div class="modal-footer">
							<button id="add_que_2" type="button" class="btn btn-primary">Add Question</button>
							{{-- <button type="button" id="remove_que"class="btn btn-secondary">Remove Question</button> --}}
						</div>
					</div>
				
				</div>
				<!--end section two--->
				<!--start section three--->
				<div id="section_3" class="">
					<hr style="color: white; background-color:white" />
					<div class="row">
						<div class="col-lg-10">
							<div class="card-title">Section 3</div>
						</div>
						<div class="col-lg-2">
							<div class="card-title">Time 
								<input type="number" id="section_time" class="form-control " name="section_time	" placeholder="Enter time">
							</div>
						</div>
						<div class="form-group col-md-4">
							<label for="">Instruction*</label>
							<textarea id="" class="form-control " name="" data-height="200" placeholder="Enter Instruction" rows="4" cols="50"></textarea>
							{{-- <p id="err_inst_module" class="mb-0 text-danger em"></p> --}}
						</div>
						<div class="form-group col-md-4">
							<label for="">Topic*</label>
							<textarea id="" class="form-control " name="" data-height="200" placeholder="Enter Instruction" rows="4" cols="50"></textarea>
							{{-- <p id="err_inst_module" class="mb-0 text-danger em"></p> --}}
						</div>
						<div class="form-group col-md-4">
							<label for="">Image (Optional)</label>
							<input type="file" accept="image/*" id="sec_img_write" class="form-control " name="img_write" placeholder="Enter description" data-height="200" readonly>
							<p id="err_image_reading" class="mb-0 text-danger em"></p>
						 </div>	
					</div>
					
					<div class="row section_three_que" id="sec3_que_1">
						<!--- question one--->
						<div class="form-group col-md-4">
							<label for="field" class="question_name">Question 1*</label>
							<input id="" type="text" class="form-control" name="" value="" placeholder="Enter question">
							<p id="err_que_one" class="mb-0 text-danger em"></p>
							<br>
							<select class="form-control mg-10" id="" name="">
								<option>MCQ</option>
								<option>Blank</option>
							</select>
						</div>
						<!--if question is mcq--->
						<div class="form-group col-md-4" id="">
							<label for="">MCQ *</label>
							<textarea id="" class="form-control " name="" data-height="200" placeholder="Enter option" rows="4" cols="50"></textarea>
							<p id="err_mcq_option_one" class="mb-0 text-danger em"></p>
						</div>
						<div class="form-group col-md-4" id="">
							<label for="">Answer*</label>
							<input id="" type="text" class="form-control" name="" value="" placeholder="Enter Answer">
							<p id="err_ans_one" class="mb-0 text-danger em"></p>
						</div>
						<!----end mcq--->

						<!----if question is blank--->
						<div class="form-group col-md-4 d-none" id="">
							<label for="">Answer*</label>
							<input id="" type="text" class="form-control" name="" value="" placeholder="Enter Answer">
							<p id="err_ans_two" class="mb-0 text-danger em"></p>
						</div>
						<!----end question is blank--->
					</div>

					<div class="row addquestion_3">
						<div class="modal-footer">
							<button id="add_que_3" type="button" class="btn btn-primary">Add Question</button>
							{{-- <button type="button" id="remove_que"class="btn btn-secondary">Remove Question</button> --}}
						</div>
					</div>
				
				</div>
				<!--end section three--->
				<!--start section four--->
				<div id="section_4" class="">
					<hr style="color: white; background-color:white" />
					<div class="row">
						<div class="col-lg-10">
							<div class="card-title">Section 4</div>
						</div>
						<div class="col-lg-2">
							<div class="card-title">Time 
								<input type="number" id="section_time" class="form-control " name="section_time	" placeholder="Enter time">
							</div>
						</div>
						
						<div class="form-group col-md-4">
							<label for="">Instruction*</label>
							<textarea id="" class="form-control " name="" data-height="200" placeholder="Enter Instruction" rows="4" cols="50"></textarea>
							{{-- <p id="err_inst_module" class="mb-0 text-danger em"></p> --}}
						</div>
						<div class="form-group col-md-4">
							<label for="">Topic*</label>
							<textarea id="" class="form-control " name="" data-height="200" placeholder="Enter Instruction" rows="4" cols="50"></textarea>
							{{-- <p id="err_inst_module" class="mb-0 text-danger em"></p> --}}
						</div>
						<div class="form-group col-md-4">
							<label for="">Image (Optional)</label>
							<input type="file" accept="image/*" id="img_write" class="form-control " name="img_write" placeholder="Enter description" data-height="200" readonly>
							<p id="err_image_reading" class="mb-0 text-danger em"></p>
						 </div>	
					</div>
						
					<div class="row section_four_que" id="sec4_que_1">
						<!--- question one--->
						<div class="form-group col-md-4">
							<label for="field" class="">Question 1*</label>
							<input id="" type="text" class="form-control" name="" value="" placeholder="Enter question">
							{{-- <p id="err_que_one" class="mb-0 text-danger em"></p> --}}
							<br>
							<select class="form-control mg-10" id="" name="">
								<option>MCQ</option>
								<option>Blank</option>
							</select>
						</div>
						<!--if question is mcq--->
						<div class="form-group col-md-4" id="">
							<label for="">MCQ *</label>
							<textarea id="" class="form-control " name="" data-height="200" placeholder="Enter option" rows="4" cols="50"></textarea>
							{{-- <p id="err_mcq_option_one" class="mb-0 text-danger em"></p> --}}
						</div>
						<div class="form-group col-md-4" id="">
							<label for="">Answer*</label>
							<input id="" type="text" class="form-control" name="" value="" placeholder="Enter Answer">
							{{-- <p id="err_ans_one" class="mb-0 text-danger em"></p> --}}
						</div>
						<!----end mcq--->

						<!----if question is blank--->
						<div class="form-group col-md-4 d-none" id="">
							<label for="">Answer*</label>
							<input id="" type="text" class="form-control" name="" value="" placeholder="Enter Answer">
							{{-- <p id="err_ans_two" class="mb-0 text-danger em"></p> --}}
						</div>
						<!----end question is blank--->
					</div>

					<div class="row addquestion_4">
						<div class="modal-footer">
							<button id="add_que_4" type="button" class="btn btn-primary">Add Question</button>
							{{-- <button type="button" id="remove_que"class="btn btn-secondary">Remove Question</button> --}}
						</div>
					</div>
				
				</div>
				<!--end section four--->
			</div>
			<!--end Practice test form fields--->	
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary">Cancel</button>
				<button id="" type="button" class="btn btn-primary">Submit</button>
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
	$(document).ready(function(){

		var i = $('.section_one_que').length +1;
		$(function() {
			$('#add_que_1').click(function(){
				$(`<div class="row section_one_que" id="sec_que_`+ i +`">
							<!--- question one--->
							<div class="form-group col-md-4">
								<label for="field" class="">Question `+ i +`*</label>
								<input id="sec2_que`+ i +`" type="text" class="form-control" name="sec2_que`+ i +`" value="" placeholder="Enter question">
								
								<br>
								<select class="form-control mg-10" id="sec2_que`+ i +`_que_type" name="sec2_que`+ i +`_que_type" data-type="type">
									<option>MCQ</option>
									<option>Blank</option>
								</select>
							</div>
							<!--if question is mcq--->
							<div class="form-group col-md-4" id="sec2_que`+ i +`_option_div">
								<label for="">MCQ *</label>
								<textarea id="sec2_que`+ i +`_option" class="form-control " name="sec2_que`+ i +`_option" data-height="200" placeholder="Enter option" rows="4" cols="50"></textarea>
								
							</div>
							<div class="form-group col-md-4" id="sec2_mcq_answer_`+ i +`_div">
								<label for="">Answer*</label>
								<input id="sec2_que`+ i +`_answer_mcq" type="text" class="form-control" name="sec2_que`+ i +`_answer_mcq" value="" placeholder="Enter Answer">
								
							</div>
							<!----end mcq--->

							<!----if question is blank--->
							<div class="form-group col-md-4 d-none" id="sec2_blank_`+ i +`_div">
								<label for="">Answer*</label>
								<input id="sec2_que`+ i +`_answer_blank" type="text" class="form-control" name="sec2_que`+ i +`_answer_blank" value="" placeholder="Enter Answer">
								
							</div>
							<!----end question is blank--->
						</div>`).append( $('<button/>').addClass( 'remove btn btn-secondary' ).text( 'Remove' ) ).insertBefore($('.row.addquestion_1'));
						
						i++;
						return false;
				});

			$(document).on('click', 'button.remove', function( e ) {
				e.preventDefault();
				$(this).closest( 'div.row' ).remove();
				i--;
			});
			$('select[data-type="type"]').change(function(){
				var optionSelected = $(this).find("option:selected");
				var valueSelected  = optionSelected.val();
				if(valueSelected == "Blank"){
					alert(0);
				}
				else{
					alert(1);
				}
			})

		});

		var i2 = $('.section_two_que').length + 1;
		$(function() {
			$('#add_que_2').click(function(){
				$(`<div class="row section_two_que" id="sec2_que_`+ i2 +`">
							<!--- question one--->
							<div class="form-group col-md-4">
								<label for="field" class="">Question `+ i2 +`*</label>
								<input id="sec2_que`+ i2 +`" type="text" class="form-control" name="sec2_que`+ i2 +`" value="" placeholder="Enter question">
								
								<br>
								<select class="form-control mg-10" id="sec2_que`+ i2 +`_que_type" name="sec2_que`+ i2 +`_que_type">
									<option>MCQ</option>
									<option>Blank</option>
								</select>
							</div>
							<!--if question is mcq--->
							<div class="form-group col-md-4" id="sec2_que`+ i2 +`_option_div">
								<label for="">MCQ *</label>
								<textarea id="sec2_que`+ i2 +`_option" class="form-control " name="sec2_que`+ i2 +`_option" data-height="200" placeholder="Enter option" rows="4" cols="50"></textarea>
								
							</div>
							<div class="form-group col-md-4" id="sec2_mcq_answer_`+ i2 +`_div">
								<label for="">Answer*</label>
								<input id="sec2_que`+ i2 +`_answer_mcq" type="text" class="form-control" name="sec2_que`+ i2 +`_answer_mcq" value="" placeholder="Enter Answer">
								
							</div>
							<!----end mcq--->

							<!----if question is blank--->
							<div class="form-group col-md-4 d-none" id="sec2_blank_`+ i2 +`_div">
								<label for="">Answer*</label>
								<input id="sec2_que`+ i2 +`_answer_blank" type="text" class="form-control" name="sec2_que`+ i2 +`_answer_blank" value="" placeholder="Enter Answer">
								
							</div>
							<!----end question is blank--->
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

		var i4 = $('.section_four_que').length +1;
		$(function() {
			$('#add_que_4').click(function(){
				$(`<div class="row section_four_que" id="sec4_que_`+ i4 +`">
							<!--- question one--->
							<div class="form-group col-md-4">
								<label for="field" class="">Question `+ i4 +`*</label>
								<input id="sec4_que`+ i4 +`" type="text" class="form-control" name="sec4_que`+ i4 +`" value="" placeholder="Enter question">
								
								<br>
								<select class="form-control mg-10" id="sec4_que`+ i4 +`_que_type" name="sec4_que`+ i4 +`_que_type">
									<option>MCQ</option>
									<option>Blank</option>
								</select>
							</div>
							<!--if question is mcq--->
							<div class="form-group col-md-4" id="sec4_que`+ i4 +`_option_div">
								<label for="">MCQ *</label>
								<textarea id="sec4_que`+ i4 +`_option" class="form-control " name="sec4_que`+ i4 +`_option" data-height="200" placeholder="Enter option" rows="4" cols="50"></textarea>
								
							</div>
							<div class="form-group col-md-4" id="sec4_mcq_answer_`+ i4 +`_div">
								<label for="">Answer*</label>
								<input id="sec4_que`+ i4 +`_answer_mcq" type="text" class="form-control" name="sec4_que`+ i4 +`_answer_mcq" value="" placeholder="Enter Answer">
								
							</div>
							<!----end mcq--->

							<!----if question is blank--->
							<div class="form-group col-md-4 d-none" id="sec4_blank_`+ i4 +`_div">
								<label for="">Answer*</label>
								<input id="sec4_que`+ i4 +`_answer_blank" type="text" class="form-control" name="sec4_que`+ i4 +`_answer_blank" value="" placeholder="Enter Answer">
								
							</div>
							<!----end question is blank--->
						</div>`).append( $('<button/>').addClass( 'remove4 btn btn-secondary' ).text( 'Remove' ) ).insertBefore($('.row.addquestion_4'));
						
						i4++;
						return false;
				});
				$(document).on('click', 'button.remove4', function( e ) {
					e.preventDefault();
					$(this).closest( 'div.row' ).remove();
					i4--;
				});
		});
		

		var i3 = $('.section_three_que').length +1;
		$(function() {
			$('#add_que_3').click(function(){
			
				$(`<div class="row section_three_que" id="sec3_que_`+ i3 +`">
							<!--- question one--->
							<div class="form-group col-md-4">
								<label for="field" class="">Question `+ i3 +`*</label>
								<input id="sec4_que`+ i3 +`" type="text" class="form-control" name="sec3_que`+ i3 +`" value="" placeholder="Enter question">
								
								<br>
								<select class="form-control mg-10" id="sec3_que`+ i3 +`_que_type" name="sec3_que`+ i3 +`_que_type">
									<option>MCQ</option>
									<option>Blank</option>
								</select>
							</div>
							<!--if question is mcq--->
							<div class="form-group col-md-4" id="sec3_que`+ i3 +`_option_div">
								<label for="">MCQ *</label>
								<textarea id="sec3_que`+ i3 +`_option" class="form-control " name="sec3_que`+ i3 +`_option" data-height="200" placeholder="Enter option" rows="4" cols="50"></textarea>
								
							</div>
							<div class="form-group col-md-4" id="sec3_mcq_answer_`+ i3 +`_div">
								<label for="">Answer*</label>
								<input id="sec3_que`+ i3 +`_answer_mcq" type="text" class="form-control" name="sec3_que`+ i3+`_answer_mcq" value="" placeholder="Enter Answer">
								
							</div>
							<!----end mcq--->

							<!----if question is blank--->
							<div class="form-group col-md-4 d-none" id="sec3_blank_`+ i3 +`_div">
								<label for="">Answer*</label>
								<input id="sec3_que`+ i3 +`_answer_blank" type="text" class="form-control" name="sec3_que`+ i3 +`_answer_blank" value="" placeholder="Enter Answer">
								
							</div>
							<!----end question is blank--->
						</div>`).append( $('<button/>').addClass( 'remove3 btn btn-secondary' ).text( 'Remove' ) ).insertBefore($('.row.addquestion_3'));
						i3++;
						return false;
			});

			$(document).on('click', 'button.remove3', function( e ) {
				e.preventDefault();
				$(this).closest( 'div.row' ).remove();
				i3--;
			});
		});

   	})

</script>
@endpush