@extends('layouts.dashboard')

@section('title')
    Perpustakaan - Profile
@endsection

@section('subtitle')
    <i class="fa fa-user"></i> Profile
@endsection

@section('judul-card')
    Change Profile
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="POST" action="/profile">
                    @csrf
                    @method('PATCH')

                    <div class="row mb-3">
                        <label for="nama" class="col-md-4 col-form-label text-md-end">Nama Lengkap</label>

                        <div class="col-md-6">
                            <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror"
                                name="nama" value="{{ $profile->nama }}" autofocus>

                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="jenis_kelamin" class="col-md-4 col-form-label text-md-end">Jenis Kelamin</label>

                        <div class="col-md-6">
                            <select class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin"
                                name="jenis_kelamin">
                                <option value="">--Pilih Jenis Kelamin anda--</option>
                                <option value="Laki-laki" {{ $profile->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                    Laki-laki</option>
                                <option value="Perempuan" {{ $profile->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="alamat" class="col-md-4 col-form-label text-md-end">Alamat Lengkap</label>

                        <div class="col-md-6">
                            <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror"
                                name="alamat" value="{{ $profile->alamat }}" autofocus>

                            @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="nomor_telepon" class="col-md-4 col-form-label text-md-end">Nomor Telepon</label>

                        <div class="col-md-6">
                            <input id="nomor_telepon" type="number"
                                class="form-control @error('nomor_telepon') is-invalid @enderror" name="nomor_telepon"
                                value="{{ $profile->nomor_telepon }}" autofocus>

                            @error('nomor_telepon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Ubah
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
