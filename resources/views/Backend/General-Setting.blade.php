@extends('layouts.Backend.backend-main-layouts')

@section('Header')
    <h2> General Setting </h2>
@endsection

@section('Content')
    <div class="container p-0">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs nav-justified" style="width: 100%">
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#general">General</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#home">About</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="general" class="tab-pane fade in active">
                        <div class="row mt-5">
                            <div class="col-12 text-center">
                                <h4>IN DEVELOPMENT</h4>
                            </div>
                            <div class="col-sm-6 col-lg-6 text-center">

                            </div>
                        </div>
                    </div>
                    <div id="home" class="tab-pane fade">
                        <form id="form-about" name="form-about" action="{{ route('admin-about.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6 col-lg-6 ">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <div class="custom-file mt-3">
                                            <input type="file" class="custom-file-input" id="image" name="image" aria-describedby="inputGroupFileAddon01"
                                                onchange="previewImage()" required>
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-6 text-center">
                                    <div class="img-fluid m-0">
                                        <img src="{{ asset('storage/Image/General/' . $about->image) }}" class="preview img-fluid col-6" id="preview" height="300px">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-auto" style="width:100%">
                                    <div class="form-group">
                                        <label>About</label>
                                        <textarea name="about" id="about">{{ $about->about }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('Js')
    <script>
        CKEDITOR.replace('about', {
            filebrowserUploadUrl: '/ckeditor/upload_image.php',
            filebrowserUploadMethod: 'form'
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

        function save_about() {
            $.ajax({
                url: "{{ route('admin-about.store') }}",
                type: "POST",
                data: $('#form-about').serialize(),
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
