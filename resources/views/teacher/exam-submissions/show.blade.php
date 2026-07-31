@extends('layouts.teacher')

@section('title','Student Answers')

@section('content')

<div class="container-fluid">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">

        <div>

            <span class="badge rounded-pill bg-primary px-3 py-2 mb-2">
                <i class="bi bi-journal-check me-1"></i>
                Teacher Panel
            </span>

            <h2 class="fw-bold mb-1">
                Student Exam Details
            </h2>

            <p class="text-muted mb-0">
                Review student's answers and publish the result.
            </p>

        </div>

    </div>

    <!-- Main Card -->
    <div class="card result-card shadow-lg border-0">

        <!-- Header -->
        <div class="result-header">

            <div class="d-flex align-items-center">

                <div class="header-icon">
                    <i class="bi bi-person-check-fill"></i>
                </div>

                <div>

                    <h4 class="mb-0 fw-bold">
                        Student Result Details
                    </h4>

                    <small>
                        Exam performance overview
                    </small>

                </div>

            </div>

        </div>

        <div class="card-body p-4">

            <!-- Summary -->
            <div class="row g-4 mb-4">

                <div class="col-lg-6">

                    <div class="info-card h-100">

                        <h5 class="mb-4">
                            <i class="bi bi-person-circle text-primary me-2"></i>
                            Student Information
                        </h5>

                        <div class="info-item">
                            <span>Name</span>
                            <strong>{{ $submission->student->name }}</strong>
                        </div>

                        <div class="info-item">
                            <span>Class</span>
                            <strong>{{ $submission->student->schoolClass->name ?? '-' }}</strong>
                        </div>

                        <div class="info-item">
                            <span>Section</span>
                            <strong>{{ $submission->student->section->name ?? '-' }}</strong>
                        </div>

                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="info-card h-100">

                        <h5 class="mb-4">
                            <i class="bi bi-file-earmark-text text-success me-2"></i>
                            Exam Information
                        </h5>

                        <div class="info-item">
                            <span>Exam</span>
                            <strong>{{ $submission->exam->title }}</strong>
                        </div>

                        <div class="info-item">
                            <span>Subject</span>
                            <strong>{{ $submission->exam->subject->name }}</strong>
                        </div>

                        <div class="info-item">
                            <span>Marks</span>

                            <span class="badge bg-primary rounded-pill px-3 py-2">

                                {{ $submission->obtained_marks }}
                                /
                                {{ $submission->total_marks }}

                            </span>

                        </div>

                        <div class="info-item">

                            <span>Result</span>

                            @if($submission->result=='Pass')

                                <span class="badge bg-success rounded-pill px-3 py-2">

                                    <i class="bi bi-check-circle-fill me-1"></i>

                                    Pass

                                </span>

                            @else

                                <span class="badge bg-danger rounded-pill px-3 py-2">

                                    <i class="bi bi-x-circle-fill me-1"></i>

                                    Fail

                                </span>

                            @endif

                        </div>

                    </div>

                </div>

            </div>

            <!-- Questions -->

            <h4 class="fw-bold mb-4">

                <i class="bi bi-patch-question-fill text-primary me-2"></i>

                Student Answers

            </h4>

            @foreach($submission->answers as $answer)

            <div class="answer-card mb-4">

                <div class="d-flex justify-content-between align-items-center flex-wrap mb-3">

                    <h5 class="mb-2">

                        <span class="badge bg-primary me-2">

                            Q{{ $loop->iteration }}

                        </span>

                        {{ $answer->question->question }}

                    </h5>

                    <span class="badge bg-dark">

                        {{ $answer->question->marks }} Marks

                    </span>

                </div>

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <div class="answer-box">

                            <small>Student Answer</small>

                            <h6 class="mb-0">

                                {{ strtoupper($answer->student_answer) }}

                            </h6>

                        </div>

                    </div>

                    <div class="col-md-6 mb-3">

                        <div class="answer-box success">

                            <small>Correct Answer</small>

                            <h6 class="mb-0">

                                {{ strtoupper($answer->question->correct_answer) }}

                            </h6>

                        </div>

                    </div>

                </div>

                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mt-3">

                    <div>

                        @if($answer->is_correct)

                            <span class="badge bg-success rounded-pill px-3 py-2">

                                <i class="bi bi-check-circle-fill me-1"></i>

                                Correct

                            </span>

                        @else

                            <span class="badge bg-danger rounded-pill px-3 py-2">

                                <i class="bi bi-x-circle-fill me-1"></i>

                                Wrong

                            </span>

                        @endif

                    </div>

                    <div>

                        <span class="badge bg-primary rounded-pill px-3 py-2">

                            {{ $answer->marks }}
                            /
                            {{ $answer->question->marks }} Marks

                        </span>

                    </div>

                </div>

            </div>

            @endforeach

            <!-- Publish -->

            <div class="text-end mt-4">

                @if($submission->status == 'Pending')

                <form action="{{ route('teacher.exam-submissions.publish',$submission) }}"
                      method="POST">

                    @csrf

                    <button class="btn btn-success btn-lg rounded-pill px-4">

                        <i class="bi bi-send-check-fill me-2"></i>

                        Publish Result

                    </button>

                </form>

                @else

                <span class="badge bg-success fs-6 rounded-pill px-4 py-3">

                    <i class="bi bi-check-circle-fill me-2"></i>

                    Result Published

                </span>

                @endif

            </div>

        </div>

    </div>

</div>

<style>

.result-card{
    border-radius:22px;
    overflow:hidden;
}

.result-header{
    background:linear-gradient(135deg,#111827,#2563eb);
    color:#fff;
    padding:25px;
}

.header-icon{
    width:60px;
    height:60px;
    border-radius:18px;
    background:rgba(255,255,255,.15);
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:28px;
    margin-right:18px;
}

.info-card{
    background:#fff;
    border:1px solid #eef2ff;
    border-radius:18px;
    padding:25px;
    box-shadow:0 10px 30px rgba(0,0,0,.05);
}

.info-item{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:14px 0;
    border-bottom:1px solid #edf2f7;
}

.info-item:last-child{
    border-bottom:none;
}

.info-item span:first-child{
    color:#64748b;
    font-weight:600;
}

.answer-card{
    background:#fff;
    border-radius:20px;
    padding:25px;
    box-shadow:0 12px 30px rgba(0,0,0,.06);
    border:1px solid #eef2ff;
    transition:.3s;
}

.answer-card:hover{
    transform:translateY(-3px);
}

.answer-box{
    background:#f8fafc;
    border-radius:14px;
    padding:16px;
}

.answer-box.success{
    background:#ecfdf5;
}

.answer-box small{
    color:#64748b;
    display:block;
    margin-bottom:8px;
}

</style>

@endsection