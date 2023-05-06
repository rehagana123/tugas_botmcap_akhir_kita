@extends('layouts.dashboard')
@section('title')
    Perpustakaan - Tambah Buku
@endsection
@section('subtitle')
    Tambah Buku
@endsection
@section('content')
    <div>
        <h2>Tambah Buku</h2>
        <form action="/data" method="POST">
            @csrf
            <div class="form-group">
                <label for="judul_buku">Judul Buku:</label>
                <input type="text" class="form-control @error('judul_buku') is-invalid @enderror" name="judul_buku"
                    id="judul_buku" placeholder="Masukkan Judul Buku" value="{{ old('judul_buku') }}">
                @error('judul_buku')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="kode_buku">Kode Buku:</label>
                <input type="text" class="form-control @error('kode_buku') is-invalid @enderror" name="kode_buku"
                    id="kode_buku" placeholder="Masukkan Kode Buku" value="{{ old('kode_buku') }}">
                @error('kode_buku')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="jenis_buku">Jenis Buku:</label>
                <input type="text" class="form-control @error('jenis_buku') is-invalid @enderror" name="jenis_buku"
                    id="jenis_buku" placeholder="Masukkan Jenis Buku" value="{{ old('jenis_buku') }}">
                @error('jenis_buku')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="pengarang">Nama Pengarang:</label>
                <input type="text" class="form-control @error('pengarang') is-invalid @enderror" name="pengarang"
                    id="pengarang" placeholder="Masukkan Nama Pengarang" value="{{ old('pengarang') }}">
                @error('pengarang')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="penerbit">Nama Penerbit:</label>
                <input type="text" class="form-control @error('penerbit') is-invalid @enderror" name="penerbit"
                    id="penerbit" placeholder="Masukkan Nama Penerbit" value="{{ old('penerbit') }}">
                @error('penerbit')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="tahun">Tahun:</label>
                <input type="text" class="form-control @error('tahun') is-invalid @enderror" name="tahun"
                    id="tahun" placeholder="Masukkan Tahun" value="{{ old('tahun') }}">
                @error('tahun')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="jumlah_buku">Jumlah Buku:</label>
                <input type="text" class="form-control @error('jumlah_buku') is-invalid @enderror" name="jumlah_buku"
                    id="jumlah_buku" placeholder="Masukkan Jumlah Buku" value="{{ old('jumlah_buku') }}">
                @error('jumlah_buku')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="category_id">Category Buku:</label>
                <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" id="category_id">
                    <option value="">Pilih Category</option>
                    @forelse ($category as $item)
                        <option value="{{ $item->id }}" {{ old('category_id') == $item->id ? 'selected' : '' }}>
                            {{ $item->nama }}</option>
                    @empty
                        <option>kategori kosong</option>
                    @endforelse
                </select>
                @error('category_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Tambahkan</button>
        </form>
    @endsection
