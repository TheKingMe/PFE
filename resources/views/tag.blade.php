@extends('layout')
@section('content')
@extends('layout')
@section('content')


    <h2 class="container-heading">Courses with Tag: {{ $tag }}</h2>
  
        @foreach ($courses as $course)
            <h1>{{$course->name}}</h1>
        @endforeach
 

@endsection
@endsection