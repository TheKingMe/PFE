{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <form method="POST" action="{{ route('courses.store') }}">
        @csrf

        <div>
            <label for="name">Course Name:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
            @error('name')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="description">Description:</label>
            <textarea name="description" id="description" required>{{ old('description') }}</textarea>
            @error('description')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="teacher">Teacher:</label>
            <select name="teacher" id="teacher" required>
                <option value="">Select Teacher</option>
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}" {{ old('teacher') == $teacher->id ? 'selected' : '' }}>
                        {{ $teacher->name }}
                    </option>
                @endforeach
            </select>
            @error('teacher')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="rating">Rating:</label>
            <input type="number" name="rating" id="rating" value="{{ old('rating') }}" required min="1" max="5">
            @error('rating')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="tags">Tags:</label>
            <input type="text" name="tags[]" id="tags" value="{{ old('tags') }}">
            @error('tags')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Save Course</button>
    </form>

</body>
</html> --}}