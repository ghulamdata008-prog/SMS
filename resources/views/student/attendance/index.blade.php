@extends('layouts.student')

@section('title','My Attendance')

@section('content')


<div class="attendance-page">


    <!-- Header -->

    <div class="attendance-header">


        <div>

            <span class="header-badge">

                <i class="bi bi-calendar-check-fill"></i>

                Student Attendance

            </span>


            <h2>
                My Attendance
            </h2>


            <p>
                Track your daily attendance record
            </p>


        </div>



        <div class="header-icon">

            <i class="bi bi-calendar3"></i>

        </div>


    </div>






    <!-- Attendance Card -->


    <div class="attendance-card mt-4">


        <div class="table-responsive">


            <table class="attendance-table">


                <thead>

                    <tr>

                        <th>
                            Date
                        </th>


                        <th>
                            Status
                        </th>

                    </tr>

                </thead>



                <tbody>


                @forelse($attendance as $row)


                    <tr>


                        <td>


                            <div class="date-box">


                                <i class="bi bi-calendar-event"></i>


                                {{ $row->attendance_date }}


                            </div>


                        </td>





                        <td>


                            @if($row->status == 'Present')


                                <span class="status present">

                                    <i class="bi bi-check-circle-fill"></i>

                                    Present

                                </span>



                            @elseif($row->status == 'Leave')


                                <span class="status leave">

                                    <i class="bi bi-clock-fill"></i>

                                    Leave

                                </span>



                            @else


                                <span class="status absent">

                                    <i class="bi bi-x-circle-fill"></i>

                                    Absent

                                </span>



                            @endif


                        </td>



                    </tr>


                @empty


                    <tr>

                        <td colspan="2"
                            class="text-center empty">

                            No Attendance Record Found

                        </td>

                    </tr>


                @endforelse



                </tbody>


            </table>


        </div>


    </div>



</div>





<style>


.attendance-page{


    width:100%;


}




.attendance-header{


    background:

    linear-gradient(
        135deg,
        #0f172a,
        #2563eb
    );


    padding:35px;

    border-radius:30px;

    color:white;

    display:flex;

    justify-content:space-between;

    align-items:center;


}



.header-badge{


    background:rgba(255,255,255,.15);

    padding:8px 16px;

    border-radius:50px;

    font-size:13px;


}



.attendance-header h2{


    margin-top:18px;

    font-weight:800;

    font-size:35px;


}



.attendance-header p{


    opacity:.8;

}



.header-icon{


    width:90px;

    height:90px;

    border-radius:30px;

    background:rgba(255,255,255,.15);

    display:flex;

    align-items:center;

    justify-content:center;


}



.header-icon i{


    font-size:45px;


}






.attendance-card{


    background:white;

    border-radius:30px;

    padding:25px;

    box-shadow:

    0 20px 45px rgba(0,0,0,.08);


}




.attendance-table{


    width:100%;

    border-collapse:separate;

    border-spacing:0 12px;


}



.attendance-table thead th{


    background:#f8fafc;

    padding:18px;

    color:#64748b;

    text-transform:uppercase;

    font-size:13px;


}



.attendance-table tbody tr{


    background:white;

    box-shadow:

    0 5px 20px rgba(0,0,0,.05);

    transition:.3s;


}



.attendance-table tbody tr:hover{


    transform:translateY(-3px);


}



.attendance-table td{


    padding:20px;

}



.date-box{


    display:flex;

    align-items:center;

    gap:10px;

    font-weight:600;

    color:#334155;


}



.date-box i{


    color:#2563eb;


}




.status{


    display:inline-flex;

    align-items:center;

    gap:8px;

    padding:10px 18px;

    border-radius:50px;

    font-weight:700;


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



.empty{


    padding:40px!important;

    color:#64748b;

}



</style>


@endsection