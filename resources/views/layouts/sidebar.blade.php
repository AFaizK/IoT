<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TA | {{ $tittle }}</title>
    <link href=" {{ mix('css/app.css') }}" rel="stylesheet">
    <link href=" {{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
<nav class="sidebar close">
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
                        <a class="{{ ($tittle === "Dashboard") ? 'active' : '' }}" href="/">
                            <i class='bi bi-house icon' ></i>
                            <span class="text nav-text ">Dashboard</span>
                        </a>
                    </li>
                    <li class="">
                        <a class="{{ ($tittle === "NH3") ? 'active' : '' }}" href="/nh3">
                            <i class='bx bx-bar-chart-alt-2 icon' ></i>
                            <span class="text nav-text">NH3</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="#">
                            <i class='bx bx-bell icon'></i>
                            <span class="text nav-text">Notifications</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="#">
                            <i class='bx bx-pie-chart-alt icon' ></i>
                            <span class="text nav-text">Analytics</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="#">
                            <i class='bx bx-heart icon' ></i>
                            <span class="text nav-text">Likes</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="#">
                            <i class='bx bx-wallet icon' ></i>
                            <span class="text nav-text">Wallets</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                  <a class="" onclick="losign()" data-bs-toggle="offcanvas" href="#offcanvasExample"  aria-controls="offcanvasExample">
                      <i class='bi bi-box-arrow-right icon' ></i>
                      <span class="text nav-text">Login</span>
                  </a>
              </li>
                <div class="offcanvas canvas-start" style="width: 500px;" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                  <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Selamat Datang</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                  </div>
                  <div class="offcanvas-body">
                    <div class="card" style="width:28.5rem;">
                      <!-- <div class="button-box">
                        <div id="btn-slide"></div>
                        <button class="toggle-btn position-absolute" onclick="login()">login</button>
                        <button class="toggle-btn float-end" style="margin-right: -15px;" onclick="register()">register</button>
                      </div> -->
                      <div class="btn-group"  role="group" aria-label="Basic mixed styles example">
                        <button type="button" onclick="login()" class="btn btn-warning">Log In</button>
                        <button type="button"  onclick="register()" class="btn btn-success">Register</button>
                      </div>
                        <div class="card-body ">
                          <form id="login">
                            <h5 class="card-title mb-5 text-center">Login</h5>
{{-- 
                            @if (session()->has('success'))

                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>
                                                              
                            @endif --}}

                            <div class="mb-3 mt-2 input-group">
                              <span class="input-group-text border-end-0"  style="background-color: transparent; width: 27px;"><img src="Gambar/at.svg" width="20px" alt="" srcset=""></span>
                              <input type="text" class="form-control  border-start-0"  id="exampleInputEmail1" placeholder="Username">
                            </div>
                            <div class="mb-3  input-group">
                              <span class="input-group-text border-end-0" style="background-color: transparent;  width: 27px;"><img src="Gambar/lock-fill.svg" width="20px" alt="" srcset=""></span>
                              <input type="password" class="form-control  border-start-0" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="mb-3 form-check">
                              <input type="checkbox" class="form-check-input" id="exampleCheck1">
                              <label class="form-check-label  " for="exampleCheck1">Remember me</label>
                              <a class="float-end " style="cursor: pointer;" onclick="lupapassword()">Forget Password ?</a>
                            </div>
                            <button type="submit" class="btn btn-primary d-grid gap-2 mb-3 col-12 mx-auto">Submit</button>
                          </form>
                    

                          <form id="register" action="/register" method="post">
                            @csrf
                            <h5 class="card-title text-center mb-5">Register</h5> 
                            <div class="mb-3 mt-2 input-group">
                              <span class="input-group-text border-end-0"  style="background-color: transparent; width: 27px;"><img src="Gambar/person-fill.svg" width="20px" alt="" srcset=""></span>
                              <input type="text"  name="name" class="form-control @error('name') is-invalid @enderror border-start-0 "  id="name" placeholder="Name" required>
                              @error('name')
                              <div class="invalid-feedback"></div>     
                                {{ $message }}                         
                              @enderror
                            </div>
                            <div class="mb-3 mt-2 input-group">
                              <span class="input-group-text border-end-0"  style="background-color: transparent; width: 27px;"><img src="Gambar/person-fill.svg" width="20px" alt="" srcset=""></span>
                              <input type="text" name="username" class="form-control  @error('username') is-invalid @enderror  border-start-0"  id="username" placeholder="username" required>
                              @error('username')
                              <div class="invalid-feedback"></div>     
                                {{ $message }}                         
                              @enderror
                            </div>
                            <div class="mb-3  input-group">
                              <span class="input-group-text border-end-0"  style="background-color: transparent; width: 27px;"><img src="Gambar/at.svg" width="20px" alt="" srcset=""></span>
                              <input type="email" name="email"  class="form-control @error('email') is-invalid @enderror border-start-0"  id="email" placeholder="email" required>
                              @error('email')
                              <div class="invalid-feedback"></div>     
                                {{ $message }}                         
                              @enderror
                            </div>
                            <div class="mb-3  input-group">
                              <span class="input-group-text border-end-0" style="background-color: transparent;  width: 27px;"><img src="Gambar/lock-fill.svg" width="20px" alt="" srcset=""></span>
                              <input type="password" name="password" class="form-control @error('password') is-invalid @enderror  border-start-0" id="password" placeholder="Password" required>
                              @error('password')
                              <div class="invalid-feedback"></div>     
                                {{ $message }}                         
                              @enderror
                            </div>   
                            <button type="submit" class="btn btn-primary d-grid gap-2 mb-3 col-12 mx-auto">Daftar</button>
                          </form>
                        
                        
  
  
                        <form id="lupapas">
                          <h5 class="text-center mb-4">Silahkan Ganti Password Anda</h5>
                          <div class="mb-3  input-group">
                            <span class="input-group-text border-end-0"  style="background-color: transparent; width: 27px;"><img src="Gambar/at.svg" width="20px" alt="" srcset=""></span>
                            <input type="text" class="form-control  border-start-0"  id="exampleInputEmail1" placeholder="Username">
                          </div>
                          <div class="mb-3  input-group">
                            <span class="input-group-text border-end-0" style="background-color: transparent;  width: 27px;"><img src="Gambar/lock-fill.svg" width="20px" alt="" srcset=""></span>
                            <input type="password" class="form-control  border-start-0" id="exampleInputPassword1" placeholder="Password">
                          </div>   
                          <div class="mb-3  input-group">
                            <span class="input-group-text border-end-0" style="background-color: transparent;  width: 27px;"><img src="Gambar/lock-fill.svg" width="20px" alt="" srcset=""></span>
                            <input type="password" class="form-control  border-start-0" id="exampleInputPassword1" placeholder="Repeat Password">
                          </div>  
                          <button type="submit" class="btn btn-primary d-grid gap-2 mb-3 col-12 mx-auto">Simpan</button>
                        </form>
                      </div>
                    </div>
                    <!-- </div>
                  </div> -->
                </div>
              </div>
                <li class="">
                    <a href="#">
                        <i class='bi bi-box-arrow-left icon'  ></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>

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
    <script src="{{ mix('js/app.js') }}">
    </script>
</body>
</html>
 
 