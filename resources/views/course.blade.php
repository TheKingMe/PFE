

@extends('layout')
@section('title','course')

  

@section('content')
<style>
  .accordion {
  width: 100%;
}

.accordion-item {
  border: 1px solid #fff;
  margin-bottom: 10px;
}
.accordionitem {
  margin-bottom: 10px;
}

.accordion-title {
  background-color: #fff;
  padding: 10px;
  cursor: pointer;
}
.accordiontitle {
  padding: 10px;
  cursor: pointer;
}

.accordion-content {
  display: none;
  padding: 10px;
}

.accordion-item.active .accordion-title {
  background-color: #fff;
  color: royalblue;
}
.accordionitem.active .accordiontitle {
  color: black;
}

/* ... Existing styles ... */

.arrow {
  border: solid rgb(0, 0, 0);
  border-width: 0 3px 3px 0;
  display: inline-block;
  padding: 3px;
}
.right {
  transform: rotate(-45deg);
  -webkit-transform: rotate(-45deg);
}
 .accordion-item.active .arrow {
  transform: rotate(45deg);
} 
 
 .accordionitem.active .arrow {
  transform: rotate(45deg);
}




#videoContainer {
position: absolute;
top: 50%;
left: 50%;
transform: translate(-50%, -50%);
z-index: 9999; /* Adjust this if necessary to make the video appear above other content */
}

#videoPlayer {
width: 800px; /* Adjust width as desired */
height: 500px; /* Adjust height as desired */
}
#pdfoContainer {
position: absolute;
top: 50%;
left: 50%;
transform: translate(-50%, -50%);
z-index: 9999; /* Adjust this if necessary to make the video appear above other content */
}

#pdfPlayer {
width: 800px; /* Adjust width as desired */
height: 500px; /* Adjust height as desired */
}

</style>
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


@if(Auth::check() && Auth::user()->role == 'admin' && $course->approved == false)
<div style="display: flex;padding:20px;" >
    <form method="POST" action="{{ route('course.delete', $course->id) }}" >
        @csrf
        @method('DELETE')
        <button type="submit"  class="btn btn-primary" style="margin-right: 20px; " >DELETE</button>
    </form>

    <!-- Approve Button triggers modal -->
    <button type="button"  data-toggle="modal" class="btn btn-primary" data-target="#approveModal">
        APPROVE
    </button>
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
<style>
  .Start-description{
    display: flex;
    flex-direction: column;
    width: 100%;
    height: 100%;
    padding: 5%;
    background-color:lightslategrey;
  }
</style>
<div style="display:flex;  background-color:lightslategrey;align-items: center ;justify-content: space-between;"  >
  <div class="Start-description">
<h1>
    {{$course['name']}}
</h1>
<p>{{$course['description']}}</p>
<p> created by : {{$course['teacher']}} </p>
@if(Auth::check() && Auth::user()->name!=$course->teacher)
<form action="{{ route('courses.enroll',['id'=>$course->id])}}" method="POST">
          @csrf <!-- CSRF protection -->  
          <input type="hidden" name="course_id" value="{{ $course->id }}">
          <button type="submit" class="btn btn-primary">Enroll</button>
</form>
@endif 
</div>
@if ($course->image)
<img style="margin:40px;border-radius: 15px;box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);width: 35%;height:20%;" src="{{ asset('storage/' . $course->image) }}" alt="">

@else
<img style="margin:40px;border-radius: 15px;box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);width: 35%;height:20%;" src="{{asset('images/bg-img.jpg')}}" alt="">
@endif
</div>

<div style="display:flex;flex-direction: column;justify-content: center;padding-left:10%;padding-bottom:30px;;background-color: #e8e4e4" >
<h2 style="margin-top: 20px " >Course Content </h2>
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
    <a href="#" id="{{ $videoId }}" onclick="showVideo('{{ $videoId }}');" class="video-link">{{ $content->file_name }}</a><br>
@elseif ($content->file_type === 'pdf')
    <a href="#" id="{{ $pdfId }}" onclick="showPDF('{{ $pdfId }}');" class="pdf-link">{{ $content->file_name }}</a><br>
@endif

  

 {{-- <object data="{{ asset($f_p) }}" id="pdfPlayer"  type="application/pdf" width="900" height="700">
  <p>Alternative content for users without PDF plugin</p>
</object>
</div> 

<>--}}
  <div id="videoContainer_{{ $content->id }}" class="videoContainer" style="display: none;">
      <video id="videoPlayer_{{ $content->id }}" width="500" height="500" controls >
          <source src="{{ asset($f_p) }}" type="video/mp4">
      </video>
  </div>
  
  <div id="pdfContainer_{{ $content->id }}" class="pdfContainer" style="display: none;">
    <!-- Embed PDF viewer here -->
    <object data="{{ asset($f_p) }}" type="application/pdf" width="800" height="500">
        <p>Alternative content for users without PDF plugin</p>
    </object>
</div>
  


           @endif


            @endif
           @endforeach
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
    videoContainers.forEach(function(videoContainer) {
        if (event.target !== videoContainer && !Array.from(videoLinks).includes(event.target)) {
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
