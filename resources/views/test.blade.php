@extends('layout')
@section('content')
<div class="container">


    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <h1>Test for the course <span style="color: darkred;"> {{ $course->name }}</span>.</h1>
    
    <form method="post" action="{{ route('submit.result', ['id' => $course->id]) }}">
    @csrf
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        <input type="hidden" name="course_id" value="{{ $course->id }}" >
        
        @foreach ($quizzes as $quiz)
        @if ($quiz->course_id == $course->id)
        <input type="hidden" name="quiz_id" value="{{ $quiz->id }}" >
            <?php
            $num=0;
            ?>
                <h2>Quiz name: <span style="color: darkblue;"> {{ $quiz->title }}</span></h2>
                @foreach ($quiz->questions as $question)
                <?php
                $num++;
                ?>
                    <div class="mb-3">
                        <h3>Qustion{{$num}}:<span style="color: darkcyan" > {{ $question->question_text }}</span></h3>
                        @foreach ($question->options as $option)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="answers[{{ $question->id }}][]" value="{{ $option->id }}" id="option{{ $option->id }}">
                                <label class="form-check-label" for="option{{ $option->id }}">
                                    {{ $option->option_text }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            @endif
        @endforeach
        <button type="submit" style="margin:20px;" class="btn btn-primary">Submit Test</button>
    </form>
</div>
@endsection