@extends('admin.layouts.main')

@section('container')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Buat Postingan Baru</h6>
        </div>
        <div class="card-body">
            <div class="row justify-content-lg-left">
            <div class="col-lg-6">
                <form method="post" action="/admin/posts" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title :</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" autofocus value="{{  old('title') }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug :</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" readonly value="{{  old('slug') }}">
                    @error('slug')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Kategori :</label>
                    <select class="form-select" name="category_id">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Body :</label>
                    <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                    <trix-editor input="body"></trix-editor>
                    @error('body')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">Author :</label>
                    <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" value="{{  old('author') }}">
                    @error('author')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                    <label for="image" class="form-label">Upload Gambar :</label>
                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Buat Postingan Baru</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Membuat slug automatis
    const title = document.querySelector("#title");
    const slug = document.querySelector("#slug");

    title.addEventListener("keyup", function() {
        let preslug = title.value;
        preslug = preslug.replace(/ /g,"-");
        slug.value = preslug.toLowerCase();
    });

    // Preview Image
    function previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');
        
        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>

@endsection