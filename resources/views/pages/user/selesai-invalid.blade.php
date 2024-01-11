@extends('layouts.menu')


@section('title','selesai test')


@section('content')

    <section class="section-content h-100 w-100" data-aos="fade-up" data-aos-duration="1000">
      <div class="content container mx-auto  position-relative" >

         <div class="row">
            <div class="col-md-6">
            <h2 class="title-text">Kamu sudah selesai</h2>
               <p class="text-caption">Kamu menunjukkan prokrastinasi akademik pada tingkat <br><strong>{{ $levelName }}</strong></p>
               <div class="row">
                  <div class="col-lg-8 text-lg-start">
                      <label for="" class="form-label mt-2">Nama Lengkap:</label>
                      <input type="text" class="form-control" value="{{ auth()->user()->name }}" readonly>
                  </div>
                  <div class="col-lg-4 text-lg-start ">
                     <label for="" class="form-label mt-2">Tanggal Tes :</label>
                     <input type="text" class="form-control" value="{{ $dateTest }}" readonly>
                  </div>

               </div>

               <div class="row mt-2">
                  <ul>
                     <li style="font-size: 14px; text-align: justify;">
                        Dalam tingkat ini kamu memiliki kecenderungan untuk menunda pekerjaan atau tugas-tugas akademik tanpa alasan yang jelas. Kamu mungkin sesekali merasa sulit untuk memulai tugas atau mengalihkan perhatianmu terhadap aktivitas lain yang bahkan tidak berkaitan dengan pekerjaan yang seharusnya kamu lakukan seperti membuka aplikasi media sosial, menonton video online atau film padahal kamu masih memiliki tugas dan kewajiban yang harus segera kamu selesaikan. Dampak dalam tingkat ini biasanya tidak terlalu signifikan, namun dapat mengganggu produktivitas dan kinerja akademikmu.
                     </li>
                  
                     
                  </ul>
               </div>
            </div>

          
         </div>
      
      </div>
    </section>

@endsection