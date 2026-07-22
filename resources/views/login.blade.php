<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Login</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

    <style>
        body{
            margin:0;
            padding:0;
            background:#f5f7fb;
            font-family:Arial, Helvetica, sans-serif;
        }

        .login-wrapper{
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .login-card{
            width:420px;
            background:#fff;
            border-radius:15px;
            padding:35px;
            box-shadow:0 10px 35px rgba(0,0,0,.12);
        }

        .login-title{
            text-align:center;
            margin-bottom:30px;
        }

        .login-title h2{
            margin:0;
            color:#0d6efd;
            font-weight:bold;
        }

        .login-title p{
            color:#777;
            margin-top:8px;
        }

        .form-control{
            height:48px;
        }

        .btn-login{
            height:48px;
            font-size:16px;
            font-weight:bold;
        }
    </style>

</head>

<body>

<div class="login-wrapper">

    <div class="login-card">

        <div class="login-title">
            <h2>Admin Login</h2>
            <p>School Management System</p>
        </div>

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">

            @csrf

            <div class="mb-3">

                <label class="form-label">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email') }}"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    class="form-control"
                    required>

            </div>

            <div class="form-check mb-3">

                <input
                    class="form-check-input"
                    type="checkbox"
                    name="remember"
                    id="remember">

                <label class="form-check-label" for="remember">
                    Remember Me
                </label>

            </div>

            <button class="btn btn-primary w-100 btn-login">
                Login
            </button>

        </form>

    </div>

</div>

</body>

</html>