@extends('layout')

@section('content')
<div class="container" >
    <div style="width: 100%;display:flex;flex-direction:column;justify-content:center;">
<h1>Result for the course <span style="color: darkorange"> {{ $course->name }}</span></h1>
@if($result >= 50)
<p> <span style="color: green" >Congration</span> Your  result is {{ $result }}%</p>
@endif


@if($result < 50)
<p style="font-size: 30px" > <span style="color: red" >Sadly</span> Your  result is {{ $result }}% You have a chance for repass test</p>

<a href="/courses/{{$course['id']}}/test" style="width:15%;margin:20px;border-color:royalblue;color:royalblue;background-color:white;" class="btn btn-primary"  >repass the test</a>
@else
<a href="{{route('certicate.create',['course_id'=>$course->id,'id'=>auth()->user()->id]) }}" style="width:15%;margin:20px;border-color:royalblue;color:royalblue;background-color:white;" class="btn btn-primary" >get your certificat</a>
@endif
</div>
</div>
@endsection