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
            <div class="right-column d-flex flex-column align-items-lg-start text-start ">
                <h2 class="title-text">Tes Prokraktinasi Akademik</h2>
                <p class="text-caption">Petunjuk cara mengerjakan tes ada dipenjelasan berikut ini:</p>
                <ol class="list-group list-group-numbered " style="margin-left: 14px;">
                    @php $incrementInstruction = 0 @endphp
                    @forelse($instructions as $instruction)
                    <li class="mt-0 mt-lg-2">{{ $instruction->point }}</li>
                    @empty
                    <li class="mt-0 mt-lg-2">Tidak ada intruksi nih..</li>
                    @endforelse
                </ol>

                <!-- Button to trigger the modal -->
                <button type="button" class="btn btn-start mt-4" data-bs-toggle="modal" data-bs-target="#startModal">
                    Mulai
                </button>

                <!-- Modal -->
                <div class="modal fade" id="startModal" tabindex="-1" aria-labelledby="startModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="startModalLabel">Test Prokrastinasi ?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            @guest
                            <div class="modal-body">
                                <!-- Modal content -->
                                <p>Jika Anda sudah daftar , maka ke tombol login</p>
                                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                                <p>Jika anda belum, maka klik daftar biodata</p>
                                
                                <a href="{{ route('test-user.participant') }}" class="btn btn-primary">Daftar Biodata </a>
                            </div>
                            @else
                                @if(Auth::user()->role == 'admin' )
                                    <div class="modal-body">
                                        <!-- Modal content -->
                                        <p>Anda adalah Admin anda tidak bisa mendaftar untuk melakukan test </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <!-- Add your login and registration links here --> 
                                    </div>
                                @elseif(Auth::user()->role == 'user')
                                    @if(Auth::user()->answers->count() > 1)
                                    <div class="modal-body">
                                        <!-- Modal content -->
                                        <p>Anda sudah pernah melakukan test , silahkan daftar dengan akun lain</p>
                                    
                                    </div>
                                    @else
                                    <div class="modal-body">
                                        <!-- Modal content -->
                                        <p>Anda sudah login silahkan klik langsung test nya.....</p>
                                        
                                        <a href="{{ route('test-user.before') }}" class="btn btn-primary">Langsung Test</a>
                                    </div> 
                                    
                                    @endif

                                @endif
                            @endguest
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
