@extends('layouts.Backend.backend-main-layouts')

@section('Header')
    <h2> Post </h2>
@endsection

@section('Content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <a href="{{ route('admin-post.create') }}" type="button" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i>
                        Create Post</a>
                </div>
                <div class="col-6" align="right">
                    <a href="#" type="button" onclick="add_tag()" class="btn btn-sm btn-dark">
                        <i class="fas fa-tags"></i> Tags</a>
                </div>
            </div>
            @if (session('status'))
                <div class="alert alert-success alert-has-icon alert-dismissible show fade">
                    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        <div class="alert-title">Success</div>
                        {{ session('status') }}
                    </div>
                </div>
            @endif
            <div class="container-fluid mt-3">
                <table id="postTabel" class="ui celled table responsive nowrap unstackable table-sm" style="width: 100%">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Tags</th>
                            <th>Publish</th>
                            <th style="width: 10px">Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Tag" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/addCategory" id="form-Tag" method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="text" class="form-control form-control-sm @error('category') is-invalid @enderror" name="category" id="category">
                        @error('category')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
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

        table = $('#postTabel').DataTable({
            processing: true,
            serverSide: true,
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            ajax: {
                url: "{{ route('admin-post.index') }}",
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
                    data: 'title',
                },
                {
                    data: 'image',
                },
                {
                    data: 'category.name',
                },
                {
                    data: 'tags[].tag',
                },
                {
                    data: 'publish',
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

        function add_tag() {
            $('#form-Tag')[0].reset();
            $('#Tag').appendTo("body").modal(
                'show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Add Tag'); // Set title to Bootstrap modal title
        }

        function edit_data(id) {
            $.ajax({
                url: "admin-post/" + id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    console.log(data);
                    $('#id').val(data.id);
                    $('#title').val(data.title);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                    console.log(data);
                }
            });
        }

        function change_publish_status(id) {
            $.ajax({
                url: "{{ route('update_publish') }}",
                type: "POST",
                data: $('#formpublish' + id).serialize(),
                dataType: "JSON",
                success: function(data) {
                    console.log(data);
                    table.ajax.reload(null, false);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        }
    </script>
@endsection
