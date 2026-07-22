@extends('layouts.student')

@section('title','Student Dashboard')

@section('content')

<div class="student-dashboard">


    <!-- Hero -->

    <div class="student-hero">


        <div>

            <span class="status-badge">

                <i class="bi bi-circle-fill"></i>

                Student Portal

            </span>


            <h1>

                Welcome Back,

                <span>
                    {{ auth()->user()->name }}
                </span>

                👋

            </h1>


            <p>

                Manage your academic activities, attendance,
                results and profile from one dashboard.

            </p>


        </div>



        <div class="hero-icon">

            <i class="bi bi-mortarboard-fill"></i>

        </div>


    </div>




    <!-- Statistics -->


    <div class="row g-4 mt-4">


        <div class="col-lg-3 col-md-6">


            <div class="student-stat blue">


                <div class="stat-icon">

                    <i class="bi bi-person-fill"></i>

                </div>


                <div>

                    <small>
                        Profile
                    </small>


                    <h3>
                        {{ $student->name }}
                    </h3>

                </div>


            </div>


        </div>





        <div class="col-lg-3 col-md-6">


            <div class="student-stat green">


                <div class="stat-icon">

                    <i class="bi bi-book-fill"></i>

                </div>


                <div>

                    <small>
                        Subjects
                    </small>


                    <h3>
                        {{ $subjects }}
                    </h3>


                </div>


            </div>


        </div>






        <div class="col-lg-3 col-md-6">


            <div class="student-stat orange">


                <div class="stat-icon">

                    <i class="bi bi-calendar-check-fill"></i>

                </div>


                <div>

                    <small>
                        Attendance
                    </small>


                    <h3>
                        {{ $attendancePercentage }}%
                    </h3>


                </div>


            </div>


        </div>






        <div class="col-lg-3 col-md-6">


            <div class="student-stat purple">


                <div class="stat-icon">

                    <i class="bi bi-award-fill"></i>

                </div>


                <div>

                    <small>
                        Results
                    </small>


                    <h3>
                        {{ $marks }}
                    </h3>


                </div>


            </div>


        </div>



    </div>






    <!-- Student Profile -->


    <div class="profile-card mt-4">


        <div class="profile-title">


            <h4>
                Student Information
            </h4>


            <span>

                Verified Student

            </span>


        </div>





        <div class="profile-body">


            <div class="student-avatar">


                {{ strtoupper(substr($student->name,0,1)) }}


            </div>




            <div>


                <h3>

                    {{ $student->name }}

                </h3>



                <p>

                    <i class="bi bi-envelope"></i>

                    {{ $student->email }}

                </p>



                <p>

                    <i class="bi bi-building"></i>

                    Class:

                    {{ $student->schoolClass->name ?? '-' }}


                    |

                    Section:

                    {{ $student->section->name ?? '-' }}

                </p>



            </div>


        </div>



    </div>



</div>





<style>


.student-dashboard{

    width:100%;

}




.student-hero{


    background:

    linear-gradient(
        135deg,
        #0f172a,
        #2563eb
    );


    padding:40px;

    border-radius:30px;

    color:white;

    display:flex;

    justify-content:space-between;

    align-items:center;


}



.status-badge{


    padding:8px 18px;

    background:rgba(255,255,255,.15);

    border-radius:50px;

    font-size:13px;


}



.status-badge i{

    color:#22c55e;

    font-size:10px;

}



.student-hero h1{


    font-size:38px;

    font-weight:800;

    margin-top:20px;


}



.student-hero h1 span{


    color:#60a5fa;


}



.student-hero p{


    opacity:.8;

}



.hero-icon i{


    font-size:110px;

    opacity:.25;


}







.student-stat{


    padding:25px;

    border-radius:25px;

    color:white;

    display:flex;

    align-items:center;

    gap:18px;

    box-shadow:

    0 20px 40px rgba(0,0,0,.15);

    transition:.3s;


}



.student-stat:hover{


    transform:translateY(-8px);


}




.stat-icon{


    width:65px;

    height:65px;

    border-radius:20px;

    background:rgba(255,255,255,.2);

    display:flex;

    justify-content:center;

    align-items:center;

    font-size:30px;


}



.student-stat h3{


    margin:5px 0;

    font-size:20px;


}





.blue{

background:linear-gradient(135deg,#2563eb,#3b82f6);

}


.green{

background:linear-gradient(135deg,#059669,#10b981);

}


.orange{

background:linear-gradient(135deg,#ea580c,#f97316);

}


.purple{

background:linear-gradient(135deg,#7c3aed,#8b5cf6);

}





.profile-card{


    background:white;

    border-radius:30px;

    padding:30px;

    box-shadow:

    0 20px 45px rgba(0,0,0,.08);


}




.profile-title{


    display:flex;

    justify-content:space-between;

    align-items:center;


}



.profile-title span{


    background:#dcfce7;

    color:#16a34a;

    padding:8px 18px;

    border-radius:50px;

    font-size:13px;


}




.profile-body{


    margin-top:25px;

    display:flex;

    align-items:center;

    gap:25px;


}



.student-avatar{


    width:95px;

    height:95px;

    border-radius:50%;

    background:

    linear-gradient(
        135deg,
        #2563eb,
        #60a5fa
    );


    color:white;

    display:flex;

    justify-content:center;

    align-items:center;

    font-size:40px;

    font-weight:800;


}



.profile-body p{


    color:#64748b;


}


</style>


@endsection