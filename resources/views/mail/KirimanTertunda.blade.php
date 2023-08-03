<h3>Pengiriman Tertunda Karena Terjadi Kendala Sistem</h3>
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
