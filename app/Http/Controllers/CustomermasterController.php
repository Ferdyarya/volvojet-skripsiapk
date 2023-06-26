<?php

namespace App\Http\Controllers;
use App\Models\Customermaster;

use Illuminate\Http\Request;

class CustomermasterController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')){
            $customermaster = Customermaster::where('name', 'LIKE', '%' .$request->search.'%')->paginate(10);
        }else{
            $customermaster = Customermaster::paginate(10);
        }
        return view('customermaster.index',[
            'customermaster' => $customermaster
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customermaster.create');
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

        Customermaster::create($data);

        return redirect()->route('customermaster.index')->with('toast_success', 'Data customermaster Telah ditambahkan bro');
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
    public function edit(Customermaster $customermaster)
    {
        return view('customermaster.edit', [
            'item' => $customermaster
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customermaster $customermaster)
    {
        $data = $request->all();

        $customermaster->update($data);

        //dd($data);

        return redirect()->route('customermaster.index')->with('toast_success', 'Data customermaster telah berubah bro');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customermaster $customermaster)
    {
        $customermaster->delete();
        return redirect()->route('customermaster.index')->with('hapus', 'Data Sudah Berhasil dihapus bro');
    }
}
