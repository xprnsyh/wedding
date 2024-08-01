<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ListBankAngpao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ListBankAngpaoController extends Controller
{
    //
    public function index()
    {
        $list_bank = ListBankAngpao::all();
        
        return view('admin.angpao.index',['list_bank' => $list_bank]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'logo_url' => 'required|file|mimes:jpeg,jpg,png|max:3000'
        ]);
        

        if($request->hasFile('logo_url')){
            $file = $request->file('logo_url');
            $extension = $file->getClientOriginalExtension();
            $filename = 'bank_'. $request->name . time() . '.' . $extension;
            $file->move('admin/assets/images/list_banks/', $filename);
        }

        ListBankAngpao::create([
            'name' => $request->name,
            'logo_url' => $filename,
        ]);

        return redirect()->back()->with([
            'success' => 'Berhasil menambah List Bank baru'
        ]);
    }

    public function edit(Request $request) {
        $list_bank = ListBankAngpao::where('id', $request->id)->first();

        // return response()->json(['success' => true,'list_bank' => $list_bank]);
        return response($list_bank, 200);
    }

    public function update($id) {
        $list_bank = ListBankAngpao::where('id', $id)->first();
        request()->validate([
            'name' => 'required',
            'logo_url' => 'file|mimes:jpeg,jpg,png|max:3000'
        ]);

        if(request()->hasFile('logo_url')){
            $file = request()->file('logo_url');
            $extension = $file->getClientOriginalExtension();
            $filename = 'bank_'. request()->name . time() . '.' . $extension;
            if(File::exists($file)){
                $filepath = 'admin/assets/images/list_banks/' . $list_bank->logo_url;
                File::delete($filepath);
                $file->move('admin/assets/images/list_banks/', $filename);
            }
        }else {
            $filename = $list_bank->logo_url;
        }
        $list_bank->update([
            'name' => request()->name,
            'logo_url' => $filename,
        ]);
        return redirect()->back()->with(['success'=>"Berhasil update list bank"]);
    }

    public function destroy($id)
    {
        $list_bank = ListBankAngpao::find($id);
        if ($list_bank->logo_url != null) {
            if (File::exists('admin/assets/images/list_banks/'. $list_bank->logo_url)) {
                File::delete('admin/assets/images/list_banks/'. $list_bank->logo_url);
            }
        }
        $list_bank->delete($list_bank);

        return redirect()->back()->with([
            'success' => 'Berhasil menghapus list bank'
        ]);
    }

}
