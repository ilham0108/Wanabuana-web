@extends('layouts.Backend.backend-main-layouts')

@section('Header')
    <h2> Manage About </h2>
@endsection

@section('Content')
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="card card-primary">
                <div class="card-body">
                    <form id="form-addPictures" action="{{ route('manage-about.store') }}" method="POST"
                        name="form-addPictures" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="id" value="{{ $about[0]->id }}">
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" id="title" name="title"
                                    class="form-control form-control-sm @error('title') is-invalid @enderror"
                                    value="{{ $about[0]->title }}">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Body</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea class="ckeditor @error('title') is-invalid @enderror" id="body" name="body"
                                    cols="auto">{{ $about[0]->body }}</textarea>
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i>
                                    Publish</button>
                            </div>
                        </div>
                    </form>
                </div>
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
            ClassicEditor
                .create(document.querySelector('#body'))
                .catch(error => {
                    console.error(error);
                });
        });

        function add_picture(id) {
            $('#form-addPictures')[0].reset();
            $('#Modal-addPictures').appendTo("body").modal(
                'show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Add Pictures'); // Set title to Bootstrap modal title
        }
    </script>
@endsection
