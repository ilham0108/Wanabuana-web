@extends('layouts.Backend.backend-main-layouts')

@section('Header')
    <h2> Manage Image </h2>
@endsection

@section('Content')
    <div class="card card-primary">
        <form id="form-addPictures" name="form-addPictures" action="{{ route('manage-image.store') }}" method="POST"
            class="form-horizontal" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Suhu</label>
                    <div class="col-sm-12 col-md-7">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('img') is-invalid @enderror" id="image"
                                name="img" aria-describedby="inputGroupFileAddon01" required>
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                        @error('img')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Position</label>
                    <div class="col-sm-12 col-md-7">
                        <select class="form-control form-control-sm @error('position') is-invalid @enderror" id="position"
                            name="position" title="Select Address" required>
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
@endsection

@section('Js')
    <script>
        $('#image').on('change', function() {
            //get the file name
            var fileName = $(this).val().replace('C:\\fakepath\\', " ");
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        })
    </script>
@endsection
