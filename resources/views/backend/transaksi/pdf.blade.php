<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        h1 {
            color: #333;
        }

        p {
            font-size: 14px;
            color: #666;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center">{{ $title }}</h1>
    <p style="text-align: right">Tanggal: {{ $date }}</p>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Costumer</th>
                <th>Produk</th>
                <th>Tanggal Transaksi</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @php
                $total = 0;
            @endphp
            @foreach ($transaksi as $key => $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->produk->nama_produk }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>Rp.{{ number_format($item->produk->harga, 0, ',', '.') }}</td>
                </tr>
                @php
                    $total += $item->produk->harga;
                @endphp
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="4" style="text-align: center">Total Penjualan</th>
                <th colspan="1">Rp.{{ number_format($total, 0, ',', '.') }}</th>
            </tr>
        </tfoot>
    </table>
</body>

</html>
