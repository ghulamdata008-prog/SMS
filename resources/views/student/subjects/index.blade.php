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

    animation:.4s ease fadeIn;

}


@keyframes fadeIn{

    from{
        opacity:0;
        transform:translateY(10px);
    }

    to{
        opacity:1;
        transform:translateY(0);
    }

}


/* Header */


.page-header{

    background:
    linear-gradient(135deg,#2563eb,#4f46e5);

    padding:30px;

    border-radius:25px;

    color:white;

    display:flex;

    justify-content:space-between;

    align-items:center;

}


.page-header p{

    color:rgba(255,255,255,.8);

}


.header-icon{

    width:75px;

    height:75px;

    border-radius:22px;

    background:rgba(255,255,255,.15);

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:35px;

}



/* Card */


.subject-card{

    background:white;

    border-radius:25px;

    overflow:hidden;

    box-shadow:
    0 15px 40px rgba(0,0,0,.08);

}



.subject-card-header{

    padding:25px;

    background:#f8fafc;

    display:flex;

    justify-content:space-between;

    align-items:center;

    border-bottom:1px solid #e5e7eb;

}


.subject-card-header small{

    color:#64748b;

}



.subject-badge{

    background:#2563eb;

    color:white;

    padding:8px 18px;

    border-radius:50px;

    font-size:14px;

}




/* Table */


.modern-table{

    border-collapse:separate;

    border-spacing:0 12px;

}



.modern-table thead th{

    border:0;

    color:#64748b;

    font-size:14px;

    text-transform:uppercase;

}



.modern-table tbody tr{

    background:#fff;

    box-shadow:0 5px 15px rgba(0,0,0,.05);

    transition:.3s;

}


.modern-table tbody tr:hover{

    transform:translateY(-3px);

}


.modern-table td{

    padding:18px;

    border:0;

}



.number-box{

    width:35px;

    height:35px;

    border-radius:12px;

    background:#dbeafe;

    color:#2563eb;

    display:flex;

    align-items:center;

    justify-content:center;

    font-weight:700;

}




.subject-info{

    display:flex;

    align-items:center;

    gap:12px;

}



.subject-icon{

    width:42px;

    height:42px;

    border-radius:12px;

    background:#ede9fe;

    color:#7c3aed;

    display:flex;

    align-items:center;

    justify-content:center;

}




.teacher-info{

    display:flex;

    align-items:center;

    gap:10px;

}



.teacher-avatar{

    width:40px;

    height:40px;

    border-radius:50%;

    background:linear-gradient(135deg,#10b981,#059669);

    color:white;

    display:flex;

    align-items:center;

    justify-content:center;

    font-weight:bold;

}



.info-badge{

    padding:8px 14px;

    border-radius:50px;

    font-size:13px;

    display:inline-flex;

    gap:5px;

    align-items:center;

}



.class-badge{

    background:#dbeafe;

    color:#2563eb;

}



.section-badge{

    background:#dcfce7;

    color:#16a34a;

}



/* Empty */


.empty-box{

    text-align:center;

    padding:50px;

    color:#64748b;

}


.empty-box i{

    font-size:55px;

    color:#94a3b8;

}


</style>


@endsection