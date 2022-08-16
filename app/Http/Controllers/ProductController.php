<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return view('admin.products.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $brand = Brand::all();
        return view('admin.products.create', compact('category', 'brand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
        ]);

        if ($request->has('image')) {
            $file = $request->image;
            $imageName = time(). "_" . $file->getClientOriginalName();
            $file->move(public_path('storage/products'), $imageName);

            Product::create([
                "name" => $request->name,
                "image" => $imageName,
                "description" => $request->description,
                "price" => $request->price,
                "stock" => $request->stock,
                "brand_id" => $request->brand_id,
                "category_id" => $request->category_id,
            ]);

            return redirect()->route('products.index')->with('created', 'A new product has been created successfully!');
        }        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $category = Category::all();
        $brand = Brand::all();
        return view('admin.products.edit', compact('category', 'brand', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
        ]);

        if ($request->has('image')) {
            $file = $request->image;
            $imageName = time(). "_" . $file->getClientOriginalName();
            $file->move(public_path('storage/products'), $imageName);

            $product->update([
                "name" => $request->name,
                "image" => $imageName,
                "description" => $request->description,
                "price" => $request->price,
                "stock" => $request->stock,
                "brand_id" => $request->brand_id,
                "category_id" => $request->category_id,
            ]);

            return redirect()->route('products.index')->with('updated', 'A new product has been updated successfully!');
        }  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $path = public_path('storage/products/').$product->image;

        if(file_exists($path))
        {
            unlink($path);
            $product->delete();
        }

        return redirect()->route('products.index')->with('deleted', 'Your product has been deleted successfully!');
    }
}
