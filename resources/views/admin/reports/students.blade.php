@extends('layouts.app')


@section('title','Student Report')


@section('content')


<div class="container-fluid">



    <!-- Header -->

    <div class="mb-4">


        <h2 class="fw-bold mb-1">

            Student Report

        </h2>


        <p class="text-muted">

            Complete student information report

        </p>


    </div>






    <!-- Report Card -->


    <div class="student-report-card shadow-lg">



        <div class="report-header">


            <div class="header-icon">


                <i class="bi bi-people-fill"></i>


            </div>



            <div>


                <h5 class="mb-1">

                    Students List

                </h5>


                <small>

                    Registered students records

                </small>


            </div>



        </div>








        <div class="table-responsive">


            <table class="table student-table align-middle mb-0">



                <thead>


                    <tr>


                        <th>
                            Name
                        </th>


                        <th>
                            Email
                        </th>


                        <th>
                            Class
                        </th>


                        <th>
                            Section
                        </th>


                    </tr>


                </thead>





                <tbody>


                @foreach($students as $student)



                    <tr>



                        <td>


                            <div class="student-info">


                                <div class="student-avatar">


                                    {{ strtoupper(substr($student->name,0,1)) }}


                                </div>


                                <span>


                                    {{$student->name}}


                                </span>



                            </div>


                        </td>






                        <td>


                            <span class="email">


                                {{$student->email}}


                            </span>


                        </td>






                        <td>


                            <span class="class-badge">


                                {{ $student->schoolClass->name ?? '-' }}


                            </span>


                        </td>







                        <td>


                            <span class="section-badge">


                                {{ $student->section->name ?? '-' }}


                            </span>


                        </td>





                    </tr>




                @endforeach




                </tbody>




            </table>



        </div>



    </div>




</div>








<style>


.student-report-card{


    background:white;

    border-radius:25px;

    overflow:hidden;


}






.report-header{


    padding:25px;

    background:linear-gradient(135deg,#2563eb,#1e40af);

    color:white;

    display:flex;

    align-items:center;

    gap:15px;


}




.header-icon{


    width:55px;

    height:55px;

    border-radius:18px;

    background:rgba(255,255,255,.2);

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:25px;


}







.student-table thead{


    background:#f8fafc;


}




.student-table th{


    padding:18px;

    font-size:13px;

    text-transform:uppercase;

    color:#64748b;


}



.student-table td{


    padding:18px;

}





.student-table tbody tr{


    transition:.3s;


}



.student-table tbody tr:hover{


    background:#f8fafc;

    transform:scale(1.01);


}







.student-info{


    display:flex;

    align-items:center;

    gap:12px;


}




.student-avatar{


    width:42px;

    height:42px;

    border-radius:50%;


    background:linear-gradient(135deg,#2563eb,#60a5fa);


    color:white;


    display:flex;

    align-items:center;

    justify-content:center;


    font-weight:700;


}





.student-info span{


    font-weight:600;


}







.email{


    color:#475569;


}






.class-badge{


    background:#dbeafe;

    color:#1d4ed8;


    padding:7px 14px;


    border-radius:20px;


    font-weight:600;


}






.section-badge{


    background:#dcfce7;


    color:#15803d;


    padding:7px 14px;


    border-radius:20px;


    font-weight:600;


}




</style>



@endsection