@extends('layout')
@section('content')

<link rel="stylesheet" href="css/Cards-courses.css">
<div class="container">
  <h2 class="container-heading">All Courses</h2>   
<button id="openModalButton" type="button" class="btn btn-primary">Add Course</button>

<!-- Modal -->
<div id="courseModal" class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">course add</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form  method="POST" action="{{route('courses.store')}}">
          @csrf
          <label for="exampleInputName" class="form-label">Course name</label>
            <input type="text" class="form-control" id="exampleInputName" name="name" aria-describedby="nameHelp">
            <label for="exampleInputName" class="form-label">Description</label>
            <textarea class="form-control" id="sectionDescription" rows="3" name="description"></textarea>
            <label for="exampleInputName" class="form-label" alt="Every">Tags</label>
            <input type="text" class="form-control" id="exampleInputName" name="tags" aria-describedby="tagsHelp" placeholder="please put ',' in between your tags" >
            <button type="submit" class="btn btn-primary">Create Course</button>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
  $(document).ready(function(){
    $('#openModalButton').click(function(){
      $('#courseModal').modal('show');
    });
  });
</script>
@php
  $user = Auth::user();

@endphp
    <div class="card-list">
                 @foreach ($courses as $course)
                 @if($course->approved==1)
                @continue;
                @endif
                    @php
                    $tags=$course['tags'];
                    $tags=explode(',', $course->tags);
                    @endphp

            <a href="/courses/{{$course['id']}}" class="card-item">
                <img src="images/bg-img.jpg" alt="Card Image">
                <h4>{{$course->teacher}}</h4>
                @foreach ($tags as $tag)
              <span class="developer">{{ $tag }}</span>
                @endforeach
                <div class="products_star">
                    @for ($i = 0; $i < $course->rating; $i++)
                    <i class="fa-solid fa-star"></i>
                    @endfor
                    
                </div>
                <h3>{{ $course->description }}</h3>
                @if (Auth::check() && $course->teacher !=  Auth::user()->name )
         <form action="{{ route('courses.enroll')}}" method="POST">
          @csrf <!-- CSRF protection -->  
          <input type="hidden" name="course_id" value="{{ $course->id }}">
          <button type="submit" class="btn btn-primary">Enroll</button>
        </form>
         @endif
                <div class="arrow"> 
                    <i class="fas fa-arrow-right card-icon"></i>
                </div>
            </a>
                    @endforeach
                    <a href="#" class="card-item">
                        <img src="images/developer.jpg" alt="Card Image">
                        <span class="developer">Developer</span>
                        <h3>A "developer" codes software and websites.</h3>
                        <div class="arrow">
                            <i class="fas fa-arrow-right card-icon"></i>
                        </div>
                    </a> <a href="#" class="card-item">
                        <img src="images/developer.jpg" alt="Card Image">
                        <span class="developer">Developer</span>
                        <h3>A "developer" codes software and websites.</h3>
                        <div class="arrow">
                            <i class="fas fa-arrow-right card-icon"></i>
                        </div>
                    </a>
    </div>
  
</div>
@endsection




{{-- <div class="course-list">
        @foreach ($courses as $course)
        @php
        $tags=$course['tags'];
        $tags=explode(',', $course->tags);
        @endphp
            <div class="course">
                <h1><a href="/courses/{{$course['id']}}" target="_blank">{{ $course->name }}</a></h1>
                <p><strong>Teacher:</strong> {{ $course->teacher }}</p>
                <p>{{ $course->description }}</p>
                <p><strong>Rating:</strong> {{ $course->rating }}</p>
                <ul>
                @foreach ($tags as $tag)
                <li >
                    {{$tag}}
                </li>
                
                @endforeach
                </ul>    


            </div>
        @endforeach --}}