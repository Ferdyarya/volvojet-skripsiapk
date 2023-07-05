<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Brgkeluar;
use App\Models\Customermaster;
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

        if($request->has('search')){
            $brgkeluar = Brgkeluar::where('nama', 'LIKE', '%' .$request->search.'%')->paginate(10);
        }else{
            $brgkeluar = Brgkeluar::with(['customermaster'])->paginate(10);
        }

        return view('brgkeluar.index',[
            'brgkeluar' => $brgkeluar,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $customermaster = Customermaster::all();
        return view('brgkeluar.create', [
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

        Brgkeluar::create($data);

        return redirect()->route('brgkeluar.index')->with('toast_success', 'Data Barang Keluar Telah ditambahkan bro');
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
        $customermaster = Customermaster::all();

        return view('brgkeluar.edit', [
            'item' => $brgkeluar,
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
