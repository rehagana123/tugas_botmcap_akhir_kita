@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Verifikasi Email Anda</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                Tautan verifikasi baru telah dikirim ke alamat email Anda.
                            </div>
                        @endif

                        Sebelum melanjutkan, periksa email Anda untuk tautan verifikasi.
                        Jika Anda tidak menerima email,
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link m-0 p-0 align-baseline">Klik disini untuk meminta
                                link password reset lagi.</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
