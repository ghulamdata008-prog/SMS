@extends('layouts.auth')

@section('title','Teacher Login')

@section('content')

<div class="teacher-login-wrapper">

    <div class="login-card">

        <div class="login-header">

            <div class="icon-box">

                <i class="bi bi-person-workspace"></i>

            </div>

            <h2>
                Teacher Portal
            </h2>

            <p>
                Login to manage your classes
            </p>

        </div>



        @if($errors->any())

            <div class="alert alert-danger rounded-4">

                <ul class="mb-0">

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif



        <form method="POST"
              action="{{ route('teacher.login.submit') }}">

            @csrf


            <div class="input-group-custom">

                <i class="bi bi-envelope-fill"></i>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Teacher Email"
                    required>

            </div>



            <div class="input-group-custom">

                <i class="bi bi-lock-fill"></i>

                <input
                    type="password"
                    name="password"
                    placeholder="Password"
                    required>

            </div>



            <button class="login-btn">

                <i class="bi bi-box-arrow-in-right"></i>

                Login

            </button>


        </form>


    </div>


</div>



<style>


.teacher-login-wrapper{

    min-height:100vh;

    display:flex;

    align-items:center;

    justify-content:center;

    background:
    linear-gradient(
        135deg,
        #0f172a,
        #1e293b
    );

}



.login-card{

    width:420px;

    background:white;

    padding:40px;

    border-radius:30px;

    box-shadow:
    0 25px 60px rgba(0,0,0,.25);

}



.login-header{

    text-align:center;

    margin-bottom:30px;

}



.icon-box{

    width:80px;

    height:80px;

    margin:auto;

    display:flex;

    align-items:center;

    justify-content:center;

    border-radius:25px;

    background:
    linear-gradient(
        135deg,
        #2563eb,
        #3b82f6
    );

    color:white;

    font-size:35px;

}



.login-header h2{

    margin-top:20px;

    font-weight:800;

    color:#111827;

}



.login-header p{

    color:#64748b;

}



.input-group-custom{

    position:relative;

    margin-bottom:20px;

}



.input-group-custom i{

    position:absolute;

    top:50%;

    left:18px;

    transform:translateY(-50%);

    color:#2563eb;

}



.input-group-custom input{

    width:100%;

    padding:15px 20px 15px 50px;

    border-radius:16px;

    border:1px solid #e5e7eb;

    background:#f8fafc;

    outline:none;

    transition:.3s;

}



.input-group-custom input:focus{

    border-color:#2563eb;

    background:white;

    box-shadow:
    0 0 0 4px rgba(37,99,235,.12);

}



.login-btn{


    width:100%;

    padding:15px;

    border:none;

    border-radius:16px;

    background:
    linear-gradient(
        135deg,
        #2563eb,
        #1d4ed8
    );

    color:white;

    font-weight:700;

    font-size:16px;

    transition:.3s;


}



.login-btn:hover{

    transform:translateY(-3px);

    box-shadow:
    0 15px 30px rgba(37,99,235,.35);

}


</style>


@endsection