<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite(['resources/css/app.scss'])
    <title>@yield('page.title', config('app.name'))</title>
</head>
<body>

<main style="padding: 1rem;">
    @yield('content')
</main>

</body>
</html>