<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Laporan Data Transaksi</title>
</head>

<body>
    <h1 class="text-center">LAPORAN DATA TRANSAKSI</h1>
    <table class="table-bordered table">
        <thead>
            <tr>
                <th scope="col">Kode Pinjam</th>
                <th scope="col">Judul Buku</th>
                <th scope="col">Pengarang</th>
                <th scope="col">Nama Peminjam</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Tanggal Kembali</th>
                <th scope="col">Denda</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $key => $value)
                <tr>
                    <td class="py-1"> {{ $value->kode_pinjam }} </td>
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
                </tr>
            @endforeach
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
</body>

</html>
