@extends('admin.layouts.main')

@section('title', 'Categories')
    
@section('content')
  <div class="row">
    <div class="col">
      <div class="box">
        <div class="box-header">						
          <h4 class="box-title">Edit Category</h4>
        </div>
        <div class="box-body">
          <form action="{{route('admin.categories.update', $category->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
              <div class="form-group col">
                <label for="name_en">Category Name in En<span class="text-danger">*</span></label>
                <div class="controls">
                  <input type="text" name="name_en" id="name_en" class="form-control" required="" data-validation-required-message="This field is required" aria-invalid="false" value="{{old('name_en', $category->getTranslation('name','en'))}}">
                </div>
                @error('name_en')
                    <span class="invalid-feedback">{{$message}}</span>
                @enderror
              </div>
      
              <div class="form-group col">
                <label for="name_ar">Category Name in Ar<span class="text-danger">*</span></label>
                <div class="controls">
                  <input type="text" name="name_ar" id="name_ar" class="form-control" required="" data-validation-required-message="This field is required" aria-invalid="false" value="{{old('name_ar', $category->getTranslation('name','ar'))}}">
                </div>
                @error('name_ar')
                  <span class="invalid-feedback">{{$message}}</span>
                @enderror
              </div>
            </div>
            
            @if ($category->parent_id)
            <div class="row">
              <div class="form-group col-6">
                <label for="main_category">Main Category</label>
                <div class="controls">
                  <input type="text" id="main_category" class="form-control" value="{{$category->parent->getTranslation('name','en')}}" readonly>
                  <input type="hidden" name="parent_id" value="{{$category->parent->id}}">
                </div>
              </div>
            </div>
            @endif

            <div class="row mb-3">
              <div class="form-group col">
                <label for="name_en">Category Image<span class="text-danger">*</span></label>
                <div class="controls">
                  <input type="file" id="image" name="image" class="form-control">
                </div>
                @error('image')
                  <span class="invalid-feedback">{{$message}}</span>
                @enderror
              </div>
              <div class="col">
                <img class="image" src="{{asset('uploads/categories/' . $category->image)}}" alt="">
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
