@extends('admin.layouts.main')

@section('title', 'Products')
    
@section('content')
<div class="row">
  <div class="col">
    <div class="box">
      <div class="box-header">						
        <h4 class="box-title">All Products</h4>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
            <thead>
              <tr>
                <th>#</th>
                <th></th>
                <th>Product Name En</th>
                <th>Product Name Ar</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($products as $product)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td><img src="{{asset('uploads/products/' . $product->cover_image)}}" alt="product image" width="70" height="40"></td>
                    <td class="name-en">{{$product->getTranslation('name','en')}}</td>
                    <td>{{$product->getTranslation('name','ar')}}</td>
                    <td>
                      <a href="{{route('admin.products.edit', $product->id)}}" class="btn btn-info">Edit</a>
                      <button class="btn btn-danger delete">Delete</button>
                    </td>
                    <form class="delete-form" action="{{route('admin.products.destroy', $product->id)}}" method="post">
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
</div>
@endsection

@push('scripts')
  <script src="{{asset('assets/admin/assets/vendor_components/datatable/datatables.min.js')}}"></script>
  <script src="{{asset('assets/admin/js/pages/data-table.js')}}"></script>
  <script>
    document.querySelectorAll('.delete').forEach(btn=>{
      btn.addEventListener('click', (e)=>{
        const record = e.target.closest('tr')
        const productName = record.querySelector('.name-en').textContent
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