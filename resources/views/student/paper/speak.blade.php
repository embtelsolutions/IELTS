@extends('student.paper.layout')
@push('after-styles')

@endpush
@section('student-test')
   <div class="container paper">
       <div class="row bg-warning">
          <div class="heading text-center m-auto ">
             <h2>Sample Speaking Paper</h2>
          </div>
       </div>  
       <div class="empty-space"></div>
       <form method="post" action="{{url('writing/submit')}}">
       @csrf
       <input type="hidden" name="test_id" value="{{$test_id}}">
       @php
           $t=0;
       @endphp
       @foreach($data as $sec)
       @php
           $t++;
       @endphp
       <div id="section_1" class="sections"> 
            <div class="container row">
               <div class="col-md-6">
                  <div class="section-name text-left">
                     <h2>{{$sec->name}}</h2>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="section-timer text-right">
                     <div id="timer"><p class="timer_sec_1" data-minutes-left="1"></p></div>
                  </div>
               </div>
            </div>
            <div class="container">
               <div class="instruction p-3 mt-3 border rounded">
                  <p class="font-weight-bold">Instruction :</p>
                  <div class="empty-space-20"></div>
                  <ul class="instruction-list container"> 
                  @if($sec->instruction)
                    <?php $ins=explode(';',$sec->instruction);?>
                    @foreach($ins as $inst)
                    @if($inst)
                     <li>{{$inst}}</li>
                    @endif
                     @endforeach
                    @endif
                  </ul>
               </div>
            </div>
            <div class="questions container pt-4">
               <!--Questions-->
               <div class="row container">
                  <div class="text-left font-weight-normal">
                  <?php $que=\DB::table('questions')->where('section_id',$sec->id)->get();$i=0;?>
                    @foreach($que as $q)
                    <?php $i++; ?>
                     <h5 class="que">Discussion Topic-{{$i}}: {{$q->question}}</h5>
                    @endforeach
                    <input type="hidden" name="mod" value="{{$sec->module_id}}"> 
                     <div class="answer pt-4">
                        <label class="font-weight-normal">Answer</label>
                        <input type="hidden" name="que[]" value="{{$q->id}}">
                        <div id="controls">
                           <button id="recordButton" class="btn btn-success">Record</button>
                           <button id="pauseButton" class="btn btn-dark" disabled>Pause</button>
                           <button id="stopButton" class="btn btn-danger" disabled>Stop</button>
                         </div>
                         <br>
                         <p><strong>Recordings:</strong></p>
                         <ol id="recordingsList"></ol>
                     </div>
                  </div>
               </div>
               <div class="empty-space"></div>
               

            </div>
       </div>
       @endforeach
       
   </div>
   
   <div class="empty-space"></div>
   <div class="bg-light border container d-block p-2 pagination">
      <div class="row container">
         <div id="pagination-container" class="col-md-10">
         </div>
         <div id="" class="col-md-2">
            <input type="submit" name="submit_btn" class="submit_btn rounded" value="Submit">
         </div>
      </div>
      
   </div>
   <div class="empty-space"></div>
   <script src="https://cdn.rawgit.com/mattdiamond/Recorderjs/08e7abd9/dist/recorder.js"></script>
   <script src="{{asset('ielts-assets/recording/js/app.js')}}"></script>
@endsection
@push('before-scripts')

<script>
   $(document).ready(function(){
  
      $('.timer_sec_1').startTimer({
               onComplete: function(){
               $('.answer_1').attr('readonly', true) ;
                  if(parent.location.hash ="#page_2"){
                     $('.timer_sec_2').startTimer({
                        onComplete: function(){ $('.answer_2').attr('readonly', true)  }
                     })
                  }
                  
               }
            });
      

    var items = $(".sections");
    var numItems = items.length;
    var perPage = 1;

    items.slice(perPage).hide();

    $('#pagination-container').pagination({
        items: numItems,
        itemsOnPage: perPage,
        prevText: "&laquo;",
        nextText: "&raquo;",
        onPageClick: function (pageNumber) {
            var showFrom = perPage * (pageNumber - 1);
            var showTo = showFrom + perPage;
            items.hide().slice(showFrom, showTo).show();
        }
    });
   })
</script>
@endpush
