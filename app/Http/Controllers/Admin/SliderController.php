<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Traits\File;

class SliderController extends Controller
{
    use File;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('admin.pages.slider.sliders', compact('sliders'));
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
    public function store(Request $request)
    {

        $image = $request->image;
        $image = $this->uploadImage($image, 'website/slider', [870, 370]);

        Slider::create([
            'title' => ['ar' => $request->title_ar, 'en' => $request->title_en],
            'description' => ['ar' => $request->description_ar, 'en' => $request->description_en],
            'image' => $image
        ]);

        return redirect()->route('admin.website.slider.index')->with('success', 'Slider Created Successfully');
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
        $slider = Slider::find($id);
        return view('admin.pages.slider.edit', compact('slider'));
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
        $slider = Slider::find($id);

        if ($request->image) {
            $this->deleteFile('website/slider/' . $slider->image);
            $slider->image = $this->uploadImage($request->image, 'website/slider');
        }

        $slider->title = ['ar' => $request->title_ar, 'en' => $request->title_en];
        $slider->description = ['ar' => $request->description_ar, 'en' => $request->description_en];
        $slider->save();
        return redirect()->route('admin.website.slider.index')->with('success', 'Slider Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        $this->deleteFile('website/slider/' . $slider->image);
        $slider->delete();

        return redirect()->route('admin.website.slider.index')->with('success', 'Brand deleted Successfully');
    }
}