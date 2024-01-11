@extends('layouts.menu')


@section('title','isi biodata test')


@section('content')

   <section class="section-content h-100 w-100" data-aos="fade-up" data-aos-duration="1300">
      <div class="content container-xl mx-auto  position-relative" >
         @if(session('success'))
            <div class="alert alert-success">
               {{ session('success') }}
            </div>
         @endif
         <form action="{{ route('test-user.participant.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">


               <div class="col-md-6 mb-3" style="display: none;">
                  <label for="" class="form-label mt-2">Tanggal Tes :</label>
                  <input type="text" class="form-control" name="date_test" value="{{ now()->format('Y-m-d') }}" readonly>

               </div>

               <div class="col-md-6 mb-3">
                  <label for="" class="form-label">Nama Lengkap</label>
                  <input type="text" class="form-control" name="name" pattern="[A-Za-z ]+" title="Nama lengkap hanya boleh mengandung huruf dan spasi" placeholder="ex: andi sumarni" required>
                  <small id="nameError" class="text-danger"></small>
               </div>

      

               <div class=" col-md-6 mb-3">
                  <label for="" class="form-label">
                     Buat Password
                  </label>
                  <input type="password" class="form-control" name="password" placeholder="ex:" required>
                  <small>Buat Password anda dengan bebas , asalkan bukan password digmail anda</small>
               </div>

               <div class=" col-md-6 mb-3">
                  <label for="" class="form-label">
                     Gender
                  </label>
                  <select name="gender" id="" class="form-control" required>
                     <option value="Laki-laki">Laki-laki</option>
                     <option value="Perempuan">Perempuan</option>
                  </select>
               </div>
               
               <div class=" col-md-6 mb-3">
                  <label for="" class="form-label">
                     Umur
                  </label>
                  <input type="number" name="age" class="form-control" placeholder="ex:19" required>
               </div>
   
               <div class=" col-md-6 mb-3">
                  <label for="" class="form-label">
                     Email
                  </label>
                  <input type="email" name="email" class="form-control" placeholder="ex: namaanda@gmail.com" required>
               </div>


               <div class=" col-md-6 mb-3">
                  <label for="" class="form-label">
                     Jenjang Pendidikan
                  </label>
                  <select class="form-control" name="jenjang" id="jenjang" required>
                     <option value="" disabled>Pilih Option</option>
                     <option value="D3">D3</option>
                     <option value="D4">D4</option>
                     <option value="S1">S1</option>
                  </select> 
                 
               </div>

               <div class=" col-md-6 mb-3">
                  <label for="" class="form-label">
                     Program Study
                  </label>
                  <input type="text" class="form-control" name="study" placeholder="ex:teknik informatika" required>
                  
                 
               </div>

               <input type="hidden" name="role" value="user">
   
               <div class="text-center">
                  <button type="submit" onclick="validateAndSubmit()" class="btn btn-start mt-4">Mulai Test</button>
               </div>
            </div>
         </form>
      </div>
   </section>
   

@endsection

@push('after-scripts')

   <script>
      function validateAndSubmit() {
         var nameInput = document.querySelector('input[name="name"]');
         var nameValue = nameInput.value;

         // Regex pattern to check for numbers or symbols
         var regexPattern = /[^A-Za-z ]/;

         if (regexPattern.test(nameValue)) {
            // Show error message
            document.getElementById('nameError').innerText = 'Nama lengkap hanya boleh mengandung huruf dan spasi.';
         } else {
            // Clear error message and submit the form
            document.getElementById('nameError').innerText = '';
            document.getElementById('biodataForm').submit();
         }
      }
   </script>

@endpush


