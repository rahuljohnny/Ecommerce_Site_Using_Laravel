<ul class="flyout-content nav stacked">
  @foreach($items as $item)
    <li class="flyout-alt">
      <a href=#>{{$item->name}}</a>
      @if(isset($categories[$item->id]))
        @include('navAdditionalFiles._nav-items',['items'=>$categories[$item->id]])
      @endif
    </li>
  @endforeach
</ul>
