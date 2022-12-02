@extends('admin.layouts.main')

@section('title', 'Categories')
    
@section('content')
<div class="row">
  <div class="col-8">
    <div class="box">
      <div class="box-header">						
        <h4 class="box-title">All Categories</h4>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
            <thead>
              <tr>
                <th>#</th>
                <th>image</th>
                <th>Category Name En</th>
                <th>Category Name Ar</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($categories as $category)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>
                      @if ($category->image)     
                      <img src="{{asset('uploads/categories/' . $category->image)}}" alt="category image" width="70" height="40">
                      @endif
                    </td>
                    <td class="name-en">{{$category->getTranslation('name','en')}}</td>
                    <td>{{$category->getTranslation('name','ar')}}</td>
                    <td>
                      <a href="{{route('admin.categories.edit', $category->id)}}" class="btn btn-sm btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                      <a href="{{route('admin.categories.show', $category->id)}}" class="btn btn-sm btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a>
                      <button class="btn btn-sm btn-danger delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                    </td>
                    <form class="delete-form" action="{{route('admin.categories.destroy', $category->id)}}" method="post">
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
  @include('admin.pages.category.includes.create' , ['category' => null])
</div>
@endsection

@push('scripts')
  <script src="{{asset('assets/admin/assets/vendor_components/datatable/datatables.min.js')}}"></script>
  <script src="{{asset('assets/admin/js/pages/data-table.js')}}"></script>
  <script>
    document.querySelectorAll('.delete').forEach(btn=>{
      btn.addEventListener('click', (e)=>{
        const record = e.target.closest('tr')
        const categoryName = record.querySelector('.name-en').textContent
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