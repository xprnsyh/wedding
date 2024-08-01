<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        //
        $category = Category::with(['parent'])->orderBy('created_at', 'DESC')->get();

        $parent = Category::getParent()->orderBy('name', 'ASC')->get();
        return view('admin.category.index', [
            'categories' => $category,
            'parent' => $parent
        ]);
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
    public function store(CategoryRequest $request)
    {
        //
        // $this->validate($request, [
        //     'name' => 'required|string|unique:categories'
        // ]);

        $request->request->add(['slug' => $request->name]);

        Category::create($request->except('_token'));

        return redirect()->back()->with(['success' => 'Kategori Baru Ditambahkan!']);
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
        $this->validate($request, [
            'name' => 'required|string|max:50|unique:categories,name,' . $id
        ]);
        $category = Category::find($id);
        $category->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id
        ]);
        return redirect(route('admin.list.category'))->with(['success' => 'Kategori Berhasil Diubah!']);
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
        $category = Category::withCount(['child'])->find($id);
        if ($category->child_count == 0) {
            $category->delete();
            return redirect(route('admin.list.category'))->with(['success' => 'Kategori Dihapus!']);
        }
        return redirect(route('admin.list.category'))->with(['error' => 'Kategori Ini Memiliki Anak Kategori!']);
    }
}
