<div class="col-4">
  <div class="box">
    <div class="box-header">						
      <h4 class="box-title">Add Brand</h4>
    </div>
    <div class="box-body">
      <form action="{{route('admin.brands.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="name_en">Brand Name in En<span class="text-danger">*</span></label>
          <div class="controls">
            <input type="text" name="name_en" id="name_en" class="form-control" required="" data-validation-required-message="This field is required" aria-invalid="false" value="{{old('name_en')}}">
          </div>
          @error('name_en')
              <span class="invalid-feedback">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="name_ar">Brand Name in Ar<span class="text-danger">*</span></label>
          <div class="controls">
            <input type="text" name="name_ar" id="name_ar" class="form-control" required="" data-validation-required-message="This field is required" aria-invalid="false" value="{{old('name_ar')}}">
          </div>
          @error('name_ar')
            <span class="invalid-feedback">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="name_en">Brand Image<span class="text-danger">*</span></label>
          <div class="controls">
            <input type="file" id="image" name="image" class="form-control" required="">
          </div>
          @error('image')
            <span class="invalid-feedback">{{$message}}</span>
          @enderror
        </div>

        <div>
          <button type="submit" class="btn btn-info">Add Brand</button>
        </div>
      </form>
    </div>
  </div>
</div>
