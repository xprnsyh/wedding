<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::all();
        // $categories = Category::all();

        return view('admin.product.index', [
            'products' => $products
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
        $categories = Category::all();
        $parent = Category::getParent()->orderBy('name', 'ASC')->get();
        return view('admin.product.create', [
            'categories' => $categories,
            'parent' => $parent
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:products',
            'category_id' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        $request->request->add(['slug' => $request->name]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image[0]->getClientOriginalExtension();
            $filename = Str::slug($request->name) . '.' . $extension;
            if (File::exists($image[0])) {
                $image[0]->move('admin/assets/images/products/', $filename);
                File::delete($image[0]);
            }
            Product::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'category_id' => $request->category_id,
                'description' => $request->description,
                'image' => $filename,
                'price' => $request->price,
            ]);
        } else {

            Product::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'category_id' => $request->category_id,
                'description' => $request->description,
                'price' => $request->price,
            ]);
        }




        return redirect()->route('admin.list.product')->with(['success' => 'Sukses Menambahkan Produk Baru']);
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
        $product = Product::find($id);
        $categories = Category::all();
        $parent = Category::getParent()->orderBy('name', 'ASC')->get();

        return view('admin.product.edit', [
            'product' => $product,
            'parent' => $parent,
            'categories' => $categories
        ]);
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
            'name' => 'required|string|unique:products,name,' . $id,
            'category_id' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        $product = Product::find($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image[0]->getClientOriginalExtension();
            $filename = Str::slug($request->name) . '.' . $extension;
            if (File::exists($image[0])) {
                $image[0]->move('admin/assets/images/products/', $filename);
                File::delete($image[0]);
            }
            $product->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'category_id' => $request->category_id,
                'description' => $request->description,
                'image' => $filename,
                'price' => $request->price,
            ]);
        } else {
            $product->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'category_id' => $request->category_id,
                'description' => $request->description,
                'price' => $request->price,
            ]);
        }


        return redirect()->route('admin.list.product')->with(['success' => 'Berhasil Mengubah']);
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
        $product = Product::find($id);
        if ($product->image != null) {
            if (File::exists('admin/assets/images/products/' . $product->image)) {
                File::delete('admin/assets/images/products/' . $product->image);
            }
        }
        $product->delete($product);

        return redirect()->route('admin.list.product')->with(['success' => 'Berhasil Menghapus Product']);
    }
}
