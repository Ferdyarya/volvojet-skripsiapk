<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Supplier;
use App\Models\Product;
use PDF;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $product = Product::where('nama', 'LIKE', '%' .$request->search.'%')->paginate(10);
        }else{
            $product = Product::with(['unit', 'supplier'])->paginate(10);
        }
        return view('product.index',[
            'product' => $product
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
        return view('product.create', [
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

        Product::create($data);

        return redirect()->route('product.index')->with('toast_success', 'Data Part For Service Telah ditambahkan bro');
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
    public function edit($id)
    {
        $unit = Unit::all();
        $supplier = Supplier::all();

        return view('product.edit', [
            'item' => Product::find($id),
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
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $product = Product::find($id);
        $product->update($data);

        //dd($data);

        return redirect()->route('product.index')->with('toast_success', 'Data Part For Service telah berubah bro');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('product.index')->with('toast_success', 'Data Part For Service telah dihapus');
    }

    public function exportpdf()
    {
    	$data = Product::all();

        // view()->share('data', $data);
    	$pdf = PDF::loadview('product/exportpdf', ['data' => $data]);
        return $pdf->download('laporan_product.pdf');
    }
}
