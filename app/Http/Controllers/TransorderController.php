<?php

namespace App\Http\Controllers;
// use App\Models\Custorder;
use App\Models\Customermaster;
use App\Models\Transorder;
use App\Models\Supplier;
use App\Models\Unit;
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
            $transorder = Transorder::with(['supplier','unit','customermaster'])->paginate(10);
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
    //    $customermaster = Customermaster::all();
       $supplier = Supplier::all();
       $unit = Unit::all();
       $customermaster = Customermaster::all();
        return view('transorder.create', [
            // 'customermaster' => $customermaster,
            'supplier' => $supplier,
            'unit' => $unit,
            'customermaster' => $customermaster,
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
        $perulanganInput = count($data["id_supplier"]);

        for ($i=0; $i < $perulanganInput; $i++) {
            Transorder::create([
                'id_supplier' => $data["id_supplier"][$i],
                'id_unit' => $data["id_unit"][$i],
                'id_customermaster' => $data["id_customermaster"][$i],
                'namapart' => $data["namapart"][$i],
                'pemohon' => $data["pemohon"][$i],
                'qty' => $data["qty"][$i],
                'wo' => $data["wo"][$i],
                'tanggal' => $data["tanggal"][$i],
            ]);
        }

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
        $supplier = Supplier::all();
       $unit = Unit::all();
       $customermaster = Customermaster::all();

        return view('transorder.edit', [
            'item' => $transorder,
            'supplier' => $supplier,
            'unit' => $unit,
            'customermaster' => $customermaster,
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
