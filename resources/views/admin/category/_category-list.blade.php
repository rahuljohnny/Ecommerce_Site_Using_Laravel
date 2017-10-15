<ol>
    @if(!empty($collection))
        @forelse($collection as $category)
            <li>
                <a href="{{route('category.show',$category->id)}}">{{$category->name}}</a>

                @include('admin.category._form')

                @if(isset($categories[$category->id]))
                    @include('admin.category._category-list',['collection'=>$categories[$category->id]])
                @endif
            </li>

        @empty
            <li>No Items</li>
        @endforelse
    @endif

</ol>
