<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Brgmsk;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Brgmskcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $keyword = $request->keyword;

        $brgmsk = Brgmsk::with('product')->whereHas('product', function($query) use($keyword){
            $query->where('nama', 'LIKE', '%'.$keyword.'%');
        })->paginate(10);
        
        return view('brgmsk.index',[
            'brgmsk' => $brgmsk,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $supplier = Supplier::all();
       $product = Product::all();
        return view('brgmsk.create', [
            'supplier' => $supplier,
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

        Brgmsk::create($data);

        return redirect()->route('brgmsk.index')->with('toast_success', 'Data Barang Masuk Telah ditambahkan bro');
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
    public function edit(Brgmsk $brgmsk)
    {
        $supplier = Supplier::all();
        $product = Product::all();

        return view('brgmsk.edit', [
            'item' => $brgmsk,
            'supplier' => $supplier,
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
    public function update(Request $request, Brgmsk $brgmsk)
    {
        $data = $request->all();

        $brgmsk->update($data);

        //dd($data);

        return redirect()->route('brgmsk.index')->with('toast_success', 'Data Barang Masuk telah berubah bro');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brgmsk $brgmsk)
    {
        $brgmsk->delete();

        return redirect()->route('brgmsk.index')->with('toast_success', 'Data Barang Masuk telah dihapus');
    }

    public function brgmasukpdf()
    {
    	$data = Brgmsk::all();

        // view()->share('data', $data);
    	$pdf = PDF::loadview('brgmsk/brgmasukpdf', ['data' => $data]);
        return $pdf->download('laporan_Barang_Masuk.pdf');
    }
}

