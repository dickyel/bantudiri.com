@extends('layouts.admin')


@section('title','Question-edit')

@section('content')

    <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Form Edit Question</h2>
        @if($errors->any())
                        
            <div class="alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>    
            </div>
        
        @endif
            <form action="{{ route('question-admin.update', $item->id ) }}" method="post" enctype="multipart/form-data">
                @method('PUT') 
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="point">Question:</label>
                            <input type="text" class="form-control" id="question" name="question" value="{{ $item->question }}">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group mb-4">
                            <label for="pos_neg">Pos/Neg:</label>
                            <select class="form-control" name="pos_neg" value="{{ $item->pos_neg }}">
                                <option value="positif">Positif</option>
                                <option value="negatif">Negatif</option>
                            </select>
                        </div>
                    </div>


                 
                
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
    </div>

@endsection
