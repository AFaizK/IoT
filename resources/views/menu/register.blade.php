@extends('layouts.main')

@section('home')
<section class="h-100 gradient-form" style="background-color: #eee; margin-top: -10px">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-10">
          <div class="card rounded-3 text-black">
              <div class="col-lg-12">
                <div class="card-body p-md-5 mx-md-4">

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
                  <form id="register" action="/register" method="post">
                    @csrf
                    <h2 class="text-center mb-5">Registrasikan Akunmu Segera</h2>
                    <div class="mb-3 mt-2 form-floating">
                    <input type="name" name="name" class="form-control @error('name') is-invalid @enderror"  id="name" placeholder="name" autofocus required value="{{ old ('name') }}"  oninvalid="this.setCustomValidity('Nama harus diisi')" oninput="setCustomValidity('')">
                    <label for="name">Nama</label>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                    <div class="mb-3 mt-2 form-floating">
                        <input type="username" name="username" class="form-control @error('username') is-invalid @enderror"  id="username" placeholder="username" autofocus required value="{{ old ('username') }}"  oninvalid="this.setCustomValidity('username harus diisi')" oninput="setCustomValidity('')">
                        <label for="username">username</label>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                    <div class="mb-3 mt-2 form-floating">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"  id="email" placeholder="email" autofocus required value="{{ old ('email') }}"  oninvalid="this.setCustomValidity('Email harus diisi')" oninput="setCustomValidity('')">
                    <label for="email">email</label>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                    <div class="mb-3 mt-2 form-floating">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"  id="password" placeholder="password" autofocus required value="{{ old ('password') }}"  oninvalid="this.setCustomValidity('password harus diisi')" oninput="setCustomValidity('')">
                    <label for="password">password</label>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                      <button type="submit" class="btn btn-primary d-grid gap-2 mb-3 col-12 gradient-custom-2 mx-auto">Daftar</button>
  
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