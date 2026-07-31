@extends('layouts.teacher')

@section('title','My Classes')

@section('content')


<div class="teacher-content-wrapper">


    <!-- Header -->

    <div class="page-header mb-4">


        <div>

            <span class="page-badge">

                <i class="bi bi-building"></i>

                Teaching

            </span>


            <h2 class="fw-bold mt-3">

                My Classes

            </h2>


            <p class="text-muted">

                Manage your assigned classes, sections and subjects.

            </p>


        </div>



    </div>
<!-- Classes Card -->


    <div class="classes-card">


        <div class="classes-header">


            <div class="header-icon">

                <i class="bi bi-mortarboard-fill"></i>

            </div>


            <div>

                <h5>
                    Assigned Classes
                </h5>

                <small>
                    Your teaching assignments
                </small>

            </div>


        </div>

  <div class="table-responsive">


            <table class="table classes-table align-middle mb-0">


                <thead>


                    <tr>

                        <th>
                            Class
                        </th>


                        <th>
                            Section
                        </th>


                        <th>
                            Subject
                        </th>


                    </tr>


                </thead>



                <tbody>



                @forelse($assignments as $assignment)



                    <tr>


                        <td>


                            <div class="class-info">


                                <div class="class-icon">


                                    <i class="bi bi-building"></i>


                                </div>



                                <span>

                                    {{ $assignment->schoolClass->name ?? '-' }}

                                </span>



                            </div>



                        </td>
 <td>


                            <span class="section-badge">


                                <i class="bi bi-people-fill"></i>


                                {{ $assignment->section->name ?? '-' }}


                            </span>


                        </td>
 <td>


                            <span class="subject-badge">


                                <i class="bi bi-book-fill"></i>


                                {{ $assignment->subject->name ?? '-' }}


                            </span>


                        </td>



                    </tr>
 @empty



                    <tr>


                        <td colspan="3">


                            <div class="empty-state">


                                <i class="bi bi-building-x"></i>


                                <h5>
                                    No Class Assigned
                                </h5>


                                <p>
                                    Your assigned classes will appear here.
                                </p>


                            </div>


                        </td>


                    </tr>



                @endforelse



                </tbody>


            </table>


        </div>



    </div>



</div>
<style>
    .teacher-content-wrapper{
    padding:10px 5px;
}

/* HEADER */

.page-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    flex-wrap:wrap;
}

.page-badge{
    display:inline-flex;
    align-items:center;
    gap:8px;
    background:#e0e7ff;
    color:#4338ca;
    padding:8px 16px;
    border-radius:30px;
    font-weight:600;
    font-size:13px;
}

.page-header h2{
    color:#111827;
    margin-bottom:8px;
}

.page-header p{
    color:#64748b;
    margin:0;
}

/* CARD */

.classes-card{
    background:#fff;
    border-radius:22px;
    overflow:hidden;
    box-shadow:0 20px 40px rgba(15,23,42,.08);
}

/* HEADER */

.classes-header{
    padding:24px;
    background:linear-gradient(135deg,#111827,#2563eb);
    color:#fff;
    display:flex;
    align-items:center;
    gap:15px;
}

.header-icon{
    width:55px;
    height:55px;
    border-radius:16px;
    background:rgba(255,255,255,.18);
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:24px;
}

.classes-header h5{
    margin:0;
    font-weight:700;
}

.classes-header small{
    opacity:.85;
}

/* TABLE */

.table-responsive{
    overflow-x:auto;
}

.classes-table{
    margin:0;
    width:100%;
}

.classes-table thead th{
    background:#f8fafc;
    color:#64748b;
    font-size:13px;
    font-weight:700;
    text-transform:uppercase;
    padding:18px;
    border-bottom:1px solid #e5e7eb;
}

.classes-table tbody td{
    padding:18px;
    vertical-align:middle;
    border-bottom:1px solid #f1f5f9;
}

.classes-table tbody tr{
    transition:.3s;
}

.classes-table tbody tr:hover{
    background:#f8fafc;
}

/* CLASS */

.class-info{
    display:flex;
    align-items:center;
    gap:12px;
}

.class-icon{
    width:42px;
    height:42px;
    border-radius:50%;
    background:linear-gradient(135deg,#2563eb,#60a5fa);
    color:#fff;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:18px;
}

.class-info span{
    font-weight:700;
    color:#111827;
}

/* SECTION */

.section-badge{
    display:inline-flex;
    align-items:center;
    gap:8px;
    background:#ede9fe;
    color:#6d28d9;
    padding:8px 16px;
    border-radius:25px;
    font-weight:600;
}

/* SUBJECT */

.subject-badge{
    display:inline-flex;
    align-items:center;
    gap:8px;
    background:#dcfce7;
    color:#15803d;
    padding:8px 16px;
    border-radius:25px;
    font-weight:600;
}

/* EMPTY */

.empty-state{
    text-align:center;
    padding:60px 20px;
    color:#64748b;
}

.empty-state i{
    font-size:55px;
    color:#94a3b8;
    margin-bottom:15px;
}

.empty-state h5{
    font-weight:700;
    color:#334155;
}

.empty-state p{
    margin:0;
}

/* RESPONSIVE */

@media(max-width:768px){

    .classes-header{
        flex-direction:column;
        text-align:center;
    }

    .classes-table th,
    .classes-table td{
        white-space:nowrap;
    }

}
    </style>

@endsection