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
                     Dalam tingkat ini, kamu mungkin berada di kondisi dimana kamu menghadapi kesulitan yang serius baik dalam memulai maupun menyelesaikan tugas-tugas akademik. Penundaan yang kamu lakukan bisa sangat parah hingga menyebabkan tugas-tugas tidak terselesaikan sama sekali. Ini menunjukkan bahwa kamu sulit mengatasi perasaan negatif yang mungkin muncul terkait tugas akademik.
                     <br>Kamu mungkin merasa sangat frustrasi dan bingung mengenai tugas-tugas yang harus segera kamu kerjakan. Meskipun kamu menyadari pentingnya menyelesaikan tugas, kamu mungkin merasa terjebak dalam kebiasaan menunda-nunda yang sulit untuk diubah. Dalam tingkat ini bisa saja menjadi gejala dari masalah kesehatan mental yang lebih besar, seperti kecemasan dan depresi. Dampak yang dihasilkan juga akan sangat merugikan kamu baik dari nilai maupun prestasi.
                     </li>
                  
                     
                  </ul>
               </div>
            </div>

            <div class="col-md-6">
            <h2 class="title-text">Apa yang perlu dilakukan ?</h2>
               

               <div class="row mt-2">
                  <ul>
              
                     <li class="mt-2" style="list-style:none; font-family: 'Poppins'; ">
                        <h5 style="font-weight: bold; ">Segera Cari Bantuan Profesional</h5>
                     </li>
                     <li class="mt-2" style="list-style:none; font-family: 'Poppins'; text-align: justify; ">
                        Jika prokrastinasi kamu sudah mencapai tingkat berat, sebaiknya kamu segera mencari bantuan profesional, seperti psikolog atau psikiater. Mereka dapat membantu kamu memahami penyebab prokrastinasi kamu dan mengembangkan strategi yang tepat untuk mengatasinya.
                     </li>
                     <li class="mt-2" style="list-style:none; font-family: 'Poppins'; ">
                        <h5 style="font-weight: bold; ">Mulailah dengan Tugas yang Dirasa Paling Mudah</h5>
                     </li>
                     <li class="mt-2" style="list-style:none; font-family: 'Poppins'; text-align: justify; ">
                        Jangan mencoba untuk menyelesaikan tugas-tugas sekaligus. Mulailah dengan tugas-tugas yang dirasa paling mudah, dan secara bertahap tingkatkan kesulitannya.
                     </li>
                     <li class="mt-2" style="list-style:none; font-family: 'Poppins'; ">
                        <h5 style="font-weight: bold; ">Berikan diri Kamu hadiah</h5>
                     </li>
                     <li class="mt-2" style="list-style:none; font-family: 'Poppins'; text-align: justify; ">
                        Berikan diri kamu hadiah setiap kali kamu berhasil menyelesaikan tugas tepat waktu. Hal ini akan membantu kamu tetap termotivasi untuk mengerjakan tugas-tugas lainnya.
                     </li>
                     <li class="mt-2" style="list-style:none; font-family: 'Poppins'; ">
                        <h5 style="font-weight: bold; ">Jangan terlalu keras pada diri sendiri</h5>
                     </li>
                     <li class="mt-2" style="list-style:none; font-family: 'Poppins'; text-align: justify; ">
                        Jika kamu merasa tertekan atau kewalahan, berhentilah sejenak untuk beristirahat. Jangan memaksakan diri untuk mengerjakan tugas jika kamu tidak mampu melakukannya.
                     </li>

                     
                  </ul>
               </div>
            </div>
         </div>
      
      </div>
    </section>

@endsection