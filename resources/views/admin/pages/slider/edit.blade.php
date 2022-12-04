@extends('admin.layouts.main')

@section('title', 'sliders')
    
@section('content')
  <div class="row">
    <div class="col">
      <div class="box">
        <div class="box-header">						
          <h4 class="box-title">Edit slider</h4>
        </div>
        <div class="box-body">
          <form action="{{route('admin.website.slider.update', $slider->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="form-group col">
                <label for="title_en">slider title in En<span class="text-danger">*</span></label>
                <div class="controls">
                  <input type="text" name="title_en" id="title_en" class="form-control" required="" data-validation-required-message="This field is required" aria-invalid="false" value="{{old('title_en', $slider->getTranslation('title','en'))}}">
                </div>
                @error('title_en')
                    <span class="invalid-feedback">{{$message}}</span>
                @enderror
              </div>
      
              <div class="form-group col">
                <label for="title_ar">slider title in Ar<span class="text-danger">*</span></label>
                <div class="controls">
                  <input type="text" name="title_ar" id="title_ar" class="form-control" required="" data-validation-required-message="This field is required" aria-invalid="false" value="{{old('title_ar', $slider->getTranslation('title','ar'))}}">
                </div>
                @error('title_ar')
                  <span class="invalid-feedback">{{$message}}</span>
                @enderror
              </div>
            </div>

            <div class="form-group">
              <label>Slider Description in En</label>
              <textarea rows="5" cols="5" class="form-control" name="description_en">{{old('description_en', $slider->getTranslation('description','en'))}}</textarea>
            </div>
    
            <div class="form-group">
              <label>Slider Description in Ar</label>
              <textarea rows="5" cols="5" class="form-control" name="description_ar">{{old('description_ar', $slider->getTranslation('description','ar'))}}</textarea>
            </div>
    
            <div class="row mb-3">
              <div class="form-group col">
                <label for="name_en">slider Image<span class="text-danger">*</span></label>
                <div class="controls">
                  <input type="file" id="image" name="image" class="form-control">
                </div>
                @error('image')
                  <span class="invalid-feedback">{{$message}}</span>
                @enderror
              </div>
              <div class="col">
                <img class="image" src="{{asset('uploads/website/slider/' . $slider->image)}}" alt="" width="200" height="200">
              </div>
            </div>
    
            <div>
              <button type="submit" class="btn btn-info">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
      document.getElementById('image').addEventListener('change', e=>{
        const [file] = e.target.files
        if (file) {
          document.querySelector('img.image').src = URL.createObjectURL(file)
        }
      })
  </script>
@endpush
