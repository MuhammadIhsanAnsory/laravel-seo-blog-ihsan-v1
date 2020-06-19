@extends('template_admin.main')

@section('title','Tag')
@section('sub-menu','Tag')
    

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

<a href="{{ route('tag.create') }}" class="btn btn-primary mb-2">Tambah Tag</a>

<div class="section-body">
    <table class="table table-striped table-hover table-sm">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Tag</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tags as $result =>$tag)
            <tr>
                <td>{{ $tags->firstItem() + $result }}</td>
                <td>{{ $tag->name_tag }}</td>
                <td>
                    <form action="{{ route('tag.destroy', $tag->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <a href="{{ route('tag.edit', $tag->id) }}" class="btn btn-sm btn-success">Ubah</a>
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $tags->links() }}
</div>

@endsection