<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\addProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Traits\Product\ProductOption;
use App\Traits\Product\ProductVariant;
use App\Traits\Product\productImages;
use App\Traits\Product\ProductTag;
use App\Traits\Product\ProductData;
use App\Traits\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    use ProductOption, ProductVariant, File, ProductTag, productImages, ProductData;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('admin.pages.product.products', compact('products'));
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
    public function store(addProductRequest $request)
    {
        $cover_image = $request->cover_image;
        $cover_image  = $this->uploadImage($cover_image, 'products');
        //product table
        $product = Product::create([
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'name' => ['ar' => $request->name_ar, 'en' => $request->name_en],
            'cover_image' => $cover_image,
            'short_description' => ['ar' => $request->short_description_ar, 'en' => $request->short_description_en],
            'long_description' => ['ar' => $request->long_description_ar, 'en' => $request->long_description_en],
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

        if ($request->product_images) {
            $this->saveImages($request->product_images, $product);
        }

        if ($request->tags_en) {
            $tags_en = explode(',', $request->tags_en);
            $tags_ar = explode(',', $request->tags_ar);
            $this->addTags($tags_en, $tags_ar, $product);
        }
        return redirect()->route('admin.products.index')->with('success', 'Product Created Successfully');
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
        $categories = Category::whereNull('parent_id')->get();
        $brands = Brand::latest()->get();
        $product = Product::findOrFail($id);
        $product_options = Product::where('products.id', '=', $id)
            ->join('variants', 'variants.product_id', '=', 'products.id')
            ->join('variants_values', 'variants_values.variant_id', '=', 'variants.id')
            ->join('option_values', 'option_values.id', '=', 'variants_values.option_value_id')
            ->join('options', 'options.id', '=', 'option_values.option_id')
            ->get(['options.name as option', 'option_values.value_name', 'products.name'])
            ->toArray();


        return view('admin.pages.product.edit', compact('categories', 'brands', 'product', 'product_options'));
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
        $product = Product::find($id);
        $this->saveData($request, $product);

        return redirect()->route('admin.products.index')->with('success', 'Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if ($product->cover_image)
            $this->deleteFile('products/' . $product->cover_image);

        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product Deleted Successfully');
    }
}