{{-- @component('mail::message') --}}
    <h3>Data Pesanan Anda Sudah Di Verifikasi dan akan segera dikirimkan dari pusat PT INDOTRUCK UTAMA SINGAPURA</h3>

        <p>Berikut data yang telah dibeli</p>
        <br>
        <div>
            <p>Tanggal : {{ $sales->tanggal }}</p>
            <p>Id Transaksi : {{ $item->nota_number }} </p>
            <p>Nama Sales : {{ $sales->salesmaster->name }}</p>
            <p>Nama Customer Yang Beli : {{ $sales->customermaster->name }}</p>
            <p>Unit : {{ $sales->unit->name }}</p>
            <p>Qty : {{ $sales->qty }}</p>
            <p>Harga : {{ number_format($sales->harga) }}</p>
            <p>Total : {{ $sales->harga * $sales->qty }}</p>
        </div>
    <br>
    <p>Terima kasih atas pesanan Anda!</p>

    <p>Salam, Admins Sales PT INDOTRUCK UTAMA</p>
    {{-- {{ config('app.name') }} --}}
{{-- @endcomponent --}}
