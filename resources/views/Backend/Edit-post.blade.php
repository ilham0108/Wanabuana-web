@extends('layouts.Backend.backend-main-layouts')

@section('Header')
    <div class="row">
        <div class="col-6">
            <h2> Create Post </h2>
        </div>
    </div>
@endsection

@section('Content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin-post.store') }}" method="POST" id="create-post" name="create-post" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control form-control-sm" id="title" name="title" value="{{ $post->title }}">
                </div>
                <div class="form-group">
                    <label>Slug</label>
                    <input type="text" class="form-control form-control-sm" id="slug" name="slug" readonly value="{{ $post->slug }}">
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select class="form-control form-control-sm mt-3 selectpicker" id="category" name="category">
                        <option selected disabled>Category</option>
                        <option value="{{ $post->category->name }}" selected>{{ $post->category->name }}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Post image</label>
                    <div class="img-fluid m-0">
                        <img class="preview img-fluid col-3" id="preview" height="300px" src="{{ asset('storage/Image/Post/' . $post->image) }}">
                    </div>
                    <div class="custom-file mt-3">
                        <label class="custom-file-label" for="inputGroupFile01">{{ $post->image }}</label>
                        <input type="file" class="custom-file-input" id="image" name="image" aria-describedby="inputGroupFileAddon01" value=""
                            onchange="previewImage()" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>Tags</label>
                    <select class="form-control form-control-sm select2" multiple="" id="tags" name="tags[]">
                        @foreach ($post->tags as $tag)
                            <option value="{{ $tag->id }}" selected>{{ $tag->tag }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Body</label>
                    <textarea name="body" id="body">{{ $post->body }}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="far fa-paper-plane"></i> Create
                        post</button>
                </div>
            </form>
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
                <form id="form-Tag" name="form-Tag">
                    @csrf
                    <div class="modal-body">
                        <input type="text" class="form-control form-control-sm" name="tag" id="tag">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" onclick="addTag()" class="btn btn-primary">add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('Js')
    <script>
        CKEDITOR.replace('body', {
            filebrowserUploadUrl: '/ckeditor/upload_image.php',
            filebrowserUploadMethod: 'form'
        });


        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/posts/createSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        })

        $('#image').on('change', function() {
            //get the file name
            var fileName = $(this).val().replace('C:\\fakepath\\', " ");
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        })

        // $('input[name="tags[]"]').tagsinput({
        //     trimValue: true,
        //     confirmKeys: [13, 44, 32],
        //     focusClass: 'my-focus-class'
        // });

        $(".js-example-tokenizer").select2({
            tags: true,
            tokenSeparators: [',', ' ']
        })

        function add_tag() {
            $('#form-Tag')[0].reset();
            $('#Tag').appendTo("body").modal(
                'show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Add Tag'); // Set title to Bootstrap modal title
        }

        function previewImage() {

            const [file] = image.files
            if (file) {
                preview.src = URL.createObjectURL(file)
            }
        }

        function addTag() {
            $.ajax({
                url: "{{ route('addTags') }}",
                type: "POST",
                data: $('#form-Tag').serialize(),
                dataType: "JSON",
                success: function(data) {
                    if (data.status) {
                        console.log(data);
                        toastr.success('Tag Berhasil Dibuat')
                    }
                    location.reload();
                },
                error: function(xhr) {
                    toastr.error(xhr.responseJSON.text, 'Gagal!')
                }
            });
        }
    </script>
@endsection
