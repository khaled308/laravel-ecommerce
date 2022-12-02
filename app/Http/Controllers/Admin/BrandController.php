<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddBrandRequest;
use App\Http\Requests\Admin\EditBrandRequest;
use App\Models\Brand;
use App\Traits\File;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    use File;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::latest()->get();
        return view('admin.pages.brand.brands', compact('brands'));
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
    public function store(AddBrandRequest $request)
    {
        $image = $request->image;
        $image  = $this->uploadImage($image, 'brands');

        Brand::create([
            'name' => ['ar' => $request->name_ar, 'en' => $request->name_en],
            'slug' => Str::slug($request->name_en),
            'image' => $image
        ]);

        return redirect()->route('admin.brands.index')->with('success', 'Brand Created Successfully');
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
        $brand = Brand::findOrFail($id);
        return view('admin.pages.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditBrandRequest $request, $id)
    {
        $brand = Brand::find($id);

        if ($request->image) {
            $this->deleteFile('brands/' . $brand->image);
            $brand->image = $this->uploadImage($request->image, 'brands');
        }

        $brand->name = ['ar' => $request->name_ar, 'en' => $request->name_en];
        $brand->slug = $request->name_en;
        $brand->save();

        return redirect()->route('admin.brands.index')->with('success', 'Brand Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $this->deleteFile('brands/' . $brand->image);
        $brand->delete();

        return redirect()->route('admin.brands.index')->with('success', 'Brand deleted Successfully');
    }
}