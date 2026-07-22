<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    @vite([
        'resources/css/teacher.css',
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>

<body>

    @include('layouts.teacher-sidebar')

    <div class="teacher-main">

        <div class="teacher-content">

            @yield('content')

        </div>

    </div>

</body>

</html>