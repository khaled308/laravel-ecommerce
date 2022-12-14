@extends('admin.layouts.main')

@section('title', 'Products')

@section('content')
  <div class="row">
    <div class="col-12">
      <form action="{{route('admin.products.store')}}" id="add-product" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
          <div class="form-group col">
            <label for="category">Category</label>
            <select class="form-control" name="category_id" id="category">
              <option>Select Category</option>
              @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @if(count($category->children))
                  @include('admin.pages.category.includes.category-select',['subcategories' => $category->children, 'spaces' => 0])
                @endif
              @endforeach
            </select>
          </div>
          <div class="form-group col">
            <label for="brand">Brand</label>
            <select class="form-control" name="brand_id" id="brand">
              <option>Select Brand</option>
              @foreach ($brands as $brand)
                <option value="{{$brand->id}}">{{$brand->name}}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="row mb-3">
          <div class="form-group col">
            <label for="name_en">product Name in En<span class="text-danger">*</span></label>
            <div class="controls">
              <input type="text" name="name_en" id="name_ar" class="form-control" value="{{old('name_en')}}">
            </div>
          </div>

          <div class="form-group col">
            <label for="name_ar">product Name in Ar<span class="text-danger">*</span></label>
            <div class="controls">
              <input type="text" name="name_ar" id="name_ar" class="form-control"  value="{{old('name_ar')}}">
            </div>
          </div>
        </div>

        <div class="row mb-3">
          <div class="form-group col mb-2" id="cover-img-wrapper">
            <label for="cover_image">Cover Image</label>
            <div class="controls">
              <input type="file" id="cover_image" name="cover_image" class="form-control">
            </div>
          </div>

          <div class="form-group col" id="thumbnails-wrapper">
            <label for="name_en">thumbnails</label>
            <div class="controls">
              <input type="file" id="product_images" name="product_images[]" class="form-control" multiple>
            </div>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col form-group">
            <label for="price">Product Price<span class="text-danger">*</span></label>
            <div class="controls">
              <input type="text" name="price" id="price" class="form-control" oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*?)\..*/g, '$1');">
            </div>
          </div>

          <div class="col form-group">
            <label for="discount">Product Discount<span class="text-danger">*</span></label>
            <div class="controls">
              <input type="text" name="discount" id="discount" class="form-control" oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*?)\..*/g, '$1');">
            </div>
          </div>

          <div class="col form-group">
            <label for="quantity">Product Quantity<span class="text-danger">*</span></label>
            <div class="controls">
              <input type="text" name="qty" id="quantity" class="form-control" oninput="this.value=this.value.replace(/[^0-9]/g,'');"">
            </div>
          </div>

        </div>
        
        <div class="row mb-3">
          <div class="col">
            <label>Product Tags in En</label>
            <div class="tags-default controls">
              <input type="text" name="tags_en" class="form-control" data-role="tagsinput" placeholder="add tags" />
            </div>
          </div>

          <div class="form-group col">
            <label>Product Tags in Ar</label>
            <div class="tags-default form-group">
              <input type="text" name="tags_ar" class="form-control" data-role="tagsinput" placeholder="add tags" />
            </div>
          </div>

          <div class="form-group col">
            <label>Size<span class="text-danger">*</span></label>
            <div class="tags-default form-group">
              <input type="text" name="size" class="form-control" data-role="tagsinput" placeholder="Attribute Values" />
            </div>
          </div>

          <div class="form-group col">
            <label>Color Values<span class="text-danger">*</span></label>
            <div class="tags-default form-group">
              <input type="text" name="color" class="form-control" data-role="tagsinput" placeholder="color Values" />
            </div>
          </div>

        </div>

        <div class="row mb-3">
          <div class="form-group col">
            <label for="short_description_en">short Description En<span class="text-danger">*</span></label>
            <div class="controls">
              <input type="text" name="short_description_en" id="short_description_en" class="form-control" value="{{old('short_description_en')}}">
            </div>
          </div>

          <div class="form-group col">
            <label for="short_description_en">short Description Ar<span class="text-danger">*</span></label>
            <div class="controls">
              <input type="text" name="short_description_ar" id="short_description_ar" class="form-control" value="{{old('short_description_ar')}}">
            </div>
          </div>
        </div>

        <div class="row mb-3">
         <div class="col form-group">
          <label for="leditor1">Long Description En</label>
          <textarea id="editor1" name="long_description_en" rows="10"></textarea>
         </div>

         <div class="col form-group">
          <label for="editor2">Long Description Ar</label>
          <textarea id="editor2" name="long_description_ar" rows="10"></textarea>
         </div>

        </div>
        <button type="button" class="btn btn-primary" onclick="document.getElementById('add-product').submit();">Add Product</button>
      </form>
    </div>
  </div>
@endsection

@push('scripts')
  <script src="{{asset('assets/admin/assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js')}}"></script>
  <script src="{{asset('assets/admin/assets/vendor_components/ckeditor/ckeditor.js')}}"></script>
  <script src="{{asset('assets/admin/js/pages/editor.js')}}"></script>
  <script>
    const coverImageWrapper = document.getElementById('cover-img-wrapper')
    const thumbnailsWrapper = document.getElementById('thumbnails-wrapper')

    document.getElementById('cover_image').addEventListener('change', e=>{
      const [file] = e.target.files
      if (file) {
        const oldImage = coverImageWrapper.querySelector('img')

        if (oldImage){
          oldImage.remove()
        }
        const img = document.createElement("img");
        img.src = URL.createObjectURL(file)
        img.width = 150
        img.height = 150
        coverImageWrapper.appendChild(img);
      }
    })

    document.getElementById('product_images').addEventListener('change', e=>{
      const oldImages = thumbnailsWrapper.querySelectorAll('img')

      if (oldImages){
        oldImages.forEach(img=>{
          img.remove()
        })
      }

      for(let file of e.target.files){
        const img = document.createElement("img");
        img.src = URL.createObjectURL(file)
        img.width = 50
        img.height = 50
        thumbnailsWrapper.appendChild(img);
      }
    })
</script>
@endpush