

@extends('layout')
@section('title','course')

  

@section('content')

<link rel="stylesheet" href="{{asset('css/course.css')}}">
<!-- Include Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<body>
  <section style="max-width: 100%">
  
@if(@session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div> 
@endif
@if(@session('error'))
<div class="alert alert-success">
    {{ session('error') }}
</div> 

@endif
<div style="display: flex;padding:20px; width:100%;justify-content: center " >

@if(Auth::check() && (Auth::user()->role == 'admin' || Auth::user()->role == 'B-admin') && $course->approved == false )
<button type="button"  data-toggle="modal" style="margin-right: 20px;" class="btn btn-primary" data-target="#approveModal">
    APPROVE
</button>

@endif
@if((Auth::user()->role=='student'|| Auth::user()->role=='teacher'))
</div>

@endif
@if(Auth::check() && (Auth::user()->role == 'admin' || Auth::user()->role == 'B-admin'))
   
  <form method="POST" action="{{ route('course.delete', $course->id) }}" >
        @csrf
        @method('DELETE')
        <button type="submit" style="background: darkred;"  class="btn btn-primary"  >DELETE</button>
    </form>
    <a href="/courses/{{$course['id']}}/checktest" class="btn btn-primary" style="margin-left:15px;" >check the test</a>
    
   
  </div>
    <!-- Approve Modal -->
    <div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="approveModalLabel">Approve Course</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('course.approve', $course->id) }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="price">Enter Price:</label>
                            <input type="number" name="price" id="price" class="form-control" step="10" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Approve</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif

<div style="display:flex;  background-color:lightslategrey;align-items: center ;justify-content: space-between;"  >
  <div class="Start-description">
<h1>
    {{$course['name']}}
</h1>
<p>{{$course['description']}}</p>
<p> created by : {{$course['teacher']}} </p>
@if(Auth::check() && (Auth::user()->name!=$course->teacher && Auth::user()->role != 'B-admin' && Auth::user()->role != 'admin' && !(auth::user()->isenrolled($course->id))))
<form action="{{ route('courses.enroll',['id'=>$course->id])}}" method="POST"> 
          @csrf <!-- CSRF protection --> 

          <input type="hidden" name="course_id" value="{{ $course->id }}">
        
          <button type="submit" class="btn btn-primary">Enroll</button>
</form>
@endif 
</div>
@if ($course->image)
<img style="margin:40px;border-radius: 15px;box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);width: 500px;height:250px;" src="{{ asset('storage/' . $course->image) }}" alt="">

@else
<img style="margin:40px;border-radius: 15px;box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);width: 690px;height:350px;" src="{{asset('images/bg-img.jpg')}}" alt="">
@endif
</div>

<div style="display:flex;flex-direction: column;justify-content: center;padding-left:10%;padding-bottom:30px;;background-color: #e8e4e4" >
<h2 style="margin-top: 20px " >Course Content</h2>
@foreach ($sections as $section)
    @if($section->course_id == $course->id)
    <div class="accordion" style="width: 40%;background-color: #c6c6c6; " >
        <div class="accordion-item" >
            
          <div class="accordion-title" style="background-color: darkgray;"> 
                <i class="arrow right"></i>
                <b>{{$section->name}}</b>
           </div>
           
           <div class="accordion-content">{{$section->description}}
            @foreach ($contents as $content)
          



          @if ($content->section_id == $section->id)
          <br> 
  <?php
           $videoId = 'video_' . $content->id; // Unique ID for each video
                $pdfId = 'pdf_' . $content->id;
        
          
          $f_p = null; // Initialize with null to avoid potential errors

          $files = glob('storage/' . $content->file_path . '/*');

if (count($files) === 1) {
$f_p = $files[0];

}
?>
@if ($content->file_type === 'mp4')
    <a  id="{{ $videoId }}" onclick="showVideo('{{ $videoId }}');" style="cursor: pointer;" class="video-link">{{ $content->file_name }}</a><br>
@elseif ($content->file_type === 'pdf')
    <a  id="{{ $pdfId }}" onclick="showPDF('{{ $pdfId }}');" style="cursor: pointer;" class="pdf-link">{{ $content->file_name }}</a><br>
@endif

  

 {{-- <object data="{{ asset($f_p) }}" id="pdfPlayer"  type="application/pdf" width="900" height="700">
  <p>Alternative content for users without PDF plugin</p>
</object>
</div> 

<>--}}
  <div id="videoContainer_{{ $content->id }}" style="" class="videoContainer" style="display: none;">
      <video id="videoPlayer_{{ $content->id }}" style="position: fixed; width: 80%; height: 60%; top: 50%; left: 50%; transform: translate(-50%, -50%);" width="500" height="500" controls >
          <source src="{{ asset($f_p) }}" type="video/mp4">
      </video>
  </div>
  
  <div id="pdfContainer_{{ $content->id }}" class="pdfContainer" style="display: none;">
    <!-- Embed PDF viewer here -->
    <object data="{{ asset($f_p) }}" style="position: fixed; width: 60%; height: 90%; top: 50%; left: 50%; transform: translate(-50%, -50%);" type="application/pdf" width="800" height="500">
        <p>Alternative content for users without PDF plugin</p>
    </object>
</div>
  


           @endif


            
           @endforeach
           @if (auth::user()->role =='admin'|| auth::user()->role =='B-admin' || auth::user()->name == $course->teacher )
          
           @else
           @if(!(auth::user()->isenrolled($course->id)))
           <br>
           <span style="color: rgb(140, 0, 255)" > Enroll For all Sections.</span>
  
           @break
           @endif
           @endif

        
          </div>

        </div>
      </div>
    
    @endif



@endforeach 
@if(auth::check() && auth::user()->isenrolled($course->id))
<a href="/courses/{{$course['id']}}/test" style="width: 15%;margin:10px;" >pass the test</a>
@endif
@if(Auth::check() && Auth::user()->name==$course->teacher)
<a href="/courses/add/{{$course['id']}}" class="btn btn-primary" style="width: 15%;margin:10px;" role="button">update course</a>
@endif

</div>


</section>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
   
    $(document).ready(function() {
      $(".accordion-title").click(function() {
        const accordionItem = $(this).parent();
        accordionItem.toggleClass("active");
        accordionItem.find(".accordion-content").slideToggle();
      });
    });
     </script>
     <script>
    $(document).ready(function() {
      $(".accordiontitle").click(function() {
        const accordionItem = $(this).parent();
        accordionItem.toggleClass("active");
        accordionItem.find(".accordion-content").slideToggle();
      });
    });
    </script>
    <script>

function showVideo(videoId) {
    var videoContainerId = 'videoContainer_' + videoId.split('_')[1];
    var videoContainer = document.getElementById(videoContainerId);
    if (videoContainer.style.display === 'none') {
        videoContainer.style.display = 'block';
    } else {
        videoContainer.style.display = 'none';
    }
}
window.addEventListener('click', function(event) {
    var videoContainers = document.querySelectorAll('[id^="videoContainer_"]');
    var videoLinks = document.querySelectorAll('[id^="video_"]');
    var isContentAdded = function() {
        // Add your logic to determine if content is added or not
        return false;
    };
    
    videoContainers.forEach(function(videoContainer) {
        // Check if the click is outside the video container
        if (!videoContainer.contains(event.target) && !Array.from(videoLinks).includes(event.target)) {
            var videoPlayerId = 'videoPlayer_' + videoContainer.id.split('_')[1];
            var videoPlayer = document.getElementById(videoPlayerId);
            // Check if the video player exists and if it's already playing
            if (videoPlayer && !videoPlayer.paused && !isContentAdded()) {
                videoPlayer.pause(); // Pause the video if it's playing and content is not added
            }
            videoContainer.style.display = 'none';
        }
    });
});


function isContentAdded() {

    return document.querySelectorAll('.content').length > 0;
  }

//pdf
// Function to show PDF container
function showPDF(pdfId) {
    var pdfContainerId = 'pdfContainer_' + pdfId.split('_')[1];
    var pdfContainer = document.getElementById(pdfContainerId);
    if (pdfContainer.style.display === 'none') {
        pdfContainer.style.display = 'block';
    } else {
        pdfContainer.style.display = 'none';
    }
}

// Event listener for PDF links
window.addEventListener('click', function(event) {
    var pdfContainers = document.querySelectorAll('[id^="pdfContainer_"]');
    var pdfLinks = document.querySelectorAll('[id^="pdf_"]');
    pdfContainers.forEach(function(pdfContainer) {
        if (event.target !== pdfContainer && !Array.from(pdfLinks).includes(event.target)) {
            pdfContainer.style.display = 'none';
        }
    });
});


            </script>

  
@endsection
