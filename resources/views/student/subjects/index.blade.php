@extends('layouts.student')

@section('title','My Subjects')

@section('content')

<div class="student-page">

    <!-- Header -->
    <div class="page-header mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                My Subjects
            </h2>

            <p class="text-muted mb-0">
                View your assigned subjects, teachers and class details.
            </p>
        </div>


        <div class="header-icon">
            <i class="bi bi-book-fill"></i>
        </div>

    </div>



    <div class="subject-card">


        <div class="subject-card-header">

            <div>

                <h4 class="mb-1">
                    Academic Subjects
                </h4>

                <small>
                    Your current enrolled subjects
                </small>

            </div>


            <span class="subject-badge">

                {{ $subjects->count() }} Subjects

            </span>


        </div>




        <div class="card-body p-4">


            @if($subjects->count())


            <div class="table-responsive">


                <table class="table modern-table align-middle">


                    <thead>

                        <tr>

                            <th>#</th>

                            <th>Subject</th>

                            <th>Teacher</th>

                            <th>Class</th>

                            <th>Section</th>

                        </tr>

                    </thead>



                    <tbody>


                    @foreach($subjects as $subject)


                    <tr>


                        <td>

                            <div class="number-box">

                                {{ $loop->iteration }}

                            </div>

                        </td>



                        <td>


                            <div class="subject-info">


                                <div class="subject-icon">

                                    <i class="bi bi-book"></i>

                                </div>


                                <strong>

                                    {{ $subject->subject->name }}

                                </strong>


                            </div>


                        </td>




                        <td>


                            <div class="teacher-info">


                                <div class="teacher-avatar">

                                    {{ strtoupper(substr($subject->teacher->name,0,1)) }}

                                </div>


                                <span>

                                    {{ $subject->teacher->name }}

                                </span>


                            </div>


                        </td>




                        <td>

                            <span class="info-badge class-badge">

                                <i class="bi bi-building"></i>

                                {{ $subject->schoolClass->name }}

                            </span>


                        </td>




                        <td>


                            <span class="info-badge section-badge">

                                <i class="bi bi-people"></i>

                                {{ $subject->section->name }}

                            </span>


                        </td>


                    </tr>



                    @endforeach


                    </tbody>



                </table>


            </div>



            @else


            <div class="empty-box">


                <i class="bi bi-book"></i>


                <h5>
                    No Subject Assigned
                </h5>


                <p>
                    Subjects will appear here when assigned.
                </p>


            </div>



            @endif



        </div>


    </div>


</div>



<style>


.student-page{
    animation:fadeIn .4s ease;
}

@keyframes fadeIn{
    from{
        opacity:0;
        transform:translateY(12px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}

/* ===========================
   HEADER
=========================== */

.page-header{
    background:linear-gradient(135deg,#111827,#2563eb);
    border-radius:22px;
    padding:30px;
    color:#fff;
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
    box-shadow:0 15px 35px rgba(37,99,235,.25);
}

.page-header h2{
    font-weight:700;
    margin-bottom:10px;
}

.page-header p{
    color:rgba(255,255,255,.8);
    margin:0;
}

.header-icon{
    width:75px;
    height:75px;
    border-radius:20px;
    background:rgba(255,255,255,.15);
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:34px;
    color:#fff;
}

/* ===========================
   CARD
=========================== */

.subject-card{
    background:#fff;
    border-radius:22px;
    overflow:hidden;
    box-shadow:0 15px 40px rgba(0,0,0,.08);
}

.subject-card-header{
    background:linear-gradient(135deg,#111827,#2563eb);
    color:#fff;
    padding:22px 25px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.subject-card-header h4{
    margin-bottom:5px;
    font-weight:700;
}

.subject-card-header small{
    color:rgba(255,255,255,.75);
}

.subject-badge{
    background:rgba(255,255,255,.18);
    padding:8px 18px;
    border-radius:30px;
    color:#fff;
    font-weight:600;
}

/* ===========================
   TABLE
=========================== */

.modern-table{
    margin-bottom:0;
}

.modern-table thead{
    background:#f8fafc;
}

.modern-table thead th{
    border:none;
    color:#64748b;
    padding:18px;
    font-size:13px;
    text-transform:uppercase;
    font-weight:700;
}

.modern-table tbody td{
    padding:18px;
    vertical-align:middle;
    border-top:1px solid #eef2f7;
}

.modern-table tbody tr{
    transition:.3s;
}

.modern-table tbody tr:hover{
    background:#f8fafc;
}

/* ===========================
   NUMBER
=========================== */

.number-box{
    width:38px;
    height:38px;
    border-radius:12px;
    background:#dbeafe;
    color:#2563eb;
    display:flex;
    align-items:center;
    justify-content:center;
    font-weight:700;
}

/* ===========================
   SUBJECT
=========================== */

.subject-info{
    display:flex;
    align-items:center;
    gap:12px;
}

.subject-icon{
    width:45px;
    height:45px;
    border-radius:14px;
    background:linear-gradient(135deg,#6366f1,#8b5cf6);
    color:#fff;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:18px;
}

/* ===========================
   TEACHER
=========================== */

.teacher-info{
    display:flex;
    align-items:center;
    gap:12px;
}

.teacher-avatar{
    width:42px;
    height:42px;
    border-radius:50%;
    background:linear-gradient(135deg,#10b981,#059669);
    color:#fff;
    display:flex;
    align-items:center;
    justify-content:center;
    font-weight:700;
}

.teacher-info span{
    font-weight:600;
}

/* ===========================
   BADGES
=========================== */

.info-badge{
    display:inline-flex;
    align-items:center;
    gap:6px;
    padding:8px 15px;
    border-radius:30px;
    font-size:13px;
    font-weight:600;
}

.class-badge{
    background:#dbeafe;
    color:#1d4ed8;
}

.section-badge{
    background:#dcfce7;
    color:#15803d;
}

/* ===========================
   EMPTY
=========================== */

.empty-box{
    padding:70px 20px;
    text-align:center;
    color:#64748b;
}

.empty-box i{
    font-size:60px;
    color:#cbd5e1;
    margin-bottom:20px;
}

.empty-box h5{
    font-weight:700;
    margin-bottom:10px;
}

/* ===========================
   RESPONSIVE
=========================== */

@media(max-width:768px){

.page-header{
    flex-direction:column;
    text-align:center;
    gap:20px;
}

.subject-card-header{
    flex-direction:column;
    gap:15px;
    text-align:center;
}

.header-icon{
    width:65px;
    height:65px;
    font-size:28px;
}

}

</style>


@endsection