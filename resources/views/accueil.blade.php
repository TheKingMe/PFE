@extends('layout')
@section('title','accueil')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<link rel="stylesheet" href="{{asset('css/accueil.css')}}">
<script>
  $(function() {
  var print = function(msg) {
    alert(msg);
  };

  var setInvisible = function(elem) {
    elem.css('visibility', 'hidden');
  };
  var setVisible = function(elem) {
    elem.css('visibility', 'visible');
  };

  var elem = $("#elem");
  var items = elem.children();

  // Inserting Buttons
  elem.prepend('<div id="right-button" style="visibility: hidden;"><a href="#"><</a></div>');
  elem.append('  <div id="left-button"><a href="#">></a></div>');

  // Inserting Inner
  items.wrapAll('<div id="inner" />');

  // Inserting Outer
  debugger;
  elem.find('#inner').wrap('<div id="outer"/>');

  var outer = $('#outer');

  var updateUI = function() {
    var maxWidth = outer.outerWidth(true);
    var actualWidth = 0;
    $.each($('#inner >'), function(i, item) {
      actualWidth += $(item).outerWidth(true);
    });

    if (actualWidth <= maxWidth) {
      setVisible($('#left-button'));
    }
  };
  updateUI();



  $('#right-button').click(function() {
    var leftPos = outer.scrollLeft();
    outer.animate({
      scrollLeft: leftPos - 200
    }, 800, function() {
      debugger;
      if ($('#outer').scrollLeft() <= 0) {
        setInvisible($('#right-button'));
      }
    });
  });

  $('#left-button').click(function() {
    setVisible($('#right-button'));
    var leftPos = outer.scrollLeft();
    outer.animate({
      scrollLeft: leftPos + 200
    }, 800);
  });

  $(window).resize(function() {
    updateUI();
  });
});

</script>

@section('content')
  

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
@if(@session('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div> 
@endif
<section style="display:flex;padding:10% ;height:100%; background-color:rgb(231, 227, 215)" >

<div style="width: 50%">
    <h1 class="mb-5">Learn without limits</h1>
    <h5 class="mb-5" style="font-size: 20px">Start, switch, or advance your career with more than 10,000 courses, Professional Certificates, and degrees from world-class universities and companies.</h5>
    @if(!(Auth::user()))
    <button  type="button" class="btn btn-primary btn-lg mr-4" ><a class="dropdown-item" href="{{route('registre.create')}}">Join Us for Free</a></button>
    <button  type="button" class="btn btn-secondary btn-lg mr-4"><a class="dropdown-item" href="{{route('login')}}">Login</a></button>
  @endif
  </div>
<div style="width:50%">
    <img src="images/bg-img.jpg" style="margin-left:20%; height:80%;" class="img-thumbnail" alt="...">
</div>

</section>
  <?php
  $sum=0;
  ?>
  @foreach ($courses as $course )
  <?php
  $sum+=1;
  ?>
  @endforeach
<section style="display:flex;padding:5%">
    <div>
    <div>
    <h1 class="mb-5" style="font-size: 20px">A broad selection of courses</h1>
    <h5 class="mb-5" style="font-size: 20px">Choose from over {{$sum}} online video courses with new additions published every month</h5>
</div>
<div class="row row-cols-1 row-cols-md-3 g-4">

  @foreach ($courses as $course)
    
    <div class="col">
      <div class="card h-100">
        @if ($course->image)
          
        <img src="{{ asset('storage/' . $course->image) }}" style="height: 80%;" class="card-img-top" alt="{{ $course->name }}">
       @else
       <img src="images/bg-img.jpg" class="card-img-top" style="height: 80%" alt="{{ $course->name }}">

        @endif
 <div class="card-body">
          <h5 class="card-title"> {{$course->name}} </h5>
          <p class="card-text">{{ \Illuminate\Support\Str::words($course->description, 3, '...') }}<a href="/courses/{{$course->id}}" style="text-decoration: none;" class="learn-more"> Learn More</a></p>
        </div>
        <div class="card-footer">
          <small class="text-body-secondary"> last update {{$course->timeDifference}} </small>
        </div>
      </div>
    </div>
    @endforeach


  </div>
</div>
</section>

    <h1 style="margin-left: 30px; color:darkgoldenrod">Most Rating Courses</h1>

  <section class="section-container">


     <div id="scrollLeft" class="scroll-icon">
      <i class="fas fa-arrow-left"></i>
    </div>
    <div class="product-list-container">
     
      <div class="product-list" id="productList">
        
        <!-- Product 1 -->
        @foreach ($courses as $course)
        @if($course->rataing>=0)
            
        <div href="" class="product-card">
          {{-- <div class="new-badge">New</div> --}}
          @if ($course->image)
          
          <img src="{{ asset('storage/' . $course->image) }}" style="height: 80%" class="card-img-top" alt="{{ $course->name }}">
         @else
         <img src="images/bg-img.jpg" style="height: 80%" class="card-img-top" alt="{{ $course->name }}">
  
          @endif          
          <h3>{{$course->name}}</h3>
          <p>{{ \Illuminate\Support\Str::words($course->description,3, '...') }} <a href="/courses/{{$course->id}}" style="text-decoration: none;" class="learn-more">Learn More</a></p>

        </div>
      @endif
                @endforeach

        
      </div>
      
    </div>
    <div id="scrollRight" class="scroll-icon">
  <i class="fas fa-arrow-right"></i>
</div>
    

  </section>
  


  <script>
    document.addEventListener("DOMContentLoaded", function() {
  const scrollBtns = document.querySelectorAll(".scroll-btn");
  const cardContainer = document.querySelector(".card-container");
  const scrollStep = 300; // Adjust this value as needed

  scrollBtns.forEach(btn => {
    btn.addEventListener("click", function() {
      const direction = this.classList.contains("prev") ? -1 : 1;
      const scrollAmount = cardContainer.scrollLeft + direction * scrollStep;
      cardContainer.scrollTo({
        left: scrollAmount,
        behavior: "smooth"
      });
    });
  });
});

  </script>

  @endsection
{{-- arrow ScroLL IN CARDS rating --}}
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const scrollRight = document.getElementById("scrollRight");
    const scrollLeft = document.getElementById("scrollLeft"); // Add this line
    const productListContainer = document.querySelector(".product-list-container");

    scrollRight.addEventListener("click", function() {
      productListContainer.scrollBy({
        top: 0, 
        left: 620, 
        behavior: 'smooth'
      });
    });

    // Add event listener for scrolling left
    scrollLeft.addEventListener("click", function() {
      productListContainer.scrollBy({
        top: 0, 
        left: -620, 
        behavior: 'smooth'
      });
    });
  });
</script>
