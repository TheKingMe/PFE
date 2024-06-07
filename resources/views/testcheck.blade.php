@extends('layout')
@section('content')
<section class="container" >  
<h1>Test for the course <span style="color: burlywood" >{{ $course->name }}</span>.</h1>
@foreach ($quizzes as $quiz)
        @if ($quiz->course_id == $course->id)
        <input type="hidden" name="quiz_id" value="{{ $quiz->id }}" >
            <?php
            $num=0;
            ?>
              <h2 >   Title: <span style="color: rgb(0, 136, 255)">{{ $quiz->title }}</span></h2>
                @foreach ($quiz->questions as $question)
                <?php
                $num++;
                ?>
                    <div class="mb-3">
                        <h3> Qustion{{$num}}: <span style="color:darkgreen;">{{ $question->question_text }}</span></h3>
                        @foreach ($question->options as $option)
                            <div class="form-check">
                                <label class="form-check-label" style="font-size: 20px" for="option{{ $option->id }}">
                                    {{ $option->option_text }}
                                    @if($option->value==1)
                                   <span style="color: firebrick" > True</span>
                                    @endif
                                </label>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            @endif
        @endforeach
      
    </section>
@endsection
