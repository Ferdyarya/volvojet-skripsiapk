<?php

namespace App\Http\Controllers;
use App\Models\Unit;
use App\Models\Sales;
use App\Models\Salesmaster;
use App\Models\Customermaster;
use Illuminate\Http\Request;
use PDF;

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
            $sales = Sales::where('nama', 'LIKE', '%' .$request->search.'%')->paginate(10);
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
}
