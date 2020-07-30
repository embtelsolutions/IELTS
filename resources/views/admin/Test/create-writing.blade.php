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
<<<<<<< HEAD
			<form action="{{route('writing')}}" method="post">
=======
			<form action="{{route('writing')}}" method="post" enctype="multipart/form-data">
>>>>>>> 1e065d4b0c1bd0a1eb7fe78c0a490462d88646cb
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
<script>
	// $(document).ready(function(){

	// 	var i = $('.section_one_que').length +1;
	// 	var apend_div = `<div class="form-group col-md-10">
	// 							<button class="remove btn btn-secondary">Remove</button>
	// 						</div>
	// 		`;
	// 	$(function() {
	// 		$('#add_que_1').click(function(){
	// 			$(`<div class="row section_one_que" id="sec_que_`+ i +`">
	// 						<!--- question one--->
	// 						<div class="form-group col-md-6">
	// 							<label for="field" class="">Question `+ i +`*</label>
	// 							<textarea id="sec2_que`+ i +`" type="text" class="form-control" name="sec2_que`+ i +`" value="" placeholder="Enter question"></textarea>
								
	// 						</div>

	// 					</div>`).append( apend_div ).insertBefore($('.row.addquestion_1'));
						
	// 					i++;
	// 					return false;
	// 			});

	// 		$(document).on('click', 'button.remove', function( e ) {
	// 			e.preventDefault();
	// 			$(this).closest( 'div.row' ).remove();
	// 			i--;
	// 		});
	// 		$('select[data-type="type"]').change(function(){
	// 			var optionSelected = $(this).find("option:selected");
	// 			var valueSelected  = optionSelected.val();
	// 			if(valueSelected == "Blank"){
	// 				alert(0);
	// 			}
	// 			else{
	// 				alert(1);
	// 			}
	// 		})

	// 	});

	// 	var i2 = $('.section_two_que').length + 1;
	// 	var apend_div_2 = `<div class="form-group col-md-10">
	// 							<button class="remove2 btn btn-secondary">Remove</button>
	// 						</div>
	// 		`;
	// 	$(function() {
	// 		$('#add_que_2').click(function(){
	// 			$(`<div class="row section_two_que" id="sec2_que_`+ i2 +`">
	// 						<!--- question one--->
	// 						<div class="form-group col-md-6">
	// 							<label for="field" class="">Question `+ i2 +`*</label>
	// 							<textarea id="sec2_que`+ i2 +`"  class="form-control" name="sec2_que`+ i2 +`" value="" placeholder="Enter question"></textarea>
	// 						</div>
							
	// 					</div>`).append( apend_div_2 ).insertBefore($('.row.addquestion_2'));
	// 					i2++;
	// 					return false;
	// 			});

	// 		$(document).on('click', 'button.remove2', function( e ) {
	// 			e.preventDefault();
	// 			$(this).closest( 'div.row' ).remove();
	// 			i2--;
	// 		});

	// 	});

	// 	var i4 = $('.section_four_que').length +1;
	// 	var apend_div_4 = `<div class="form-group col-md-10">
	// 							<button class="remove4 btn btn-secondary">Remove</button>
	// 						</div>
	// 		`;
	// 	$(function() {
	// 		$('#add_que_4').click(function(){
	// 			$(`<div class="row section_four_que" id="sec4_que_`+ i4 +`">
	// 						<!--- question one--->
	// 						<div class="form-group col-md-6">
	// 							<label for="field" class="">Question `+ i4 +`*</label>
	// 							<textarea id="sec4_que`+ i4 +`" class="form-control" name="sec4_que`+ i4 +`" placeholder="Enter question"></textarea>
								
	// 							<br>
	// 						</div>
							
	// 					</div>`).append( apend_div_4 ).insertBefore($('.row.addquestion_4'));
						
	// 					i4++;
	// 					return false;
	// 			});
	// 			$(document).on('click', 'button.remove4', function( e ) {
	// 				e.preventDefault();
	// 				$(this).closest( 'div.row' ).remove();
	// 				i4--;
	// 			});
	// 	});
		

	// 	var i3 = $('.section_three_que').length +1;
	// 	var apend_div_3 = `<div class="form-group col-md-10">
	// 							<button class="remove3 btn btn-secondary">Remove</button>
	// 						</div>
	// 		`;
	// 	$(function() {
	// 		$('#add_que_3').click(function(){
			
	// 			$(`<div class="row section_three_que" id="sec3_que_`+ i3 +`">
	// 						<!--- question one--->
	// 						<div class="form-group col-md-6">
	// 							<label for="field" class="">Question `+ i3 +`*</label>
	// 							<textarea id="sec4_que`+ i3 +`" class="form-control" name="sec3_que`+ i3 +`" value="" placeholder="Enter question"></textarea>
								
	// 						</div>
	// 						<!----end question is blank--->
	// 					</div>`).append( apend_div_3 ).insertBefore($('.row.addquestion_3'));
	// 					i3++;
	// 					return false;
	// 		});

	// 		$(document).on('click', 'button.remove3', function( e ) {
	// 			e.preventDefault();
	// 			$(this).closest( 'div.row' ).remove();
	// 			i3--;
	// 		});
	// 	});

   	// })

</script>

@endpush