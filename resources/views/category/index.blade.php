@extends('layouts.dashboard')

@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.13.1/datatables.min.css" />
@endpush

@section('title')
    Perpustakaan - List Category
@endsection

@section('subtitle')
    <i class="fa fa-th-list"></i> Category
@endsection

@section('judul-card')
    Category
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

    @if (Auth::user()->role_id == 1)
        <section class="card mb-4">
            <div class="card-header">
                Tambah Category
            </div>
            <div class="card-body">
                <form action="/category" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Category:</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                            value="{{ old('nama') }}" id="nama" placeholder="Masukkan Nama Category">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Tambahkan</button>
                </form>
            </div>
        </section>
    @endif

    <section class="card">
        <div class="card-header">List Category</div>

        <div class="card-body">
            <table class="table" id="category-table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        @if (Auth::user()->role_id == 1)
                            <th scope="col" style="text-align:center">Actions</th>
                        @endif
                    </tr>
                </thead>

                <tbody>
                    @forelse ($category as $key=>$value)
                        <tr>
                            <input type="hidden" class="delete_id" value="{{ $value->id }}">
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $value->nama }}</td>
                            @if (Auth::user()->role_id == 1)
                                <td style="display: flex; align-items:center; justify-content: center; ">
                                    <a href="/category/{{ $value->id }}" class="btn btn-warning mx-3"><i
                                            class="fa fa-pencil"></i> Edit</a>
                                    <form action="/category/{{ $value->id }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btndelete mx-3"><i class="fa fa-times"></i>
                                            Hapus</button>
                                    </form>
                                </td>
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
                        text: "Setelah dihapus, Anda tidak dapat memulihkan Kategori ini lagi!",
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
                                url: 'category/' + deleteid,
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
            $("#category-table").DataTable();
        });
    </script>
@endpush
