@extends('layouts.auth')

@section('title','Student Login')

@section('content')

<div class="student-login-wrapper">


    <div class="student-login-card">


        <div class="login-top">


            <div class="student-icon">

                <i class="bi bi-mortarboard-fill"></i>

            </div>


            <h2>
                Student Portal
            </h2>


            <p>
                Login to access your academic dashboard
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
              action="{{ route('student.login') }}">

            @csrf



            <div class="student-input">


                <i class="bi bi-envelope-fill"></i>


                <input 
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Student Email"
                    required>


            </div>




            <div class="student-input">


                <i class="bi bi-lock-fill"></i>


                <input 
                    type="password"
                    name="password"
                    placeholder="Password"
                    required>


            </div>




            <button type="submit"
                    class="student-login-btn">


                <i class="bi bi-box-arrow-in-right"></i>

                Login


            </button>



        </form>


    </div>


</div>





<style>


.student-login-wrapper{


    min-height:100vh;

    display:flex;

    justify-content:center;

    align-items:center;

    background:

    linear-gradient(
        135deg,
        #0f172a,
        #1e3a8a
    );


}



.student-login-card{


    width:420px;

    background:white;

    padding:40px;

    border-radius:30px;

    box-shadow:

    0 25px 60px rgba(0,0,0,.3);


}



.login-top{


    text-align:center;

    margin-bottom:30px;


}




.student-icon{


    width:85px;

    height:85px;

    margin:auto;


    display:flex;

    align-items:center;

    justify-content:center;


    border-radius:28px;


    background:

    linear-gradient(
        135deg,
        #2563eb,
        #60a5fa
    );


    color:white;

    font-size:38px;


}





.login-top h2{


    margin-top:20px;

    font-weight:800;

    color:#111827;


}



.login-top p{


    color:#64748b;

}




.student-input{


    position:relative;

    margin-bottom:20px;


}



.student-input i{


    position:absolute;

    left:18px;

    top:50%;

    transform:translateY(-50%);

    color:#2563eb;


}



.student-input input{


    width:100%;


    padding:15px 20px 15px 50px;


    border-radius:16px;


    border:1px solid #e5e7eb;


    background:#f8fafc;


    outline:none;


    transition:.3s;


}



.student-input input:focus{


    background:white;


    border-color:#2563eb;


    box-shadow:

    0 0 0 4px rgba(37,99,235,.15);


}




.student-login-btn{


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


    font-size:16px;


    font-weight:700;


    transition:.3s;


}




.student-login-btn:hover{


    transform:translateY(-3px);


    box-shadow:

    0 15px 30px rgba(37,99,235,.35);


}



</style>


@endsection