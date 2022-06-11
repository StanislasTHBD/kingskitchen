<html>
<head>
    <link href="{{ public_path('css/app.css') }}" rel="stylesheet"/>
    <title></title>
</head>

<body>
<div class="pdf">
    <h1>{{ $recette->name }}</h1>
    <p>{{ $recette->price }}</p>
    <p>{{ $recette->description }}</p>
    <img src="{{ public_path($recette->image) }}" alt="" width="200">
</div>
</body>
</html>
