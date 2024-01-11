@extends('layouts.admin')


@section('title','card-admin')

@section('content')

 <!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4">Headers</h2>
    <div class="row">

        @php
            
            $hasData = \App\Models\Header::count() > 0;
        @endphp

        @if (!$hasData)
        <div class="mb-3">
            <a href="{{ route('header-admin.create') }}" class="btn btn-primary">Tambah Header</a>
        </div>
        @endif
        <div class="table-responsive">
            <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                <thead class="thead-dark">
                    <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>First Text</th>
                    <th>Second Text</th>
                    <th>Third Text</th>
                    <th>Caption First</th>
                    <th>Caption Second</th>
                    <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                
                </tbody>
            </table>
        </div>
       
    </div>
</div>
@endsection

@push('after-script')
    <script>
        // AJAX DataTable
        var datatable = $('#crudTable').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [
                { 
                  data: 'DT_RowIndex', 
                  name: 'DT_RowIndex', 
                  orderable: false, 
                  searchable: false,
                  width: '5%',
                  render: function (data, type, row, meta) {
                      return meta.row + meta.settings._iDisplayStart + 1;
                  }
                },
                { data: 'image', name: 'image' },
                { data: 'first_text', name: 'first_text' },
                { data: 'second_text', name: 'second_text' },
                { data: 'third_text', name: 'third_text' },
                { data: 'caption_first', name: 'caption_first' },
                { data: 'caption_second', name: 'caption_second' },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    width: '15%'
                },
            ]
        });
    </script>
@endpush
