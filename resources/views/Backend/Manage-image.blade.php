@extends('layouts.Backend.backend-main-layouts')

@section('Header')
    <h2> Manage Image </h2>
@endsection

@section('Content')
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="card card-primary">
                <div class="card-body">
                    <a href="/add/image" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add
                        Picture</a>
                    <div class="table table-sm mt-3">
                        <table id="tabelimage" class="ui celled table nowrap unstackable" style="width: 100%">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Image</th>
                                    <th style="width: 40px">Position</th>
                                    <th style="width: 40px">Publish</th>
                                    <th style="width: 40px">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Modal-addPictures" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true" backdrop="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form-addPictures" name="form-addPictures" action="{{ route('manage-image.store') }}"
                    method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Suhu</label>
                            <div class="col-sm-12 col-md-7">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('img') is-invalid @enderror"
                                        id="image" name="img" aria-describedby="inputGroupFileAddon01" required>
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                                @error('image')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Position</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="form-control form-control-sm @error('position') is-invalid @enderror"
                                    id="position" name="position" title="Select Address" required>
                                    <option value="Header">Header</option>
                                    <option value="About">About</option>
                                </select>
                                @error('position')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-sm btn-primary">Upload</button>
                    </div>
                </form>
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

        table = $('#tabelimage').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            ajax: {
                url: "{{ route('manage-image.index') }}",
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
                    data: 'image',
                    name: 'image',
                },
                {
                    data: 'position',
                    name: 'position',
                },
                {
                    data: 'published'
                },
                {
                    data: 'aksi',
                    name: 'aksi',
                    searchable: false
                },
            ],
            order: [
                [0, 'asc']
            ]
        });

        function switch_publish(id) {
            var status = $('#customSwitch' + id).is(':checked') ? 1 : 0;
            $.ajax({
                url: '/publish_image/' + id,
                type: "GET",
                dataType: "json",
                data: {
                    'status': status
                },
                success: function(data) {
                    console.log(data)
                }
            });
        }



        function reload_table() {
            table.ajax.reload(null, false);
        }

        function add_picture(id) {
            $('#form-addPictures')[0].reset();
            $('#Modal-addPictures').appendTo("body").modal(
                'show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Add Pictures'); // Set title to Bootstrap modal title
        }

        function upload() {
            $.ajax({
                url: "{{ route('manage-image.store') }}",
                type: "POST",
                data: $('#form-addPictures').serialize(),
                dataType: "JSON",
                success: function(data) {
                    if (data.status) {
                        console.log(data);
                        toastr.success('Data Berhasil Disimpan!')

                    }
                },
                error: function(xhr) {
                    toastr.error(xhr.responseJSON.text, 'Gagal!')
                }
            });
        }
    </script>
@endsection
