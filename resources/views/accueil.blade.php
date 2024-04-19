@extends('index')
@section('title','accueil')

@section('content')

<section style="display:flex;padding:10% ;height:100%;" >

<div style="width: 50%">
    <h1 class="mb-5">Learn without limits</h1>
    <h5 class="mb-5" style="font-size: 20px">Start, switch, or advance your career with more than 10,000 courses, Professional Certificates, and degrees from world-class universities and companies.</h5>
    <button  type="button" class="btn btn-primary btn-lg mr-4">Large button</button>
    <button  type="button" class="btn btn-secondary btn-lg mr-4">Large button</button>
</div>
<div style="padding-left: 20%;padding-right:20%;">
    <img src="{{ asset('img/bg-img.jpeg') }}" class="img-thumbnail" alt="...">

</div>

</section>
<section style="display:flex;padding:5%">
    <div>
    <div>
    <h2 class="mb-5" style="font-size: 20px">A broad selection of courses</h2>
    <h5 class="mb-5" style="font-size: 20px">Choose from over 210,000 online video courses with new additions published every month</h5>
</div>
<div class="row row-cols-1 row-cols-md-3 g-4">
    <div class="col">
      <div class="card h-100">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        </div>
        <div class="card-footer">
          <small class="text-body-secondary">Last updated 3 mins ago</small>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card h-100">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
        </div>
        <div class="card-footer">
          <small class="text-body-secondary">Last updated 3 mins ago</small>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card h-100">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
        </div>
        <div class="card-footer">
          <small class="text-body-secondary">Last updated 3 mins ago</small>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
@endsection