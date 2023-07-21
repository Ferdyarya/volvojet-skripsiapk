<!DOCTYPE html>
<html>

<head>
    <style>
        #sales {
            font-family: 'Times New Roman', Times, serif;
            border-collapse: collapse;
            width: 100%;
        }

        #sales td,
        #sales th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #sales tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #sales tr:hover {
            background-color: #ddd;
        }

        #sales th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #0423aa;
            color: white;
            text-align: center;
        }

        /* Thick red border */
        hr.new4 {
            border: 1px solid rgb(0, 0, 0);
        }

        .kanan {
            text-align: right;
        }

        .report-header {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .report-header img {
            width: 150px;
            height: 150px;
        }

        .company-name {
            font-size: 24px;
            font-weight: bold;
            margin-top: 10px;
        }

        .address {
            font-size: 14px;
            text-align: center;
        }

        .signature {
            position: absolute;
            bottom: 20px;
            right: 50px;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="report-header">
        <img src="{{ public_path("assets/logo.png") }}" alt="logo">
        <center>
            <h1 class="company-name">PT INDOTRUCK UTAMA BANJARMASIN</h1>
            <p class="address">Jl. Ahmad Yani No.KM 6,7, RT.010/RW.001, Kertak Hanyar I, Kec. Kertak Hanyar, Kabupaten Banjar, Kalimantan Selatan 70654</p>
        </center>
    </div>
    <hr class="new4">
    <center>
        <h3 class="">Laporan Penjualan Sales</h3>
    </center>

    <table id="sales">
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama Sales</th>
            <th>Nama Customer Yang Beli</th>
            <th>Unit</th>
            <th>Qty</th>
            <th>Harga</th>
            <th>Total</th>
        </tr>
        @foreach ($data as $item )
        <tr>
            <td class="border px-6 py-4">{{ $loop->iteration }}</td>
            <td class="border px-6 py-4">{{ $item->tanggal }}</td>
            <td class="border px-6 py-4">{{ $item->salesmaster->name }}</td>
            <td class="border px-6 py-4">{{ $item->customermaster->name }}</td>
            <td class="border px-6 py-4">{{ $item->unit->name }}</td>
            <td class="border px-6 py-4">{{ number_format($item->harga) }}</td>
            <td class="border px-6 py-4">{{ $item->qty }}</td>
            <td class="border px-6 py-4">{{ $item->harga * $item->qty }}</td>
        </tr>
        @endforeach
    </table>
    <p class="signature">(Supervisor/Kepala Bagian)</p>
</body>

</html>
