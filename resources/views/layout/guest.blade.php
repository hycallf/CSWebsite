<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/app.css">
</head>

<body class="h-100">

    @include('partials.navigasi')

    @yield('content')

    @include('partials.footer')

    <script src="/js/bootstrap.js"></script>
    <script src="/js/app.js"></script>
</body>

</html>
