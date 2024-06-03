@extends('layout')

@section('content')
<h1>Result for the course {{ $course->name }}</h1>
<p>Your result is {{ $result }}%</p>
@if($result < 50)
<a href="/courses/{{$course['id']}}/test">repass the test</a>
@else
<a href="{{route('certicate.create',['id'=>$user->id])}}" >get your certificat</a>
@endif
@endsection