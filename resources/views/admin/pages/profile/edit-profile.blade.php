@extends('admin.layouts.main')

@section('title', 'profile')
    

@section('content')
  <div class="row">
    <div class="col-12">
      <form action="" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="name">Name<span class="text-danger">*</span></label>
          <div class="controls">
            <input type="text" name="text" id="name" class="form-control" required="" data-validation-required-message="This field is required" aria-invalid="false">
            <div class="help-block"></div>
          </div>
        </div>
  
        <div class="form-group">
          <label for="email">Email<span class="text-danger">*</span></label>
          <div class="controls">
            <input type="text" name="email" id="email" class="form-control" required="" data-validation-required-message="This field is required" aria-invalid="false">
            <div class="help-block"></div>
          </div>
        </div>
  
        <div class="form-group">
          <label for="image">Image</label>
          <div class="controls">
            <input type="file" name="file" class="form-control" required="">
            <div class="help-block"></div>
          </div>
        </div>

        <div class="text-xs-right">
          <button type="submit" class="btn btn-rounded btn-info">Edit Profile</button>
        </div>
  
      </form>
    </div>
  </div>
@endsection
