@extends('layouts.menu')


@section('title','selesai test')


@section('content')

    <section class="section-content h-100 w-100" data-aos="fade-up" data-aos-duration="1300">
      <div class="content container-xxl mx-auto  position-relative" >
         <div class="d-flex flex-lg-row flex-column align-items-center">
            <!-- Left Column -->
            <div class="img-hero text-center justify-content-center d-flex">
               <img id="hero" class="img-fluid"
                  src="assets/check.svg"
                  alt="" />
            </div>
            <!-- Right Column -->
            <div class="right-column d-flex flex-column align-items-lg-start align-items-center text-lg-start text-center">
               <h2 class="title-text">Kamu sudah selesai</h2>
               <p class="text-caption">Hasilnya anda adalah <strong>{{ $levelName }}</strong>, yuk tingkatkan lagi</p>
               
               <div class="row">
                  <div class="col-lg-8 text-lg-start mt-4">
                      <label for="" class="form-label mt-2">Nama Lengkap:</label>
                      <input type="text" class="form-control" value="{{ auth()->user()->name }}" readonly>
                  </div>
                  <div class="col-lg-4 text-lg-start mt-4">
                     <label for="" class="form-label mt-2">Tanggal Tes :</label>
                     <input type="text" class="form-control" value="{{ auth()->user()->date_test }}" readonly>
                  </div>

               </div>

               <a href="{{ route('test-user') }}" class="btn btn-start mt-4">Tes Kembali</a>
                     
            </div>
         </div>
      </div>
    </section>

@endsection