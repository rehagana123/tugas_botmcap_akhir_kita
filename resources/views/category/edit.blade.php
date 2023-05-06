@extends('layouts.dashboard')
@section('title')
    Perpustakaan - Edit Category
@endsection
@section('subtitle')
    Edit Category
@endsection
@section('content')
    <div>
        <h2>Category</h2>
        <form action="/category/{{ $category->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama">Nama Category:</label>
                <input type="text" class="form-control" name="nama" value="{{ $category->nama }}" id="nama"
                    placeholder="Masukkan Nama Kategori">
                @error('nama')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Ubah</button>
        </form>
    </div>
@endsection
