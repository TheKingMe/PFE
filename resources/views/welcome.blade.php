@extends('layout')
@section('content')
<link rel="stylesheet" href="{{ asset('css/Style.css') }}">

<link rel="stylesheet" href="{{asset('css/welcomepage.css')}}">

<div class="container" style="margin-left: 0px;">
  <h1>Welcome, <strong style="color: royalblue;">{{ auth()->user()->name }}</strong></h1>
  <h1 class="p-relative">Your Enrolled Courses:</h1>
  <?php
  $b=false;
  ?>
  <div class="page d-flex" style="width: 100%;">
      <div class="content w-full d-flex" style="max-width: 100%;">
          <div class="courses-page d-grid m-20 gap-20">
            @if ($courses != Null)
              
            
              @foreach ($courses as $course)
              <?php 
              $b=true;
              ?>
              <div class="course bg-white rad-6 p-relative">
                @if ($course->image)
                    
                <img class="cover" style="height: 40%;width:100%" src="{{ asset('storage/' . $course->image) }}" alt="" />
                @else
                <img class="cover" style="height: 40%;width:100%;" src="images/bg-img.jpg" alt="" />
    
                  @endif

                  <img class="instructor" src="imgs/team-01.png" alt="" />
                  <div class="p-20" style="background: #f2efeff8;">
                      <h4 class="m-0">{{ $course->name }}</h4>
                      <p class="description c-grey mt-15 fs-14" >
                        {{ \Illuminate\Support\Str::words($course->description, 3, '...') }}
                    </p>
                  </div>
                  <div class="info p-15 p-relative between-flex" style="background-color: #f2efeff8">
                      <span class="title bg-blue c-white btn-shape"><a style="text-decoration: none;color:black;" href="/courses/{{$course->id}}">Course Info</a></span>
                      <span class="c-grey">
                          <i class="fa-regular fa-user"></i>
                      </span>
                      <span class="c-grey">
                          <i class="fa-solid fa-dollar-sign"></i>
                          {{$course->price}}
                      </span>
                  </div>
              </div>
              @endforeach
          </div>
      </div>
  </div>
  @if(!$b)
  <h4> No course Created.</h4>
  @endif
  <div>
    @if(!(auth()->user()->role == "student"))
    <h1 class="p-relative">Courses you created:</h1>
    @endif
    <div class="page d-flex" style="width: 100%;">
      <div class="content w-full d-flex" style="max-width: 100%;">
          <div class="courses-page d-grid m-20 gap-20">
            <?php
            $a=false;
            ?>
    @foreach ($A_courses as $course)
        @if(auth()->user()->name == $course->teacher )
        <?php 
        $a=true;
        ?>
        <div class="course bg-white rad-6 p-relative" style="width: 18rem;" >
            @if ($course->image)
                    
            <img class="cover" style="height: 40%;width:100%" src="{{ asset('storage/' . $course->image) }}" alt="" />
            @else
            <img class="cover" style="height: 40%;width:100%;" src="images/bg-img.jpg" alt="" />

            @endif      
                <img class="instructor" src="imgs/team-01.png" alt="" />
          <div class="p-20" style="background: #f2efeff8;">
              <h4 class="m-0">{{ $course->name }}</h4>
              <p class="description c-grey mt-15 fs-14" >
                {{ \Illuminate\Support\Str::words($course->description, 3, '...') }}
              </p>
          </div>
          <div class="info p-15 p-relative between-flex" style="background-color: #f2efeff8">
              <span class="title bg-blue c-white btn-shape"><a href="/courses/{{$course->id}}" style="text-decoration: none;color:black;" >Course contents</a></span>
              <span class="c-grey">
                  <i class="fa-regular fa-user"></i>
                  
              </span>
              <span class="c-grey">
                  <i class="fa-solid fa-dollar-sign"></i>
                  {{$course->price}}
              </span>
          </div>
      </div>
        @endif
    @endforeach
    @endif
    @if(!$a)
    <h4> No course Created.</h4>
    @endif
    </div>
      </div>
    </div>
    </div>




</div>

@endsection