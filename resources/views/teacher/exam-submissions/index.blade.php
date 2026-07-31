@extends('layouts.teacher')

@section('title','Exam Submissions')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">

        <div>
            <span class="badge rounded-pill bg-primary px-3 py-2 mb-2">
                <i class="bi bi-file-earmark-check me-1"></i>
                Teacher Panel
            </span>

            <h2 class="fw-bold mb-1">
                Student Exam Submissions
            </h2>

            <p class="text-muted mb-0">
                View all submitted exams from your students.
            </p>
        </div>

    </div>

    <div class="card submission-card border-0 shadow-lg">

        <div class="submission-header">

            <div class="d-flex align-items-center">

                <div class="header-icon">
                    <i class="bi bi-journal-check"></i>
                </div>

                <div>

                    <h5 class="mb-0 fw-bold">
                        Submitted Exams
                    </h5>

                    <small>
                        Student submission records
                    </small>

                </div>

            </div>

        </div>

        <div class="card-body p-0">

            @if($submissions->count())

            <div class="table-responsive">

                <table class="table submission-table align-middle mb-0">

                    <thead>

                    <tr>

                        <th>#</th>
                        <th>Student</th>
                        <th>Class</th>
                        <th>Section</th>
                        <th>Exam</th>
                        <th>Subject</th>
                        <th>Submitted</th>
                        <th>Action</th>

                    </tr>

                    </thead>

                    <tbody>

                    @foreach($submissions as $submission)

                    <tr>

                        <td>
                            <span class="id-badge">
                                {{ $loop->iteration }}
                            </span>
                        </td>

                        <td>

                            <div class="student-box">

                                <div class="student-avatar">

                                    {{ strtoupper(substr($submission->student->name,0,1)) }}

                                </div>

                                <span>

                                    {{ $submission->student->name }}

                                </span>

                            </div>

                        </td>

                        <td>

                            <span class="class-badge">

                                {{ $submission->student->schoolClass->name ?? '-' }}

                            </span>

                        </td>

                        <td>

                            <span class="section-badge">

                                {{ $submission->student->section->name ?? '-' }}

                            </span>

                        </td>

                        <td>

                            <span class="exam-badge">

                                {{ $submission->exam->title }}

                            </span>

                        </td>

                        <td>

                            {{ $submission->exam->subject->name }}

                        </td>

                        <td>

                            <span class="date-badge">

                                {{ $submission->submitted_at }}

                            </span>

                        </td>

                        <td>

                            <a href="{{ route('teacher.exam-submissions.show',$submission->id) }}"
                               class="btn btn-view btn-sm">

                                <i class="bi bi-eye"></i>

                                View Answers

                            </a>

                        </td>

                    </tr>

                    @endforeach

                    </tbody>

                </table>

            </div>

            @else

            <div class="empty-state">

                <i class="bi bi-journal-x"></i>

                <h4>

                    No Submission Found

                </h4>

                <p>

                    Students have not submitted any exams yet.

                </p>

            </div>

            @endif

        </div>

    </div>

</div>

<style>

.submission-card{
    border-radius:22px;
    overflow:hidden;
}

.submission-header{
    background:linear-gradient(135deg,#111827,#2563eb);
    color:#fff;
    padding:22px;
}

.header-icon{
    width:58px;
    height:58px;
    border-radius:16px;
    background:rgba(255,255,255,.15);
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:24px;
    margin-right:15px;
}

.submission-table thead{
    background:#f8fafc;
}

.submission-table th{
    padding:18px;
    color:#64748b;
    text-transform:uppercase;
    font-size:13px;
    font-weight:700;
    border-bottom:1px solid #e5e7eb;
}

.submission-table td{
    padding:18px;
    vertical-align:middle;
}

.submission-table tbody tr{
    transition:.3s;
}

.submission-table tbody tr:hover{
    background:#f8fafc;
}

.id-badge{
    background:#e0e7ff;
    color:#4338ca;
    padding:7px 13px;
    border-radius:20px;
    font-weight:700;
}

.student-box{
    display:flex;
    align-items:center;
    gap:12px;
}

.student-avatar{
    width:42px;
    height:42px;
    border-radius:50%;
    background:linear-gradient(135deg,#2563eb,#60a5fa);
    color:#fff;
    display:flex;
    align-items:center;
    justify-content:center;
    font-weight:700;
}

.student-box span{
    font-weight:600;
}

.class-badge{
    background:#ede9fe;
    color:#6d28d9;
    padding:7px 14px;
    border-radius:20px;
    font-weight:600;
}

.section-badge{
    background:#ecfccb;
    color:#4d7c0f;
    padding:7px 14px;
    border-radius:20px;
    font-weight:600;
}

.exam-badge{
    background:#dbeafe;
    color:#1d4ed8;
    padding:7px 14px;
    border-radius:20px;
    font-weight:600;
}

.date-badge{
    color:#64748b;
    font-weight:600;
}

.btn-view{
    background:#2563eb;
    color:#fff;
    border-radius:10px;
    padding:8px 16px;
    font-weight:600;
}

.btn-view:hover{
    background:#1d4ed8;
    color:#fff;
}

.empty-state{
    padding:70px 20px;
    text-align:center;
    color:#64748b;
}

.empty-state i{
    font-size:60px;
    color:#cbd5e1;
    margin-bottom:20px;
}

</style>

@endsection