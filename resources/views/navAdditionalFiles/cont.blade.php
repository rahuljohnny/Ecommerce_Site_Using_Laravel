<head>
    <style>
        body {background-color: #e6d2e6;}
    </style>
</head>
    <ul class="nav site-nav">

        <head>

            <link href={{  URL::asset('css/style.css')  }}  rel="stylesheet">
        </head>

        @foreach($categories['root'] as $category)
            <li class="flyout">

                <a href=/category/{{$category->id}}>{{$category->name}}</a>

                @if(isset($categories[$category->id]))
                    @include('navAdditionalFiles._nav-items',['items'=>$categories[$category->id],'products'=>$products])
                @endif

            </li>
        @endforeach
    </ul>​