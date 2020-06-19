@extends('template_admin.main')

@section('title','Ubah User')
    
@section('sub-menu', 'Ubah User')

@section('content')
    @if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session('success') }}
    </div>
    @endif
    <form action="{{ route('user.update',$user->id) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="name">Nama user</label>
            <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" id="name" value="{{ $user->name }}">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" id="email" value="{{ $user->email }}">
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="role">Jabatan</label>
            <select name="role" id="role" class="form-control   @error('role') is-invalid @enderror">
                <option value="1" holder
                @if ($user->role == 1)
                    selected
                @endif
                >Administrator</option>
                <option value="0" holder
                @if ($user->role == 0)
                    selected
                @endif
                >Penulis</option>
            </select>
            @error('role')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password" id="password">
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password_confirmation">Konfirmasi Password</label>
            <input type="password" class="form-control  @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation">
            @error('password_confirmation')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Ubah</button>
    </form>
@endsection
