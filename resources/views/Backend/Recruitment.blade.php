@extends('layouts.Backend.backend-main-layouts')

@section('Header')
    <h2> Recruitment </h2>
@endsection

@section('Content')
    <div class="card">
        <div class="card-body">
            <div class="container-fluid mt-3">
                <table id="tabelPeserta" class="ui celled table responsive nowrap unstackable table-sm" style="width: 100%">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Nim</th>
                            <th>Nama Lengkap</th>
                            <th>Handphone</th>
                            <th>Tanggal Lahir</th>
                            <th>Fakultas</th>
                            <th>Program Studi</th>
                            <th>Surat Sehat</th>
                            <th>Surat Izin</th>
                            <th>Bukti Pembayaran</th>
                            <th>Foto</th>
                            <th style="width: 10px">Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('Js')
    <script>
        var table;
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        table = $('#tabelPeserta').DataTable({
            processing: true,
            serverSide: true,
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            ajax: {
                url: "{{ route('admin-recruitment.index') }}",
                type: 'GET',
                data: function(data) {}
            },
            columns: [{
                    "data": null,
                    "sortable": false,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1
                    }
                },
                {
                    data: 'nim',
                },
                {
                    data: 'nama_lengkap',
                },
                {
                    data: 'handphone',
                },
                {
                    data: 'tanggal_lahir',
                },
                {
                    data: 'fakultas',
                },
                {
                    data: 'program_studi',
                },
                {
                    data: 'surat_sehat',
                },
                {
                    data: 'surat_izin',
                },
                {
                    data: 'bukti_pembayaran',
                },
                {
                    data: 'foto',
                },
                {
                    data: 'aksi',
                    searchable: false
                },
            ],
            order: [
                [0, 'asc']
            ]
        });

        function delete_data(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
            })
            swalWithBootstrapButtons.fire({
                title: 'Konfirmasi !',
                text: "Anda Akan Menghapus Data ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus !',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "/admin-recruitment/" + id,
                        type: "DELETE",
                        dataType: "JSON",
                    })
                    toastr.success('Produk dihapus dari keranjang!')
                    table.ajax.reload(null, false);
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire(
                        'Batal',
                        'Data tidak dihapus',
                        'error'
                    )
                }
            })
        }
    </script>
@endsection
