<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Product;

class DiscountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $list_discount = Discount::all();
        $list_product = Product::all();

        return view('admin.discount.index', [
            'list_discount' => $list_discount,
            'list_product' => $list_product,
        ]);

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required',
            'name' => 'required',
            'discount_type' => 'required',
            'amount' => 'required|numeric'
        ]);

        Discount::create([
            'product_id' => $request->product_id,
            'name' => $request->name,
            'discount_type' => $request->discount_type,
            'amount' => $request->amount,
        ]);

        return redirect()->back()->with([
            'success' => 'Berhasil menambah discount baru'
        ]);
    }

    public function update($id)
    {
        $discount = Discount::where('id', $id)->first();
        request()->validate([
            'product_id' => 'required',
            'name' => 'required',
            'discount_type' => 'required',
            'amount' => 'required|numeric'
        ]);

        $discount->update([
            'name' => request()->name,
            'product_id' => request()->product_id,
            'disct_type' => request()->discount_type,
            'amount' => request()->amount,
        ]);

        return redirect()->back()->with([
            'success'=>"Berhasil update discount"
        ]);
    }

    public function destroy($id)
    {
        $discount = Discount::find($id);
        $discount->delete($discount);

        return redirect()->back()->with([
            'success' => 'Berhasil menghapus discount'
        ]);
    }

    public function getDiscountById($id)
    {
        $discount = Discount::where('id', $id)->first();
        
        return response($discount, 200);
    }

    public function changeStatus($id)
    {
        $discount = Discount::where('id', $id)->first();

        $discount->is_active = !$discount->is_active;
        $discount->save();

        // return response($discount,200);
        return response()->json(['success' => true ]);
        // return redirect()->back()->with([
        //     'success' => 'Berhasil mengubah status'
        // ]);
    }
}
