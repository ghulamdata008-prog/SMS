@extends('layouts.app')

@section('title','School Reports')

@section('content')

<div class="container-fluid">


    <!-- Page Header -->

    <div class="mb-4">

        <h2 class="fw-bold mb-1">
            School Reports
        </h2>

        <p class="text-muted">
            Overview of school statistics and reports
        </p>

    </div>





    <!-- Statistics Cards -->

    <div class="row g-4">



        <!-- Students -->

        <div class="col-xl-4 col-md-6">


            <div class="report-card student-card">


                <div class="report-icon">

                    <i class="bi bi-people-fill"></i>

                </div>


                <div>

                    <span>
                        Total Students
                    </span>


                    <h2>
                        {{$students}}
                    </h2>


                </div>


            </div>


        </div>








        <!-- Teachers -->

        <div class="col-xl-4 col-md-6">


            <div class="report-card teacher-card">


                <div class="report-icon">

                    <i class="bi bi-person-badge-fill"></i>

                </div>


                <div>

                    <span>
                        Total Teachers
                    </span>


                    <h2>
                        {{$teachers}}
                    </h2>


                </div>


            </div>


        </div>








        <!-- Attendance -->

        <div class="col-xl-4 col-md-6">


            <div class="report-card attendance-card">


                <div class="report-icon">

                    <i class="bi bi-calendar-check-fill"></i>

                </div>


                <div>

                    <span>
                        Attendance Records
                    </span>


                    <h2>
                        {{$totalAttendance}}
                    </h2>


                </div>


            </div>


        </div>



    </div>






    <!-- Report Actions -->


    <div class="report-action-box mt-5">


        <div class="mb-3">


            <h5 class="fw-bold">

                Generate Reports

            </h5>


            <p class="text-muted mb-0">

                View detailed school information

            </p>


        </div>





        <div class="d-flex flex-wrap gap-3">



            <a href="{{route('admin.reports.students')}}"
            class="report-btn students-btn">


                <i class="bi bi-people"></i>

                Student Report


            </a>






            <a href="{{route('admin.reports.attendance')}}"
            class="report-btn attendance-btn">


                <i class="bi bi-calendar-check"></i>

                Attendance Report


            </a>







            <a href="{{route('admin.reports.marks')}}"
            class="report-btn marks-btn">


                <i class="bi bi-bar-chart"></i>

                Result Report


            </a>



        </div>



    </div>





</div>







<style>


.report-card{


    border-radius:25px;

    padding:30px;

    color:white;

    display:flex;

    align-items:center;

    gap:20px;

    box-shadow:0 10px 30px rgba(0,0,0,.08);

    transition:.3s;


}



.report-card:hover{


    transform:translateY(-6px);


}





.report-card span{


    opacity:.85;

    font-size:15px;


}



.report-card h2{


    margin:8px 0 0;

    font-size:40px;

    font-weight:800;


}




.report-icon{


    width:65px;

    height:65px;

    border-radius:20px;

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:30px;

    background:rgba(255,255,255,.2);


}




.student-card{


    background:linear-gradient(135deg,#2563eb,#60a5fa);


}



.teacher-card{


    background:linear-gradient(135deg,#7c3aed,#c084fc);


}




.attendance-card{


    background:linear-gradient(135deg,#059669,#34d399);


}






.report-action-box{


    background:white;

    padding:30px;

    border-radius:25px;

    box-shadow:0 10px 30px rgba(0,0,0,.08);


}







.report-btn{


    padding:13px 25px;

    border-radius:14px;

    color:white;

    text-decoration:none;

    font-weight:600;

    display:flex;

    align-items:center;

    gap:8px;

    transition:.3s;


}



.report-btn:hover{


    color:white;

    transform:translateY(-3px);


}




.students-btn{


    background:#2563eb;


}



.students-btn:hover{


    background:#1d4ed8;


}




.attendance-btn{


    background:#16a34a;


}



.attendance-btn:hover{


    background:#15803d;


}




.marks-btn{


    background:#f59e0b;


}



.marks-btn:hover{


    background:#d97706;


}



</style>



@endsection