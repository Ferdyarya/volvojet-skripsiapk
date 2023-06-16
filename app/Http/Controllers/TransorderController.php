<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Customers;
use App\Models\Transorder;
use Illuminate\Http\Request;
use PDF;


class TransorderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $keyword = $request->keyword;

        $transorder = Transorder::with('product')->whereHas('product', function($query) use($keyword){
            $query->where('nama', 'LIKE', '%'.$keyword.'%');
        })->paginate(10);

        return view('transorder.index',[
            'transorder' => $transorder,
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
        return view('transorder.create', [
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

        Transorder::create($data);

        return redirect()->route('transorder.index')->with('toast_success', 'Data transorder Telah ditambahkan bro');
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
        $customer = Customers::all();
        $product = Product::all();

        return view('transorder.edit', [
            'item' => $transorder,
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

        return redirect()->route('transorder.index')->with('toast_success', 'Data transorder telah dihapus');
    }

    public function transorderpdf()
    {
    	$data = Transorder::all();

        // view()->share('data', $data);
    	$pdf = PDF::loadview('transorder/transorderpdf', ['data' => $data]);
        return $pdf->download('laporan_transorder.pdf');
    }
}
