<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TA | {{ $title }}</title>
    <link href=" {{ mix('css/app.css') }}" rel="stylesheet">
    <link href=" {{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
<nav class="sidebar close position-fixed ">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="Gambar/OIP.jfif" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name">Monitoring</span>
                    <span class="profession">Kualitas Udara</span>
                </div>
            </div>

            <i class='bi bi-chevron-compact-right toggle' ></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
              
                <li class="search-box">
                    <i class='bi bi-search icon'></i>
                    <input type="text" placeholder="Search...">
                </li>
               
                    <li class="">
                        <a class="{{ ($title === "Dashboard") ? 'active' : '' }}" href="{{ url('/') }}">
                            <i class='bi bi-house icon' ></i>
                            <span class="text nav-text ">Dashboard</span>
                        </a>
                    </li>
                    @can('user')
                    <li class="">
                        <a class="{{ ($title === "NH3") ? 'active' : '' }}" href="{{ ('/nh3') }}">
                            <i class='bx bx-bar-chart-alt-2 icon' ></i>
                            <span class="text nav-text">NH3</span>
                        </a>
                    </li> <li class="">
                        <a class="{{ ($title === "CH4") ? 'active' : '' }}" href="{{ url('/ch4') }}">
                            <i class='bx bx-bar-chart-alt-2 icon' ></i>
                            <span class="text nav-text">CH4</span>
                        </a>
                    </li> <li class="">
                        <a class="{{ ($title === "CO") ? 'active' : '' }}" href="{{ url('/co') }}">
                            <i class='bx bx-bar-chart-alt-2 icon' ></i>
                            <span class="text nav-text">CO</span>
                        </a>
                    </li>
                    @endcan
                    <li class="">
                        <a class="" href="{{ url('/contactus') }}">
                            <i class='bi bi-envelope icon' ></i>
                            <span class="text nav-text">Contact Us</span>
                        </a>
                    </li>
                
                  
                    @can('is_admin')
                    <li class="">
                        <a class="" href="{{ url('admin/pesan/pesan') }}">
                            <i class='bi bi-envelope icon' ></i>
                            <span class="text nav-text">Pesan</span>
                        </a>
                    </li>
                    <li class="">
                        <a class="" href="{{ url('/admin/deskripsi/deskripsi') }}">
                            <i class='bi bi-file icon' ></i>
                            <span class="text nav-text">Input data</span>
                        </a>
                    </li>
                    <li class="">
                        <a class="" href="{{ url('/admin/lokasi/lokasi') }}">
                            <i class='bi bi-file icon' ></i>
                            <span class="text nav-text">Lokasi</span>
                        </a>
                    </li>
                    @endcan
                
            </div>

            <div class="bottom-content">
                @auth
                  <form action="/logout" class="row" method="post">
                    @csrf
                      <div class="btn-group">
                        <button type="button" class="btn btn-secondary dropdown-toggle"  data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">                            
                            {{-- <i class='bi bi-box-arrow-right icon' ></i> --}}
                            Welcome, {{ auth()->user()->name }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-lg-end">
                          <li><button class="dropdown-item" >Logout</button></li>
                        </ul>
                      </div>
                </form>
                @else
                  <li class="">
                    <a class="" href="{{ url('/login') }}">
                        <i class='bi bi-box-arrow-right icon' ></i>
                        <span class="text nav-text">Login</span>
                    </a>
                  </li>
                @endauth
                <li class="mode">
                    <div class="sun-moon">
                        <i class='bi bi-moon icon moon'></i>
                        <i class='bi bi-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
                
            </div>
        </div>
    </nav>
    <section class="home">
        @yield('home')
    </section>
  

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ mix('js/app.js') }}"></script>
    <section class="js">
        @yield('js')
    </section>


</body>

</html>
 
 