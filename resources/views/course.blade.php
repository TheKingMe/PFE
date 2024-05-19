@extends('layout')
@section('title','course')

@section('content')
@if(Auth::check() && Auth::user()->role == 'admin' && $course->approved==false)
  <form method='post' action="{{route('course.delete',$course->id)}}">
@csrf
@method('DELETE')
<button type="submit" >DELETE</button>
</form> 
<form method='post' action="{{route('course.approve',$course->id)}}">
@csrf
<button type="submit" >APPROVE</button>
</form>  

@endif

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
{{-- 
<h1>
    {{$course['name']}}
</h1>
<p>{{$course['description']}}</p>
created by : {{$course['teacher']}}
<h2>Course Content </h2>
@foreach ($sections as $section)
    @if($section->course_id == $course->id)
    <div class="accordion" style="width: 40%;" >
        <div class="accordion-item" >
            
          <div class="accordion-title" style="background-color: darkgray;"> 
                <i class="arrow right"></i>
                <b>{{$section->name}}</b>
           </div>
           
           <div class="accordion-content">{{$section->description}}
           {-- @foreach ($contents as $content)
          
            @if ($content->section_id == $section->id)



          @if ($content->section_id == $section->id)
          <br> <a href="#" id="showVideoLink" data-content-id="{{ $content->id }}" onclick="vedio();" class="video-link">{{ $content->file_name }}</a><br>
          <?php
          
//           $f_p = null; // Initialize with null to avoid potential errors

//           $files = glob('storage/' . $content->file_path . '/*');

// if (count($files) === 1) {
// $f_p = $files[0];

// $parts = explode('.', $content->file_path );
// $end = end($parts);

// }
?>  

<div id="videoContainer " style="display: none;" >
 {{-- <object data="{{ asset($f_p) }}" id="pdfPlayer"  type="application/pdf" width="900" height="700">
  <p>Alternative content for users without PDF plugin</p>
</object>
</div> 


<div>--}}
  {{-- <video id="videoPlayer_{{ $content->id }}" width="200" height="200" controls autoplay>
<source src="{{asset($f_p)}}" type="video/mp4">
</video>  
</div> --}}

          {{-- @endif


            @endif
           @endforeach
        </div>
      

        </div>
        
    </div>
    @endif



@endforeach --}}



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
   
//     $(document).ready(function() {
//       $(".accordion-title").click(function() {
//         const accordionItem = $(this).parent();
//         accordionItem.toggleClass("active");
//         accordionItem.find(".accordion-content").slideToggle();
//       });
//     });
//     </script>
//     <script>
//     $(document).ready(function() {
//       $(".accordiontitle").click(function() {
//         const accordionItem = $(this).parent();
//         accordionItem.toggleClass("active");
//         accordionItem.find(".accordion-content").slideToggle();
//       });
//     });
//     </script>
//     <script>
//     //  function vedio(){
//     //     var videoContainer = document.getElementById('videoContainer');
//     //     if (videoContainer.style.display === 'none') {
//     //       videoContainer.style.display = 'block';
//     //     } else {
//     //       videoContainer.style.display = 'none';
//     //     }
//     // }
//     function vedio() {
//   // Get the clicked element
//   const clickedElement = event.target;

//   // Check if it's a video link
//   if (!clickedElement.classList.contains('video-link')) {
//     return;
//   }

//   // Get the content ID from the data attribute
//   const contentId = clickedElement.dataset.contentId;

//   // Get the video container for this content
//   const videoContainer = document.getElementById(`videoContainer_${contentId}`);

//   // Toggle visibility of the video container
//   if (videoContainer.style.display === 'none') {
//     videoContainer.style.display = 'block';
//   } else {
//     videoContainer.style.display = 'none';
//   }
// }

// // Attach event listener to the document for click events
// document.addEventListener('click', vedio);

//       function vedioW(){
//         var videoContainer = document.getElementById('videoContainer');
//         var showVideoLink = document.getElementById('showVideoLink');
//         if (event.target !== videoContainer && event.target !== showVideoLink) {
//           videoContainer.style.display = 'none';
//         }
//             }      
            </script>
      
@endsection
