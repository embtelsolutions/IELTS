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
       <div id="section_1" class="sections"> 
            <div class="container row">
               <div class="col-md-6">
                  <div class="section-name text-left">
                     <h2>Section 1: Discussion Topic 1 - 2 </h2>
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
                     <li>You should spent about 10 min in this task</li>
                     <li>Write atleast 150 Word</li>
                  </ul>
               </div>
            </div>
            <div class="questions container pt-4">
               <!--Questions-->
               <div class="row container">
                  <div class="text-left font-weight-normal">
                     <h5 class="que">Discussion Topic-1: The Two maps below show an island, before and after the construction of some tourist facilities. Summerise the information by selecting and reporting the main features, and make comparisons where relvant</h5>
                     <div class="answer pt-4">
                        <label class="font-weight-normal">Answer</label>
                        <div id="controls">
                           <button id="recordButton" class="btn btn-success">Record</button>
                           <button id="pauseButton" class="btn btn-dark" disabled>Pause</button>
                           <button id="stopButton" class="btn btn-danger" >Stop</button>
                         </div>
                         <br>
                         <p><strong>Recordings:</strong></p>
                         <audio id=recordedAudio></audio>
      
                         <ol id="recordingsList"></ol>
                     </div>
                  </div>
               </div>
               <div class="empty-space"></div>
               <div class="row container">
                  <div class="text-left font-weight-normal">
                     <h5 class="que">Discussion Topic-2: The Two maps below show an island, before and after the construction of some tourist facilities</h5>
                     <div class="answer pt-4">
                        <label class="font-weight-normal">Answer</label>
                        {{-- <div id="controls">
                           <button id="recordButton" class="btn btn-success">Record</button>
                           <button id="pauseButton" class="btn btn-dark" disabled>Pause</button>
                           <button id="stopButton" class="btn btn-danger" >Stop</button>
                         </div> --}}
                         <br>

                         <p><strong>Recordings:</strong></p>
                         <ol id="recordingsList_2"></ol>
                     </div>
                  </div>
               </div>

            </div>
       </div>
       <div id="section_2" class="sections"> 
         <div class="container row">
            <div class="col-md-6">
               <div class="section-name text-left">
                  <h2>Section 2: Discussion Topic 1 - 2</h2>
               </div>
            </div>
            <div class="col-md-6">
               <div class="section-timer text-right">
                     <div id="timer"><p class="timer_sec_2" data-minutes-left="1"></p></div>
               </div>
            </div>
         </div>
         <div class="container">
            <div class="instruction p-3 mt-3 border rounded">
               <p class="font-weight-bold">Instruction :</p>
               <div class="empty-space-20"></div>
               <ul class="instruction-list container"> 
                  <li>You should spent about 20 min in this task</li>
                  <li>Write atleast 150 Word</li>
               </ul>
            </div>
         </div>
         
         <div class="questions container pt-4">
            <!--Questions-->
            <div class="row container">
               <div class="text-left font-weight-normal">
                  <h5 class="que">Discussion Topic-1: The Two maps below show an island, before and after the construction of some tourist facilities. Summerise the information by selecting and reporting the main features, and make comparisons where relvant</h5>
                  <div class="answer pt-4">
                     <label class="font-weight-normal">Answer</label>
                     {{-- <div id="controls">
                        <button id="recordButton" class="btn btn-success">Record</button>
                        <button id="pauseButton" class="btn btn-dark" disabled>Pause</button>
                        <button id="stopButton" class="btn btn-danger" disabled>Stop</button>
                      </div> --}}
                      <br>

                      <p><strong>Recordings:</strong></p>
                      <ol id="recordingsList_3"></ol>
                  </div>
               </div>
            </div>
            <div class="empty-space"></div>
            <div class="row container">
               <div class="text-left font-weight-normal">
                  <h5 class="que">Discussion Topic-2: The Two maps below show an island, before and after the construction of some tourist facilities</h5>
                  <div class="answer pt-4">
                     <label class="font-weight-normal">Answer</label>
                     {{-- <div id="controls">
                        <button id="recordButton" class="btn btn-success">Record</button>
                        <button id="pauseButton" class="btn btn-dark" disabled>Pause</button>
                        <button id="stopButton" class="btn btn-danger" disabled>Stop</button>
                      </div> --}}
                      <br>

                      <p><strong>Recordings:</strong></p>
                      <ol id="recordingsList_4"></ol>
                  </div>
               </div>
            </div>

         </div>
      </div>
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
   {{-- <script src="https://cdn.rawgit.com/mattdiamond/Recorderjs/08e7abd9/dist/recorder.js"></script>
   <script src="{{asset('ielts-assets/recording/js/app.js')}}"></script> --}}
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

    //record audio
    navigator.mediaDevices.getUserMedia({audio:true})
      .then(stream => {handlerFunction(stream)})
            function handlerFunction(stream) {
            rec = new MediaRecorder(stream);
            rec.ondataavailable = e => {
              audioChunks.push(e.data);
              if (rec.state == "inactive"){
                let blob = new Blob(audioChunks,{type:'audio/mpeg-3'});
                recordedAudio.src = URL.createObjectURL(blob);
                recordedAudio.controls=true;
                recordedAudio.autoplay=true;
                sendData(blob)
              }
            }
          }
      function sendData(data) {}
        $('#recordButton').click(function(e){
           var record  = $(this);
           var stopRecord = $('#stopButton');
          console.log('I was clicked')
          record.disabled = true;
          stopRecord.disabled=false;
          audioChunks = [];
          rec.start();
        })
        $('#stopButton').click(function(e){
         var record  =$('#recordButton');
         var stopRecord =   $(this);;
          console.log("I was clicked")
          record.disabled = false;
          stop.disabled=true;
          rec.stop();
        })
   })
</script>
@endpush
