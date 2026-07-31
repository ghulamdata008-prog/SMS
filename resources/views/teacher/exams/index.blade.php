@extends('layouts.teacher')

@section('title','Exams')

@section('content')

<div class="container-fluid">

    <!-- Hero Header -->
    <div class="exam-header mb-4">

        <div class="d-flex justify-content-between align-items-center flex-wrap">

            <div>

                <span class="header-badge">
                    <i class="bi bi-journal-richtext me-2"></i>
                    Teacher Panel
                </span>

                <h2 class="mt-3 fw-bold">

                    My Exams

                </h2>

                <p class="mb-0">

                    Create, manage and monitor your examinations.

                </p>

            </div>

            <a href="{{ route('teacher.exams.create') }}"
               class="btn btn-light rounded-pill px-4">

                <i class="bi bi-plus-circle me-2"></i>

                Create Exam

            </a>

        </div>

    </div>

    <!-- Statistics -->

    <div class="row g-4 mb-4">

        <div class="col-lg-4">

            <div class="stats-card blue">

                <div>

                    <small>Total Exams</small>

                    <h2>

                        {{ $exams->count() }}

                    </h2>

                </div>

                <i class="bi bi-journal-text"></i>

            </div>

        </div>

        <div class="col-lg-4">

            <div class="stats-card green">

                <div>

                    <small>Approved</small>

                    <h2>

                        {{ $exams->where('status','Approved')->count() }}

                    </h2>

                </div>

                <i class="bi bi-check-circle-fill"></i>

            </div>

        </div>

        <div class="col-lg-4">

            <div class="stats-card orange">

                <div>

                    <small>Pending</small>

                    <h2>

                        {{ $exams->where('status','Pending')->count() }}

                    </h2>

                </div>

                <i class="bi bi-clock-history"></i>

            </div>

        </div>

    </div>

    <!-- Table Card -->

    <div class="modern-card">

        <div class="table-header">

            <div>

                <h4 class="mb-1">

                    <i class="bi bi-table me-2"></i>

                    Exam Records

                </h4>

                <small>

                    Manage all created examinations

                </small>

            </div>

            <span class="record-badge">

                {{ $exams->count() }} Records

            </span>

        </div>

        <div class="table-responsive">

            <table class="table modern-table align-middle mb-0">

                <thead>

                <tr>

                    <th>#</th>

                    <th>Exam</th>

                    <th>Class</th>

                    <th>Subject</th>

                    <th>Date</th>

                    <th>Total Marks</th>

                    <th>Status</th>

                    <th width="260">

                        Action

                    </th>

                </tr>

                </thead>

                <tbody>

                @forelse($exams as $exam)

                <tr>

                    <td>

                        <span class="number-box">

                            {{ $loop->iteration }}

                        </span>

                    </td>

                    <td>

                        <strong>

                            {{ $exam->title }}

                        </strong>

                    </td>

                    <td>

                        {{ $exam->schoolClass->name }}

                    </td>

                    <td>

                        {{ $exam->subject->name }}

                    </td>

                    <td>

                        <span class="date-badge">

                            {{ $exam->exam_date }}

                        </span>

                    </td>

                    <td>

                        <span class="marks-badge">

                            {{ $exam->total_marks }}

                        </span>

                    </td>

                    <td>

                        @if($exam->status=='Approved')

                            <span class="status success">

                                Approved

                            </span>

                        @elseif($exam->status=='Pending')

                            <span class="status pending">

                                Pending

                            </span>

                        @else

                            <span class="status danger">

                                Rejected

                            </span>

                        @endif

                    </td>

                    <td>

                        <div class="d-flex gap-2 flex-wrap">

                            <a href="{{ route('teacher.exams.show',$exam) }}"
                               class="btn btn-view">

                                <i class="bi bi-eye"></i>

                            </a>

                            <a href="{{ route('teacher.exams.edit',$exam) }}"
                               class="btn btn-edit">

                                <i class="bi bi-pencil"></i>

                            </a>

                            <a href="{{ route('teacher.exams.questions',$exam) }}"
                               class="btn btn-question">

                                <i class="bi bi-question-circle"></i>

                            </a>

                            <form action="{{ route('teacher.exams.destroy',$exam) }}"
                                  method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this exam?');">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-delete">

                                    <i class="bi bi-trash"></i>

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="8">

                        <div class="empty-box">

                            <i class="bi bi-journal-x"></i>

                            <h5>

                                No Exams Found

                            </h5>

                            <p>

                                Create your first examination.

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

.exam-header{

background:linear-gradient(135deg,#111827,#2563eb);

padding:35px;

border-radius:25px;

color:white;

box-shadow:0 15px 35px rgba(37,99,235,.18);

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

.stats-card{

padding:28px;

border-radius:22px;

color:white;

display:flex;

justify-content:space-between;

align-items:center;

box-shadow:0 15px 35px rgba(0,0,0,.08);

transition:.3s;

}

.stats-card:hover{

transform:translateY(-5px);

}

.stats-card h2{

font-size:34px;

font-weight:700;

margin-top:8px;

}

.stats-card i{

font-size:48px;

opacity:.25;

}

.blue{

background:linear-gradient(135deg,#2563eb,#3b82f6);

}

.green{

background:linear-gradient(135deg,#059669,#10b981);

}

.orange{

background:linear-gradient(135deg,#ea580c,#f97316);

}

.modern-card{

background:white;

border-radius:22px;

overflow:hidden;

box-shadow:0 15px 35px rgba(0,0,0,.08);

}

.table-header{

padding:25px;

display:flex;

justify-content:space-between;

align-items:center;

background:#f8fafc;

border-bottom:1px solid #e5e7eb;

}

.record-badge{

background:#2563eb;

color:white;

padding:8px 18px;

border-radius:40px;

}

.modern-table thead{

background:#f8fafc;

}

.modern-table th{

padding:18px;

font-size:13px;

text-transform:uppercase;

color:#64748b;

}

.modern-table td{

padding:18px;

}

.modern-table tbody tr{

transition:.3s;

}

.modern-table tbody tr:hover{

background:#f8fafc;

}

.number-box{

width:35px;

height:35px;

border-radius:12px;

background:#dbeafe;

display:flex;

align-items:center;

justify-content:center;

font-weight:700;

color:#2563eb;

}

.date-badge{

background:#eef2ff;

color:#4f46e5;

padding:8px 15px;

border-radius:50px;

font-weight:600;

}

.marks-badge{

background:#dcfce7;

color:#15803d;

padding:8px 15px;

border-radius:50px;

font-weight:700;

}

.status{

padding:8px 15px;

border-radius:50px;

font-weight:600;

display:inline-block;

}

.success{

background:#dcfce7;

color:#15803d;

}

.pending{

background:#fef3c7;

color:#b45309;

}

.danger{

background:#fee2e2;

color:#dc2626;

}

.btn-view,
.btn-edit,
.btn-question,
.btn-delete{

width:38px;

height:38px;

border:none;

border-radius:10px;

display:flex;

align-items:center;

justify-content:center;

color:white;

}

.btn-view{

background:#2563eb;

}

.btn-edit{

background:#f59e0b;

}

.btn-question{

background:#10b981;

}

.btn-delete{

background:#ef4444;

}

.empty-box{

padding:60px;

text-align:center;

color:#64748b;

}

.empty-box i{

font-size:60px;

margin-bottom:15px;

}

</style>

@endsection