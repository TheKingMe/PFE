@extends('layout')
@section('content')
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<h1>Create a quiz for the course {{$course['name']}}:</h1>
<div class="container">
    <h2>Add question to the {{$quiz->title}}</h2>
    <form method="POST" action="{{ route('store.question', ['course_id' => $course->id,'quiz_id'=> $quiz->id]) }}">
        @csrf
        <input type="hidden" name="quiz_id" value="{{$quiz->id}}">

        <!-- Question Text Input -->
        <div class="mb-3">
            <label for="questionText" class="form-label">Question Text</label>
            <input type="text" class="form-control" id="questionText" name="question_text" required>
        </div>

        <!-- Options Container -->
        <div class="option-container">
            <div class="mb-3">
                <label for="option1" class="form-label">Option 1</label>
                <input type="text" class="form-control" id="option1" name="options[0][option_text]" required>
                <label for="isCorrect1" class="form-check-label">
                    <input type="checkbox" class="form-check-input" id="isCorrect1" name="options[0][is_correct]" value="1"> Correct
                </label>
            </div>
        </div>

        <!-- Button to add more options dynamically -->
        <button type="button" class="btn btn-primary" id="addOption">Add Option</button>
        <!-- Button to submit the form -->
        <button type="submit" class="btn btn-primary">Save Question</button>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    let optionCount = 1;

    document.getElementById('addOption').addEventListener('click', function () {
        optionCount++;

        const optionContainer = document.querySelector('.option-container');
        const optionTemplate = `
            <div class="mb-3">
                <label for="option${optionCount}" class="form-label">Option ${optionCount}</label>
                <input type="text" class="form-control" id="option${optionCount}" name="options[${optionCount}][option_text]" required>
                <label for="isCorrect${optionCount}" class="form-check-label">
                    <input type="checkbox" class="form-check-input" id="isCorrect${optionCount}" name="options[${optionCount}][is_correct]" value="1"> Correct
                </label>
            </div>
        `;
        optionContainer.insertAdjacentHTML('beforeend', optionTemplate);
    });
});
</script>

@endsection