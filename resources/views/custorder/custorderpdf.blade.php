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

        #warnatable th {
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
        <h5>Laporan Customer Order

        </h5>
    </center>



    <br>

    <table class='table table-bordered' id="warnatable">
        <thead>
            <tr>
                <th>No</th>
                <th>Part Order</th>
                <th>WO</th>
                <th>qty</th>
                <th>harga</th>
                <th>tanggal</th>
            </tr>
        </thead>
        <tbody>
            {{-- @php
        $grandTotal = 0;
        @endphp --}}

        @foreach ($data as $item )
        <tr>
            <td class="border px-6 py-4">{{ $loop->iteration }}</td>
            <td class="border px-6 py-4">{{ $item->tanggal }}</td>
            <td class="border px-6 py-4">{{ $item->order_product }}</td>
            <td class="border px-6 py-4">{{ $item->product->nama }}</td>
            <td class="border px-6 py-4">{{ $item->wo }}</td>
            <td class="border px-6 py-4">{{ $item->qty }}</td>
        </tr>
        @endforeach
        {{-- <tr>
            <td colspan="7">Grand Total</td>
            <td>Rp. {{ number_format($grandTotal)}}</td>
        </tr> --}}
        </tbody>
    </table>
    <p class="signature">(Supervisor/Kepala Bagian)</p>
</body>

</html>
