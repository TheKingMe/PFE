@extends('layout')
@section('title','course')

@section('content')

<h1>
    {{$course['name']}}
</h1>
<p>{{$course['description']}}</p>
created by : {{$course['teacher']}}
<h2>Course Content </h2>

@endsection
