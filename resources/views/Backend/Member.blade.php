@extends('layouts.Backend.backend-main-layouts')

@section('Header')
    <h2> Teams </h2>
@endsection

@section('Content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <a href="{{ route('member.create') }}" type="button" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i>
                        Add teams</a>
                </div>
            </div>
            <div class="container-fluid mt-3">
                <table id="TabelAnggota" class="ui celled table responsive nowrap unstackable table-sm" style="width: 100%">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Nama</th>
                            <th>Posisi</th>
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


            table = $('#TabelAnggota').DataTable({
                processing: true,
                serverSide: true,
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                ajax: {
                    url: "{{ route('member.index') }}",
                    type: 'GET',
                    data: function(data) {}
                },
                columns: [{
                        "data": null,
                        "sortable": false,
                        searchable: false,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1
                        }
                    },
                    {
                        data: 'nama',
                    },
                    {
                        data: 'posisi',
                        searchable: false
                    },
                    {
                        data: 'image',
                        searchable: false
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
                        url: "/admin-post/" + id,
                        type: "DELETE",
                        dataType: "JSON",
                    })
                    toastr.success('Produk dihapus dari keranjang!')
                    window.location.reload()
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
