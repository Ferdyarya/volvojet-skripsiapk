<?php

namespace App\Http\Controllers;

use App\Models\Custorder;
use App\Models\Customermaster;
// use App\Models\Product;
use Illuminate\Http\Request;
use PDF;


class CustorderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $custorder = Custorder::where('nama', 'LIKE', '%' .$request->search.'%')->paginate(10);
        }else{
            $custorder = Custorder::with(['customermaster'])->paginate(10);
        }
        return view('custorder.index',[
            'custorder' => $custorder
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
        return view('custorder.create', [
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

        Custorder::create($data);

        return redirect()->route('custorder.index')->with('toast_success', 'Data Customer Order Telah ditambahkan bro');
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
    public function edit(Custorder $custorder)
    {
        $customermaster = Customermaster::all();

        return view('custorder.edit', [
            'item' => $custorder,
            'customermaster' => $customermaster
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Custorder $custorder)
    {
        $data = $request->all();

        $custorder->update($data);

        //dd($data);

        return redirect()->route('custorder.index')->with('toast_success', 'Data Customer Order telah berubah bro');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Custorder $custorder)
    {
        $custorder->delete();

        return redirect()->route('custorder.index')->with('toast_success', 'Data Customer Order telah dihapus');
    }

    public function custorderpdf()
    {
    	$data = Custorder::all();

        // view()->share('data', $data);
    	$pdf = PDF::loadview('custorder/custorderpdf', ['data' => $data]);
        return $pdf->download('laporan_custorder.pdf');
    }
}
