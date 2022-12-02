@extends('admin.layouts.main')

@section('title', 'Brands')
    
@section('content')
  <div class="row">
    <div class="col">
      <div class="box">
        <div class="box-header">						
          <h4 class="box-title">Edit Brand</h4>
        </div>
        <div class="box-body">
          <form action="{{route('admin.brands.update', $brand->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
              <div class="form-group col">
                <label for="name_en">Brand Name in En<span class="text-danger">*</span></label>
                <div class="controls">
                  <input type="text" name="name_en" id="name_en" class="form-control" required="" data-validation-required-message="This field is required" aria-invalid="false" value="{{old('name_en', $brand->getTranslation('name','en'))}}">
                </div>
                @error('name_en')
                    <span class="invalid-feedback">{{$message}}</span>
                @enderror
              </div>
      
              <div class="form-group col">
                <label for="name_ar">Brand Name in Ar<span class="text-danger">*</span></label>
                <div class="controls">
                  <input type="text" name="name_ar" id="name_ar" class="form-control" required="" data-validation-required-message="This field is required" aria-invalid="false" value="{{old('name_ar', $brand->getTranslation('name','ar'))}}">
                </div>
                @error('name_ar')
                  <span class="invalid-feedback">{{$message}}</span>
                @enderror
              </div>
            </div>
    
            <div class="row mb-3">
              <div class="form-group col">
                <label for="name_en">Brand Image<span class="text-danger">*</span></label>
                <div class="controls">
                  <input type="file" id="image" name="image" class="form-control">
                </div>
                @error('image')
                  <span class="invalid-feedback">{{$message}}</span>
                @enderror
              </div>
              <div class="col">
                <img class="image" src="{{asset('uploads/brands/' . $brand->image)}}" alt="" width="200" height="200">
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
