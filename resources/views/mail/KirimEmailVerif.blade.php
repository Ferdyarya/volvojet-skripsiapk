@component('mail::message')
    <h3>Data Pesanan Anda Sudah Di Verifikasi dan akan segera dikirimkan dari pusat PT INDOTRUCK UTAMA SINGAPURA</h3>

    <table>
        <p>Berikut data yang telah dibeli</p>
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

        <tr>
            <td class="border px-6 py-4">{{ $sales->tanggal }}</td>
            <td class="border px-6 py-4">{{ $sales->salesmaster->name }}</td>
            <td class="border px-6 py-4">{{ $sales->customermaster->name }}</td>
            <td class="border px-6 py-4">{{ $sales->unit->name }}</td>
            <td class="border px-6 py-4">{{ $sales->qty }}</td>
            <td class="border px-6 py-4">{{ number_format($sales->harga) }}</td>
            <td class="border px-6 py-4">{{ $sales->harga * $sales->qty }}</td>
        </tr>
    </table>

    Terima kasih atas pesanan Anda!

    Salam,
    {{ config('app.name') }}
@endcomponent
