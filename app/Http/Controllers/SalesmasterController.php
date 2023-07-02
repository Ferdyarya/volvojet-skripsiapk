<?php

namespace App\Http\Controllers;
use App\Models\Salesmaster;

use Illuminate\Http\Request;

class SalesmasterController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')){
            $salesmaster = Salesmaster::where('name', 'LIKE', '%' .$request->search.'%')->paginate(10);
        }else{
            $salesmaster = Salesmaster::paginate(10);
        }
        return view('salesmaster.index',[
            'salesmaster' => $salesmaster
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('salesmaster.create');
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

        Salesmaster::create($data);

        return redirect()->route('salesmaster.index')->with('toast_success', 'Data Sales Master Telah ditambahkan bro');
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
    public function edit(Salesmaster $salesmaster)
    {
        return view('salesmaster.edit', [
            'item' => $salesmaster
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salesmaster $salesmaster)
    {
        $data = $request->all();

        $salesmaster->update($data);

        //dd($data);

        return redirect()->route('salesmaster.index')->with('toast_success', 'Data Sales Master telah berubah bro');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salesmaster $salesmaster)
    {
        $salesmaster->delete();
        return redirect()->route('salesmaster.index')->with('hapus', 'Data Sudah Berhasil dihapus bro');
    }
}
