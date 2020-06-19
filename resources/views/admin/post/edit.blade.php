@extends('template_admin.main')

@section('title','Ubah Post')
    
@section('sub-menu', 'Ubah Post')

@section('content')
    @if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session('success') }}
    </div>
    @endif
    <form action="{{ route('post.update', $posts->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="title">Judul</label>
            <input type="text" class="form-control  @error('title') is-invalid @enderror" name="title" id="title" value="{{ $posts->title }}">
            @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="title">Kategori</label>
            <select name="category_id" id="category_id" class="form-control">
                <option value="{{ $posts->category_id }}" holder>--Pilih Kategori--</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    @if ($category->id == $posts->category_id)
                        selected
                    @endif
                    >{{ $category->name }}</option>
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
            <option value="{{ $tag->id }}"
                @foreach ($posts->tags as $value)
                    @if ($tag->id == $value->id)
                        selected
                    @endif
                @endforeach
                >{{ $tag->name_tag }}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="content">Konten</label>
            <textarea class="form-control  @error('content') is-invalid @enderror" name="content" id="content">{{ $posts->content }}</textarea>
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
        <button type="submit" class="btn btn-primary">Ubah</button>
    </form>

    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
                    CKEDITOR.replace( 'content' );
    </script>
    
@endsection
