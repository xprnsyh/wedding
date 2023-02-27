<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\User;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PaymentPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createpayment');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'no_invoice' => 'required',
            'nama_pengirim' => 'required',
            'rekening_pengirim' => 'required',
            'bank_pengirim' => 'required',
            'tanggal_transfer' => 'required',
            'jumlah_transfer' => 'required',
            'bukti_transfer' => 'required|file|image|mimes:jpeg,png,jpg'
        ]);

        try {
            if ($request->hasFile('bukti_transfer')) {
                $file = $request->file('bukti_transfer');
                $extension = $file->getClientOriginalExtension();
                $filename = Str::slug($request->nama_pengirim) . '_' . time() . '.' . $extension;
                $file->move('admin/assets/images/transfer/' . $request->no_invoice . '/', $filename);
            }

            Payment::create([
                'no_invoice' => $request->no_invoice,
                'nama_pengirim' => $request->nama_pengirim,
                'rekening_pengirim' => $request->rekening_pengirim,
                'bank_pengirim' => $request->bank_pengirim,
                'tanggal_transfer' => $request->tanggal_transfer,
                'jumlah_transfer' => $request->jumlah_transfer,
                'path_bukti_transfer' => 'admin/assets/images/transfer/' . $request->no_invoice . '/' . $filename
            ]);
            return redirect('/order/success')->with(['success' => 'Sukses Mengkonfirmasi Pembayaran']);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
