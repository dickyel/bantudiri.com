@extends('layouts.admin')


@section('title','level-admin-create')

@section('content')


<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4">Form Tambah Level</h2>
    @if($errors->any())
                    
        <div class="alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>    
        </div>
    
    @endif
    <form action="{{ route('level-admin.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="point">Level:</label>
                    <input type="text" class="form-control" id="level" name="level">
                </div>
            </div>
           
        </div>
        <button type="submit" class="btn btn-primary">Tambah Simpan</button> 
        <span>
         
        </span>
    </form>

</div>

@endsection
