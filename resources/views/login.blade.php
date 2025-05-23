@extends('layout')
@section('title','login')

@section('content')
<section class="container-login" >
   <div class="login_form" >
    
  
<form method="POST" action="{{route('login.authenticate')}}">
  @csrf
  @if (session('erreur'))
  <div class="alert alert-danger">
      {{ session('erreur') }}
  </div>
  @endif 
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
    </div>
   
    <button type="submit" class="btn btn-primary">Submit</button>
  <a href="registre" style=" color:cadetblue;" > Create an account </a>

  </form>
</div>
</section>

@endsection