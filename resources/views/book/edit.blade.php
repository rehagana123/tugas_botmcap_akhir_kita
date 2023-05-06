@extends('layouts.dashboard')
@section('title')
    Halaman Buku - Edit Buku
@endsection
@section('subtitle')
    Edit Buku
@endsection
@section('content')
    <section class="card mb-4">
        <div class="card-header">
            Edit Buku
        </div>
        <div class="card-body">
            <form action="/data/{{ $data->id }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="judul_buku">Judul Buku:</label>
                    <input type="text" class="form-control @error('judul_buku') is-invalid @enderror" name="judul_buku"
                        value="{{ old('judul_buku', $data->judul_buku) }}" id="judul_buku"
                        placeholder="Masukkan Judul Buku">
                    @error('judul_buku')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="kode_buku">Kode Buku:</label>
                    <input type="text" class="form-control @error('kode_buku') is-invalid @enderror" name="kode_buku"
                        value="{{ old('kode_buku', $data->kode_buku) }}" id="kode_buku" placeholder="Masukkan Kode Buku">
                    @error('kode_buku')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jenis_buku">Jenis Buku:</label>
                    <input type="text" class="form-control @error('jenis_buku') is-invalid @enderror" name="jenis_buku"
                        value="{{ old('jenis_buku', $data->jenis_buku) }}" id="jenis_buku"
                        placeholder="Masukkan Jenis Buku">
                    @error('jenis_buku')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="pengarang">Nama Pengarang:</label>
                    <input type="text" class="form-control @error('pengarang') is-invalid @enderror" name="pengarang"
                        value="{{ old('pengarang', $data->pengarang) }}" id="pengarang"
                        placeholder="Masukkan Nama Pengarang">
                    @error('pengarang')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="penerbit">Nama Penerbit:</label>
                    <input type="text" class="form-control @error('penerbit') is-invalid @enderror" name="penerbit"
                        value="{{ old('penerbit', $data->penerbit) }}" id="penerbit" placeholder="Masukkan Nama Penerbit">
                    @error('penerbit')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tahun">Tahun:</label>
                    <input type="text" class="form-control @error('tahun') is-invalid @enderror" name="tahun"
                        value="{{ old('tahun', $data->tahun) }}" id="tahun" placeholder="Masukkan Tahun">
                    @error('tahun')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jumlah_buku">Jumlah Buku:</label>
                    <input type="text" class="form-control @error('jumlah_buku') is-invalid @enderror" name="jumlah_buku"
                        value="{{ old('jumlah_buku', $data->jumlah_buku) }}" id="jumlah_buku"
                        placeholder="Masukkan Jumlah Buku">
                    @error('jumlah_buku')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="form-group">
                        <label for="category_id">Category Buku:</label>
                        <select name="category_id" id="category_id"
                            class="form-control @error('category_id') is-invalid @enderror">
                            <option value="">Pilih Category</option>
                            @forelse ($category as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('category_id', $data->category_id) == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama }}
                                </option>
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
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Ubah</button>
            </form>
        </div>
    </section>
@endsection
