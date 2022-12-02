<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Traits\Product\ProductOption;
use App\Traits\Product\ProductVariant;
use App\Traits\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    use ProductOption, ProductVariant, File;
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
        $categories = Category::whereNull('parent_id')->get();
        $brands = Brand::latest()->get();
        return view('admin.pages.product.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $cover_image = $request->cover_image;
        $cover_image  = $this->uploadImage($cover_image, 'products');
        //product table
        $product = Product::create([
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'name' => ['ar' => $request->name_ar, 'en' => $request->name_en],
            'cover_image' => $cover_image,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'slug' => Str::slug($request->name_en),
        ]);

        //product variant table
        $variant_id = $this->addVariant([
            'product_id' => $product->id,
            'price' => $request->price,
            'discount' => $request->discount,
            'qty' => $request->qty
        ]);

        if ($request->size) {
            $this->addOption('size', explode(',', $request->size), $variant_id);
        }

        if ($request->color) {
            $this->addOption('color', explode(',', $request->color), $variant_id);
        }
        dd(explode(',', $request->size));
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