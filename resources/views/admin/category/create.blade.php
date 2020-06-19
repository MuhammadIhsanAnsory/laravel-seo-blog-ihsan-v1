@extends('template_admin.main')

@section('title','Tambah Kategori')
    
@section('sub-menu', 'Tambah Kategori')

@section('content')
    @if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session('success') }}
    </div>
    @endif
    <form action="{{ route('category.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Nama Kategori</label>
            <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" id="name">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
