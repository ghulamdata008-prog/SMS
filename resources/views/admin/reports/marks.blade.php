@extends('layouts.app')


@section('title','Result Report')


@section('content')


<div class="container-fluid">



    <!-- Header -->

    <div class="mb-4">


        <h2 class="fw-bold mb-1">

            Result Report

        </h2>


        <p class="text-muted">

            Student examination marks overview

        </p>


    </div>






    <!-- Result Card -->


    <div class="result-report-card shadow-lg">



        <div class="report-header">


            <div class="header-icon">


                <i class="bi bi-bar-chart-fill"></i>


            </div>



            <div>


                <h5 class="mb-1">

                    Student Results

                </h5>


                <small>

                    Complete marks records

                </small>


            </div>



        </div>







        <div class="table-responsive">


            <table class="table result-table align-middle mb-0">



                <thead>


                    <tr>


                        <th>
                            Student
                        </th>


                        <th>
                            Subject
                        </th>


                        <th>
                            Marks
                        </th>


                    </tr>


                </thead>







                <tbody>



                @foreach($marks as $mark)



                    <tr>



                        <td>


                            <div class="student-box">


                                <div class="student-avatar">


                                    {{ strtoupper(substr($mark->student->name,0,1)) }}


                                </div>



                                <span>


                                    {{$mark->student->name}}


                                </span>



                            </div>


                        </td>







                        <td>


                            <span class="subject-badge">


                                <i class="bi bi-book"></i>


                                {{$mark->subject->name}}


                            </span>


                        </td>







                        <td>


                            <span class="marks-badge">


                                {{ $mark->obtained_marks }}


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


.result-report-card{

    background:white;

    border-radius:25px;

    overflow:hidden;

}




/* SAME ADMIN THEME */

.report-header{

    padding:25px;

    background:linear-gradient(135deg,#111827,#2563eb);

    color:white;

    display:flex;

    align-items:center;

    gap:15px;

}




.header-icon{


    width:55px;

    height:55px;

    border-radius:18px;

    background:rgba(255,255,255,.18);

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:25px;


}





.result-table{

    width:100%;

}




.result-table thead{

    background:#f8fafc;

}




.result-table th{


    padding:18px;

    font-size:13px;

    color:#64748b;

    font-weight:700;

    text-transform:uppercase;


}





.result-table td{


    padding:18px;

    vertical-align:middle;


}





.result-table tbody tr{


    transition:.3s;


}



.result-table tbody tr:hover{


    background:#f8fafc;

    transform:scale(1.01);


}






/* Student */


.student-box{


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




.student-box span{


    font-weight:600;


}





/* Subject */


.subject-badge{


    background:#dbeafe;

    color:#2563eb;


    padding:8px 15px;


    border-radius:20px;


    font-weight:600;


}






/* Marks */


.marks-badge{


    background:#dcfce7;


    color:#15803d;


    padding:8px 18px;


    border-radius:20px;


    font-weight:800;


    font-size:16px;


}





</style>



@endsection