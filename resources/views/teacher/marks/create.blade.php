@extends('layouts.teacher')

@section('title','Add Exam Marks')

@section('content')

<div class="container-fluid teacher-page">

    <!-- Header -->

    <div class="page-header mb-4">

        <div>

            <span class="page-badge">

                <i class="bi bi-journal-check"></i>

                Examination

            </span>

            <h2 class="mt-3">

                Add Exam Marks

            </h2>

            <p>

                Enter obtained marks for all students in this examination.

            </p>

        </div>

        <div class="header-icon">

            <i class="bi bi-award-fill"></i>

        </div>

    </div>

    <div class="marks-card">

        <!-- Card Header -->

        <div class="marks-header">

            <div class="icon-box">

                <i class="bi bi-pencil-square"></i>

            </div>

            <div>

                <h4 class="mb-1">

                    Student Marks Entry

                </h4>

                <small>

                    Fill in marks and save records

                </small>

            </div>

        </div>

        <div class="card-body p-4">

            <!-- Exam Info -->

            <div class="info-grid mb-4">

                <div class="info-item">

                    <small>Exam</small>

                    <h6>{{ $exam->title }}</h6>

                </div>

                <div class="info-item">

                    <small>Subject</small>

                    <h6>{{ $exam->subject->name }}</h6>

                </div>

                <div class="info-item">

                    <small>Class</small>

                    <h6>{{ $exam->schoolClass->name }}</h6>

                </div>

                <div class="info-item">

                    <small>Total Marks</small>

                    <span class="marks-pill">

                        {{ $exam->total_marks }}

                    </span>

                </div>

            </div>

            <form action="{{ route('teacher.marks.store') }}" method="POST">

                @csrf

                <input
                    type="hidden"
                    name="exam_id"
                    value="{{ $exam->id }}">

                <div class="table-wrapper">

                    <div class="table-responsive">

                        <table class="table marks-table align-middle mb-0">

                            <thead>

                                <tr>

                                    <th>#</th>

                                    <th>Student</th>

                                    <th>Class</th>

                                    <th>Section</th>

                                    <th width="220">

                                        Obtained Marks

                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                            @foreach($students as $student)

                                <tr>

                                    <td>

                                        <span class="number-box">

                                            {{ $loop->iteration }}

                                        </span>

                                    </td>

                                    <td>

                                        <div class="student-box">

                                            <div class="avatar">

                                                {{ strtoupper(substr($student->name,0,1)) }}

                                            </div>

                                            <strong>

                                                {{ $student->name }}

                                            </strong>

                                        </div>

                                    </td>

                                    <td>

                                        <span class="class-badge">

                                            {{ $student->schoolClass->name }}

                                        </span>

                                    </td>

                                    <td>

                                        <span class="section-badge">

                                            {{ $student->section->name }}

                                        </span>

                                    </td>

                                    <td>

                                        <input
                                            type="number"
                                            class="form-control premium-input"
                                            name="marks[{{ $student->id }}]"
                                            min="0"
                                            max="{{ $exam->total_marks }}"
                                            required>

                                    </td>

                                </tr>

                            @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>

                <div class="d-flex justify-content-between mt-4">

                    <a href="{{ route('teacher.marks.index') }}"
                       class="btn btn-secondary px-4">

                        <i class="bi bi-arrow-left"></i>

                        Back

                    </a>

                    <button class="btn btn-primary px-4">

                        <i class="bi bi-check-circle"></i>

                        Save Marks

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<style>

.teacher-page{

animation:fadeIn .4s ease;

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

/* HEADER */

.page-header{

background:linear-gradient(135deg,#111827,#2563eb);

border-radius:24px;

padding:30px;

color:#fff;

display:flex;

justify-content:space-between;

align-items:center;

box-shadow:0 15px 35px rgba(37,99,235,.15);

}

.page-badge{

background:rgba(255,255,255,.15);

padding:8px 18px;

border-radius:50px;

display:inline-flex;

gap:8px;

align-items:center;

font-size:14px;

}

.page-header h2{

font-weight:700;

margin-bottom:8px;

}

.page-header p{

margin:0;

color:rgba(255,255,255,.8);

}

.header-icon{

width:85px;

height:85px;

border-radius:22px;

background:rgba(255,255,255,.15);

display:flex;

align-items:center;

justify-content:center;

font-size:38px;

}

/* CARD */

.marks-card{

background:#fff;

border-radius:24px;

overflow:hidden;

box-shadow:0 20px 45px rgba(15,23,42,.08);

}

.marks-header{

background:linear-gradient(135deg,#111827,#2563eb);

padding:22px 28px;

display:flex;

align-items:center;

gap:18px;

color:#fff;

}

.icon-box{

width:60px;

height:60px;

border-radius:18px;

background:rgba(255,255,255,.15);

display:flex;

align-items:center;

justify-content:center;

font-size:26px;

}

/* INFO */

.info-grid{

display:grid;

grid-template-columns:repeat(4,1fr);

gap:18px;

}

.info-item{

background:#f8fafc;

padding:20px;

border-radius:18px;

border:1px solid #e2e8f0;

}

.info-item small{

display:block;

color:#64748b;

margin-bottom:8px;

}

.info-item h6{

margin:0;

font-weight:700;

}

.marks-pill{

background:#2563eb;

color:#fff;

padding:8px 16px;

border-radius:30px;

font-weight:700;

display:inline-block;

}

/* TABLE */

.table-wrapper{

border:1px solid #e5e7eb;

border-radius:20px;

overflow:hidden;

}

.marks-table thead{

background:#f8fafc;

}

.marks-table thead th{

padding:18px;

text-transform:uppercase;

font-size:13px;

color:#64748b;

border-bottom:1px solid #e5e7eb;

}

.marks-table td{

padding:18px;

vertical-align:middle;

}

.marks-table tbody tr{

transition:.3s;

}

.marks-table tbody tr:hover{

background:#f8fafc;

}

/* STUDENT */

.student-box{

display:flex;

align-items:center;

gap:12px;

}

.avatar{

width:45px;

height:45px;

border-radius:50%;

background:linear-gradient(135deg,#2563eb,#60a5fa);

display:flex;

align-items:center;

justify-content:center;

color:#fff;

font-weight:700;

}

.number-box{

background:#dbeafe;

color:#2563eb;

padding:7px 13px;

border-radius:20px;

font-weight:700;

}

.class-badge{

background:#dbeafe;

color:#2563eb;

padding:8px 14px;

border-radius:20px;

font-weight:600;

}

.section-badge{

background:#dcfce7;

color:#16a34a;

padding:8px 14px;

border-radius:20px;

font-weight:600;

}

/* INPUT */

.premium-input{

height:48px;

border-radius:12px;

border:1px solid #dbe4ee;

box-shadow:none;

}

.premium-input:focus{

border-color:#2563eb;

box-shadow:0 0 0 .15rem rgba(37,99,235,.15);

}

/* BUTTONS */

.btn{

border-radius:12px;

font-weight:600;

}

.btn-primary{

background:#2563eb;

border:none;

}

.btn-primary:hover{

background:#1d4ed8;

}

.btn-secondary{

border:none;

}

@media(max-width:992px){

.info-grid{

grid-template-columns:1fr 1fr;

}

}

@media(max-width:768px){

.page-header{

flex-direction:column;

text-align:center;

gap:20px;

}

.info-grid{

grid-template-columns:1fr;

}

}

</style>

@endsection