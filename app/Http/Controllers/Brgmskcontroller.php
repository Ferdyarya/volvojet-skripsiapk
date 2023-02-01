<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Brgmsk;
use App\Models\Product;
use App\Models\Supplier;

class Brgmskcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brgmsk = Brgmsk::with(['supplier', 'product'])->paginate(10);

        return view('brgmsk.index',[
            'brgmsk' => $brgmsk
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $supplier = Supplier::all();
       $product = Product::all();
        return view('brgmsk.create', [
            'supplier' => $supplier,
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

        Brgmsk::create($data);

        return redirect()->route('brgmsk.index');
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
    public function edit(Brgmsk $brgmsk)
    {
        $supplier = Supplier::all();
        $product = Product::all();

        return view('brgmsk.edit', [
            'item' => $brgmsk,
            'supplier' => $supplier,
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
    public function update(Request $request, Brgmsk $brgmsk)
    {
        $data = $request->all();

        $brgmsk->update($data);

        //dd($data);

        return redirect()->route('brgmsk.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brgmsk $brgmsk)
    {
        $brgmsk->delete();

        return redirect()->route('brgmsk.index');
    }
}

