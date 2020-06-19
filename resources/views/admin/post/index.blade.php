@extends('template_admin.main')

@section('title','Post')
@section('sub-menu','Post')
    

@section('content')

    @if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session('success') }}
    </div>
    @endif
    
    @if (Session::has('delete'))
    <div class="alert alert-warning" role="alert">
        {{ Session('delete') }}
    </div>
    @endif

<a href="{{ route('post.create') }}" class="btn btn-primary mb-2">Tambah Post</a>

<div class="section-body">
    <table class="table table-striped table-hover table-sm">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Post</th>
                <th>Kategori</th>
                <th>Tag</th>
                <th>Kreator</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $result =>$post)
            <tr>
                <td>{{ $posts->firstItem() + $result }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->category->name }}</td>
                <td>@foreach ($post->tags as $tag)
                    <ul>
                        <span class="badge badge-info">{{ $tag->name_tag }}</span>
                    </ul>
                    @endforeach
                </td>
                <td>{{ $post->users->name }}</td>
                <td><img src="{{ asset($post->image) }}" class="image-fluid" style="width:100px"></td>
                <td>
                    <form action="{{ route('post.destroy', $post->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-sm btn-success">Ubah</a>
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $posts->links() }}
</div>

@endsection