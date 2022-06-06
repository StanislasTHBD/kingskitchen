<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">

    <title>@yield('title')</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <script src="{{asset('js/app.js')}}" defer></script>
</head>


<body>
@include('layouts.nav')
@include('layouts.notify')

<div class="container">
    @yield('content')
</div>

</body>
</html>
