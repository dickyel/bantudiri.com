@extends('layouts.menu')

@section('title', 'Tes Prokraktinasi')

@section('content')

<section class="section-content h-100 w-100" data-aos="fade-up" data-aos-duration="1300">
    <div class="content container-xxl mx-auto position-relative">
        <div class="d-flex flex-lg-row flex-column align-items-center">
            <!-- Left Column -->
            <div class="img-hero text-center justify-content-center d-flex">
                <img id="hero" class="img-fluid" src="assets/test-logo.svg" alt="" />
            </div>
            <!-- Right Column -->
            <div class="right-column d-flex flex-column align-items-lg-start align-items-center text-lg-start ">
                <h2 class="title-text">Tidak ada jawaban yang<br>benar / salah </h2>
                <p class="text-caption">tes ini akan dimulai dalam waktu <span id="countdown">15</span> detik .....</p>
            
        </div>
    </div>
</section>

@endsection


@push('after-scripts')

<script>
    // Countdown timer
    var seconds = 15;
    function countdown() {
        seconds--;
        document.getElementById("countdown").innerText = seconds;
        if (seconds <= 0) {
            // Redirect or perform any action when the countdown reaches zero
            window.location.href = "/question";
        } else {
            setTimeout(countdown, 1000);
        }
    }
    countdown(); // Start the countdown when the page loads
</script>

@endpush