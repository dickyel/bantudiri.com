@extends('layouts.menu')


@section('title','login')


@section('content')


   <section class="section-content h-100 w-100" data-aos="fade-up" data-aos-duration="1300">
      <div class="content container-xxl mx-auto  position-relative" >
         <div class="d-flex flex-lg-row flex-column align-items-center">
            <!-- Left Column -->
            <div class="img-hero text-center justify-content-center d-flex">
               <img id="hero" class="img-fluid"
                  src="assets/login.svg"
                  alt="" />
            </div>
            <!-- Right Column -->
            <div class="right-column d-flex flex-column align-items-lg-start align-items-center text-start">
               <h2 class="title-text">Admin/User Login</h2>
               <p class="text-caption">Silahkan login dengan akun yang terdaftar dalam sistem</p>
               @if(session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissable fade show" role="error">
                        {{ session('loginError') }}
                        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="close"></button>
                    </div>
               @endif
               @if(session('success'))
                  <div class="alert alert-success">
                     {{ session('success') }}
                  </div>
               @endif
               <form action="{{ route('login.authenticate') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                     <div class="col-lg-10 text-lg-start mt-4">
                           <label for="" class="form-label mt-2">Email</label>
                           <input type="text" class="form-control" name="email" placeholder="ex: emailanda@gmail.com" value="{{ old('email') }}">
                           @error('email')
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                     </div>

                     <div class="col-lg-10 text-lg-start mt-4">
                        <label for="" class="form-label mt-2">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="password anda">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>

                  
                  </div>

                  <p class="mt-4" style="font-size: 12px;">apakah anda sudah memiliki akun ? <span><a href="{{ route('test-user') }}"><strong>Daftar sekarang</strong></a></span></p>

                  <button type="submit" class="btn btn-start ">Masuk</button>
                 
               </form>
              

              
                     
            </div>
         </div>
      </div>
   </section>

@endsection