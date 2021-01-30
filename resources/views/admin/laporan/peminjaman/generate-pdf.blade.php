<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
</head>
<body>
    <center>
        <h1>Laporan Peminjaman Buku</h1>
        <em>Pada Tanggal : {{ request('borrow_date') }}</em>
        <hr style="width: 30%; margin-bottom: 15px;">
        <table border="1" cellspacing="0" cellpading="5" style="width: 100%;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kode Peminjaman</th>
                    <th>Nama Siswa</th>
                    <th>Nama Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                </tr>
            </thead>
            <tbody>
                @if(request('borrow_date'))
                    @forelse ($borrowings as $borrowing)
                        <tr>
                            <th>{{ $autoNum++ . "." }}</th>
                            <td>{{ $borrowing->borrow_code }}</td>
                            <td>{{ $borrowing->student->FullName }}</td>
                            <td>{{ $borrowing->book->name }}</td>
                            <td>{{ $borrowing->borrow_date }}</td>
                            <td>{{ $borrowing->return_date }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align: center; padding: 15px;"><p style="color: red;">Laporan Peminjaman pada <b>{{ request('borrow_date') }}</b> Kosong!</p></td>
                        </tr>
                    @endforelse
                @else
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 15px;"><p style="color: red;">Laporan Peminjaman Kosong!</p></td>
                    </tr>
                @endif
            </tbody>
        </table>
    </center>
</body>
</html>
