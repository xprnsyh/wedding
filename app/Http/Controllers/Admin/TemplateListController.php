<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TemplateList;
use Illuminate\Support\Facades\File;

class TemplateListController extends Controller
{
    public function index()
    {
        $list_templates = TemplateList::all();
        
        return view('admin.template.index',['list_templates' => $list_templates]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'logo_template' => 'required|file|mimes:jpeg,jpg,png|max:3000',
            'category' => 'required'
        ]);
        

        if($request->hasFile('logo_template')){
            $file = $request->file('logo_template');
            $extension = $file->getClientOriginalExtension();
            $filename = 'template_'. $request->name . time() . '.' . $extension;
            $file->move('admin/assets/images/list_template/', $filename);
        }

        TemplateList::create([
            'name' => $request->name,
            'logo_template' => $filename,
            'route' => 'template.'. $request->name,
            'category' => $request->category
        ]);

        return redirect()->back()->with([
            'success' => 'Berhasil menambah Template baru'
        ]);
    }

    public function edit(Request $request) {
        $list_templates = TemplateList::where('id', $request->id)->first();

        // return response()->json(['success' => true,'list_bank' => $list_bank]);
        return response($list_templates, 200);
    }

    public function update($id) {
        $list_templates = TemplateList::where('id', $id)->first();
        request()->validate([
            'name' => 'required',
        ]);

        if(request()->hasFile('logo_template')){
            $file = request()->file('logo_template');
            $extension = $file->getClientOriginalExtension();
            $filename = 'template_'. request()->name . time() . '.' . $extension;
            if(File::exists($file)){
                $filepath = 'admin/assets/images/list_template/' . $list_templates->logo_template;
                File::delete($filepath);
                $file->move('admin/assets/images/list_template/', $filename);
            }
        }else {
            $filename = $list_templates->logo_template;
        }
        $list_templates->update([
            'name' => request()->name,
            'logo_template' => $filename,
            'route' => 'template.'. request()->name,
            'category' => request()->category
        ]);
        return redirect()->back()->with(['success' => "Berhasil update Template"]);
    }

    public function destroy($id)
    {
        $list_templates = TemplateList::find($id);
        if ($list_templates->logo_template != null) {
            if (File::exists('admin/assets/images/list_template/'. $list_templates->logo_template)) {
                File::delete('admin/assets/images/list_template/'. $list_templates->logo_template);
            }
        }
        $list_templates->delete($list_templates);

        return redirect()->back()->with([
            'success' => 'Berhasil menghapus Template'
        ]);
    }

    public function changeStatus($id)
    {
        $discount = TemplateList::where('id', $id)->first();

        $discount->is_active = !$discount->is_active;
        $discount->save();

        return response()->json(['success' => true ]);
    }
}
