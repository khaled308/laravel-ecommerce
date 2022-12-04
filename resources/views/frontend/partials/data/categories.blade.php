@foreach($subcategories as $subcategory)
    <li><a href="#">{{$subcategory->name}}</a></li>  
    @if(!empty($subcategory->children))
          @include('frontend.partials.data.categories',['subcategories' => $subcategory->children])
    @endif
@endforeach
