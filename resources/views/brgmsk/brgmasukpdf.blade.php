{{--
<!DOCTYPE html>
<html>

<head>
    <title>Data Productssss</title>
</head>

<body>
    <h3 align="center">Data Product</h3>
    <table align="center" border="1" cellpadding="10" cellspacing="0" id="productstyle">
        <thead>
            <tr>
                <th>No</th>
                <th>Unit</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Qty</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item )
            <tr>
                <td class="border px-6 py-4">{{ $loop->iteration }}</td>
                <td class="border px-6 py-4">{{ $item->unit->name }}</td>
                <td class="border px-6 py-4">{{ $item->nama }}</td>
                <td class="border px-6 py-4">Rp. {{ number_format($item->harga) }}</td>
                <td class="border px-6 py-4">{{ $item->qty }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html> --}}

<!DOCTYPE html>
<html>

<head>
    <style>
        #masuk {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #masuk td,
        #masuk th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #masuk tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #masuk tr:hover {
            background-color: #ddd;
        }

        #masuk th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }

        /* Thick red border */
        hr.new4 {
            border: 1px solid rgb(0, 0, 0);
        }
    </style>
</head>

<body>

    <div class="m-auto">
        {{-- <a href=""></a> --}}
        <center>
            {{-- <td><img src="/uploads/kop.png" width="200px"></td> --}}
            <h1>PT INDOTRUCK UTAMA BANJARMASIN</h1>
            <h5>Jl. Ahmad Yani No.KM 6,7, RT.010/RW.001, Kertak Hanyar I, Kec.
                Kertak
                Hanyar, Kabupaten Banjar, Kalimantan Selatan 70654</h5>
        </center>
    </div>
    <hr class="new4">
    <center>
        <h3 class="">Laporan Barang Masuk</h3>
    </center>

    <table id="masuk">
        <tr>
            <th>No</th>
            <th>Part Masuk</th>
            <th>Supplier yang mengirim</th>
            <th>Qty</th>
            <th>Tanggal</th>
        </tr>
        @foreach ($data as $item )
        <tr>
            <td class="border px-6 py-4">{{ $loop->iteration }}</td>
            <td class="border px-6 py-4">{{ $item->tanggal }}</td>
            <td class="border px-6 py-4">{{ $item->partmasuk }}</td>
            <td class="border px-6 py-4">{{ $item->supplier->nama }}</td>
            <td class="border px-6 py-4">{{ $item->qty }}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>
