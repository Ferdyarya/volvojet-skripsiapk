<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Customers;
use App\Models\Custorder;
use App\Models\Transorder;


use App\Models\DeliveryNote;
use Illuminate\Http\Request;
use PDF;

class DeliverynoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $deliverynote = DeliveryNote::where('nama', 'LIKE', '%' .$request->search.'%')->paginate(10);
        }else{
            $deliverynote = DeliveryNote::with(['custorder', 'transorder','customer','product'])->paginate(10);
        }
        return view('deliverynote.index',[
            'deliverynote' => $deliverynote
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
        return view('deliverynote.create', [
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

        return redirect()->route('customer.index')->with('toast_success', 'Data deliverynote Telah ditambahkan bro');
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
    public function edit(DeliveryNote $deliverynote)
    {
        $custorder = Custorder::all();
       $customer = Customers::all();
       $transorder = Transorder::all();
       $product = Product::all();

        return view('deliverynote.edit', [
            'item' => $deliverynote,
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
    public function update(Request $request, DeliveryNote $deliverynote)
    {
        $data = $request->all();

        $deliverynote->update($data);

        //dd($data);

        return redirect()->route('customer.index')->with('toast_success', 'Data deliverynote telah berubah bro');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeliveryNote $deliverynote)
    {
        $deliverynote->delete();

        return redirect()->route('customer.index')->with('toast_success', 'Data deliverynote telah dihapus');
    }

    public function customerpdf()
    {
    	$data = DeliveryNote::all();

        // view()->share('data', $data);
    	$pdf = PDF::loadview('DeliveryNote/DeliveryNotepdf', ['data' => $data]);
        return $pdf->download('laporan_DeliveryNote.pdf');
    }
}
