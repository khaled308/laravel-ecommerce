<div class="col-4">
  <div class="box">
    <div class="box-header">						
      <h4 class="box-title">Add slider</h4>
    </div>
    <div class="box-body">
      <form action="{{route('admin.website.slider.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="form-group col">
            <label for="title_en">slider title in En<span class="text-danger">*</span></label>
            <div class="controls">
              <input type="text" name="title_en" id="title_en" class="form-control" required="" data-validation-required-message="This field is required" aria-invalid="false" value="{{old('title_en')}}">
            </div>
            @error('title_en')
                <span class="invalid-feedback">{{$message}}</span>
            @enderror
          </div>
  
          <div class="form-group col">
            <label for="title_ar">slider title in Ar<span class="text-danger">*</span></label>
            <div class="controls">
              <input type="text" name="title_ar" id="title_ar" class="form-control" required="" data-validation-required-message="This field is required" aria-invalid="false" value="{{old('title_ar')}}">
            </div>
            @error('title_ar')
              <span class="invalid-feedback">{{$message}}</span>
            @enderror
          </div>
        </div>

        <div class="form-group">
          <label>Slider Description in En</label>
          <textarea rows="5" cols="5" class="form-control" name="description_en"></textarea>
        </div>

        <div class="form-group">
          <label>Slider Description in Ar</label>
          <textarea rows="5" cols="5" class="form-control" name="description_ar"></textarea>
        </div>

        <div class="form-group">
          <label for="name_en">slider Image<span class="text-danger">*</span></label>
          <div class="controls">
            <input type="file" id="image" name="image" class="form-control" required="">
          </div>
          @error('image')
            <span class="invalid-feedback">{{$message}}</span>
          @enderror
        </div>

        <div>
          <button type="submit" class="btn btn-info">Add slider</button>
        </div>
      </form>
    </div>
  </div>
</div>
