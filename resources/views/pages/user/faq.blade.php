@extends('layouts.menu')

@section('title','Faq')

@section('content')

    <section class="section-content h-100 w-100"  data-aos="fade-up" data-aos-duration="1200">
        <div class="content container-xxl mx-auto  position-relative" >
            <div class="d-flex flex-lg-row flex-column align-items-center">
                <!-- Left Column -->
                <div class="img-hero text-center justify-content-center d-flex">
                    <img id="hero" class="img-fluid"
                        src="assets/hero-2.svg"
                        alt="" width="80%" />
                </div>
                <!-- Right Column -->
                <div class="right-column d-flex flex-column align-items-lg-start align-items-center text-lg-start text-center">
                    <h2 class="title-text">Frequently Asked Questions</h2>
                    <p class="text-caption">kami menyediakan beberapa pertanyaan, jika anda mengalami<br>kesulitan </p>
                    
                    <a href="#faq" class="btn btn-start mt-2 d-inline-flex ">
                        Lihat FAQ
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- section content -->
    <section class="section-faq h-100 w-100" id="faq" data-aos="fade-up" data-aos-duration="1200">
        <div class="faq container mx-auto position-relative" id="faqAccordion">
            <div class="row">
                @php $incrementFaq = 0 @endphp
                @forelse($faqs as $faq)
                    <div class="col-md-6">
                        <div class="accordion-item mt-2">
                            <h2 class="accordion-header" id="faqHeading{{ $incrementFaq }}">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse{{ $incrementFaq }}" aria-expanded="false" aria-controls="faqCollapse{{ $incrementFaq }}">
                                    {{ $faq->question }}
                                </button>
                            </h2>
                            <div id="faqCollapse{{ $incrementFaq }}" class="accordion-collapse collapse" aria-labelledby="faqHeading{{ $incrementFaq }}" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    {!! $faq->describe !!}.
                                </div>
                            </div>
                        </div>
                    </div>
                    @php $incrementFaq++ @endphp
                @empty
                    <div class="col-12 text-center py-5">
                        Tidak ada faq
                    </div>
                @endforelse
            </div>
        </div>
    </section>

@endsection

@push('after-scripts')

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var accordionButtons = document.querySelectorAll('.accordion-button');

        accordionButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                // Tutup semua elemen FAQ sebelum membuka yang baru
                accordionButtons.forEach(function(btn) {
                    btn.classList.remove('active');
                });

                // Tandai elemen yang sedang aktif
                button.classList.add('active');
            });
        });
    });
</script>

@endpush
