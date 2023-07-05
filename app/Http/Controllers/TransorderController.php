<?php

namespace App\Http\Controllers;
use App\Models\Custorder;
use App\Models\Customermaster;
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

        if($request->has('search')){
            $transorder = Transorder::where('nama', 'LIKE', '%' .$request->search.'%')->paginate(10);
        }else{
            $transorder = Transorder::with(['customermaster','custorder'])->paginate(10);
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
       $customermaster = Customermaster::all();
       $custorder = Custorder::all();
        return view('transorder.create', [
            'customermaster' => $customermaster,
            'custorder' => $custorder,
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
        $customermaster = Customermaster::all();
        $custorder = Custorder::all();

        return view('transorder.edit', [
            'item' => $transorder,
            'customermaster' => $customermaster,
            'custorder' => $custorder
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
