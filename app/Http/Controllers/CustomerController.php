<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Customermaster;
use App\Models\Customers;
use Illuminate\Http\Request;
use PDF;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $customer = Customers::where('nama', 'LIKE', '%' .$request->search.'%')->paginate(10);
        }else{
            $customer = Customers::with(['unit', 'customermaster'])->paginate(10);
        }
        return view('customer.index',[
            'customer' => $customer
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
       $customermaster = Customermaster::all();
        return view('customer.create', [
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
        $perulanganInput = count($data["id_customermaster"]);

        for ($i=0; $i < $perulanganInput; $i++) {
            Customers::create([
                'id_customermaster' => $data["id_customermaster"][$i],
                'id_unit' => $data["id_unit"][$i],
                'email' => $data["email"][$i],
                'qty' => $data["qty"][$i],
                'tanggal' => $data["tanggal"][$i],
            ]);
        }

        return redirect()->route('customer.index')->with('toast_success', 'Data Customer Service Telah ditambahkan bro');
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
    public function edit(Customers $customer)
    {
        $unit = Unit::all();
        $customermaster = Customermaster::all();

        return view('customer.edit', [
            'item' => $customer,
            'unit' => $unit,
            'customermaster' => $customermaster
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customers $customer)
    {
        $data = $request->all();

        $customer->update($data);

        //dd($data);

        return redirect()->route('customer.index')->with('toast_success', 'Data Customer Service telah berubah bro');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customers $customer)
    {
        $customer->delete();

        return redirect()->route('customer.index')->with('toast_success', 'Data Customer Service telah dihapus');
    }

    public function customerpdf()
    {
    	$data = Customers::all();

        // view()->share('data', $data);
    	$pdf = PDF::loadview('customer/customerpdf', ['data' => $data]);
        return $pdf->download('laporan_customer.pdf');
    }
}
