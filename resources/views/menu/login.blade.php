@extends('layouts.main')

@section('home')
<section class="h-100 gradient-form" style=" margin-top: -10px">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-10">
          <div class="card rounded-3 text-black">
              <div class="col-lg-12">
                <div class="card-body p-md-5 mx-md-4">
  
                  <div class="text-center">
                    {{-- <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp" style="width: 185px;" alt="logo"> --}}
                    <h2 class="mt-1 mb-5 pb-1">Login Untuk Dapat Mengunduh Data</h2>
                  </div>
                    @if (session()->has('success'))

                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                                                          
                    @endif 
                        
                    @if (session()->has('loginError'))

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('loginError') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                                                        
                    @endif 
                    
                <form id="login" action="/login" method="post">
                    @csrf
                    
                    <div class="mb-3 mt-2 form-floating">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"  id="email" placeholder="email" autofocus required value="{{ old ('email') }}"  oninvalid="this.setCustomValidity('Email harus diisi')" oninput="setCustomValidity('')">
                        <label for="email">email</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                      <div class="mb-3  form-floating">
                        {{-- <span class="input-group-text border-end-0" style="background-color: transparent;  width: 27px;"><img src="Gambar/lock-fill.svg" width="20px" alt="" srcset=""></span> --}}
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                        <label for="password">Password</label>
                      </div>
                    <div class="text-center pt-1 mb-4 pb-1 d-grid gap-2">
                      <button class="btn btn-primary d-grid gap-2 fa-lg gradient-custom-2 mb-3" type="submit">Masuk</button>
                      {{-- <a class="text-muted text-decoration-none" href="#!">Forgot password?</a> --}}
                    </div>
  
                    <div class="d-flex align-items-center justify-content-center pb-4">
                      <p class="mb-0 me-2">Tidak Punya Akun?</p>
                      <a href="/register"type="button" class="btn btn-outline-danger">Buat Baru</a>
                    </div>
  
                  </form>
  
                </div>
              </div>
             
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection