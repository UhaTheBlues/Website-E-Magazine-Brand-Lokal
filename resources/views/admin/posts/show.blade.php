@extends('admin.layouts.main')

@section('container')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lihat Postingan</h6>
        </div>
        <div class="card-body">
            <div class="row justify-content-md-center">
            <div class="col-lg-8">
                <h1 class="mb-3">{{ $post->title }}</h1>
                <div class="my-2">
                    <a href="/admin/posts" class="btn btn-outline-dark"><i class="fas fa-arrow-left"></i> Kembali</a>
                    <a href="/admin/posts/{{ $post->slug }}/edit" class="btn btn-outline-dark"><i class="fa fa-pen"></i> Edit Postingan</a>
                    <form action="/admin/posts/{{ $post->slug }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-outline-danger" onclick="return confirm('Yakin menghapus postingan?')"><i class="fa fa-trash"> Hapus Postingan</i></button>
                    </form>
                </div>
                <div style="max-height: 500px; overflow:hidden;">
                    <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid my-3">
                </div>
            
                <ul>
                    <li>
                        <span class="fa fa-user" aria-hidden="true"></span> {{ $post->author }}</li>
                    </li>
                    <li>
                        <span class="fa fa-calendar" aria-hidden="true"></span> {{ $post->created_at->diffForHumans() }}</li>
                    </li>
                </ul>

                <article class="my-3">
                    {!! $post->body !!}
                </article>
            </div>
            </div>
        </div>
    </div>
</div>


@endsection
