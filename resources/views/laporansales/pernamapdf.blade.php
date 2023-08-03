<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }

        body {
            font-family: arial;

        }

        table {
            border-bottom: 4px solid #000;
            padding: 2px
        }

        .tengah {
            text-align: center;
            line-height: 5px;
        }

        #products th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #0423aa;
            color: white;
            text-align: center;
        }

        .signature {
            position: absolute;
            bottom: 20px;
            right: 50px;
            font-size: 14px;
        }

        .date-container {
            font-family: arial;
            text-align: left;
            font-size: 10px;
        }
    </style>

    <div class="rangkasurat">
        <table width="100%">
            <tr>
                <td><img src="{{ public_path ('assets/logo.png')}}" alt="logo" width="140px"></td>
                <td class="tengah">
                    <h4>PT. INDOTRUCK UTAMA BANJARMASIN</h4>
                    <p>Jl. Ahmad Yani No.KM 6,7, RT.010/RW.001, Kertak Hanyar I, Kec. Kertak Hanyar, Kalimantan Selatan 70654</p>
                </td>
            </tr>
        </table>
    </div>

    <center>
        <h5>Rekap Laporan Penjualan Unit Sales

        </h5>
    </center>



    <br>

    <table class='table table-bordered' id="products">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama Sales</th>
                {{-- <th>Nama Customer Yang Beli</th> --}}
                <th>Unit</th>
                <th>Qty</th>
                <th>Harga</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @php
        $grandTotal = 0;
        @endphp

        @foreach ($sales as $item )
        <tr>
            <td class="border px-6 py-4">{{ $loop->iteration }}</td>
            <td class="border px-6 py-4">{{ $item->tanggal }}</td>
            <td class="border px-6 py-4">{{ $item->salesmaster->name }}</td>
            {{-- <td class="border px-6 py-4">{{ $item->customermaster->name }}</td> --}}
            <td class="border px-6 py-4">{{ $item->unit->name }}</td>
            <td class="border px-6 py-4">{{ $item->qty }}</td>
            <td class="border px-6 py-4">Rp. {{ number_format($item->harga) }}</td>

            @php
            $subTotal = $item->harga * $item->qty;
            $grandTotal += $subTotal
            @endphp

            <td class="border px-6 py-4">Rp. {{number_format ($subTotal) }}</td>
        </tr>
        @endforeach
        <tr>
            <td colspan="6">Grand Total</td>
            <td>Rp. {{ number_format($grandTotal)}}</td>
        </tr>
        </tbody>
    </table>
    <div class="date-container">
        Banjarmasin, <span class="formatted-date">{{ now()->format('d-m-Y') }}</span>
    </div>
    <p class="signature">(Supervisor/Kepala Bagian)</p>
</body>

</html>
