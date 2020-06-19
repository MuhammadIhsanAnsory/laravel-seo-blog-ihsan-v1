@extends('template_admin.main')

@section('title','Admin')
@section('sub-menu','Admin')
    

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

<a href="{{ route('user.create') }}" class="btn btn-primary mb-2">Tambah User</a>

<div class="section-body">
    <table class="table table-striped table-hover table-sm">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama User</th>
                <th>Email</th>
                <th>Jabatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $result =>$user)
            <tr>
                <td>{{ $users->firstItem() + $result }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if ($user->role)
                        <span class="badge badge-primary">Administrator</span>
                        @else
                        <span class="badge badge-success">Penulis</span>
                        
                    @endif    
                </td>
                <td>
                    <form action="{{ route('user.destroy', $user->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-success">Ubah</a>
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $users->links() }}
</div>

@endsection