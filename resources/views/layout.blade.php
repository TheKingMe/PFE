<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','custom')</title>
    <link rel="stylesheet" href="css/Style.css">
    <link rel="stylesheet" href="css/Scroll-cards.css">
<link rel="stylesheet" href="{{ asset('css/framework.css') }}">
<link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"></script> 
    <link rel="stylesheet" href="css/flex-box-cards.css">
  
  </head>
    <style>

        .login_form{
            height:100% ;display:flex;justify-content: center;align-items:center;
        }
    </style>
  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="margin:0;">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{route('accueil')}}">U-course</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('Courses.index')}}">Courses</a>
              </li>
              @auth

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{auth()->user()->name}}
                </a>
                <ul class="dropdown-menu">
                  @if(auth()->user()->role=='teacher'||auth()->user()->role=='admin'||auth()->user()->role=='B-admin')
                      
                  <li><a class="dropdown-item" href="{{route('welcome')}}">My courses</a></li>
                  @endif
                  @if(auth()->user()->role=='admin'||  Auth::user()->role == 'B-admin'  )
                      
                  <li><a class="dropdown-item" href="{{route('adminstration')}}">Adminstration</a></li>
                  @endif
                 
                  @if(auth()->user()->role=='B-admin')
                  <li><a class="dropdown-item" href="{{route('AddAdmin')}}">Add admin</a></li>
                  <li><hr class="dropdown-divider"></li>
                
                  <li><a class="dropdown-item" href="{{route('AdminList')}}">Admin list</a></li>
                   @endif

                </ul>
              </li>
              <li>
              <form method="post" action="{{route('logout')}}"> 
                @csrf
               <button type="submit" class="btn btn-primary " style="margin-left:10px;">logout</button> 
              </form>
            </li>
            @else
              <li>
              <button  type="button" class="btn btn-primary " style="margin-left:10px;"><a class="dropdown-item" href="{{route('registre.create')}}">Sign Up</a></button>
            </li>
            <li>
              <button type="button" class="btn btn-primary ml-3" style="margin-left:10px;"><a class="dropdown-item" href="{{route('login')}}">Login</a></button>
            </li>
           @endforelse
            </ul>
            <form class="d-flex" role="search" method="post" action="{{ route('courses.search') }}">
            @csrf
              <input class="form-control me-2" name="search" type="text" placeholder="Search" aria-label="Search">
              <input type="hidden" name="page" id="page" value="{{ request('page', 1) }}">

              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>

@yield('content')

<link rel="stylesheet" href="{{asset('css/footer.css')}}" >

<footer class="footer_area section_padding_130_0">
      <div class="container">
        <div class="row">
          <!-- Single Widget-->
          <div class="col-12 col-sm-6 col-lg-4">
            <div class="single-footer-widget section_padding_0_130">
              <!-- Footer Logo-->
              {{-- <div class="footer-logo mb-3"></div>
              <p>Appland is completely creative, lightweight, clean app landing page.</p>
              <!-- Copywrite Text-->
              <div class="copywrite-text mb-5">
                <p class="mb-0">Made with <i class="lni-heart mr-1"></i>by<a class="ml-1" href="https://wrapbootstrap.com/user/DesigningWorld">Designing World</a></p>
              </div> --}}
              <!-- Footer Social Area-->
              <div class="footer_social_area"><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Pinterest"><i class="fa fa-pinterest"></i></a><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Skype"><i class="fa fa-skype"></i></a><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></div>
            </div>
          </div>
          <!-- Single Widget-->
          <div class="col-12 col-sm-6 col-lg">
            <div class="single-footer-widget section_padding_0_130">
              <!-- Widget Title-->
              <h5 class="widget-title">About</h5>
              <!-- Footer Menu-->
              <div class="footer_menu">
                <ul>
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Corporate Sale</a></li>
                  <li><a href="#">Terms &amp; Policy</a></li>
                  <li><a href="#">Community</a></li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Single Widget-->
          <div class="col-12 col-sm-6 col-lg">
            <div class="single-footer-widget section_padding_0_130">
              <!-- Widget Title-->
              <h5 class="widget-title">Support</h5>
              <!-- Footer Menu-->
              <div class="footer_menu">
                <ul>
                  <li><a href="#">Help</a></li>
                  <li><a href="#">Support</a></li>
                  <li><a href="#">Privacy Policy</a></li>
                  <li><a href="#">Term &amp; Conditions</a></li>
                  <li><a href="#">Help &amp; Support</a></li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Single Widget-->
          <div class="col-12 col-sm-6 col-lg">
            <div class="single-footer-widget section_padding_0_130">
              <!-- Widget Title-->
              <h5 class="widget-title">Contact</h5>
              <!-- Footer Menu-->
              <div class="footer_menu">
                <ul>
                  <li><a href="#">Call Centre</a></li>
                  <li><a href="#">Email Us</a></li>
                  <li><a href="#">Term &amp; Conditions</a></li>
                  <li><a href="#">Help Center</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"> </scipt>
</body>
</html>