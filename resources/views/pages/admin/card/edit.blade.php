@extends('layouts.admin')

@section('title', 'Card-edit')

@section('content')
    <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Form Edit Card</h2>
        @if($errors->any())
            <div class="alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('card-admin.update', $item->id ) }}" method="post" enctype="multipart/form-data">
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
                        <label for="faq">Teks Besar:</label>
                        <input type="text" class="form-control" name="big_text" value="{{ $item->big_text }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="faq">Caption:</label>
                        <input type="text" class="form-control" name="caption_text" value="{{ $item->caption_text }}">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Edit Faq</button>
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
