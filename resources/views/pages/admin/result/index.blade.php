@extends('layouts.admin')

@section('title', 'Result-admin')

@section('content')

<!-- tambahan -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Detail Tes Prokraktinasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="modalContent"></div>
            </div>
        </div>
    </div>
</div>
<!-- end tambahan -->

<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4">Hasil Tes Prokraktinasi</h2>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Jenjang</th>
                        <th>Tanggal Tes</th>
                        <th>Pertanyaan & Jawaban</th>
                        <th>Hasil Skor</th>
                        <th>Level</th>
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
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excel',
                    text: 'Export to Excel',
                    title: 'Data Hasil Tes Prokraktinasi',
                    className: 'btn btn-primary',
                    action: function () {
                        exportToExcel();
                    }
                }
            ],
            
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
                },
                {
                    data: 'name',
                    name: 'name',
                    searchable: true,
                },
                {
                    data: 'jenjang',
                    name: 'jenjang',
                    searchable: true,
                },
                {
                    data: 'date_test',
                    name: 'date_test',
                    searchable: true,
                    render: function (data) {
                        var date = new Date(data);
                        var options = { year: 'numeric', month: 'long', day: 'numeric' };
                        return date.toLocaleDateString('id-ID', options);
                    },
                },
                {
                    data: 'questions',
                    name: 'questions',
                    visible: false,
                    render: function (data) {
                    var html = '';
                    html += '<div>' +
                        '<div>' + data.question + '</div>' + '<br>' +
                        '<div>' + data.response + '</div>' +
                        '</div>';
                    return html;
                    }
                },
                {
                    data: 'total_score',
                    name: 'total_score',
                    searchable: true,
                },
                {
                    data: 'level',
                    name: 'level',
                    searchable: true,
                },
                //tambahan
                {
                    data: null,
                    searchable: false,
                    render: function (data, type, full, meta) {
                        return '<button class="btn btn-primary btn-sm view-detail" data-toggle="modal" data-target="#detailModal" data-name="' + full.name + '" data-jenjang="' + full.jenjang + '" data-date="' + full.date_test + '" data-questions=\'' + JSON.stringify(full.questions) + '\' data-score="' + full.total_score + '" data-level="' + full.level + '">Lihat Detail</button>';
                    },
                },

            ],
        });
        
        function exportToExcel() {
            var table = $('#crudTable').DataTable();
            var data = table.rows().data().toArray();
    
            var html = '<table style="border-collapse: collapse; border: 1px solid black;"><thead><tr>' +
                       '<th style="border: 1px solid black;">No</th>' +
                       '<th style="border: 1px solid black;">Nama</th>' +
                       '<th style="border: 1px solid black;">Jenjang</th>' +
                       '<th style="border: 1px solid black;">Tanggal Tes</th>' +
                       '<th style="border: 1px solid black;">Pertanyaan & Jawaban</th>' +
                       '<th style="border: 1px solid black;">Hasil Skor</th>' +
                       '<th style="border: 1px solid black;">Level</th></tr></thead><tbody>';
    
            data.forEach(function (item, index) {
                var formattedDate = formatDate(item.date_test);
                var formattedQuestions = formatQuestions(item.questions);
                
                html += '<tr>' +
                        '<td style="border: 1px solid black;">' + (index + 1) + '</td>' +
                        '<td style="border: 1px solid black;">' + item.name + '</td>' +
                        '<td style="border: 1px solid black;">' + item.jenjang + '</td>' +
                        '<td style="border: 1px solid black;">' + formattedDate + '</td>' +
                        '<td style="border: 1px solid black;">' + formattedQuestions + '</td>' +
                        '<td style="border: 1px solid black;">' + item.total_score + '</td>' +
                        '<td style="border: 1px solid black;">' + item.level + '</td>' +
                        '</tr>';
            });
    
            html += '</tbody></table>';
    
            var url = 'data:application/vnd.ms-excel,' + encodeURIComponent(html);
            var link = document.createElement("a");
            link.download = "data_hasil_tes_prokraktinasi.xls";
            link.href = url;
            link.click();
        }
    
        function formatDate(dateString) {
            var date = new Date(dateString);
            var options = { day: 'numeric', month: 'long', year: 'numeric' };
            return date.toLocaleDateString('id-ID', options);
        }
    
        function formatQuestions(questions) {
            var formatted = '';
            questions.forEach(function (q) {
                formatted += 'Pertanyaan: ' + q.question + '<br>Jawaban: ' + q.response + '<br><br>';
            });
            return formatted;
        }
        
        //tambahan
        $('#detailModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var name = button.data('name');
            var jenjang = button.data('jenjang');
            var date = new Date(button.data('date')).toLocaleDateString('id-ID', { year: 'numeric', month: 'long', day: 'numeric' });
            var questions = button.data('questions');
            var score = button.data('score');
            var level = button.data('level');
        
            var modal = $(this);
            modal.find('.modal-title').text('Detail Tes Prokraktinasi - ' + name);
            var modalContent = '<p><strong>Nama:</strong> ' + name + '</p>' +
                '<p><strong>Jenjang:</strong> ' + jenjang + '</p>' +
                '<p><strong>Tanggal Tes:</strong> ' + date + '</p>' +
                '<p><strong>Pertanyaan & Jawaban:</strong></p>';
        
            questions.forEach(function (item, index) {
                modalContent += '<div>' +
                    '<div><strong>Pertanyaan ' + (index + 1) + ':</strong> ' + item.question + '</div>' +
                    '<div><strong>Jawaban:</strong> ' + item.response + '</div>' +
                    '</div><br>';
            });
        
            modalContent += '<p><strong>Hasil Skor:</strong> ' + score + '</p>' +
                '<p><strong>Level:</strong> ' + level + '</p>';
        
            $('#modalContent').html(modalContent);
        });

    </script>
@endpush
