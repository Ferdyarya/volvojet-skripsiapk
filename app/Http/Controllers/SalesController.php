<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Unit;
use App\Models\Sales;
use App\Mail\KirimEmail;
use App\Models\Salesmaster;
use App\Mail\KirimanPending;
use Illuminate\Http\Request;
use App\Models\Customermaster;
use App\Mail\KirimEmailVerifikasi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SalesController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if($request->has('search')){
            $sales = Sales::join('salesmasters', 'salesmasters.id', '=', 'sales.id_salesmaster')
            ->where('salesmasters.name', 'LIKE', '%' . $request->search . '%')
            ->paginate(10);
        }else{
            $sales = Sales::with(['unit', 'salesmaster','customermaster'])->paginate(10);
        }
        return view('sales.index',[  'sales' => $sales ]);

        //hitungtotal
        $sales = Sales::all();
        $total = $sales->sum(function ($product) {
            return $product->price * $product->qty;
        });

        return view('sales.index', compact('sales', 'total'));
    // end hitung total

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $unit = Unit::all();
       $salesmaster = Salesmaster::all();
       $customermaster = Customermaster::all();
        return view('sales.create', [
            'unit' => $unit,
            'salesmaster' => $salesmaster,
            'customermaster' => $customermaster,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $perulanganInput = count($data["id_salesmaster"]);


        for ($i=0; $i < $perulanganInput; $i++) {
            Sales::create([
                'id_salesmaster' => $data["id_salesmaster"][$i],
                'id_customermaster' => $data["id_customermaster"][$i],
                'id_unit' => $data["id_unit"][$i],
                'harga' => $data["harga"][$i],
                'qty' => $data["qty"][$i],
                'tanggal' => $data["tanggal"][$i],

            ]);
            $mailData = [
                'title' => 'Dari PT. Indotruck Utama',
                'body' => 'Terima kasih sudah membeli unit Pesanan Anda Sedang Menunggu Di Verifikasi Pusat'
            ];
            $emailcustomer = Customermaster::find($data["id_customermaster"][$i]);
            Mail::to($emailcustomer->email)->send(new KirimEmail($mailData));
        }

        return redirect()->route('sales.index')->with('toast_success', 'Data Penjualan Sales Service Telah ditambahkan bro');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unit = Unit::all();
        $salesmaster = Salesmaster::all();
        $customermaster = Customermaster::all();

        return view('sales.edit', [
            'item' => Sales::find($id),
            'unit' => $unit,
            'salesmaster' => $salesmaster,
            'customermaster' => $customermaster,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $sales = Sales::find($id);
        $sales->update($data);

        //dd($data);

        return redirect()->route('sales.index')->with('toast_success', 'Data Penjualan Sales telah berubah bro');

    }

    public function validasi(Request $request, $id)
    {

        $sales = Sales::find($id);
        $email= $sales->customermaster->email;
        if ($request->has('validasi')) {
            $sales->update([
                'status' => $request->validasi
            ]);


            if ($sales->status === 'Unit Segera dikirim') {
                $emailData = [
                    'title' => 'Email Verifikasi - Unit Akan Dikirim',
                    'body' => 'Unit Anda akan segera dikirim. Terima kasih atas pembelian Anda.'
                ];
                Mail::to($email)->send(new KirimEmailVerifikasi($sales,$emailData));
            } elseif ($sales->status === 'Pengiriman Tertunda') {
                $emailData = [
                    'title' => 'Pengiriman Unit Tertunda',
                    'body' => 'Mohon maaf, pengiriman unit Anda mengalami penundaan. Kami akan segera menghubungi Anda untuk memberikan informasi lebih lanjut.'
                ];
                Mail::to($email)->send(new KirimanPending($sales,$emailData));
            }


        }

        return redirect()->route('sales.index')->with('toast_success', 'Data Penjualan Sales telah berubah bro');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sales = Sales::find($id);
        $sales->delete();

        return redirect()->route('sales.index')->with('toast_success', 'Data Penjualan Sales telah dihapus');
    }

    public function salespdf()
    {
    	$data = Sales::all();

        // view()->share('data', $data);
    	$pdf = PDF::loadview('sales/salespdf', ['data' => $data]);
        return $pdf->download('laporan_sales.pdf');
    }

    // REKAP SALES REPORT
    public function perbulan(Request $request)
    {
        $f = $request->filter ?? null;

        $data['title'] = "Laporan Rekap Bulanan";
        $data['sales'] = sales::all();
        if($f == '' || $f == 'all')
        {
            $data['sales'] = sales::all();
        }
        else
        {
            $data['sales'] = sales::where('customer', $f)->get();
        }
        $data['id_customermaster'] = sales::groupBy( 'id_customermaster' )
                ->orderBy( 'id_customermaster' )
                ->select(DB::raw('count(*) as count, id_customermaster'))
                ->get();
        $data['filter'] = $f;
        return view('laporansales.perbulan', $data);

    }

    public function pernama(Request $request)
    {
        $f = $request->filter ?? null;

        $data['title'] = "Laporan Penjualan Persales";
        $data['sales'] = sales::all();
        if($f == '' || $f == 'all')
        {
            $data['sales'] = sales::all();
        }
        else
        {
            $data['sales'] = sales::where('id_salesmaster', $f)->get();
        }
        $data['id_salesmaster'] = sales::groupBy( 'id_salesmaster' )
                ->orderBy( 'departement_id' )
                ->select(DB::raw('count(*) as count, id_salesmaster'))
                ->get();
        $data['filter'] = $f;
        return view('laporansales.pernama', $data);

    }

    public function notapembelian(Request $request)
    {
        $f = $request->filter ?? null;

        $data['title'] = "Laporan Nota Pembelian";
        $data['sales'] = sales::all();
        if($f == '' || $f == 'all')
        {
            $data['sales'] = sales::all();
        }
        else
        {
            $data['sales'] = sales::where('id_customermaster', $f)->get();
        }
        $data['id_customermaster'] = sales::groupBy( 'id_customermaster' )
                ->orderBy( 'id_customermaster' )
                ->select(DB::raw('count(*) as count, id_customermaster'))
                ->get();
        $data['filter'] = $f;
        return view('laporansales.notapembelian', $data);

    }


}
