@extends('layouts.teacher')

@section('title','Exam Details')

@section('content')

<div class="container-fluid">

    <!-- Header -->

    <div class="exam-header mb-4">

        <div class="d-flex justify-content-between align-items-center flex-wrap">

            <div>

                <span class="header-badge">

                    <i class="bi bi-journal-richtext"></i>

                    Exam Details

                </span>

                <h2 class="mt-3 fw-bold">

                    {{ $exam->title }}

                </h2>

                <p class="mb-0">

                    Complete information about this examination.

                </p>

            </div>

            @if($exam->status=='Approved')

                <span class="status approved">

                    <i class="bi bi-check-circle-fill"></i>

                    Approved

                </span>

            @elseif($exam->status=='Pending')

                <span class="status pending">

                    <i class="bi bi-clock-history"></i>

                    Pending

                </span>

            @else

                <span class="status rejected">

                    <i class="bi bi-x-circle-fill"></i>

                    Rejected

                </span>

            @endif

        </div>

    </div>


    <!-- Information -->

    <div class="modern-card">

        <div class="card-title-box">

            <div class="icon-box">

                <i class="bi bi-info-circle-fill"></i>

            </div>

            <div>

                <h4 class="mb-1">

                    Examination Information

                </h4>

                <small>

                    Details of this examination

                </small>

            </div>

        </div>

        <div class="row mt-4">

            <div class="col-lg-4 col-md-6 mb-4">

                <div class="info-box">

                    <small>Teacher</small>

                    <h6>

                        {{ $exam->teacher->user->name ?? '-' }}

                    </h6>

                </div>

            </div>

            <div class="col-lg-4 col-md-6 mb-4">

                <div class="info-box">

                    <small>Class</small>

                    <h6>

                        {{ $exam->schoolClass->name ?? '-' }}

                    </h6>

                </div>

            </div>

            <div class="col-lg-4 col-md-6 mb-4">

                <div class="info-box">

                    <small>Subject</small>

                    <h6>

                        {{ $exam->subject->name ?? '-' }}

                    </h6>

                </div>

            </div>

            <div class="col-lg-3 col-md-6 mb-4">

                <div class="info-box">

                    <small>Total Marks</small>

                    <h5 class="text-primary">

                        {{ $exam->total_marks }}

                    </h5>

                </div>

            </div>

            <div class="col-lg-3 col-md-6 mb-4">

                <div class="info-box">

                    <small>Passing Marks</small>

                    <h5 class="text-success">

                        {{ $exam->passing_marks }}

                    </h5>

                </div>

            </div>

            <div class="col-lg-3 col-md-6 mb-4">

                <div class="info-box">

                    <small>Exam Date</small>

                    <h6>

                        {{ $exam->exam_date }}

                    </h6>

                </div>

            </div>

            <div class="col-lg-3 col-md-6 mb-4">

                <div class="info-box">

                    <small>Total Questions</small>

                    <h5>

                        {{ $exam->questions->count() }}

                    </h5>

                </div>

            </div>

            <div class="col-lg-6 mb-4">

                <div class="info-box">

                    <small>Start Time</small>

                    <h6>

                        {{ $exam->start_time }}

                    </h6>

                </div>

            </div>

            <div class="col-lg-6 mb-4">

                <div class="info-box">

                    <small>End Time</small>

                    <h6>

                        {{ $exam->end_time }}

                    </h6>

                </div>

            </div>

            <div class="col-12">

                <div class="description-box">

                    <h5>

                        <i class="bi bi-card-text me-2"></i>

                        Description

                    </h5>

                    <p class="mb-0">

                        {{ $exam->description }}

                    </p>

                </div>

            </div>

        </div>

    </div>


    <!-- Buttons -->

    <div class="d-flex justify-content-between flex-wrap mt-4 gap-3">

        <a href="{{ route('teacher.exams.index') }}"
           class="btn btn-secondary rounded-pill px-4">

            <i class="bi bi-arrow-left"></i>

            Back

        </a>

        <div>

            <a href="{{ route('teacher.exams.questions',$exam) }}"
               class="btn btn-success rounded-pill px-4">

                <i class="bi bi-list-check"></i>

                Questions

            </a>

            <a href="{{ route('teacher.exams.edit',$exam) }}"
               class="btn btn-warning rounded-pill px-4">

                <i class="bi bi-pencil-square"></i>

                Edit

            </a>

        </div>

    </div>

</div>


<style>

.exam-header{

background:linear-gradient(135deg,#111827,#2563eb);

padding:35px;

border-radius:24px;

color:white;

box-shadow:0 15px 35px rgba(37,99,235,.15);

}

.header-badge{

background:rgba(255,255,255,.15);

padding:8px 18px;

border-radius:50px;

display:inline-block;

font-size:14px;

}

.exam-header p{

color:rgba(255,255,255,.75);

}

.status{

padding:10px 20px;

border-radius:50px;

font-weight:600;

display:flex;

align-items:center;

gap:8px;

}

.approved{

background:#dcfce7;

color:#15803d;

}

.pending{

background:#fef3c7;

color:#b45309;

}

.rejected{

background:#fee2e2;

color:#dc2626;

}

.modern-card{

background:#fff;

border-radius:22px;

padding:30px;

box-shadow:0 15px 35px rgba(0,0,0,.08);

}

.card-title-box{

display:flex;

align-items:center;

gap:15px;

margin-bottom:20px;

}

.icon-box{

width:60px;

height:60px;

border-radius:16px;

background:linear-gradient(135deg,#2563eb,#60a5fa);

display:flex;

align-items:center;

justify-content:center;

color:white;

font-size:24px;

}

.info-box{

background:#f8fafc;

padding:20px;

border-radius:16px;

height:100%;

transition:.3s;

border:1px solid #edf2f7;

}

.info-box:hover{

transform:translateY(-4px);

box-shadow:0 10px 20px rgba(0,0,0,.08);

}

.info-box small{

color:#64748b;

display:block;

margin-bottom:8px;

font-weight:600;

}

.info-box h6,

.info-box h5{

margin:0;

font-weight:700;

}

.description-box{

background:#f8fafc;

padding:25px;

border-radius:18px;

border-left:5px solid #2563eb;

}

.description-box h5{

margin-bottom:15px;

font-weight:700;

}

.btn{

font-weight:600;

}

</style>

@endsection