<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\AngpaoRequest;
use Illuminate\Http\Request;
use App\Models\Angpao;

class AngpaoController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AngpaoRequest $request)
    {
        try {
            $angpao = Angpao::create([
                'event_id' => $request->event_id,
                'nama_bank' => $request->nama_bank,
                'no_rekening' => $request->no_rekening,
                'nama_penerima' => $request->nama_penerima,
                'status' => 'aktif'
            ]);

            return redirect()->back()->with([
                'success' => 'Berhasil menambah angpao'
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'error' => $th->getMessage()
            ]);
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
        try {
            $angpao = Angpao::find($id);

            $angpao->update([
                'nama_bank' => $request->nama_bank,
                'no_rekening' => $request->no_rekening,
                'nama_penerima' => $request->nama_penerima,
            ]);
            return redirect()->back()->with([
                'success' => 'Berhasil mengubah angpao'
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'error' => $th->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $angpao = Angpao::find($id);

            $angpao->delete($angpao);
            return redirect()->back()->with([
                'success' => 'Berhasil menghapus angpao'
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'error' => $th->getMessage()
            ]);
        }
    }
}
