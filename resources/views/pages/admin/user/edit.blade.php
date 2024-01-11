@extends('layouts.admin')


@section('title','instruction-admin-create')

@section('content')


<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4">Form Tambah User</h2>
    @if($errors->any())
                    
        <div class="alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>    
        </div>
    
    @endif
    <form action="{{ route('user-admin.update, $item->id') }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="name">Nama :</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $item->email }}">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="kategori">Password: </label>
                    <input type="password" class="form-control" id="password" name="password" value="{{ $item->password }}">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="kategori">Role: </label>
                    <select class="form-control" name="role" value="{{ $item->role }}">
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>
            </div>
           
        </div>
        <button type="submit" class="btn btn-primary">Tambah Simpan</button> 
        <span>
         
        </span>
    </form>

</div>

@endsection
