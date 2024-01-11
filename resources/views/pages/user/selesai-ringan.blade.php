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
                     <input type="text" class="form-control" value="{{ $dateTest }}" readonly disabled>
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

            <div class="col-md-6">
            <h2 class="title-text">Apa yang perlu dilakukan ?</h2>
               

               <div class="row mt-2">
                  <ul>
              
                     <li class="mt-2" style="list-style:none; font-family: 'Poppins'; ">
                        <h5 style="font-weight: bold; ">Pembagian Waktu</h5>
                     </li>
                     <li class="mt-2" style="list-style:none; font-family: 'Poppins'; text-align: justify; ">
                        Buat jadwal harian atau mingguan dan urutkan mulai dari yang paling penting dan mendesak untuk pekerjaan akademik.
                     </li>
                     <li class="mt-2" style="list-style:none; font-family: 'Poppins'; ">
                        <h5 style="font-weight: bold; ">Menentukan Tujuan Kecil</h5>
                     </li>
                     <li class="mt-2" style="list-style:none; font-family: 'Poppins'; text-align: justify; ">
                        Tentukan tujuan kecil dan realistis setiap hari agar tidak terlalu menakutkan.
                     </li>
                     <li class="mt-2" style="list-style:none; font-family: 'Poppins'; ">
                        <h5 style="font-weight: bold; ">Buat Lingkungan Belajar yang Kondusif</h5>
                     </li>
                     <li class="mt-2" style="list-style:none; font-family: 'Poppins'; text-align: justify; ">
                        Pastikan kamu memiliki tempat belajar yang tenang dan nyaman, serta jauh dari gangguan.
                     </li>
                     <li class="mt-2" style="list-style:none; font-family: 'Poppins'; ">
                        <h5 style="font-weight: bold; ">Self-Reward</h5>
                     </li>
                     <li class="mt-2" style="list-style:none; font-family: 'Poppins'; text-align: justify; ">
                        Berikan penghargaan pada diri sendiri atau self-reward setelah menyelesaikan tugas, seperti istirahat singkat atau hiburan sejenak.
                     </li>

                     <li class="mt-2" style="list-style:none; font-family: 'Poppins'; ">
                        <h5 style="font-weight: bold; ">Pelajari Teknik Manajemen Waktu</h5>
                     </li>
                     <li class="mt-2" style="list-style:none; font-family: 'Poppins'; text-align: justify; ">
                        Teknik-teknik manajemen waktu, seperti teknik Pomodoro atau teknik Eisenhower, dapat membantu kamu mengelola waktu kamu dengan lebih efektif dan efisien.
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      
      </div>
    </section>

@endsection