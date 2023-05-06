@extends('layouts.dashboard')

@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.13.1/datatables.min.css" />
@endpush

@section('title')
    Perpustakaan - Detal Buku
@endsection

@section('subtitle')
    Detail Buku
@endsection

@section('judul-card')
    Judul: {{ $buku->judul_buku }}
@endsection

@section('content')
    <section class="card">
        <div class="card-body">
            <p>Kode Buku: {{ $buku->kode_buku }}</p>
            <p>Pengarang: {{ $buku->pengarang }}</p>
            <p>Penerbit: {{ $buku->penerbit }}</p>
            <p>Tahun Terbit: {{ $buku->tahun }}</p>
            <p>Jumlah Buku: {{ $buku->jumlah_buku }}</p>
            <p>Category: {{ $buku->category->nama }}</p>

            @if (Auth::user()->role_id == 2)
                @if ($buku->jumlah_buku > 0)
                    <form action="/pinjam/{{ $buku->id }}" method="POST">
                        @csrf
                        <button class="btn btn-outline-success mx-3">
                            Pinjam Buku
                        </button>
                    </form>
                @endif
            @endif
        </div>
    </section>
@endsection
