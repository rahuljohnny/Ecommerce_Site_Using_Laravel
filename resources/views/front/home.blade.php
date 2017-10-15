<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Infinite Multilevel Dropdown</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<ul class="nav site-nav">
    @foreach($categories['root'] as $category)
        <li class="flyout">

            <a href=#>{{$category->name}}</a>

            @if(isset($categories[$category->id]))
                @include('navAdditionalFiles._nav-items',['items'=>$categories[$category->id]])
            @endif

        </li>
    @endforeach
</ul>​


</body>
</html>
