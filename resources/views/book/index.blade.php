@extends('layouts.dashboard')

@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.13.1/datatables.min.css" />
@endpush

@section('title')
    Perpustakaan - List Buku
@endsection

@section('subtitle')
    <i class="fa fa-th"></i> Buku
@endsection

@section('judul-card')
    Buku
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible">
            <i class="fa fa-info-circle"></i>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ session('success') }}
        </div>
    @endif

    @if (session('fail'))
        <div class="alert alert-danger alert-dismissible">
            <i class="fa fa-info-circle"></i>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ session('fail') }}
        </div>
    @endif

    <section class="card">
        <div class="card-header">
            <h2>
                List Buku
            </h2>

            @if (Auth::user()->role_id == 1)
                <a class="btn btn-primary" href="/data/create"><i class="fa fa-plus"></i> Tambah Buku</a>
            @endif
        </div>

        <div class="card-body">
            <table class="table" id="buku-table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Kode Buku</th>
                        <th scope="col">Judul Buku</th>
                        <th scope="col">Tahun</th>
                        <th scope="col" style="text-align: center">Buku yang tersedia</th>
                        <th scope="col" style="text-align:center">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($buku as $key=>$value)
                        <tr>
                            <input type="hidden" class="delete_id" value="{{ $value->id }}">
                            <td>{{ $value->kode_buku }}</td>
                            <td>{{ $value->judul_buku }}</td>
                            <td>{{ $value->tahun }}</td>
                            <td style="text-align: center">{{ $value->jumlah_buku }} buku</td>
                            <td style="display: flex; align-items:center; justify-content: center; ">
                                <a href="/data/{{ $value->id }}" class="btn btn-info mx-3">
                                    <i class="fa fa-eye"></i> Detail
                                </a>

                                @if (Auth::user()->role_id == 2)
                                    @if ($value->jumlah_buku > 0)
                                      <form action="/pinjam/{{ $value->id }}" method="POST">
                                        @csrf
                                        <button class="btn btn-outline-success mx-3">
                                            Pinjam Buku
                                        </button>
                                    </form>
                                    @endif
                                @endif


                                @if (Auth::user()->role_id == 1)
                                    <a href="/data/{{ $value->id }}/edit" class="btn btn-warning mx-3">
                                        <i class="fa fa-pencil"></i> Edit
                                    </a>
                                    <form action="/data/{{ $value->id }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btndelete mx-3"><i class="fa fa-times"></i>
                                            Hapus</button>
                                    </form>
                                @endif

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">
                                <h2 class="text-center">No data</h2>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.btndelete').click(function(e) {
                e.preventDefault();

                var deleteid = $(this).closest("tr").find('.delete_id').val();

                swal({
                        title: "Apakah anda yakin?",
                        text: "Setelah dihapus, Anda tidak dapat memulihkan Buku ini lagi!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {

                            var data = {
                                "_token": $('input[name=_token]').val(),
                                'id': deleteid,
                            };
                            $.ajax({
                                type: "DELETE",
                                url: 'data/' + deleteid,
                                data: data,
                                success: function(response) {
                                    swal(response.status, {
                                            icon: "success",
                                        })
                                        .then((result) => {
                                            location.reload();
                                        });
                                }
                            });
                        }
                    });
            });

        });
    </script>

    <script src="{{ asset('template/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>

    <script>
        $(function() {
            $("#buku-table").DataTable();
        });
    </script>
@endpush
