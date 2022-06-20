@extends('admin.layouts.main')

@section('container')

<div class="container-fluid">
    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="/admin/posts/create" class="btn btn-primary">Tambah Postingan Baru</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->category->name }}</td>
                            <td>
                                <a href="/admin/posts/{{ $post->slug }}" class="btn btn-outline-dark"><i class="fa fa-eye"></i></a>
                                <a href="/admin/posts/{{ $post->slug }}/edit" class="btn btn-outline-dark"><i class="fa fa-pen"></i></span></a>
                                <form action="/admin/posts/{{ $post->slug }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-outline-danger" onclick="return confirm('Yakin menghapus postingan?')"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr> 
                        @endforeach
                    </tbody>
                    
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection