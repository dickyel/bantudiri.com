@extends('layouts.admin')

@section('title', 'Header-edit')

@section('content')
    <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Form Edit Header</h2>
        @if($errors->any())
            <div class="alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('header-admin.update', $item->id ) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="faq">Image:</label>
                        <input type="file" class="form-control" id="image" name="image" onchange="previewThumbnail(this)">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="Thumbnail Preview">Thumbnail Preview:</label>
                        @if($item->image)
                            <img id="image-preview" src="{{ asset('storage/' . $item->image) }}" alt="image Preview" style="max-width: 100%; max-height: 200px;">
                        @else
                            <img id="image-preview" src="#" alt="image Preview" style="max-width: 100%; max-height: 200px; display: none;">
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="faq">Teks Pertama:</label>
                        <input type="text" class="form-control" name="first_text" value="{{ $item->first_text }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="faq">Teks Kedua:</label>
                        <input type="text" class="form-control" name="second_text" value="{{ $item->second_text }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="faq">Teks Ketiga:</label>
                        <input type="text" class="form-control" name="third_text" value="{{ $item->third_text }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="faq">Caption First:</label>
                        <input type="text" class="form-control" name="caption_first" value="{{ $item->caption_first }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="faq">Caption Second:</label>
                        <input type="text" class="form-control" name="caption_second" value="{{ $item->caption_second }}">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Edit Header</button>
        </form>
    </div>

    
@endsection

@push('after-style')

    <script>
        function previewThumbnail(input) {
            var preview = document.getElementById('image-preview');
            var file = input.files[0];
            var reader = new FileReader();

            reader.onloadend = function () {
                preview.src = reader.result;
                preview.style.display = 'block';
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "#";
            }
        }
    </script>

@endpush
