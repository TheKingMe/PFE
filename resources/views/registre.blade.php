@extends('layout')
@section('title','registre')

@section('content')
<link rel="stylesheet" href="{{asset('css/registre.css')}}">


<section class="container-login" style="height:auto;padding :20px" >
   <div class="login_form" style="height:auto;" >
    
      <form method="POST" style="display: flex;flex-direction:column;" action="{{ route('register.store') }}">
        @csrf <!-- CSRF protection -->
        <div class="mb-3">
            <label for="exampleInputName" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="exampleInputName" name="name" aria-describedby="nameHelp" required>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
          </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" required>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
          </div>
        <div class="mb-3">
            <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="exampleInputPassword2" name="password_confirmation" required>
            @error('password_confirmation')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
          </div>

          <div class="select-wrapper mb-3">
            <select id="mySelect" name='role' required>
              <option selected disabled>Role</option>
              <option value="teacher">Teacher</option>
              <option value="student">Student</option> 
            </select>
          
          </div>
          @error('role')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
          
      
        <button type="submit" class="btn btn-primary">Submit</button>
          <a href="login"> already have account? </a>
      </form>    
</div>
</section>
@endsection