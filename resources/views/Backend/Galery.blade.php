@extends('layouts.Backend.backend-main-layouts')

@section('Header')
    <h2> Galery </h2>
@endsection

@section('Content')
    <div class="row">
        <div class="col-12 col-sm-6 col-lg-9">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <h6>All Images</h6>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6 text-right">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <div class="form-check">
                                <input class="form-check-input checkAll" type="checkbox" id="checkAll">
                                <label class="form-check-label" for="checkAll">
                                    Select All
                                </label>
                            </div>
                        </li>
                        <li class="list-inline-item"><a href="#" onclick="multiple_delete()" class="text-danger"
                                style="text-decoration: none"><i class="far fa-trash-alt"></i>
                                Trash</a></li>
                    </ul>
                </div>
            </div>
            <form id="form-addGalery" name="form-addGalery" class="form-horizontal">
                @csrf
                <div class="row" style="overflow-y: scroll; height:400px">
                    @foreach ($image_galery as $item)
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="card">
                                <div class="card-body pt-2">
                                    <div class="gallery gallery-md">
                                        <div class="row">
                                            <div class="col-6 px-0">
                                                <div class="form-check">
                                                    <input class="form-check-input delete-checkbox" type="checkbox"
                                                        name="checkbox" id="checkbox" value="{{ $item->id }}"
                                                        data-id="{{ $item->id }}">
                                                    <label class="form-check-label"></label>
                                                </div>
                                            </div>
                                            <div class="col-6 px-0 text-right">
                                                <a href="#" class="text-danger"
                                                    onclick="delete_image({{ $item->id }})"
                                                    style="text-decoration: none"><i class="far fa-trash-alt"></i>
                                                    Trash</a>
                                            </div>
                                        </div>
                                        <div class="gallery-item"
                                            data-image="{{ asset('storage/Image/Galery/' . $item->image) }}"
                                            data-title="{{ $item->image }}" style="width: 100%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </form>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
            <h6>Upload Images</h6>
            <div class="card" style="margin-bottom: 13px">
                <div class="card-body">
                    <form id="form-addGalery" name="form-addGalery" action="{{ route('galery.store') }}" method="POST"
                        class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <img class="preview img-fluid col-sm-12" id="preview">
                        <div class="custom-file mt-3">
                            <input type="file" class="custom-file-input @error('img') is-invalid @enderror" id="image"
                                name="image" aria-describedby="inputGroupFileAddon01" onchange="previewImage()" required>
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                        <select class="form-control form-control-sm mt-3 selectpicker" id="category" name="category">
                            <option selected disabled>Category</option>
                            @foreach ($category as $item)
                                <option value="{{ $item->category }}">{{ $item->category }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-sm btn-primary mt-3" style="width: 100%"><i
                                class="fas fa-paper-plane"></i>
                            Upload</button>
                    </form>
                </div>
            </div>
            <h6>Category</h6>
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-sm btn-primary" onclick="add_category()" style="width:100%"> Create
                        new
                        category</button>
                    <div class="row mt-3">
                        @foreach ($category_filter as $categorys)
                            <div class="col-6 mb-2">
                                <a href="/galery?category={{ $categorys->category }}" class="text-secondary"
                                    style="text-align: justify">{{ $categorys->category }}
                                </a>
                            </div>
                            <div class="col-6 mb-2 text-right">
                                {{ $categorys->total }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/addCategory" id="form-category" method="post">
                        @csrf
                        <div class="modal-body">
                            <input type="text" class="form-control form-control-sm @error('category') is-invalid @enderror"
                                name="category" id="category">
                            @error('category')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('Js')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
        $("#checkAll").click(function() {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });

        $('#image').on('change', function() {
            //get the file name
            var fileName = $(this).val().replace('C:\\fakepath\\', " ");
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        })



        function previewImage() {

            const [file] = image.files
            if (file) {
                preview.src = URL.createObjectURL(file)
            }
        }

        function add_category(id) {
            $('#form-category')[0].reset();
            $('#categoryModal').appendTo("body").modal(
                'show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Add Category'); // Set title to Bootstrap modal title
        }

        function add_Galery() {
            $.ajax({
                url: "{{ route('galery.store') }}",
                type: "POST",
                data: $('#form-addGalery').serialize(),
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

        function delete_image(id) {
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
                        url: "/galery/" + id,
                        type: "DELETE",
                        data: {
                            '_token': '{{ csrf_token() }}',
                        },
                        dataType: "JSON",
                    })
                    toastr["success"]("Data Berhasil Dihapus!", "Success")
                    location.reload();

                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire(
                        'Batal',
                        'Data tidak dihapus',
                        'error'
                    )
                }
            })
        }

        function multiple_delete(id) {
            const selected = [];
            $(".form-check input[type=checkbox]:checked").each(function() {
                dataId = selected.push(this.value);
            });
            if (selected.length > 0) {
                $.ajax({
                    url: "multipleDelete",
                    type: "POST",
                    data: {
                        'id': selected
                    },
                    success: function(data) {
                        console.log(selected);
                        console.log(data);
                    },
                    error: function(data) {
                        alert(data.responseText);
                    }
                });
            }
        }
    </script>
@endsection
