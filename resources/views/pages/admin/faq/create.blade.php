@extends('layouts.admin')


@section('title','faq-admin-create')

@section('content')


<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4">Form Tambah Kategori</h2>
    @if($errors->any())
                    
        <div class="alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>    
        </div>
    
    @endif
    <form action="{{ route('faq-admin.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="faq">Faq:</label>
                    <input type="text" class="form-control" id="question" name="question">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="describe">Deskripsi:</label>
                    <textarea type="text" class="form-control" id="describe" name="describe" id="describe"></textarea>
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
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace('describe');
</script>
@endpush