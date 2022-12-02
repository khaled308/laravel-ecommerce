@extends('admin.layouts.main')

@section('title', 'Brands')
    
@section('content')
<div class="row">
  <div class="col-8">
    <div class="box">
      <div class="box-header">						
        <h4 class="box-title">All Brands</h4>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
            <thead>
              <tr>
                <th>#</th>
                <th></th>
                <th>Brand Name En</th>
                <th>Brand Name Ar</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($brands as $brand)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td><img src="{{asset('uploads/brands/' . $brand->image)}}" alt="brand image" width="70" height="40"></td>
                    <td class="name-en">{{$brand->getTranslation('name','en')}}</td>
                    <td>{{$brand->getTranslation('name','ar')}}</td>
                    <td>
                      <a href="{{route('admin.brands.edit', $brand->id)}}" class="btn btn-info">Edit</a>
                      <button class="btn btn-danger delete">Delete</button>
                    </td>
                    <form class="delete-form" action="{{route('admin.brands.destroy', $brand->id)}}" method="post">
                      @csrf
                      @method('delete')
                    </form>
                  </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  @include('admin.pages.brand.create')
</div>
@endsection

@push('scripts')
  <script src="{{asset('assets/admin/assets/vendor_components/datatable/datatables.min.js')}}"></script>
  <script src="{{asset('assets/admin/js/pages/data-table.js')}}"></script>
  <script>
    document.querySelectorAll('.delete').forEach(btn=>{
      btn.addEventListener('click', (e)=>{
        const record = e.target.closest('tr')
        const brandName = record.querySelector('.name-en').textContent
        const form = record.querySelector('.delete-form')
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
          form.submit()
          }
        })
      })
    })
  </script>
@endpush