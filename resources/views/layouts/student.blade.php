<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <!-- Bootstrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet">


    <!-- Bootstrap Icons -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" 
    rel="stylesheet">

    <title>@yield('title')</title>

    @vite([
        'resources/css/student.css',
        'resources/css/app.css',
        'resources/js/app.js'
    ])
 <style>

        body{

            background:#f8fafc;

        }


        /* Main content beside sidebar */

        .student-main{

            margin-left:270px;

            padding:25px;

            min-height:100vh;

        }



        @media(max-width:768px){

            .student-main{

                margin-left:0;

            }

        }


    </style>


</head>

<body>

    @include('layouts.student-sidebar')

    <div class="student-main">

        <div class="student-content">

            @yield('content')

        </div>

    </div>

</body>

</html>