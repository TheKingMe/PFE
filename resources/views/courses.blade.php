@extends('layout')
@section('content')

<link rel="stylesheet" href="css/Cards-courses.css">

<div class="container">
  @if (session('erreur'))
<div class="alert alert-success">
    {{ session('erreur') }}
</div>
@endif 
@if ($errors->has('erreur'))
    <div class="alert alert-danger">
        {!! $errors->first('erreur') !!}
    </div>
@endif
  <h2 class="container-heading">All Courses</h2>
  @if(Auth::check() &&( Auth::user()->role == 'teacher'|| Auth::user()->role == 'B-admin') )
<button id="openModalButton" type="button" class="btn btn-primary">Add Course</button>
@endif
<!-- Modal -->
<div id="courseModal" class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">course add</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form  method="POST" action="{{route('courses.store')}}"   enctype="multipart/form-data" >
          @csrf
          <label for="exampleInputName" class="form-label">Course name</label>
            <input type="text" class="form-control" id="exampleInputName" name="name" aria-describedby="nameHelp">
            <label for="exampleInputName" class="form-label">Description</label>
            <textarea class="form-control" id="sectionDescription" rows="3" name="description"></textarea>
            <label for="exampleInputName" class="form-label" alt="Every">Tags</label>
            <input type="text" class="form-control" id="exampleInputName" name="tags" aria-describedby="tagsHelp" placeholder="please put ',' in between your tags" >
            <label for="exampleInputimage" class="form-label" alt="Every">Image</label>
            <input type="file" name="image" class="form-control" id="exampleInputName" >
      
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
            
            <a href="{{route('courses.show',['id'=>$course->id])}}" style=" " class="card-item">
           
           
            @if($course->image)
    <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->name }}" class="img-fluid">
@else
                <img src="images/bg-img.jpg" alt="Card Image">
@endif
                <h2>{{$course->name}}</h2>
                <div> <h6> Created by:</h6> <h4> {{$course->teacher}}</h4></div>
                @foreach ($tags as $tag)
              <span class="developer">{{ $tag }}</span>
                @endforeach
                <div class="products_star">
                    @for ($i = 0; $i < $course->rating; $i++)
                    <i class="fa-solid fa-star"></i>
                    @endfor
                    
                </div>
                <h3>{{ \Illuminate\Support\Str::words($course->description, 3, '...') }}</h3>
                @if (Auth::check() && $course->teacher !=  Auth::user()->name )
      
         @endif
                <div class="arrow"> 
                    <i class="fas fa-arrow-right card-icon"></i>
                </div>
            </a>
                    @endforeach
                   
    </div>
    <div  class="d-flex justify-content-center">
      {{ $courses->links('vendor.pagination.bootstrap-4') }}
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