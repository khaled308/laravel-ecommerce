<div class="col-4">
  <div class="box">
    <div class="box-header">						
      <h4 class="box-title">{{$title ?? 'Add category'}}</h4>
    </div>
    <div class="box-body">
      <form action="{{route('admin.categories.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="name_en">category Name in En<span class="text-danger">*</span></label>
          <div class="controls">
            <input type="text" name="name_en" id="name_en" class="form-control" required="" data-validation-required-message="This field is required" aria-invalid="false" value="{{old('name_en')}}">
          </div>
          @error('name_en')
              <span class="invalid-feedback">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="name_ar">category Name in Ar<span class="text-danger">*</span></label>
          <div class="controls">
            <input type="text" name="name_ar" id="name_ar" class="form-control" required="" data-validation-required-message="This field is required" aria-invalid="false" value="{{old('name_ar')}}">
          </div>
          @error('name_ar')
            <span class="invalid-feedback">{{$message}}</span>
          @enderror
        </div>

        @if ($category)
        <div class="form-group">
          <label for="main_category">Main Category</label>
          <div class="controls">
            <input type="text" id="main_category" class="form-control" value="{{$category->getTranslation('name','en')}}" readonly>
            <input type="hidden" name="parent_id" value="{{$category->id}}">
          </div>
        </div>
        @endif
    
        <div class="form-group">
          <label for="name_en">category Image</label>
          <div class="controls">
            <input type="file" id="image" name="image" class="form-control">
          </div>
          @error('image')
            <span class="invalid-feedback">{{$message}}</span>
          @enderror
        </div>

        <div>
          <button type="submit" class="btn btn-info">Add category</button>
        </div>
      </form>
    </div>
  </div>
</div>
