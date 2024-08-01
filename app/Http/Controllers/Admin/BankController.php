<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Bank;
use App\Http\Requests\BankRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BankController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() {
        $banks = Bank::all();
        return view('admin.bank.index', compact('banks'));
    }
    public function getBankById($id) {
        $bank = Bank::where('id', $id)->first();
        
        return response($bank, 200);
    }
    public function store(BankRequest $request) {
        $this->validate($request, [
            'name' => 'required',
            'bank_name' => 'required',
            'account_number' => 'required',
            'logo_bank' => 'required|file|mimes:jpeg,jpg,png|max:1000'
        ]);

        if($request->hasFile('logo_bank')){
            $file = $request->file('logo_bank');
            $extension = $file->getClientOriginalExtension();
            $filename = 'bank_'. $request->bank_name . time() . '.' . $extension;
            $file->move('admin/assets/images/banks/', $filename);
        }
        Bank::create([
            'name' => $request->name,
            'account_number' => $request->account_number,
            'logo_bank' => $filename,
            'bank_name' => $request->bank_name
        ]);
        return redirect()->back()->with([
            'success' => 'Berhasil menambah akun bank baru'
        ]);
    }
    public function update($id) {
        $bank = Bank::where('id', $id)->first();
        request()->validate([
            'name' => 'required',
            'bank_name' => 'required',
            'account_number' => 'required',
            'logo_bank' => 'file|mimes:jpeg,jpg,png|max:1000'
        ]);

        if(request()->hasFile('logo_bank')){
            $file = request()->file('logo_bank');
            $extension = $file->getClientOriginalExtension();
            $filename = 'bank_'. request()->bank_name . time() . '.' . $extension;
            if(File::exists($file)){
                $filepath = 'admin/assets/images/banks/' . $bank->logo_bank;
                File::delete($filepath);
                $file->move('admin/assets/images/banks/', $filename);
            }
        }else {
            $filename = $bank->logo_bank;
        }
        $bank->update([
            'name' => request()->name,
            'bank_name' => request()->bank_name,
            'account_number' => request()->account_number,
            'logo_bank' => $filename,
        ]);
        return redirect()->back()->with(['success'=>"Berhasil update bank"]);
    }

    public function destroy($id)
    {
        $bank = Bank::find($id);
        if ($bank->logo_bank != null) {
            if (File::exists('admin/assets/images/banks/'. $bank->logo_bank)) {
                File::delete('admin/assets/images/banks/'. $bank->logo_bank);
            }
        }
        $bank->delete($bank);

        return redirect()->back()->with([
            'success' => 'Berhasil menghapus bank'
        ]);
    }
}
