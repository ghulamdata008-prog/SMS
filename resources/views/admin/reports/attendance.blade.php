@extends('layouts.app')

@section('title','Attendance Report')

@section('content')

<div class="container-fluid">


    <div class="mb-4">

        <h2 class="fw-bold mb-1">
            Attendance Report
        </h2>

        <p class="text-muted">
            Student attendance records overview
        </p>

    </div>




    <div class="attendance-report-card shadow-lg">


        <!-- Same Theme Header -->

        <div class="report-header">


            <div class="header-icon">

                <i class="bi bi-calendar-check-fill"></i>

            </div>


            <div>

                <h5 class="mb-1">
                    Attendance Records
                </h5>

                <small>
                    Complete student attendance history
                </small>

            </div>


        </div>





        <div class="table-responsive">


            <table class="table attendance-table align-middle mb-0">


                <thead>

                    <tr>

                        <th>
                            Student
                        </th>

                        <th>
                            Date
                        </th>

                        <th>
                            Status
                        </th>

                    </tr>


                </thead>



                <tbody>


                @foreach($attendance as $item)


                    <tr>


                        <td>

                            <div class="student-box">


                                <div class="student-avatar">

                                    {{ strtoupper(substr($item->student->name,0,1)) }}

                                </div>


                                <span>

                                    {{$item->student->name}}

                                </span>


                            </div>

                        </td>



                        <td>

                            <span class="date-badge">

                                <i class="bi bi-calendar3"></i>

                                {{$item->attendance_date}}

                            </span>


                        </td>




                        <td>


                            @if($item->status == 'Present')


                                <span class="status present">

                                    <i class="bi bi-check-circle-fill"></i>

                                    Present

                                </span>



                            @elseif($item->status == 'Absent')


                                <span class="status absent">

                                    <i class="bi bi-x-circle-fill"></i>

                                    Absent

                                </span>



                            @else


                                <span class="status leave">

                                    <i class="bi bi-clock-fill"></i>

                                    {{$item->status}}

                                </span>


                            @endif


                        </td>



                    </tr>


                @endforeach



                </tbody>


            </table>


        </div>



    </div>


</div>





<style>


.attendance-report-card{

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





.attendance-table{

    width:100%;

}




.attendance-table thead{

    background:#f8fafc;

}



.attendance-table th{

    padding:18px;

    color:#64748b;

    font-size:13px;

    font-weight:700;

    text-transform:uppercase;

}



.attendance-table td{

    padding:18px;

    vertical-align:middle;

}



.attendance-table tbody tr{

    transition:.3s;

}



.attendance-table tbody tr:hover{

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





/* Date */

.date-badge{

    background:#dbeafe;

    color:#2563eb;

    padding:8px 14px;

    border-radius:20px;

    font-weight:600;

}





/* Status */

.status{

    padding:8px 16px;

    border-radius:20px;

    font-weight:700;

    display:inline-flex;

    align-items:center;

    gap:6px;

}



.present{

    background:#dcfce7;

    color:#15803d;

}



.absent{

    background:#fee2e2;

    color:#dc2626;

}



.leave{

    background:#fef3c7;

    color:#b45309;

}



</style>


@endsection