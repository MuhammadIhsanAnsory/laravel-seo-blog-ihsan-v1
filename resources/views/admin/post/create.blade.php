@extends('template_admin.main')

@section('title','Tambah Post')
    
@section('sub-menu', 'Tambah Post')

@section('content')
    @if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session('success') }}
    </div>
    @endif
    <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Judul</label>
            <input type="text" class="form-control  @error('title') is-invalid @enderror" name="title" id="title">
            @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="title">Kategori</label>
            <select name="category_id" id="category_id" class="form-control">
                <option value="" holder>--Pilih Kategori--</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Pilih Tag</label>
            <select class="form-control select2" multiple="" name="tags[]">
            @foreach ($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name_tag }}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="content">Konten</label>
            <textarea class="form-control  @error('content') is-invalid @enderror" name="content" id="content"> </textarea>
            @error('content')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="content">Gambar</label>
            <input type="file" class="form-control  @error('image') is-invalid @enderror" name="image" id="image">
            @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
                    CKEDITOR.replace( 'content' );
    </script>

@endsection
