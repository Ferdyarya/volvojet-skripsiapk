<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transorder;
use App\Models\Custorder;
use App\Models\Customers;
use App\Models\DeliveryNote;
use PDF;

class DelivenoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $delivenote = DeliveryNote::where('nama', 'LIKE', '%' .$request->search.'%')->paginate(10);
        }else{
            $delivenote = DeliveryNote::with(['custorder', 'transorder','customer','product'])->paginate(10);
        }
        return view('delivenote.index',[
            'delivenote' => $delivenote
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $custorder = Custorder::all();
       $customer = Customers::all();
       $transorder = Transorder::all();
       $product = Product::all();
        return view('delivenote.create', [
            'customer' => $customer,
            'product' => $product,
            'transorder' => $transorder,
            'Custorder' => $custorder,
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

        DeliveryNote::create($data);

        return redirect()->route('delivenote.index')->with('toast_success', 'Data delivenote Telah ditambahkan bro');
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
    public function edit(DeliveryNote $delivenote)
    {
        $custorder = Custorder::all();
       $customer = Customers::all();
       $transorder = Transorder::all();
       $product = Product::all();

        return view('delivenote.edit', [
            'item' => $delivenote,
            'customer' => $customer,
            'product' => $product,
            'transorder' => $transorder,
            'Custorder' => $custorder,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DeliveryNote $delivenote)
    {
        $data = $request->all();

        $delivenote->update($data);

        //dd($data);

        return redirect()->route('delivenote.index')->with('toast_success', 'Data delivenote telah berubah bro');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeliveryNote $delivenote)
    {
        $delivenote->delete();

        return redirect()->route('delivenote.index')->with('toast_success', 'Data delivenote telah dihapus');
    }

    public function delivenotepdf()
    {
    	$data = DeliveryNote::all();

        // view()->share('data', $data);
    	$pdf = PDF::loadview('delivenote/delivenotepdf', ['data' => $data]);
        return $pdf->download('laporan_delivenote.pdf');
    }
}

