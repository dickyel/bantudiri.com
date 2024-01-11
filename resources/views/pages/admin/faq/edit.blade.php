@extends('layouts.admin')


@section('title','Faq-edit')

@section('content')

    <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Form Edit Faq</h2>
        @if($errors->any())
                        
            <div class="alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>    
            </div>
        
        @endif
            <form action="{{ route('faq-admin.update', $item->id ) }}" method="post" enctype="multipart/form-data">
                @method('PUT') 
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="kategori">Nama Kategori:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $item->question }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="describe">Deskripsi:</label>
                            <textarea type="text" class="form-control" id="describe" name="describe" id="describe">{{ $item->describe }}</textarea>
                        </div>
                    </div>
                
                </div>
                <button type="submit" class="btn btn-primary">Edit Faq</button>
            </form>
    </div>

@endsection

@push('after-script')
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace('describe');
</script>
@endpush