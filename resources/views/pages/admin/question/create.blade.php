@extends('layouts.admin')

@section('title', 'Question-admin-create')

@section('content')
<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4">Form Tambah Question</h2>
    @if($errors->any())
        <div class="alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('question-admin.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="form-group mb-4">
                    <label for="point">Question:</label>
                    <textarea class="form-control" id="question" name="questions[]"></textarea>
                    <small>Tambahkan ? (tanda tanya) disetiap pertanyaan yang dibuatnya</small>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group mb-4">
                    <label for="pos_neg">Pos/Neg:</label>
                    <select class="form-control" id="pos_neg" name="pos_negs[]">
                        <option value="positif">Positif</option>
                        <option value="negatif">Negatif</option>
                    </select>
                </div>
            </div>
        </div>

        <div id="additionalForms"></div>

        <button type="submit" class="btn btn-primary">Tambah Simpan</button>

        <button type="button" class="btn btn-secondary" id="addForm">Tambah Form</button>
    </form>

</div>

<script>
    $(document).ready(function () {
        var formCounter = 1;

        $('#addForm').on('click', function () {
            formCounter++;

            var newForm = '<div class="row" id="formRow_' + formCounter + '">' +
                '<div class="col-md-12">' +
                '<div class="form-group mb-4">' +
                '<label for="point">Question:</label>' +
                '<textarea class="form-control" id="question_' + formCounter + '" name="questions[]"></textarea>' +
                '<small>Tambahkan ? (tanda tanya) disetiap pertanyaan yang dibuatnya</small>' +
                '</div>' +
                '</div>' +
                '<div class="col-md-12">' +
                '<div class="form-group mb-4">' +
                '<label for="pos_neg">Pos/Neg:</label>' +
                '<select class="form-control" id="pos_neg_' + formCounter + '" name="pos_negs[]">' +
                '<option value="positif">Positif</option>' +
                '<option value="negatif">Negatif</option>' +
                '</select>' +
                '</div>' +
                '</div>' +
                '<div class="col-md-12">' +
                '<button type="button" class="btn btn-danger removeForm" data-form-id="' + formCounter + '">Remove Form</button>' +
                '</div>' +
                '</div>';

            $('#additionalForms').append(newForm);
        });

        $('#additionalForms').on('click', '.removeForm', function () {
            var formId = $(this).data('form-id');
            $('#formRow_' + formId).remove();
        });
    });
</script>

@endsection
