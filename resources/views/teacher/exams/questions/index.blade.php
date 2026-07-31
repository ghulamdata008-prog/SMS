@extends('layouts.teacher')

@section('title','Exam Questions')

@section('content')

<div class="container-fluid">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-4 shadow-sm border-0">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Header -->

    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

        <div>

            <span class="page-badge">

                <i class="bi bi-patch-question-fill"></i>

                Exam Questions

            </span>

            <h2 class="fw-bold mt-3 mb-1">

                {{ $exam->title }}

            </h2>

            <p class="text-muted mb-0">

                Total Questions :
                <strong>{{ $questions->count() }}</strong>

            </p>

        </div>

        <a href="{{ route('teacher.exams.questions.create',$exam) }}"
           class="btn btn-primary rounded-pill px-4">

            <i class="bi bi-plus-circle me-1"></i>

            Add Question

        </a>

    </div>

    <!-- Card -->

    <div class="questions-card">

        <div class="questions-header">

            <div class="header-icon">

                <i class="bi bi-journal-text"></i>

            </div>

            <div>

                <h5 class="mb-0">

                    Question Bank

                </h5>

                <small>

                    Manage all exam questions

                </small>

            </div>

        </div>

        <div class="table-responsive">

            <table class="table questions-table align-middle mb-0">

                <thead>

                <tr>

                    <th>#</th>

                    <th>Question</th>

                    <th>Marks</th>

                    <th>Correct Answer</th>

                    <th width="150">

                        Action

                    </th>

                </tr>

                </thead>

                <tbody>

                @forelse($questions as $question)

                <tr>

                    <td>

                        <span class="id-badge">

                            {{ $loop->iteration }}

                        </span>

                    </td>

                    <td>

                        <div class="question-box">

                            <div class="question-icon">

                                <i class="bi bi-question-lg"></i>

                            </div>

                            <span>

                                {{ $question->question }}

                            </span>

                        </div>

                    </td>

                    <td>

                        <span class="marks-badge">

                            {{ $question->marks }} Marks

                        </span>

                    </td>

                    <td>

                        <span class="answer-badge">

                            {{ $question->correct_answer }}

                        </span>

                    </td>

                    <td>

                        <form action="{{ route('teacher.questions.destroy',$question) }}"
                              method="POST"
                              class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button
                                onclick="return confirm('Delete this Question?')"
                                class="btn btn-delete btn-sm">

                                <i class="bi bi-trash"></i>

                                Delete

                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5">

                        <div class="empty-state">

                            <i class="bi bi-journal-x"></i>

                            <h5>

                                No Questions Added

                            </h5>

                            <p>

                                Questions will appear here after adding them.

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

.page-badge{
    display:inline-flex;
    align-items:center;
    gap:8px;
    background:#e0e7ff;
    color:#4338ca;
    padding:8px 18px;
    border-radius:30px;
    font-weight:600;
    font-size:13px;
}

.questions-card{
    background:#fff;
    border-radius:22px;
    overflow:hidden;
    box-shadow:0 20px 40px rgba(15,23,42,.08);
}

.questions-header{
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
    justify-content:center;
    align-items:center;
    font-size:24px;
}

.questions-table thead th{
    background:#f8fafc;
    color:#64748b;
    font-size:13px;
    text-transform:uppercase;
    font-weight:700;
    padding:18px;
    border-bottom:1px solid #e5e7eb;
}

.questions-table tbody td{
    padding:18px;
    vertical-align:middle;
}

.questions-table tbody tr{
    transition:.3s;
}

.questions-table tbody tr:hover{
    background:#f8fafc;
}

.id-badge{
    background:#e0e7ff;
    color:#4338ca;
    padding:7px 12px;
    border-radius:20px;
    font-weight:700;
}

.question-box{
    display:flex;
    align-items:center;
    gap:12px;
}

.question-icon{
    width:42px;
    height:42px;
    border-radius:50%;
    background:linear-gradient(135deg,#2563eb,#60a5fa);
    color:#fff;
    display:flex;
    justify-content:center;
    align-items:center;
}

.question-box span{
    font-weight:600;
}

.marks-badge{
    background:#dbeafe;
    color:#1d4ed8;
    padding:8px 15px;
    border-radius:25px;
    font-weight:700;
}

.answer-badge{
    background:#dcfce7;
    color:#15803d;
    padding:8px 15px;
    border-radius:25px;
    font-weight:700;
}

.btn-delete{
    background:#ef4444;
    color:#fff;
    border:none;
    border-radius:10px;
    padding:8px 14px;
    font-weight:600;
}

.btn-delete:hover{
    background:#dc2626;
    color:#fff;
}

.empty-state{
    text-align:center;
    padding:60px 20px;
    color:#64748b;
}

.empty-state i{
    font-size:60px;
    color:#94a3b8;
    margin-bottom:15px;
}

@media(max-width:768px){

    .questions-header{
        flex-direction:column;
        text-align:center;
    }

    .questions-table th,
    .questions-table td{
        white-space:nowrap;
    }

}

</style>

@endsection