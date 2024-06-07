@extends('layout')
@section('title','adminstraion')

@section('content')
<style>
.course-rectangle {
    width: 90%;
    height: 150px;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin: 20px auto;
    background: rgb(238,174,202);
background: radial-gradient(circle, rgba(238,174,202,1) 42%, rgba(148,187,233,1) 100%);
}
</style>
<div class="container" >
<h1 class="p-relative">Courses waiting for approved: </h1>
@if(@session('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div> 
@endif
@if(@session('succes'))
<div class="alert alert-success">
    {{ session('succes') }}
</div> 
@endif
@foreach ($courses as $course)
@if(!$course->approved)
<div class="course-rectangle">
<a href="/courses/{{$course->id}}"><h2>{{$course->name}}</h2></a>
<h4>{{$course->teacher}}</h4>
{{ \Illuminate\Support\Str::words($course->description, 7, '...') }}
</div>
@endif
@endforeach
<div  class="d-flex justify-content-center">
    {{ $courses->links('vendor.pagination.bootstrap-4') }}
  </div>
</div>
@endsection
