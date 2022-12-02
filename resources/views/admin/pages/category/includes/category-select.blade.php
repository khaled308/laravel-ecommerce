@foreach($subcategories as $subcategory)
    <option value="{{$subcategory->id}}" @selected(old('category_id') == $category->id)>
      @for ($i = 0; $i < $spaces; $i++)
        &nbsp;
      @endfor
      &nbsp;&raquo;
      {{$subcategory->name}}
    </option>
    @if(!empty($subcategory->children))
          @include('admin.pages.category.includes.category-select',['subcategories' => $subcategory->children, 'spaces' => $spaces + 1])
      @endif
@endforeach
