<?php

namespace App\Http\Controllers;
use App\Models\Unit;
use App\Models\Partretur;
use App\Models\Supplier;
use PDF;

use Illuminate\Http\Request;

class PartreturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $partretur = Partretur::where('nama', 'LIKE', '%' .$request->search.'%')->paginate(10);
        }else{
            $partretur = Partretur::with(['unit','supplier'])->paginate(10);
        }
        return view('partretur.index',[
            'partretur' => $partretur
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $unit = Unit::all();
       $supplier = Supplier::all();
        return view('partretur.create', [
            'unit' => $unit,
            'supplier' => $supplier,
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

        Partretur::create($data);

        return redirect()->route('partretur.index')->with('toast_success', 'Data Partretur Telah ditambahkan bro');
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
    public function edit(Partretur $Partretur)
    {
        $unit = Unit::all();
        $supplier = Supplier::all();

        return view('Partretur.edit', [
            'item' => $Partretur,
            'unit' => $unit,
            'supplier' => $supplier
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partretur $Partretur)
    {
        $data = $request->all();

        $Partretur->update($data);

        //dd($data);

        return redirect()->route('Partretur.index')->with('toast_success', 'Data Partretur telah berubah bro');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partretur $Partretur)
    {
        $Partretur->delete();

        return redirect()->route('Partretur.index')->with('toast_success', 'Data Partretur telah dihapus');
    }

    public function partreturpdf()
    {
    	$data = Partretur::all();

        // view()->share('data', $data);
    	$pdf = PDF::loadview('Partretur/partreturpdf', ['data' => $data]);
        return $pdf->download('laporan_Partretur.pdf');
    }
}
