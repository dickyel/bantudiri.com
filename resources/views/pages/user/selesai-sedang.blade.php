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
                        Dalam tingkat ini, kamu terkadang memiliki keengganan dalam memulai atau menyelesaikan tugas-tugas akademik. Kamu mungkin menyadari bahwa ada pekerjaan yang harus segera diselesaikan, tetapi merasa sulit untuk mengatasi hambatan secara mental maupun emosional yang mencegah kamu untuk segera mengerjakan pekerjaan tersebut. Rasa cemas atau takut akan hasil kerja yang tidak memuaskan juga bisa menjadi pemicu prokrastinasi pada tingkat ini. Dalam hal ini juga bisa berkaitan dengan tekanan akademik yang meningkat, tingkat kerumitan tugas yang dihadapi atau keterampilan manajemen waktu yang kurang efektif. Dampak yang dirasakan dalam tingkat ini cukup signifikan dan bisa memicu penurunan kinerja akademikmu.
                     </li>
                  
                     
                  </ul>
               </div>
            </div>

            <div class="col-md-6">
            <h2 class="title-text">Apa yang perlu dilakukan ?</h2>
               

               <div class="row mt-2">
                  <ul>
              
                     <li class="mt-2" style="list-style:none; font-family: 'Poppins'; ">
                        <h5 style="font-weight: bold; ">Teknik Visualisasi</h5>
                     </li>
                     <li class="mt-2" style="list-style:none; font-family: 'Poppins'; text-align: justify; ">
                        Visualisasikan hasil positif apa yang akan kamu dapatkan dari menyelesaikan tugas untuk meningkatkan motivasi kamu.
                     </li>
                     <li class="mt-2" style="list-style:none; font-family: 'Poppins'; ">
                        <h5 style="font-weight: bold; ">Mengelola Pemicu Prokrastinasi</h5>
                     </li>
                     <li class="mt-2" style="list-style:none; font-family: 'Poppins'; text-align: justify; ">
                        Kenali apa saja pemicu prokrastinasi yang kamu alami dan tuliskan dalam sebuah kertas serta bagaimana cara kamu akan mengatasi itu.
                     </li>
                     <li class="mt-2" style="list-style:none; font-family: 'Poppins'; ">
                        <h5 style="font-weight: bold; ">Lingkungan Belajar</h5>
                     </li>
                     <li class="mt-2" style="list-style:none; font-family: 'Poppins'; text-align: justify; ">
                        Bentuk kelompok belajar atau cari teman dalam belajar untuk meningkatkan motivasi dan rasa tanggungjawab kamu dalam pengerjaan tugas.
                     </li>
                     <li class="mt-2" style="list-style:none; font-family: 'Poppins'; ">
                        <h5 style="font-weight: bold; ">Perhatikan Kesehatan Tubuh</h5>
                     </li>
                     <li class="mt-2" style="list-style:none; font-family: 'Poppins'; text-align: justify; ">
                        Pastikan kamu cukup tidur, berolahraga dan makan dengan baik untuk mendukung kesehatan fisik dan juga mental kamu.
                     </li>

                     <li class="mt-2" style="list-style:none; font-family: 'Poppins'; ">
                        <h5 style="font-weight: bold; ">Fokus Pada Tujuan Kamu</h5>
                     </li>
                     <li class="mt-2" style="list-style:none; font-family: 'Poppins'; text-align: justify; ">
                        Ingatlah apa yang ingin kamu capai dengan menyelesaikan tugas-tugas akademik kamu. Fokus pada tujuan akan membantu kamu tetap termotivasi untuk mengerjakan tugas-tugas tersebut.
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      
      </div>
    </section>

@endsection