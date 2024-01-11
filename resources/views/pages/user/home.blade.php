@extends('layouts.landing-menu')

@section('title','Bantudiri.com')

@section('header')

<div class="mx-auto d-flex flex-lg-row flex-column hero" data-aos="fade-up"  data-aos-duration="2000">
    <!-- Left Column -->
    @foreach($headers as $header)
    <div
    class="left-column flex-lg-grow-1 d-flex flex-column align-items-lg-start text-lg-start align-items-center text-center">
        <h1 class="title-text">
            {{ $header->first_text }}<br class="d-lg-block d-none" />
            <span style="color: #9FFF02">{{ $header->second_text }}</span> <br class="d-lg-block d-none" />
            {{ $header->third_text }}
        </h1>
        <p class="caption">
            {{ $header->caption_first }} <br class="d-sm-block d-none" />
            {{ $header->caption_second }}
        </p>
   

    <div class="d-flex flex-sm-row flex-column align-items-center mx-auto mx-lg-0 justify-content-center ">
        <a href="{{ route('contact') }}" class="btn btn-get mt-2 d-inline-flex" id="about">
        Tentang Kami
        </a>
        
        <a href="{{ route('test-user') }}" class="btn btn-start mt-2 d-inline-flex ">
            Mulai Test
        </a>
    </div>
    </div>

    <!-- Right Column -->
    <div class="right-column d-flex justify-content-start justify-content-lg-start pe-0">
    <img class="d-lg-block d-none hero-right"
        src="{{ Storage::url($header->image) }}"
        alt="" />
    
    </div>

    @endforeach
</div>

@endsection

@section('content')

    <section class="h-100 w-100 bg-white" class="section-about" data-aos="fade-up" data-aos-duration="1500">
        <div class="content-about container-xxl mx-auto  position-relative" id="content-about">
        <div class="d-flex flex-lg-row flex-column align-items-center">
            <!--Left Column -->
            <div class="img-hero text-center justify-content-center d-flex">
            <img id="hero" class="img-fluid"
                src="assets/logo-2.svg"
                alt="" />
            </div>

            <!-- Right Column -->
            <div class="right-column d-flex flex-column align-items-lg-start align-items-center text-lg-start text-center">
            @foreach($abouts as $about)
            <p class="caption text-center" >

                {{ $about->about }}
            </p>
            @endforeach
            
            </div>
        </div>
        </div>
    </section>

    <section class="h-100 w-100 bg-white" data-aos="fade-up" data-aos-duration="1500">
    
        <div class="content-card overflow-hidden container-xxl mx-auto position-relative">
            <div class="container mx-auto">

                <div class="row">
                    @php $incrementCard = 0 @endphp

                    @forelse($cards as $card)
                    <div class="col-md-3">
                        <div class="card card-content">
                            <div class="card-body text-center">
                            <img src="
                                @if($card->count() > 0)
                                    {{ Storage::url($card->first()->image) }}
                                @else
                                    {{ asset('assets/people.svg') }}
                                @endif"
                                    alt="">
                            <h2 class="card-text">
                                {{ $card->big_text }}
                            </h2>
                            <p class="caption-text text-center">
                                {{ $card->caption_text }}
                            </p>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 text-center py-12">
                        Tidak ada card
                    </div>
                    @endforelse

                </div>
            </div>
        </div>
    </section>

    <section class=" bg-white mt-5">
        <div class="section-info" data-aos="fade-up" data-aos-duration="1000">
        <div class="container-xxl mx-auto position-relative">
            <div class="row align-items-center">
            
            <div class="col-md-6">
                <div class="text-center">
                <h2 class="section-title">#HidupSepenuhnya</h2>
                <p class="section-paragraph ">bantudiri.com hadir secara gratis untuk mengajarkan kemampuan dan hal penting dalam menjalani hidup. Kami percaya, setiap orang berhak berkembang, setidaknya 1% setiap hari menuju </p>
                
                <span style="color: #053A3E; font-weight: bold;">#HidupSepenuhnya </span>
                </div>
            </div>
            <div class="col-md-6 text-center mt-4">
            
                <img  src="assets/kerja.svg" alt="Gambar Anda" width="92%">
            
            </div>
            </div>
        </div>
        </div>
    
    </section>

    <section class=" bg-white mt-5" data-aos="fade-up" data-aos-duration="1500">
        <div class="section-info-test">
        <div class="container-xxl mx-auto position-relative">
            <div class="row align-items-center">
            
            <div class="col-md-12 text-center">
            
                <h2 class="section-title">#Apa yang membuat kami beda?</h2>

                <img src="assets/info-test.svg" alt="" >
                <p class="section-paragraph ">Tes dari bantudiri.com bertujuan untuk kenali diri
                agar dapat<br>
                
                <span style="color: #053A3E; font-weight: bold;">#HidupSepenuhnya </span>

                </p>
                
                <a href="{{ route('test-user') }}" class="btn btn-start mt-2 d-inline-flex ">
                    Mulai Test
                </a>
        
            </div>
    
            </div>
        </div>
        </div>
    
    </section>

    <section class="section-consultan mt-5" data-aos="fade-up" data-aos-duration="1500">
        <div class="section-consultan-info">
        <div class="container-xxl mx-auto position-relative">
            <div class="row align-items-center">
            <div class="col-md-12  text-center">
                <h3>
                Mau Konsultasi?
                </h3>
                <a href="" class="btn btn-help mt-4 d-inline-flex ">
                Butuh Bantuan?
                </a> <span>
                <a href="{{ route('test-user') }}" class="btn btn-start mt-4 me-lg-2 d-inline-flex ">
                    Mulai Test
                </a>
                </span>
            </div>
            </div>
        </div>
        </div>
    </section> 


@endsection