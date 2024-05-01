@extends('layout')
@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
.form-select {
  width: auto; /* Adjust width as needed */
  display: inline-block; /* Display inline */
  margin-right: 10px; /* Adjust margin as needed */
}
</style>
{{-- <select class="form-select form-select-sm" aria-label="Default select example">
  <option selected disabled>Add Content</option>
  <option value="1">Add Section</option>
  <option value="2">Add Quiz</option>
  <option value="3">Add Files</option>
  <option value="4">Add Links</option>
</select>
<div class="modal fade" id="sectionModal" tabindex="-1" aria-labelledby="sectionModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="sectionModalLabel">Add New Section</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="sectionForm">
          <div class="mb-3">
            <label for="sectionName" class="form-label">Section Name</label>
            <input type="text" class="form-control" id="sectionName" required>
          </div>
          <div class="mb-3">
            <label for="sectionDescription" class="form-label">Section Description</label>
            <textarea class="form-control" id="sectionDescription" rows="3"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Add Section</button>
        </form>
      </div>
    </div>
  </div>
</div>  --}}

 {{-- <form method="POST" action="{{ route('courses.store') }}">
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
</form> --}}
<script>
// Function to handle the change event on select element
document.querySelector('.form-select').addEventListener('change', function() {
  // Check if the selected option is "Add Section"
  if (this.value === '1') {
    // Show the modal
    $('#sectionModal').modal('show');
  }
});


</script>
@endsection



