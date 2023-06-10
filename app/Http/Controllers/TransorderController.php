<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Customers;
use App\Models\Transorder;
use Illuminate\Http\Request;
use pdf;


class TransorderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $transorder = Transorder::where('nama', 'LIKE', '%' .$request->search.'%')->paginate(10);
        }else{
            $transorder = Transorder::with(['unit', 'product'])->paginate(10);
        }
        return view('transorder.index',[
            'transorder' => $transorder
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $customers = Customers::all();
       $product = Product::all();
        return view('transorder.create', [
            'customers' => $customers,
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

        Transorder::create($data);

        return redirect()->route('Transorder.index')->with('toast_success', 'Data Transorder Telah ditambahkan bro');
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
    public function edit(Transorder $transorder)
    {
        $transorder = Transorder::all();
        $product = Product::all();
        $customers = Customers::all();

        return view('customer.edit', [
            'item' => $transorder,
            'customers' => $customers,
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
    public function update(Request $request, Transorder $transorder)
    {
        $data = $request->all();

        $transorder->update($data);

        //dd($data);

        return redirect()->route('transorder.index')->with('toast_success', 'Data transorder telah berubah bro');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transorder $transorder)
    {
        $transorder->delete();

        return redirect()->route('customer.index')->with('toast_success', 'Data transorder telah dihapus');
    }

    public function customerpdf()
    {
    	$data = Customers::all();

        // view()->share('data', $data);
    	$pdf = PDF::loadview('transorderpdf/transorderpdf', ['data' => $data]);
        return $pdf->download('laporan_transorderpdf.pdf');
    }
}
