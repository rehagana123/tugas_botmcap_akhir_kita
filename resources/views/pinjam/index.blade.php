@extends('layouts.dashboard')

@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.13.1/datatables.min.css" />
@endpush

@section('title')
    Perpustakaan - List Pinjaman Buku
@endsection

@section('subtitle')
    <i class="fa fa-clipboard"></i> Pinjaman Buku
@endsection

@section('judul-card')
    Pinjaman Buku
    @if (Auth::user()->role_id == 1)
        <div class="card">

            <div class="card-body">
                <h4 class="card-title mr-4">Laporan</h4>
                <div class="btn-group dropdown">
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <b><i class="fa fa-download"></i> Export PDF</b>
                    </button>
                    <div class="dropdown-menu" x-placement="bottom-start"
                        style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                        <a class="dropdown-item" href="{{ url('laporan/pdf') }}"> Semua Transaksi </a>
                    </div>
                </div>

            </div>
        </div>
    @endif
@endsection

@section('content')
    <section class="card">
        <div class="card-header">List Pinjaman Buku</div>

        <div class="card-body">
            @if (session('sukses'))
                <div class="alert alert-success alert-dismissible">
                    <i class="fa fa-info-circle"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ session('sukses') }}
                </div>
            @endif

            @if (session('fail'))
                <div class="alert alert-danger alert-dismissible">
                    <i class="fa fa-info-circle"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ session('fail') }}
                </div>
            @endif

            <table class="table" id="category-table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Kode Pinjam</th>
                        <th scope="col">Judul Buku</th>
                        <th scope="col">Pengarang</th>
                        <th scope="col">Nama Peminjam</th>
                        <th scope="col">tanggal Pinjam</th>
                        <th scope="col">tanggal kembali</th>
                        <th scope="col">denda</th>
                        @if (Auth::user()->role_id == 2)
                            <th scope="col" style="text-align:center">Actions</th>
                        @endif
                    </tr>
                </thead>

                <tbody>
                    @forelse ($dataPinjam as $key=>$value)
                        <tr>
                            <td>{{ $value->kode_pinjam }}</td>
                            <td>{{ $value->buku->judul_buku }}</td>
                            <td>{{ $value->buku->pengarang }}</td>
                            <td>{{ $value->users->username }}</td>
                            <td>{{ $value->tanggal_pinjam }}</td>
                            <td>{{ $value->tanggal_kembali }}</td>
                            @if ($value->denda > 0)
                                <td>Rp. @money($value->denda)</td>
                            @else
                                <td>Belum kena denda</td>
                            @endif
                            @if (Auth::user()->role_id == 2)
                                @if (Auth::user()->id == $value->users_id)
                                    <td>
                                        <form action="/pinjam/{{ $value->id }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-primary">Kembali Buku</button>
                                        </form>
                                    </td>
                                @endif
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">
                                <h2 class="text-center">No data</h2>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
