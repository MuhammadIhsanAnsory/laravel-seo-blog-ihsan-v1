@extends('template_admin.main')

@section('title','Post yang Dihapus')
@section('sub-menu','Post yang Dihapus')
    

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

<div class="section-body">
    <table class="table table-striped table-hover table-sm">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Post</th>
                <th>Kategori</th>
                <th>Tag</th>
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
                        <li>{{ $tag->name_tag }}</li>
                    </ul>
                    @endforeach
                </td>
                <td><img src="{{ asset($post->image) }}" class="image-fluid" style="width:100px"></td>
                <td>
                    <form action="{{ route('post.burn', $post->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <a href="{{ route('post.restore', $post->id) }}" class="btn btn-sm btn-info">Restrore</a>
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