<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Brgkeluar;
use App\Models\Product;
use App\Models\Customers;
use PDF;

class BrgkeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword1 = $request->keyword1;

        $brgkeluar = Brgkeluar::with('product')->whereHas('product', function($query) use($keyword1){
            $query->where('nama', 'LIKE', '%'.$keyword1.'%');
        })->paginate(10);

        // if($request->has('search')){
        //     $brgkeluar = Brgkeluar::all();
        //     $brgkeluar = Brgkeluar::where('id_product', 'LIKE', '%' .$request->search.'%')->paginate(10);

        // }else{
        //     $brgkeluar = Brgkeluar::with(['customer', 'product'])->paginate(10);
        // }
        return view('brgkeluar.index',[
            'brgkeluar' => $brgkeluar
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $customer = Customers::all();
       $product = Product::all();
        return view('brgkeluar.create', [
            'customer' => $customer,
            'product' => $product,
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

        Brgkeluar::create($data);

        return redirect()->route('brgkeluar.index')->with('toast_success', 'Data barang Keluar Telah ditambahkan bro');
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
    public function edit(Brgkeluar $brgkeluar)
    {
        $customer = Customers::all();
        $product = Product::all();

        return view('brgkeluar.edit', [
            'item' => $brgkeluar,
            'customer' => $customer,
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brgkeluar $brgkeluar)
    {
        $data = $request->all();

        $brgkeluar->update($data);

        //dd($data);

        return redirect()->route('brgkeluar.index')->with('toast_success', 'Data Barang Keluar telah berubah bro');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brgkeluar $brgkeluar)
    {
        $brgkeluar->delete();

        return redirect()->route('brgkeluar.index')->with('toast_success', 'Data Barang Keluar telah dihapus');
    }

    public function brgkeluarpdf()
    {
    	$data = Brgkeluar::all();

        // view()->share('data', $data);
    	$pdf = PDF::loadview('brgkeluar/brgkeluarpdf', ['data' => $data]);
        return $pdf->download('laporan_Barang_Keluar.pdf');
    }
}
