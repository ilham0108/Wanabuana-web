@extends('layouts.Backend.backend-main-layouts')

@section('Header')
    <h2> Teams </h2>
@endsection

@section('Content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('member.store') }}" method="POST" id="create-post" name="create-post" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control form-control-sm" id="nama" name="nama">
                        </div>
                        <div class="form-group">
                            <label>Posisi</label>
                            <input type="text" class="form-control form-control-sm" id="posisi" name="posisi">
                        </div>
                        <div class="form-group">
                            <label>Foto</label>
                            <div class="img-fluid m-0">
                                <img class="preview img-fluid col-3" id="preview" height="300px">
                            </div>
                            <div class="custom-file mt-3">
                                <input type="file" class="custom-file-input @error('img') is-invalid @enderror" id="image" name="image"
                                    aria-describedby="inputGroupFileAddon01" onchange="previewImage()" required>
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="far fa-paper-plane"></i> Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('Js')
    <script>
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
    </script>
@endsection
