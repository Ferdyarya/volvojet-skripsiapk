<?php

namespace App\Http\Controllers;
use App\Models\Unit;
use App\Models\Sales;
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
            $sales = Sales::with(['unit'])->paginate(10);
        }
        return view('sales.index',[
            'sales' => $sales
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
        return view('sales.create', [
            'unit' => $unit,
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

        Sales::create($data);

        return redirect()->route('sales.index')->with('toast_success', 'Data Sales Telah ditambahkan bro');
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
    public function edit(Sales $sales)
    {
        $unit = Unit::all();

        return view('sales.edit', [
            'item' => $sales,
            'unit' => $unit
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sales $sales)
    {
        $data = $request->all();

        $sales->update($data);

        //dd($data);

        return redirect()->route('sales.index')->with('toast_success', 'Data Sales telah berubah bro');;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sales $sales)
    {
        $sales->delete();

        return redirect()->route('sales.index')->with('toast_success', 'Data Sales telah dihapus');
    }

    public function salespdf()
    {
    	$data = Sales::all();

        // view()->share('data', $data);
    	$pdf = PDF::loadview('sales/salespdf', ['data' => $data]);
        return $pdf->download('laporan_sales.pdf');
    }
}
