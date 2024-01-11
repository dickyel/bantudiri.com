@extends('layouts.admin')


@section('title','About-edit')

@section('content')

    <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Form Edit About</h2>
        @if($errors->any())
                        
            <div class="alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>    
            </div>
        
        @endif
            <form action="{{ route('about-admin.update', $item->id ) }}" method="post" enctype="multipart/form-data">
                @method('PUT') 
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="point">About:</label>
                            <input type="text" class="form-control" id="point" name="about" value="{{ $item->about }}">
                        </div>
                    </div>
                 
                
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
    </div>

@endsection
