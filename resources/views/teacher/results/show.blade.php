@extends('layouts.teacher')

@section('title','Result Details')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="result-header mb-4">

        <div class="d-flex justify-content-between align-items-center flex-wrap">

            <div>

                <span class="page-badge">
                    <i class="bi bi-award-fill"></i>
                    Result Details
                </span>

                <h2 class="fw-bold mt-3 mb-1">
                    Student Exam Result
                </h2>

                <p class="text-white-50 mb-0">
                    Complete result and answer sheet.
                </p>

            </div>

            <a href="{{ route('teacher.results.index') }}"
               class="btn btn-light rounded-pill px-4">
                <i class="bi bi-arrow-left"></i>
                Back
            </a>

        </div>

    </div>


    <!-- Info Cards -->

    <div class="row mb-4">

        <div class="col-lg-6 mb-4">

            <div class="modern-card h-100">

                <div class="card-title-box">

                    <div class="icon-box blue">
                        <i class="bi bi-person-fill"></i>
                    </div>

                    <div>
                        <h5 class="fw-bold mb-0">
                            Student Information
                        </h5>

                        <small class="text-muted">
                            Student Details
                        </small>
                    </div>

                </div>

                <table class="table table-borderless mt-4 mb-0">

                    <tr>
                        <th>Name</th>
                        <td>{{ $submission->student->name ?? 'Deleted Student' }}</td>
                    </tr>

                    <tr>
                        <th>Roll No</th>
                        <td>{{ $submission->student->roll_no ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Class</th>
                        <td>{{ $submission->student->schoolClass->name ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Section</th>
                        <td>{{ $submission->student->section->name ?? '-' }}</td>
                    </tr>

                </table>

            </div>

        </div>


        <div class="col-lg-6 mb-4">

            <div class="modern-card h-100">

                <div class="card-title-box">

                    <div class="icon-box green">
                        <i class="bi bi-journal-check"></i>
                    </div>

                    <div>

                        <h5 class="fw-bold mb-0">
                            Exam Information
                        </h5>

                        <small class="text-muted">
                            Exam Summary
                        </small>

                    </div>

                </div>

                <table class="table table-borderless mt-4 mb-0">

                    <tr>
                        <th>Exam</th>
                        <td>{{ $submission->exam->title }}</td>
                    </tr>

                    <tr>
                        <th>Subject</th>
                        <td>{{ $submission->exam->subject->name ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Total Marks</th>
                        <td>

                            <span class="badge bg-primary rounded-pill px-3 py-2">
                                {{ $submission->total_marks }}
                            </span>

                        </td>
                    </tr>

                    <tr>
                        <th>Obtained</th>
                        <td>

                            <span class="badge bg-success rounded-pill px-3 py-2">
                                {{ $submission->obtained_marks }}
                            </span>

                        </td>
                    </tr>

                    <tr>
                        <th>Result</th>

                        <td>

                            @if($submission->result=='Pass')

                                <span class="badge bg-success rounded-pill px-3 py-2">

                                    <i class="bi bi-check-circle-fill"></i>

                                    Pass

                                </span>

                            @else

                                <span class="badge bg-danger rounded-pill px-3 py-2">

                                    <i class="bi bi-x-circle-fill"></i>

                                    Fail

                                </span>

                            @endif

                        </td>

                    </tr>

                </table>

            </div>

        </div>

    </div>


    <!-- Answers -->

    <div class="modern-card">

        <div class="answers-header">

            <div>

                <h4 class="fw-bold mb-0">

                    <i class="bi bi-question-circle-fill me-2"></i>

                    Student Answers

                </h4>

            </div>

            <span class="badge bg-primary rounded-pill px-4 py-2">

                {{ $submission->answers->count() }} Questions

            </span>

        </div>

        <div class="card-body p-4">

            @foreach($submission->answers as $answer)

            <div class="answer-card">

                <div class="d-flex justify-content-between align-items-center flex-wrap">

                    <h5 class="fw-bold">

                        Q{{ $loop->iteration }}

                    </h5>

                    @if($answer->is_correct)

                        <span class="badge bg-success rounded-pill px-3 py-2">

                            <i class="bi bi-check-circle-fill"></i>

                            Correct

                        </span>

                    @else

                        <span class="badge bg-danger rounded-pill px-3 py-2">

                            <i class="bi bi-x-circle-fill"></i>

                            Wrong

                        </span>

                    @endif

                </div>

                <hr>

                <h6 class="fw-bold">

                    {{ $answer->question->question }}

                </h6>

                <div class="row mt-4">

                    <div class="col-md-4 mb-3">

                        <div class="info-box">

                            <small>Student Answer</small>

                            <h6>

                                {{ strtoupper($answer->student_answer) }}

                            </h6>

                        </div>

                    </div>

                    <div class="col-md-4 mb-3">

                        <div class="info-box">

                            <small>Correct Answer</small>

                            <h6>

                                {{ strtoupper($answer->question->correct_answer) }}

                            </h6>

                        </div>

                    </div>

                    <div class="col-md-4 mb-3">

                        <div class="info-box">

                            <small>Marks</small>

                            <h6>

                                {{ $answer->marks }}

                                /

                                {{ $answer->question->marks }}

                            </h6>

                        </div>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</div>


<style>

.result-header{

background:linear-gradient(135deg,#111827,#2563eb);

padding:35px;

border-radius:24px;

color:white;

box-shadow:0 15px 40px rgba(37,99,235,.18);

}

.page-badge{

background:rgba(255,255,255,.15);

padding:8px 18px;

border-radius:40px;

display:inline-block;

font-size:14px;

}

.modern-card{

background:#fff;

border-radius:22px;

box-shadow:0 12px 35px rgba(15,23,42,.08);

padding:25px;

border:none;

}

.card-title-box{

display:flex;

align-items:center;

gap:15px;

}

.icon-box{

width:55px;

height:55px;

border-radius:16px;

display:flex;

align-items:center;

justify-content:center;

color:white;

font-size:24px;

}

.blue{

background:linear-gradient(135deg,#2563eb,#60a5fa);

}

.green{

background:linear-gradient(135deg,#10b981,#34d399);

}

.answers-header{

display:flex;

justify-content:space-between;

align-items:center;

padding-bottom:20px;

border-bottom:1px solid #e5e7eb;

}

.answer-card{

background:#f8fafc;

border-radius:18px;

padding:25px;

margin-bottom:20px;

transition:.3s;

border:1px solid #edf2f7;

}

.answer-card:hover{

transform:translateY(-4px);

box-shadow:0 12px 25px rgba(0,0,0,.08);

}

.info-box{

background:white;

border-radius:14px;

padding:18px;

text-align:center;

box-shadow:0 5px 12px rgba(0,0,0,.05);

}

.info-box small{

color:#64748b;

display:block;

margin-bottom:8px;

}

.table th{

width:140px;

color:#64748b;

font-weight:600;

}

.table td{

font-weight:600;

}

</style>

@endsection