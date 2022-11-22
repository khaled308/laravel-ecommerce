@extends('admin.layouts.main')

@section('title', 'profile')
    

@section('content')
  <div class="row">
    <div class="col-12">
      <form action="" method="post">
        @csrf
        @method('PUT')
        <div class="row mb-3">
          <div class="form-group col">
            <label for="name">Name<span class="text-danger">*</span></label>
            <div class="controls">
              <input type="text" name="text" id="name" class="form-control" required="" data-validation-required-message="This field is required" aria-invalid="false" value="{{old('name', auth('admin')->user()->name)}}">
              <div class="help-block"></div>
            </div>
          </div>
    
          <div class="form-group col">
            <label for="email">Email<span class="text-danger">*</span></label>
            <div class="controls">
              <input type="text" name="email" id="email" class="form-control" required="" data-validation-required-message="This field is required" aria-invalid="false" value="{{old('name', auth('admin')->user()->email)}}">
              <div class="help-block"></div>
            </div>
          </div>
        </div>
  
        <div class="row">
          <div class="form-group col">
            <label for="image">Image</label>
            <div class="controls">
              <input type="file" id="image" name="image" class="form-control" required="">
              <div class="help-block"></div>
            </div>
          </div>
          <div class="col">
            <img class="avatar avatar-xxl" src="{{asset('assets/admin/images/avatar/5.jpg')}}" alt="">
          </div>
        </div>

        <div class="text-xs-right">
          <button type="submit" class="btn btn-rounded btn-info">Edit Profile</button>
        </div>
  
      </form>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
      document.getElementById('image').addEventListener('change', e=>{
        const [file] = e.target.files
        if (file) {
          document.querySelector('.avatar').src = URL.createObjectURL(file)
        }
      })
  </script>
@endpush