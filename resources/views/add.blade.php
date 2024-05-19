
@extends('layout')
@section('content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="./css/Style.css">
<style>




/*delete button here*/

.button-delete {
  --background: #362a89;
  --background-hover: #291f6e;
  --text: #fff;
  --icon: #fff;
  display: -webkit-box;
  display: flex;
  outline: none;
  cursor: pointer;
  border: 0;
  min-width: 113px;
  padding: 9px 20px 9px 12px;
  border-radius: 11px;
  line-height: 24px;
  font-family: inherit;
  font-weight: 600;
  font-size: 14px;
  overflow: hidden;
  color: var(--text);
  background: var(--b, var(--background));
  -webkit-transition: background 0.4s, -webkit-transform 0.3s;
  transition: background 0.4s, -webkit-transform 0.3s;
  transition: transform 0.3s, background 0.4s;
  transition: transform 0.3s, background 0.4s, -webkit-transform 0.3s;
  -webkit-transform: scale(var(--scale, 1)) translateZ(0);
  transform: scale(var(--scale, 1)) translateZ(0);
  -webkit-appearance: none;
  -webkit-tap-highlight-color: transparent;
  -webkit-mask-image: -webkit-radial-gradient(white, black);
}
.button-delete:active {
  --scale: 0.95;
}
.button-delete:hover {
  --b: var(--background-hover);
}
.button-delete .icon,
.button-delete span {
  display: inline-block;
  vertical-align: top;
  -webkit-transform: translateZ(0);
  transform: translateZ(0);
}
.button-delete .icon {
  width: 24px;
  height: 24px;
  position: relative;
  z-index: 1;
  margin-right: 8px;
  color: var(--text);
}
.button-delete .icon svg {
  width: 96px;
  height: 96px;
  display: block;
  position: absolute;
  left: -36px;
  top: -36px;
  will-change: transform;
  fill: var(--icon);
  -webkit-transform: scale(0.254) translateZ(0);
  transform: scale(0.254) translateZ(0);
  -webkit-animation: var(--name, var(--name-top, none)) 2200ms ease forwards;
  animation: var(--name, var(--name-top, none)) 2200ms ease forwards;
}
.button-delete .icon svg.bottom {
  --name: var(--name-bottom, none);
}
.button-delete span {
  -webkit-animation: var(--name-text, none) 2200ms ease forwards;
  animation: var(--name-text, none) 2200ms ease forwards;
}
.button-delete.delete {
  --name-top: trash-top;
  --name-bottom: trash-bottom;
  --name-text: text;
}

@-webkit-keyframes trash-bottom {
  25%,
  32% {
    -webkit-transform: translate(32px, 19px) scale(1) translateZ(0);
    transform: translate(32px, 19px) scale(1) translateZ(0);
  }
  70%,
  80% {
    -webkit-transform: translate(32px, 0) scale(0.254) translateZ(0);
    transform: translate(32px, 0) scale(0.254) translateZ(0);
  }
  100% {
    -webkit-transform: scale(0.254) translateZ(0);
    transform: scale(0.254) translateZ(0);
  }
}

@keyframes trash-bottom {
  25%,
  32% {
    -webkit-transform: translate(32px, 19px) scale(1) translateZ(0);
    transform: translate(32px, 19px) scale(1) translateZ(0);
  }
  70%,
  80% {
    -webkit-transform: translate(32px, 0) scale(0.254) translateZ(0);
    transform: translate(32px, 0) scale(0.254) translateZ(0);
  }
  100% {
    -webkit-transform: scale(0.254) translateZ(0);
    transform: scale(0.254) translateZ(0);
  }
}
@-webkit-keyframes trash-top {
  25%,
  32% {
    -webkit-transform: translate(38px, 4px) scale(1) rotate(-20deg)
      translateZ(0);
    transform: translate(38px, 4px) scale(1) rotate(-20deg) translateZ(0);
  }
  70%,
  80% {
    -webkit-transform: translate(32px, 0) scale(0.254) translateZ(0);
    transform: translate(32px, 0) scale(0.254) translateZ(0);
  }
  100% {
    -webkit-transform: scale(0.254) translateZ(0);
    transform: scale(0.254) translateZ(0);
  }
}
@keyframes trash-top {
  25%,
  32% {
    -webkit-transform: translate(38px, 4px) scale(1) rotate(-20deg)
      translateZ(0);
    transform: translate(38px, 4px) scale(1) rotate(-20deg) translateZ(0);
  }
  70%,
  80% {
    -webkit-transform: translate(32px, 0) scale(0.254) translateZ(0);
    transform: translate(32px, 0) scale(0.254) translateZ(0);
  }
  100% {
    -webkit-transform: scale(0.254) translateZ(0);
    transform: scale(0.254) translateZ(0);
  }
}
@-webkit-keyframes text {
  25% {
    -webkit-transform: translate(-4px, -4px) rotate(-20deg) translateZ(0);
    transform: translate(-4px, -4px) rotate(-20deg) translateZ(0);
  }
  70% {
    opacity: 1;
    -webkit-transform: translate(-12px, 48px) rotate(-80deg) scale(0.2)
      translateZ(0);
    transform: translate(-12px, 48px) rotate(-80deg) scale(0.2) translateZ(0);
  }
  71% {
    opacity: 0;
  }
  72%,
  90% {
    opacity: 0;
    -webkit-transform: translateZ(0);
    transform: translateZ(0);
  }
  100% {
    opacity: 1;
  }
}
@keyframes text {
  25% {
    -webkit-transform: translate(-4px, -4px) rotate(-20deg) translateZ(0);
    transform: translate(-4px, -4px) rotate(-20deg) translateZ(0);
  }
  70% {
    opacity: 1;
    -webkit-transform: translate(-12px, 48px) rotate(-80deg) scale(0.2)
      translateZ(0);
    transform: translate(-12px, 48px) rotate(-80deg) scale(0.2) translateZ(0);
  }
  71% {
    opacity: 0;
  }
  72%,
  90% {
    opacity: 0;
    -webkit-transform: translateZ(0);
    transform: translateZ(0);
  }
  100% {
    opacity: 1;
  }
}









  /* Style for modal backdrop not used */
.modal-backdrop {
    background-color: rgba(0, 0, 0, 0.5); /* semi-transparent black */
}

/* Style for modal content */
.modal-content {
    background-color: #fff; /* white background */
    border-radius: 10px; /* rounded corners */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* shadow effect */
    width: 100%;
    height: 1000%;
    margin: 0 auto;
}

/* Style for modal header  */
.modal-header {
    background-color: #f0f0f0; /* light gray */
    border-bottom: 1px solid #ddd; /* gray border */
    padding: 15px; /* padding */
    border-top-left-radius: 10px; /* rounded corners */
    border-top-right-radius: 10px; /* rounded corners */
}

/* Style for modal title */
.modal-title {
    margin: 0; /* remove default margin */
}

/* Style for modal body */
.modal-body {
    padding: 15px; /* padding */
}

/* Style for modal footer */
.modal-footer {
    background-color: #f0f0f0; /* light gray */
    border-top: 1px solid #ddd; /* gray border */
    padding: 15px; /* padding */
    border-bottom-left-radius: 10px; /* rounded corners */
    border-bottom-right-radius: 10px; /* rounded corners */
}

/* Style for close button */
.btn-close {
    color: #000; /* black color */
}

/* Style for close button hover state */
.btn-close:hover {
    color: #333; /* dark gray color */
}

</style>

<style>

  .container-button {
          max-width: 100%;
          height: 5vh;
          display: flex;
          justify-content: end;
          align-items: center;
      }
  
      
  .section h2 {
      text-align: center;
      margin: 0; /* Remove default margin */
  }
  .form-select {
    width: auto; /* Adjust width as needed */
    display: inline-block; /* Display inline */
    margin-right: 10px; /* Adjust margin as needed */
  }
  /* Modal styles */
  /* .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.5);
  }
  
  .modal-content {
      background-color: #fefefe;
      margin: 15% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 40%;
  } */
  
  .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
  }
  
  .close:hover,
  .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
  }
  
  /* Section styles */
  .section {
      background-color:#808080; /* Blue background color */
      color: #fff; /* White text color */
      padding: 10px;
      margin-bottom: 10px;
      cursor: pointer;
      width: 800px;
      margin: 0 auto;  
  }
  
  .section:hover {
      background-color: #007bff; /* Darker blue on hover */
  }
  
  .section-content {
      display: none; /* Initially hidden */
  }
  
  .section.expanded .section-content {
      display: block; /* Display when expanded */
  }
  </style>

<style>
  
    .button-update {
    background-color: #4CAF50; /* Green color */
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 4px; /* Rounded corners */
  }
  
  .button-update:hover {
    background-color: #45a049; /* Green hover color */
  }
  
  .button-edit {
    background-color: royalblue; /* Green color */
    border: 2px solid #fff; /* White border */
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 4px; /* Rounded corners */
  }
  
  .button-edit:hover {
    background-color: royalblue; /* Green hover color */
  }
  
  
 
  
  
    .dashboard {
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 10px;
    width: 800px; /* adjust as needed */
    margin: 0 auto; /* centers the dashboard */
  }
  
  table {
    width: 100%;
    border-collapse: collapse;
  }
  
  th,
  td {
    text-align: left;
    padding: 8px;
    border: 1px solid #ddd;
  }
  
  th {
    background-color: #f2f2f2;
    font-weight: bold;
  }
  
  td:nth-child(1),
  td:nth-child(2) {
    width: 20%; /* adjust as needed */
  }
  
  td:nth-child(3) {
    width: 20%; /* adjust as needed */
  }
  
  td:nth-child(4) {
    width: 20%; /* adjust as needed */
  }
  
  a {
    color: #333;
    text-decoration: none;
    padding: 5px 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    margin: 5px;
  }
  
  a:hover {
    background-color: #eee;
  }
  
  
  
    
  .btn-logout {
    padding: 0.5rem 1rem;
    background-color: #f56565;
    color: white;
    border: none;
    border-radius: 0.25rem;
    transition: background-color 0.3s ease, color 0.3s ease;
    cursor: pointer;
  }
  
  .btn-logout:hover {
    background-color: #e53e3e;
  }
  
  /* Custom styles */
  .dark {
    background-color: #1a202c;
    color: #fff;
  }
  
  .container {
    font-family: 'Arial', sans-serif;
  }
  
  .table-auto {
    border-collapse: collapse;
  }
  
  .table-auto th,
  .table-auto td {
    border: 1px solid #e2e8f0;
  }
  
  .table-auto th {
    background-color: #edf2f7;
  }
  
  .table-dark th {
    background-color: #2d3748;
    color: #fff;
  }
  
  .btn {
    padding: 0.5rem 1rem;
    border: none;
    border-radius: 0.25rem;
    transition: background-color 0.3s ease, color 0.3s ease;
    cursor: pointer;
    display: inline-block;
    font-weight: bold;
    margin-bottom: 0.5rem; /* Add margin for spacing between buttons */
  }
  
  .btn:hover {
    opacity: 0.9;
  }
  
  .btn-edit {
    background-color: #4299e1;
    color: white;
  }
  
  .btn-delete {
    background-color: #f56565;
    color: white;
  }
  
  .btn-update {
    background-color: #48bb78;
    color: white;
  }
  
  .theme-toggle {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-weight: bold;
    cursor: pointer;
  }
  
  .theme-toggle input[type="checkbox"] {
    appearance: none;
    width: 2rem;
    height: 1rem;
    background-color: #e2e8f0;
    border-radius: 0.5rem;
    position: relative;
  }
  
  .theme-toggle input[type="checkbox"]:checked {
    background-color: #4299e1;
  }
  
  .theme-toggle input[type="checkbox"]::before {
    content: '';
    position: absolute;
    width: 1rem;
    height: 1rem;
    background-color: #fff;
    border-radius: 50%;
    transform: translateX(0.15rem);
    transition: transform 0.3s ease;
  }
  
  .theme-toggle input[type="checkbox"]:checked::before {
    transform: translateX(1rem);
  }
  
  .pill {
    display: inline-block;
    padding: 0.25rem 0.75rem;
    border-radius: 9999px;
    font-size: 0.8rem;
    font-weight: bold;
  }
  
  </style>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
        var editSectionNam = document.getElementById("editSectionNam");
        var modal2 = document.getElementById("modal2");
    
        if (editSectionNam && modal2) {
            editSectionNam.addEventListener('click', function(){
                modal2.style.display = "block"; // Display the modal when "Edit" button is clicked
            });
        } else {
            console.error("editSectionNam or modal2 element not found.");
        }
    });
    </script>
  <style>
 .modal2{
  display: none; /* Hide the modal by default */
    position: fixed; /* Position the modal relative to the viewport */
    top: 50%; /* Center the modal vertically */
    left: 50%; /* Center the modal horizontally */
    width: 50%;
    height: 76%;
    transform: translate(-50%, -50%); /* Center the modal precisely */
    background-color: #f9f9f9; /* Background color */
    border: 1px solid #ccc; /* Border */
    border-radius: 5px; /* Rounded corners */
    z-index: 1000; /* Ensure modal is above other content */
    flex-direction: column; /* Stack children vertically */
    align-items: flex-start; /* Align children to the start */
     }   
.modall {
    display: none; /* Hide the modal by default */
    position: fixed; /* Position the modal relative to the viewport */
    top: 50%; /* Center the modal vertically */
    left: 50%; /* Center the modal horizontally */
    width: 50%;
    height: 76%;
    transform: translate(-50%, -50%); /* Center the modal precisely */
    background-color: #f9f9f9; /* Background color */
    border: 1px solid #ccc; /* Border */
    border-radius: 5px; /* Rounded corners */
    z-index: 1000; /* Ensure modal is above other content */
    flex-direction: column; /* Stack children vertically */
    align-items: flex-start; /* Align children to the start */
    
}

.modal-content {
    max-width: 100%; /* Set maximum width for the modal content */
    margin: 0 auto; /* Center the modal content horizontally */
    flex-grow: 1; /* Allow content to grow to fill remaining space */
}

.closee {
    cursor: pointer; /* Change cursor to pointer */
    font-size: 20px; /* Set font size */
    align-self: flex-end; /* Align the close button to the end */
}

.closee:hover {
    color: #f00; /* Change color on hover */
}

    .modal-content {
    border: 1px solid #ced4da; /* Border color */
    border-radius: 5px; /* Rounded corners */
    max-width: 100%; /* Maximum width of the form */
    max-height: 100%;
    margin: 0 auto; /* Center the form horizontally */
}

.closee {

    color: #495057; /* Close button color */
}

.closee:hover {
    color: #007bff; /* Close button color on hover */
}

label {
    font-weight: bold; /* Make labels bold */
    color: #343a40; /* Label text color */
}

input[type="text"],
textarea,
input[type="file"],
button[type="submit"] {
    /* width: 100%; Full width */
    /* padding: 8px; Padding
    /* margin-bottom: 10px; Add space between elements */
    border: 1px solid #ced4da; /* Border color */
    border-radius: 3px; /* Rounded corners */
    box-sizing: border-box; Include padding and border in width */
}

input[type="file"] {
    padding: 6px; /* Adjust padding for file input */
}

button[type="submit"] {
    /* background-color: #007bff; /* Button background color */
    color: #fff; /* Button text color */
    border: none; /* Remove border */
    cursor: pointer; /* Change cursor to pointer */
    transition: background-color 0.3s; Smooth transition for background color */
}

button[type="submit"]:hover {
    background-color: #0056b3; /* Button background color on hover */
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


</style>

<section class="container" style="height: 93vh">

{{-- <select id="myselect" class="form-select form-select-sm" aria-label="Default select example">
  <option selected disabled>Add Content</option>
  <option value="1">Add Section</option>
  <option value="2">Add Quiz</option>
</select> --}}

<div class="container-button" style="height:10vh" >
    <input type="button" id="addSectionBtn" class="button-update" style="margin-right: 10px" value="Add Section">
    <input type="button" class="button-edit" value="Add Quiz">
</div>
<div class="bg-gray-900">
    <div class="container mx-auto p-6 flex items-center justify-between ">
      <h2 class="text-2xl font-semibold">Courses Table</h2>
     
    </div>
  </div> 
<div id="myModal" class="modall">
    <form method="POST" action="{{route('Add.store')}}" class="modal-content" enctype="multipart/form-data">
        @csrf
        
        <span class="closee" id="spanid">&times;</span> <!-- Close button at the end -->
        <label for="nameInput">Name:</label>
        <input type="text" id="nameInput" name="name">
        <br>
        <label for="descriptionInput">Description:</label>
        <textarea id="descriptionInput" name="description"></textarea>
        <br>
        <input type="hidden" name="course_id" value="{{ $course_id }}">
        <label for="courseSelect">Select Course:</label>

<br>
            <button type="submit" value="enter"  id="submitBtn">ADD</button>
    </form>
</div> 
<script>
  function validateFile() {
    const fileInput = document.getElementById('file_path');
    if (!fileInput.value) {
      alert('Please select a file to upload.');
      return false;
    }
    return true;
  }
  </script>
@error('file_path')
<div class="text-danger">{{ $message }}</div>
@enderror
@error('file_name')
<div class="text-danger">{{ $message }}</div>
@enderror
@error('file_type')
<div class="text-danger">{{ $message }}</div>
@enderror
@error('section_id')
<div class="text-danger">{{ $message }}</div>
@enderror
<div class="modal2" tabindex="-1" id="modal2"  >
  <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" id="closeModel1" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div id="Vedio_path">

        <form method="POST" action="{{ route("content.store", ['course_id' => $course_id]) }}" onsubmit="return validateFile()" enctype="multipart/form-data">
          @csrf
      <label for="file_name">give file name:</label><br>
        <input type="text" name="file_name"><br>
        <label for="video">Upload Video:</label><br>
        <input type="file" name="file_path" accept="video/*">
        <button type="submit" class="btn btn-primary">Save changes</button>

        {{-- <input type="hidden" name="section_id" value="{{$section_id}}"> --}}
    </form>
      </div>

    <div id="Pdf_path" style="display: none;" >
<form method="POST" action="{{ route("content.store", ['course_id' => $course_id]) }}" onsubmit="return validateFile()" enctype="multipart/form-data">
  @csrf  
  
      <label for="file_name">give file name:</label><br>
      <input type="text" name="file_name" ><br>
      <label for="pdf">Upload PDF:</label><br>
      <input type="file" name="file_path" accept="application/pdf">
      {{-- <input type="hidden" name="section_id" value="{{$section_id}}">--}}
       
  <button type="submit" class="btn btn-primary">Save changes</button>

        </form>
        </div> 

      </div>
      <div class="modal-footer">
        <button type="button" id="closeModel2" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
</div>


    <div class="container mx-auto p-6 ">

        <table id="dataTable" class="w-full whitespace-no-wrap bg-white dark:bg-gray-800 overflow-hidden table-striped">
          <thead>
            <tr>
              <th class="px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs" data-field="name">Name</th>
              <th class="px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs" data-field="content">Content</th>
              {{-- <th class="px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs" data-field="status">Status</th> --}}
              <th class="px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs">Actions</th>
            </tr>
          </thead>
          <tbody id="sections-container">
            
             
             </script>
      @foreach ($section as $sections)
          
          @if($sections->course_id==$course_id)
          <tr>
          <td><a>{{$sections->name}}</a></td>
         
                
          <td>
             @foreach ($sectionContents as $Sc)
              @if ($Sc->section_id == $sections->id)
              <a href="#" id="showVideoLink" class="video-link">{{ $Sc->file_name }}</a><br>
              <?php              
              
              $f_p = null; // Initialize with null to avoid potential errors

              $files = glob('storage/' . $Sc->file_path . '/*');

if (count($files) === 1) {
  $f_p = $files[0];
}
?>
<div id="videoContainer" style="display: none;" >
<video id="videoPlayer" width="200" height="200" controls autoplay>
  <source src="{{ asset($f_p) }}" type="video/mp4">
</video>
 </div>
              @endif

        @endforeach
          </td>
                        

          <td>
            {{--<a href="#" class="button-edit">Edit</a>
             <a href="#" class="button-update">Update</a>
             <a href="#" class="button-delete">Delete</a>--}}
      
             <input type="button" id="editSectionNam" class="button-update" style="margin-right: 10px" onclick="document.getElementById('modal2').style.display='block'" value="Add Content">
             <form method="POST" action="{{ route('section.delete', ['id' => $sections->id]) }}">
              @csrf
              @method('DELETE')
              <button class="button-delete" type="submit" onclick="Delete_click();">
                <div class="icon">
                    <svg class="top">
                        <use xlink:href="#top">
                    </svg>
                    <svg class="bottom">
                        <use xlink:href="#bottom">
                    </svg>
                </div>
                <span>Delete</span>
            </button>
            
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="top">
                    <path d="M15,4 C15.5522847,4 16,4.44771525 16,5 L16,6 L18.25,6 C18.6642136,6 19,6.33578644 19,6.75 C19,7.16421356 18.6642136,7.5 18.25,7.5 L5.75,7.5 C5.33578644,7.5 5,7.16421356 5,6.75 C5,6.33578644 5.33578644,6 5.75,6 L8,6 L8,5 C8,4.44771525 8.44771525,4 9,4 L15,4 Z M14,5.25 L10,5.25 C9.72385763,5.25 9.5,5.47385763 9.5,5.75 C9.5,5.99545989 9.67687516,6.19960837 9.91012437,6.24194433 L10,6.25 L14,6.25 C14.2761424,6.25 14.5,6.02614237 14.5,5.75 C14.5,5.50454011 14.3231248,5.30039163 14.0898756,5.25805567 L14,5.25 Z"></path>
                </symbol>
                <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="bottom">
                    <path d="M16.9535129,8 C17.4663488,8 17.8890201,8.38604019 17.9467852,8.88337887 L17.953255,9.02270969 L17.953255,9.02270969 L17.5309272,18.3196017 C17.5119599,18.7374363 17.2349366,19.0993109 16.8365446,19.2267053 C15.2243631,19.7422351 13.6121815,20 12,20 C10.3878264,20 8.77565288,19.7422377 7.16347932,19.226713 C6.76508717,19.0993333 6.48806648,18.7374627 6.46907425,18.3196335 L6.04751853,9.04540766 C6.02423185,8.53310079 6.39068134,8.09333626 6.88488406,8.01304774 L7.02377738,8.0002579 L16.9535129,8 Z M9.75,10.5 C9.37030423,10.5 9.05650904,10.719453 9.00684662,11.0041785 L9,11.0833333 L9,16.9166667 C9,17.2388328 9.33578644,17.5 9.75,17.5 C10.1296958,17.5 10.443491,17.280547 10.4931534,16.9958215 L10.5,16.9166667 L10.5,11.0833333 C10.5,10.7611672 10.1642136,10.5 9.75,10.5 Z M14.25,10.5 C13.8703042,10.5 13.556509,10.719453 13.5068466,11.0041785 L13.5,11.0833333 L13.5,16.9166667 C13.5,17.2388328 13.8357864,17.5 14.25,17.5 C14.6296958,17.5 14.943491,17.280547 14.9931534,16.9958215 L15,16.9166667 L15,11.0833333 C15,10.7611672 14.6642136,10.5 14.25,10.5 Z"></path>
                </symbol>
            </svg>
          </form>
             <select name='vedio_pdf' id="vedio_pdf"  onchange="toggleFileUpload()">
              <option value="1">Video</option>
              <option value="2">PDF</option>
          </select>
          </td>
        </tr>
        @endif
          @endforeach
            {{-- add section here --}}
          </tbody>
        </table>
      </div>
     

      
  </div>
    
      {{-- <select class="form-select" aria-label="Default select example">
        <option selected disabled>Add content</option> 
        <option value="video">Add video</option>
        <option value="pdf">Add PDF</option>
    </select>
    <button class="add-btn">Add</button>
    <div class="added-content"></div> --}}
</section>
{{-- button delete script --}}
<script>
  Delete_click(){
 document.querySelectorAll(".button-delete").forEach(button =>
    if (!button.classList.contains("delete")) {
      button.classList.add("delete");
      setTimeout(() => button.classList.remove("delete"), 2200);
    }
    e.preventDefault(); // Prevent default form submission behavior
  )
}

</script>
<script>
document.getElementById('showVideoLink').addEventListener('click', function() {
  var videoContainer = document.getElementById('videoContainer');
  if (videoContainer.style.display === 'none') {
    videoContainer.style.display = 'block';
  } else {
    videoContainer.style.display = 'none';
  }
});


window.addEventListener('click', function(event) {
  var videoContainer = document.getElementById('videoContainer');
  var showVideoLink = document.getElementById('showVideoLink');
  if (event.target !== videoContainer && event.target !== showVideoLink) {
    videoContainer.style.display = 'none';
  }
});
</script>

<script>
    // const videoLinks = document.querySelectorAll('.video-link');

    // // Add click event listeners to each video link
    // videoLinks.forEach(function(videoLink) {
    //     videoLink.addEventListener('click', function(event) {
    //         event.preventDefault(); // Prevent default link behavior

    //         // Get the video path from the data attribute
    //         const videoPath = videoLink.getAttribute('data-video-path');

    //         // Get the video player element
    //         const videoPlayer = document.getElementById('videoPlayer');

    //         // Set the source of the video player to the clicked video path
    //         videoPlayer.src = videoPath;

    //         // Show the video container
    //         document.getElementById('videoContainer').style.display = 'block';
    //     });
    // });
</script>

<script>
  function toggleFileUpload() {
      var vedio_pdf = document.getElementById("vedio_pdf").value;
      var vedioPathDiv = document.getElementById("Vedio_path");
      var pdfPathDiv = document.getElementById("Pdf_path");

      if (vedio_pdf == 1) {
          vedioPathDiv.style.display = "block";
          pdfPathDiv.style.display = "none";
      } else if (vedio_pdf == 2) {
          vedioPathDiv.style.display = "none";
          pdfPathDiv.style.display = "block";
      }
  }
</script>
 <script>

var sectionsContainer = document.getElementById("sections-container"); // Define sectionsContainer globally

var addSectionBtn = document.getElementById("addSectionBtn");
var modal = document.getElementById("myModal");
var span =  document.getElementById("spanid");

addSectionBtn.addEventListener('click', function(){
    modal.style.display = "block"; // Display the modal when "Add Section" button is clicked
});






span.onclick = function() {
    modal.style.display = "none";

}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

// Function to create a new section
// function createNewSection(title) {
//     var section = document.createElement("div");
//     section.classList.add("section");
//     section.innerHTML = `
//     <tr>
//           <td>3</td>
//           <td>Item 3</td>
//           <td>Rejected</td>
//           <td>
//             <a href="#" class="button-edit" >Edit</a>
//             <a href="#" class="button-update">Update</a>
//             <a href="#"class="button-delete" >Delete</a>
//           </td>
//         </tr>  
//     `;
//     sectionsContainer.appendChild(section);

//     section.querySelector('.section-content select').addEventListener('click', function(event) {
//         event.stopPropagation();
//     });

    

//     section.addEventListener('click', function() {
//         section.classList.toggle("expanded");
//     });
// }




// function createNewSection(title) {
   
//     var newRow = document.createElement("tr"); // Create a new table row
//     newRow.innerHTML = `
//           <td><a>${title}</a></td>
//           <td>pending</td>
//           <td>chi7aja</>
//           <td>
//             {{--<a href="#" class="button-edit">Edit</a>
//              <a href="#" class="button-update">Update</a>
//              <a href="#" class="button-delete">Delete</a>--}}
//              <input type="button" id="editSectionNam" class="button-update" style="margin-right: 10px" value="Add Section">
//              <a href=""><i class="fa fa-trash-o fa-lg"></i></a>
//           </td>
//     `;
  
//             sectionsContainer.appendChild(newRow);

//             document.addEventListener("DOMContentLoaded", function() {
//       var editSectionNam = document.getElementById("editSectionNam");
//       var modal2 = document.getElementById("modal2");
  
//       if (editSectionNam && modal2) {
//           editSectionNam.addEventListener('click', function(){
//               modal2.style.display = "block"; // Display the modal when "Edit" button is clicked
//           });
//       } else {
//           console.error("editSectionNam or modal2 element not found.");
//       }
//   });

//     // No need for the event listener for select and click event on the row
// }
// function openEditModal2(title) {
//     // Here you can populate the modal with section details for editing
//     document.getElementById('editSectionName').value = title;
//     // Display the modal
//     document.getElementById('modal2').style.display = 'block';
// }



// Function to handle form submission
var submitBtn = document.getElementById("submitBtn");
submitBtn.addEventListener("click", function() {
    var sectionTitle = document.getElementById("nameInput").value;
    if (sectionTitle) {
        createNewSection(sectionTitle);
         modal.style.display = "none";
    } else {
        alert("Please enter a title for the section.");
    }
});
</script> 

<script>
 

  var modal2 = document.getElementById("modal2");


  var close1 =  document.getElementById("closeModel1");


  close1.onclick = function() {
    modal2.style.display = "none";
    
}
  var close2 =  document.getElementById("closeModel2");


  close2.onclick = function() {
    modal2.style.display = "none";
    
}
  </script>
@endsection

