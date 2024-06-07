    @extends('layout')
    @section('content')
    <link rel="stylesheet" href="{{asset('css/Cards-courses.css')}}">

    @php
        $user = Auth::user();
    @endphp
    <div class="container">
        <h1>Search Results :</h1>

        <div class="card-list">
            @if ($courses->count() > 0)
                @foreach ($courses as $course)
                    @if ($course->approved == 1)
                        @php
                            $tags = explode(',', $course->tags);
                        @endphp
                        <a href="/courses/{{$course->id}}" class="card-item">
                            <img src="{{asset('images/bg-img.jpg')}}" alt="Card Image">
                            <h4>{{ $course->teacher }}</h4>
                            @if (count($tags) > 0)
                                @foreach ($tags as $tag)
                                    <span class="developer">{{ $tag }}</span>
                                @endforeach
                            @endif
                            <div class="products_star">
                                @for ($i = 0; $i < $course->rating; $i++)
                                    <i class="fa-solid fa-star"></i>
                                @endfor
                            </div>
                            <h3>{{ $course->description }}</h3>
                            
                            <div class="arrow"> 
                                <i class="fas fa-arrow-right card-icon"></i>
                            </div>
                        </a>
                    
                    @endif
                @endforeach
               
            @else
                <p>No courses found.</p>
            @endif
        </div>
         <div  class="d-flex justify-content-center">
            {{ $courses->appends(['search' => $query])->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.pagination a').forEach(link => {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    const page = new URL(this.href).searchParams.get('page');
                    const form = document.querySelector('form[role="search"]');
                    const pageInput = document.getElementById('page');
                    pageInput.value = page;
                    form.submit();
                });
            });
        });
    </script>
    @endsection
