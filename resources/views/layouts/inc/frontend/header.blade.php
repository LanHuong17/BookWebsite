  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top" style="background-color:coral; height: 2cm;">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="{{ url('/home') }}" class="logo d-flex align-items-center  me-auto me-lg-0">
        <img src="{{ asset('public/frontend/img/icons8-open-book-48.png') }}" alt="">
        <h1>Book</h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="{{ url('/home') }}">Home</a></li>
          <li class="dropdown"><a href="{{ url('/category') }}"><span>Library</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              @foreach ($categories as $key => $category)
                  <li><a href="{{url('category/'.$category->id) }}">{{ $category->name }}</a></li>
              @endforeach
              
            </ul>
          </li>
          <li><a href="{{ url('/author') }}">Writer</a></li>
          <li><a href="{{ url('/blog') }}">Blog</a></li>
        </ul>

        <form action="{{ url('search') }}" method="get" role="search" style="margin-left: 2cm">
          <div class="input-group">
            <input type="search" placeholder="need what?" name="search" id="" class="form-control">
            <button class="btn btn-success" type="submit">
              <i class="fa fa-search">Search</i>
            </button>
          </div>
        </form>

          <div class="action">
            <div class="icon-group" style="width: 150px">
              <div class="library" id="profilelibr2">
                  <a href="{{ url('/library') }}"><img src="{{ asset('public/frontend/img/icons8-book-40.png') }}" alt=""></a> 
              </div>
              <div class="profile" id="profilelibr" onclick="menuToggle()" >
                <img src="{{ asset('public/frontend/img/icons8-circled-user-male-skin-type-7-48.png') }}" alt="">
              </div>
              <div class="menu">
                <ul>
                  <h5 style="color:coral; margin-right: 10px">{{ Auth::check() ? Auth::user()->name : ''}}</h5>
                  <li>
                    @if (Auth::check())
                      <button href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" style="color: aliceblue" class="btn btn-info">Logout</button>  
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                      </form>               
                    @else 
                      <button onclick="window.location.href='{{ url('/login') }}'" type="button" style="color: aliceblue" class="btn btn-info">Login</button>
                    @endif
                    @if (Auth::check() && Auth::user()->role_as === 1)
                      <button onclick="window.location.href='{{ url('/admin/dashboard') }}'" type="button" style="color: aliceblue; margin-top: 5px" class="btn btn-info">Admin</button> 
                    @endif
                  </li>
                </ul>
              </div>
            </div>  
        </div>

      </nav><!-- .navbar -->
      
      <div class="header-social-links">
            
        {{-- <a href="#" class="library"><h3 class="bi bi-bookmark-heart"></h3></a>
        <a href="{{ url('/login1') }}" class="login"><h3 class="bi bi-person-circle"></h3></a> --}}

            
          <script>
            function menuToggle() {
              const toggleMenu = document.querySelector('.menu');
              toggleMenu.classList.toggle('active')
            }
          </script>
      </div>
      
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
    
  </header><!-- End Header -->