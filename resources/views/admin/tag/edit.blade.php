@extends('template_admin.main')

@section('title','Ubah Tag')
    
@section('sub-menu', 'Ubah Tag')

@section('content')
    @if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session('success') }}
    </div>
    @endif
    <form action="{{ route('tag.update',$tags->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="name_tag">Nama Tag</label>
            <input type="text" class="form-control  @error('name_tag') is-invalid @enderror" name="name_tag" id="name_tag" value="{{ $tags->name_tag }}">
            @error('name_tag')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
