@extends('layouts.teacher')

@section('title','My Subjects')

@section('content')

<div class="container-fluid teacher-page">


    <!-- Header -->

    <div class="page-header mb-4">


        <h2 class="fw-bold mb-1">
            My Subjects
        </h2>


        <p class="text-muted">
            Manage your assigned subjects and classes
        </p>


    </div>





    <div class="subject-card shadow-lg">



        <!-- Header -->

        <div class="subject-header">


            <div class="header-icon">

                <i class="bi bi-book-fill"></i>

            </div>


            <div>


                <h5 class="mb-1">
                    Assigned Subjects
                </h5>


                <small>
                    Subject wise class information
                </small>


            </div>



        </div>






        <div class="card-body p-4">





            <div class="table-wrapper">


                <div class="table-responsive">


                    <table class="table subject-table align-middle mb-0">


                        <thead>


                            <tr>


                                <th width="70">
                                    #
                                </th>


                                <th>
                                    Subject
                                </th>


                                <th>
                                    Class
                                </th>


                                <th>
                                    Section
                                </th>


                                <th>
                                    Students
                                </th>


                                <th width="170">
                                    Action
                                </th>


                            </tr>


                        </thead>






                        <tbody>




                        @forelse($subjects as $subject)




                            <tr>



                                <td>


                                    <span class="number-badge">

                                        {{ $loop->iteration }}

                                    </span>


                                </td>






                                <td>


                                    <div class="subject-name">


                                        <div class="subject-icon">


                                            <i class="bi bi-book"></i>


                                        </div>



                                        <strong>

                                            {{ $subject->subject->name }}

                                        </strong>



                                    </div>


                                </td>







                                <td>


                                    <span class="class-badge">


                                        <i class="bi bi-building"></i>


                                        {{ $subject->schoolClass->name }}


                                    </span>


                                </td>






                                <td>


                                    <span class="section-badge">


                                        <i class="bi bi-people"></i>


                                        {{ $subject->section->name }}


                                    </span>


                                </td>






                                <td>


                                    <span class="student-count">


                                        <i class="bi bi-person-fill"></i>


                                        {{ \App\Models\Student::where('class_id',$subject->school_class_id)->where('section_id',$subject->section_id)->count() }}


                                    </span>


                                </td>







                                <td>



                                    <a href="{{ route('teacher.subjects.show',$subject->id) }}"

                                       class="view-btn">


                                        <i class="bi bi-eye"></i>


                                        View Students


                                    </a>




                                </td>




                            </tr>





                        @empty




                            <tr>


                                <td colspan="6"
                                    class="text-center py-5 text-danger">


                                    <i class="bi bi-book fs-2"></i>


                                    <h5 class="mt-2">

                                        No Subject Assigned

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





.subject-card{


background:white;

border-radius:25px;

overflow:hidden;


}




.subject-header{


background:linear-gradient(135deg,#111827,#2563eb);

padding:25px;

color:white;

display:flex;

align-items:center;

gap:15px;


}




.header-icon{


height:55px;

width:55px;

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






.subject-table thead{


background:#111827;

color:white;


}




.subject-table th{


padding:18px;

font-size:13px;

text-transform:uppercase;


}




.subject-table td{


padding:18px;


}




.subject-table tbody tr{


transition:.3s;


}




.subject-table tbody tr:hover{


background:#f8fafc;

transform:scale(1.01);


}






.number-badge{


background:#dbeafe;

color:#2563eb;

padding:8px 12px;

border-radius:20px;

font-weight:700;


}






.subject-name{


display:flex;

align-items:center;

gap:12px;


}





.subject-icon{


width:40px;

height:40px;

border-radius:12px;

background:#ede9fe;

color:#7c3aed;

display:flex;

align-items:center;

justify-content:center;


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





.student-count{


background:#e0f2fe;

color:#0369a1;

padding:8px 14px;

border-radius:20px;

font-weight:700;


}





.view-btn{


background:#2563eb;

color:white;

padding:9px 15px;

border-radius:12px;

text-decoration:none;

font-size:14px;

display:inline-flex;

align-items:center;

gap:6px;


}




.view-btn:hover{


background:#1d4ed8;

color:white;


}



</style>


@endsection