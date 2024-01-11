@extends('layouts.admin')


@section('title','card-admin-create')

@section('content')


<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4">Form Tambah Card</h2>
    @if($errors->any())
                    
        <div class="alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>    
        </div>
    
    @endif
    <form action="{{ route('card-admin.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="faq">Image:</label>
                    <input type="file" class="form-control" id="image" name="image" onchange="previewThumbnail(this)">
                    <small>Ukuran gambar harus ukuran 30x30</small>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="Thumbnail Preview">Thumbnail Preview:</label>
                    <img id="image-preview" src="#" alt="image Preview" style="max-width: 100%; max-height: 200px; display: none;">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="faq">Teks Besar:</label>
                    <input type="text" class="form-control" name="big_text">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="faq">Caption:</label>
                    <input type="text" class="form-control" name="caption_text">
                </div>
            </div>
           
        </div>
        <button type="submit" class="btn btn-primary">Tambah Simpan</button> 
        <span>
         
        </span>
    </form>

</div>

@endsection

@push('after-script')
<script>
    
    function previewThumbnail(input) {
        var thumbnailPreview = document.getElementById('image-preview');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                thumbnailPreview.src = e.target.result;
                thumbnailPreview.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            thumbnailPreview.src = '#';
            thumbnailPreview.style.display = 'none';
        }
    }
</script>
@endpush