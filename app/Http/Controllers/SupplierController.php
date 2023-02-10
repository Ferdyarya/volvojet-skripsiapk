<?php

namespace App\Http\Controllers;
use App\Models\Supplier;
// use App\Models\Brgmsk;
// use App\Models\Product;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')){
            $supplier = Supplier::where('nama', 'LIKE', '%' .$request->search.'%')->paginate(10);
        }else{
        $supplier = Supplier::paginate(10);
        }
        return view('supplier.index',[
            'supplier' => $supplier
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.create');
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

        Supplier::create($data);

        return redirect()->route('supplier.index')->with('toast_success', 'Data Unit Telah ditambahkan bro');
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
    public function edit(Supplier $supplier)
    {
        return view('supplier.edit', [
            'item' => $supplier
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $data = $request->all();

        $supplier->update($data);

        //dd($data);

        return redirect()->route('supplier.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect()->route('supplier.index');
    }
}
