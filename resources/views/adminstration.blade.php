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

@foreach ($courses as $course)
@if(!$course->approved)
<div class="course-rectangle">
<a href="/courses/{{$course->id}}"><h2>{{$course->name}}</h2></a>
<h4>{{$course->teacher}}</h4>
<p>{{$course->description}}</p>
</div>
@endif
@endforeach

</div>
@endsection
