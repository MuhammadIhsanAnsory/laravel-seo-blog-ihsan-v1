@extends('template_admin.main')

@section('title','Kategori')
@section('sub-menu','Kategori')
    

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

<a href="{{ route('tag.create') }}" class="btn btn-primary mb-2">Tambah Kategori</a>

<div class="section-body">
    <table class="table table-striped table-hover table-sm">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $result =>$category)
            <tr>
                <td>{{ $categories->firstItem() + $result }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <form action="{{ route('tag.destroy', $category->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <a href="{{ route('tag.edit', $category->id) }}" class="btn btn-sm btn-success">Ubah</a>
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus kategori ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $categories->links() }}
</div>

@endsection