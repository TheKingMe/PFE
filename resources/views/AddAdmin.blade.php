@extends('layout')
@section('title','Add Admin')

@section('content')
<?php
if(auth()->user()->role!='B-admin')
{
    return view('accueil');
}
?>
<style>
.select-wrapper {
  position: relative;
  display: inline-block;
}

.select-wrapper select {
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  background-color: #ffffff;
  border: 1px solid #cccccc;
  padding: 8px 30px 8px 10px;
  border-radius: 5px;
  font-size: 16px;
  color: #333333;
  cursor: pointer;
  width: 200px;
  outline: none;
}

.select-wrapper select::-ms-expand {
  display: none;
}

.select-wrapper::after {
  content: '\25BC';
  position: absolute;
  top: 50%;
  right: 10px;
  transform: translateY(-50%);
  pointer-events: none;
}

/* Style the dropdown options */
.select-wrapper select option {
  background-color: #ffffff;
  color: #333333;
}
</style>

<section class="container-login" >
   <div class="login_form" style="max-width: 100%;background-color:rgb(233, 232, 211);" >
    
      <form method="POST" style="width:80%" action="{{ route('AddAdmin.store') }}">
        @csrf 
        <div class="mb-3" >
            <label for="exampleInputName"  class="form-label">Admin Name</label>
            <input type="text" class="form-control"  id="exampleInputName" name="name" aria-describedby="nameHelp">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
          </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
          </div>
        <div class="mb-3">
            <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="exampleInputPassword2" name="password_confirmation">
            @error('password_confirmation')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>      
        <input type="hidden" name="role" value="admin" >
      
        <button type="submit" class="btn btn-primary">add</button>
    </form>    
</div>
</section>
@endsection