@extends('layouts.teacher')

@section('title','My Students')

@section('content')

<div class="container-fluid teacher-page">


    <!-- Header -->

    <div class="page-header mb-4">

        <h2 class="fw-bold mb-1">
            My Students
        </h2>

        <p class="text-muted">
            View students assigned to your classes
        </p>

    </div>





    <div class="student-card shadow-lg">


        <!-- Card Header -->

        <div class="student-header">


            <div class="header-icon">

                <i class="bi bi-people-fill"></i>

            </div>


            <div>

                <h5 class="mb-1">
                    Student List
                </h5>

                <small>
                    Class wise student records
                </small>

            </div>


        </div>







        <div class="card-body p-4">



            <div class="table-wrapper">


                <div class="table-responsive">


                    <table class="table student-table align-middle mb-0">


                        <thead>


                            <tr>

                                <th width="80">
                                    #
                                </th>


                                <th>
                                    Student
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



                        @forelse($students as $student)



                            <tr>


                                <td>


                                    <span class="number-badge">

                                        {{ $loop->iteration }}

                                    </span>


                                </td>





                                <td>


                                    <div class="student-info">


                                        <div class="avatar">


                                            {{ strtoupper(substr($student->name,0,1)) }}


                                        </div>



                                        <div>


                                            <h6 class="mb-0">

                                                {{ $student->name }}

                                            </h6>


                                            <small>
                                                Student
                                            </small>


                                        </div>



                                    </div>



                                </td>





                                <td>


                                    <span class="email-text">

                                        <i class="bi bi-envelope"></i>

                                        {{ $student->email }}


                                    </span>


                                </td>






                                <td>


                                    <span class="class-badge">


                                        <i class="bi bi-building"></i>


                                        {{ $student->schoolClass->name ?? '-' }}


                                    </span>


                                </td>







                                <td>


                                    <span class="section-badge">


                                        <i class="bi bi-people"></i>


                                        {{ $student->section->name ?? '-' }}


                                    </span>


                                </td>





                            </tr>





                        @empty



                            <tr>


                                <td colspan="5"
                                    class="text-center py-5 text-danger">


                                    <i class="bi bi-person-x fs-2"></i>


                                    <h5 class="mt-2">

                                        No Students Found

                                    </h5>


                                </td>


                            </tr>




                        @endforelse




                        </tbody>



                    </table>



                </div>


            </div>



        </div>



    </div>



</div>







<style>


.teacher-page{

padding:10px;

}




.page-header h2{

font-size:30px;

}




.student-card{


background:white;

border-radius:25px;

overflow:hidden;


}




.student-header{


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

background:rgba(255,255,255,.2);

display:flex;

align-items:center;

justify-content:center;

font-size:25px;


}





.table-wrapper{


border:1px solid #e5e7eb;

border-radius:20px;

overflow:hidden;


}




.student-table thead{


background:#111827;

color:white;


}




.student-table th{


padding:18px;

font-size:13px;

text-transform:uppercase;


}




.student-table td{


padding:17px;

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





.avatar{


width:45px;

height:45px;

border-radius:50%;

background:linear-gradient(135deg,#2563eb,#60a5fa);

color:white;

display:flex;

align-items:center;

justify-content:center;

font-weight:700;


}






.student-info small{


color:#64748b;


}






.number-badge{


background:#dbeafe;

color:#2563eb;

padding:8px 12px;

border-radius:20px;

font-weight:700;


}







.email-text{


color:#475569;

font-weight:500;


}



.email-text i{


color:#2563eb;

margin-right:5px;


}






.class-badge{


background:#dcfce7;

color:#15803d;

padding:8px 14px;

border-radius:20px;

font-weight:600;


}






.section-badge{


background:#fef3c7;

color:#b45309;

padding:8px 14px;

border-radius:20px;

font-weight:600;


}



</style>


@endsection