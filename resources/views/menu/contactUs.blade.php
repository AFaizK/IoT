@extends('layouts.main')

@section('home')
<section class="h-100 gradient-form" style="background-color: #eee; margin-top: -10px">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-10">
          <div class="card rounded-3 text-black">
            <div class="row g-0">
                <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                    <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                      {{-- <h4 class="mb-4">We are more than just a company</h4>
                      <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p> --}}
                    </div>
                  </div>
              <div class="col-lg-6">
                <div class="card-body p-md-5 mx-md-4">
  
                  <div class="text-center">
                    {{-- <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp" style="width: 185px;" alt="logo">
                    <h4 class="mt-1 mb-5 pb-1">We are The Lotus Team</h4> --}}
                  </div>
                    @if (session()->has('success'))

                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                                                          
                    @endif 
                        
                  <form id="contact" action="/contactus" method="post">
                    @csrf
                    <div class="mb-3 mt-2 input-group">
                        <span class="input-group-text border-end-0"  style="background-color: transparent; width: 27px;"><img src="Gambar/person-fill.svg" width="20px" alt="" srcset=""></span>
                        <input type="text"  name="nama" class="form-control @error('nama') is-invalid @enderror border-start-0 "  id="nama" placeholder="Nama" required>
                        @error('nama')
                        <div class="invalid-feedback"></div>     
                          {{ $message }}                         
                        @enderror
                      </div>
                      <div class="mb-3 mt-2 form-floating">
                        {{-- <span class="input-group-text border-end-0"  style="background-color: transparent; width: 27px;"><img src="Gambar/at.svg" width="20px" alt="" srcset=""></span> --}}
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"  id="email" placeholder="Email Address" autofocus required value="{{ old ('email') }}">
                        <label for="email">Email Address</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>
                      <div class="mb-3  input-group">
                        <textarea class="form-control  @error('pesan') is-invalid @enderror" name="pesan"  id="pesan" rows="3" placeholder="Sampaikan Pesan"></textarea>
                        @error('pesan')
                        <div class="invalid-feedback"></div>     
                          {{ $message }}                         
                        @enderror
                      </div>               
                      <button type="submit" class="btn btn-primary d-grid gap-2 mb-3 col-12 gradient-custom-2 mx-auto">Kirim</button>
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