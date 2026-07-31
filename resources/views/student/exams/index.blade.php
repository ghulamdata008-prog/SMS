@extends('layouts.student')

@section('title','Available Exams')

@section('content')

<div class="container-fluid">

    @if(session('success'))

        <div class="alert alert-success shadow-sm rounded-4">

            {{ session('success') }}

        </div>

    @endif

    <!-- Header -->

    <div class="exam-header mb-4">

        <div>

            <span class="header-badge">

                <i class="bi bi-mortarboard-fill"></i>

                Student Portal

            </span>

            <h2 class="fw-bold mt-3">

                Available Exams

            </h2>

            <p>

                View all approved exams assigned to your class.

            </p>

        </div>

        <div class="header-icon">

            <i class="bi bi-journal-check"></i>

        </div>

    </div>

    <div class="row">

        @forelse($exams as $exam)

        <div class="col-xl-4 col-lg-6 mb-4">

            <div class="exam-card h-100">

                <div class="exam-top">

                    <div class="exam-icon">

                        <i class="bi bi-file-earmark-text-fill"></i>

                    </div>

                    <span class="subject-badge">

                        {{ $exam->subject->name }}

                    </span>

                </div>

                <h4 class="exam-title">

                    {{ $exam->title }}

                </h4>

                <div class="exam-info">

                    <div class="info-row">

                        <span>

                            <i class="bi bi-calendar-event"></i>

                            Date

                        </span>

                        <strong>

                            {{ $exam->exam_date }}

                        </strong>

                    </div>

                    <div class="info-row">

                        <span>

                            <i class="bi bi-award"></i>

                            Total Marks

                        </span>

                        <strong>

                            {{ $exam->total_marks }}

                        </strong>

                    </div>

                    <div class="info-row">

                        <span>

                            <i class="bi bi-check-circle"></i>

                            Passing Marks

                        </span>

                        <strong>

                            {{ $exam->passing_marks }}

                        </strong>

                    </div>

                </div>

                @if(in_array($exam->id,$submittedExamIds))

                    <button class="btn btn-success w-100 rounded-pill mt-4" disabled>

                        <i class="bi bi-check-circle-fill me-2"></i>

                        Already Submitted

                    </button>

                @else

                    <a href="{{ route('student.exams.show',$exam) }}"
                       class="btn btn-primary w-100 rounded-pill mt-4">

                        <i class="bi bi-play-circle-fill me-2"></i>

                        Start Exam

                    </a>

                @endif

            </div>

        </div>

        @empty

        <div class="col-12">

            <div class="empty-state">

                <i class="bi bi-journal-x"></i>

                <h4>

                    No Approved Exams Available

                </h4>

                <p>

                    Exams assigned by your teachers will appear here.

                </p>

            </div>

        </div>

        @endforelse

    </div>

</div>

<style>

.exam-header{

    background:linear-gradient(135deg,#111827,#2563eb);

    border-radius:24px;

    padding:35px;

    color:#fff;

    display:flex;

    justify-content:space-between;

    align-items:center;

    margin-bottom:30px;

}

.header-badge{

    background:rgba(255,255,255,.15);

    padding:8px 18px;

    border-radius:30px;

    display:inline-block;

    font-size:13px;

}

.exam-header p{

    color:rgba(255,255,255,.8);

    margin-top:10px;

}

.header-icon{

    width:90px;

    height:90px;

    border-radius:22px;

    background:rgba(255,255,255,.15);

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:42px;

}

.exam-card{

    background:#fff;

    border-radius:22px;

    padding:25px;

    box-shadow:0 15px 40px rgba(0,0,0,.08);

    transition:.35s;

    border:1px solid #eef2ff;

}

.exam-card:hover{

    transform:translateY(-8px);

}

.exam-top{

    display:flex;

    justify-content:space-between;

    align-items:center;

    margin-bottom:20px;

}

.exam-icon{

    width:60px;

    height:60px;

    border-radius:18px;

    background:linear-gradient(135deg,#2563eb,#60a5fa);

    color:#fff;

    display:flex;

    justify-content:center;

    align-items:center;

    font-size:28px;

}

.subject-badge{

    background:#dbeafe;

    color:#1d4ed8;

    padding:8px 15px;

    border-radius:30px;

    font-weight:600;

}

.exam-title{

    font-weight:700;

    margin-bottom:20px;

    color:#111827;

}

.exam-info{

    display:flex;

    flex-direction:column;

    gap:15px;

}

.info-row{

    display:flex;

    justify-content:space-between;

    align-items:center;

    border-bottom:1px solid #f1f5f9;

    padding-bottom:12px;

}

.info-row:last-child{

    border:none;

}

.info-row span{

    color:#64748b;

}

.info-row i{

    color:#2563eb;

    margin-right:6px;

}

.btn-primary{

    background:#2563eb;

    border:none;

}

.btn-primary:hover{

    background:#1d4ed8;

}

.empty-state{

    background:#fff;

    border-radius:24px;

    padding:80px 30px;

    text-align:center;

    box-shadow:0 15px 40px rgba(0,0,0,.08);

}

.empty-state i{

    font-size:70px;

    color:#94a3b8;

    margin-bottom:20px;

}

.empty-state p{

    color:#64748b;

}

@media(max-width:768px){

.exam-header{

flex-direction:column;

text-align:center;

gap:20px;

}

}

</style>

@endsection