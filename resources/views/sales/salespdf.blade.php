{{-- <!DOCTYPE html>
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
#sales {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#sales td, #sales th {
  border: 1px solid #ddd;
  padding: 8px;
}

#sales tr:nth-child(even){background-color: #f2f2f2;}

#sales tr:hover {background-color: #ddd;}

#sales th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

    <center>
    <h1 class="">Export Table Sales</h1>
    </center>

<table id="sales">
  <tr>
    <th>No</th>
    <th>Nama Customer</th>
    <th>Unit</th>
    <th>Email</th>
    <th>Kode</th>
    <th>Harga</th>
    <th>Qty</th>
  </tr>
    @foreach ($data as $item )
    <tr>
        <td class="border px-6 py-4">{{ $loop->iteration }}</td>
        <td class="border px-6 py-4">{{ $item->nama }}</td>
        <td class="border px-6 py-4">{{ $item->unit->name }}</td>
        <td class="border px-6 py-4">{{ $item->email }}</td>
        <td class="border px-6 py-4">{{ $item->kode }}</td>
        <td class="border px-6 py-4">{{ number_format($item->harga) }}</td>
        <td class="border px-6 py-4">{{ $item->qty }}</td>
    </tr>
    @endforeach
</table>
</body>
</html>





