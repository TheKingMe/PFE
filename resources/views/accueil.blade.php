@extends('layout')
@section('title','accueil')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
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
</style>


@section('content')

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<section style="display:flex;padding:10% ;height:100%;" >

<div style="width: 50%">
    <h1 class="mb-5">Learn without limits</h1>
    <h5 class="mb-5" style="font-size: 20px">Start, switch, or advance your career with more than 10,000 courses, Professional Certificates, and degrees from world-class universities and companies.</h5>
    <button  type="button" class="btn btn-primary btn-lg mr-4">Large button</button>
    <button  type="button" class="btn btn-secondary btn-lg mr-4">Large button</button>
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

  <section class="container">

     <div class="slider-wrapper" id="">
        <div class="slider">
          <div class="col-md-12 heroSlider-fixed">
            <div class="overlay">
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
    </div>
</div>
</div>
</div> 
 
  </section>

@endsection
