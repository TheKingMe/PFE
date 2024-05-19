@extends('layout')
@section('title','accueil')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<style>
  body {
  background: #1D1E22;
}
.section-container {
  max-width: 100%;
  margin: auto;
  padding: 20px;
  display: flex;
  align-items: center; /* Align the scroll icon vertically */
}

.product-list-container {
  position: relative;
  overflow-x: auto;
  white-space: nowrap;
  scrollbar-width: none;
  scrollbar-color: #333 #ccc;
  cursor: pointer;
}

.product-list {
  display: flex;
  flex-direction: row;
}

.product-card {
  position: relative;
  flex: 0 0 auto;
  width: 30%;
  margin: 20px;
  padding: 20px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  border-radius: 8px;
      background: #fff;
}

.new-badge {
  position: absolute;
  top: 5px;
  left: 5px;
  background-color: #FF5733;
  color: white;
  padding: 5px;
  border-radius: 3px;
  font-size: 0.8em;
}

.product-card img {
  width: 100%;
  height: auto;
}

/* Style scrollbar for Chrome, Safari, and Opera */
.product-list-container::-webkit-scrollbar {
  width: 5px;
  height: 5px;
}

.product-list-container::-webkit-scrollbar-thumb {
  background: #333;
}

.product-list-container::-webkit-scrollbar-thumb:hover {
  background: #555;
}

.product-list-container::-webkit-scrollbar-track {
  background: #ccc;
}

.scroll-icon {
  font-size: 2em;
  cursor: pointer;
  margin-left: 20px; /* Spacing between the container and the arrow */
}


.product-card img {
  width: 100%;
  height: auto;
}

.product-card h3 {
  font-size: 18px;
  margin-bottom: 5px;
}

.product-card p {
  font-size: 14px;
  display: -webkit-box; /* Required for -webkit-line-clamp */
  -webkit-line-clamp: 2; /* Limit the description to 2 lines */
  -webkit-box-orient: vertical; /* Ensure text is vertically oriented */
  overflow: hidden; /* Hide any overflowing text */
  text-overflow: ellipsis; /* Add an ellipsis (...) for truncated text */
}

#scrollLeft ,#scrollRight{
      font-size: 2em;
      cursor: pointer;
      margin-right: 20px; /* Spacing between the container and the arrow */
      color: black;
    }

    #scrollLeft:hover, #scrollRight:hover {
      color: royalblue;
    }

@media screen and (max-width: 600px) {
  .product-card {
    width: 100%;
    margin: 10px;
  }
}
</style>
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

</script><style>
   #outer {
   float: left;
   width: 250px;
   overflow: hidden;
   white-space: nowrap;
   display: inline-block;
 }
 
 #left-button {
   float: left;
   width: 30px;
   text-align: center;
 }
 
 #right-button {
   float: left;
   width: 30px;
   text-align: center;
 }
 
 a {
   text-decoration: none;
   font-weight: bolder;
   color: red;
 }
 
 #inner:first-child {
   margin-left: 0;
 }
 
 label {
   margin-left: 10px;
 }
 
 .hide {
   display: none;
 }





  .product-list-container {
    position: relative;
    overflow-x: auto;
    white-space: nowrap;
    scrollbar-width: none;
    scrollbar-color: #333 #ccc;
    cursor: pointer;
    flex: 1; /* Take up remaining horizontal space */
  }

  .product-list {
    display: flex;
    flex-direction: row;
  }



  .new-badge {
    position: absolute;
    top: 5px;
    left: 5px;
    background-color: #FF5733;
    color: white;
    padding: 5px;
    border-radius: 3px;
    font-size: 0.8em;
  }

  .product-card img {
    width: 100%;
    height: auto;
  }

  .product-card h3 {
    font-size: 18px;
    margin-bottom: 5px;
  }

  .product-card p {
    font-size: 14px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
  }



  #scrollLeft {
    left: 0; /* Position to the left */
  }

  #scrollRight {
    right: 0; /* Position to the right */
  }

  /* Scrollbar styles */
  .product-list-container::-webkit-scrollbar {
    width: 5px;
    height: 5px;
  }

  .product-list-container::-webkit-scrollbar-thumb {
    background: #333;
  }

  .product-list-container::-webkit-scrollbar-thumb:hover {
    background: #555;
  }

  .product-list-container::-webkit-scrollbar-track {
    background: #ccc;
  }
</style>


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
    <button  type="button" class="btn btn-primary btn-lg mr-4" ><a class="dropdown-item" href="{{route('registre.create')}}">Join Us for Free</a></button>
    <button  type="button" class="btn btn-secondary btn-lg mr-4"><a class="dropdown-item" href="{{route('login')}}">Login</a></button>
</div>
<div style="width:50%">
    <img src="images/bg-img.jpg" style="margin-left:30%; height:70%;" class="img-thumbnail" alt="...">
</div>

</section>
<section style="display:flex;padding:5%">
    <div>
    <div>
    <h2 class="mb-5" style="font-size: 20px">A broad selection of courses</h2>
    <h5 class="mb-5" style="font-size: 20px">Choose from over 210,000 online video courses with new additions published every month</h5>
</div>
<div class="row row-cols-1 row-cols-md-3 g-4">
  @foreach ($courses as $course)
    
    <div class="col">
      <div class="card h-100">
        <img src="images/bg-img.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"> {{$course->name}} </h5>
          <p class="card-text">{{$course->description}}</p>
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
    <h1>Most Rating Courses</h1>

  <section class="section-container">


     <div id="scrollLeft" class="scroll-icon">
      <i class="fas fa-arrow-left"></i>
    </div>
    <div class="product-list-container">
     
      <div class="product-list" id="productList">
        
        <!-- Product 1 -->
        @foreach ($courses as $course)
        @if($course->rataing>=0)
            
        <div class="product-card">
          {{-- <div class="new-badge">New</div> --}}
          <img src="images/bg-img.jpg" alt="">
          <h3>{{$course->name}}</h3>
          <p>{{$course->decription}}</p>
        </div>
      @endif
                @endforeach

        
      </div>
      
    </div>
    <div id="scrollRight" class="scroll-icon">
  <i class="fas fa-arrow-right"></i>
</div>
    
     {{-- <div class="slider-wrapper" id="">
        <div class="slider">
          <div class="col-md-12 heroSlider-fixed">
            <div class="overlay">
                <button class="scroll-btn prev">&#10094;</button>

        <ul class="cards">
          <li class="card">
            <div class="col">
                <div class="card h-100">
                  <img src="images/bg-img.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  </div>
                  <div class="card-footer">
                    <small class="text-body-secondary">Last updated 3 mins ago</small>
                  </div>
                </div>
              </div>
          </li>
          <li class="card">
            <div class="col">
                <div class="card h-100">
                  <img src="images/bg-img.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  </div>
                  <div class="card-footer">
                    <small class="text-body-secondary">Last updated 3 mins ago</small>
                  </div>
                </div>
              </div>
          </li>
          <li class="card">
            <div class="col">
                <div class="card h-100">
                  <img src="images/bg-img.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  </div>
                  <div class="card-footer">
                    <small class="text-body-secondary">Last updated 3 mins ago</small>
                  </div>
                </div>
              </div>
          </li>
          <li class="card">
            <div class="col">
                <div class="card h-100">
                  <img src="images/bg-img.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  </div>
                  <div class="card-footer">
                    <small class="text-body-secondary">Last updated 3 mins ago</small>
                  </div>
                </div>
              </div>
          </li>
          <li class="card">
            <div class="col">
                <div class="card h-100">
                  <img src="images/bg-img.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  </div>
                  <div class="card-footer">
                    <small class="text-body-secondary">Last updated 3 mins ago</small>
                  </div>
                </div>
              </div>
          </li>
          
         
        </ul>
        <button class="scroll-btn prev">&#10095;</button>
</div>
    </div>
</div>
</div>
  --}}
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
