@extends('layouts.teacher')

@section('title','Results')

@section('content')

<div class="container-fluid">

    <!-- Header -->

    <div class="page-header mb-4">

        <div>

            <span class="page-badge">
                <i class="bi bi-award-fill"></i>
                Teacher Panel
            </span>

            <h2 class="fw-bold mt-3">
                Published Results
            </h2>

            <p class="mb-0">
                Search and manage published student results.
            </p>

        </div>

        <div class="header-icon">
            <i class="bi bi-bar-chart-fill"></i>
        </div>

    </div>

    <!-- Search Card -->

    <div class="result-card mb-4">

        <div class="card-header-custom">

            <div class="header-title">

                <div class="card-icon">
                    <i class="bi bi-search"></i>
                </div>

                <div>

                    <h5 class="mb-0">
                        Search Filters
                    </h5>

                    <small>
                        Find student results quickly
                    </small>

                </div>

            </div>

        </div>

        <div class="card-body p-4">

            <form method="GET"
                  action="{{ route('teacher.results.index') }}">

                <div class="row g-3">

                    <div class="col-md-3">

                        <label class="form-label">
                            Student Name
                        </label>

                        <input
                            type="text"
                            name="student_name"
                            value="{{ request('student_name') }}"
                            class="form-control modern-input"
                            placeholder="Enter Student Name">

                    </div>

                    <div class="col-md-2">

                        <label class="form-label">
                            Roll No
                        </label>

                        <input
                            type="text"
                            name="roll_no"
                            value="{{ request('roll_no') }}"
                            class="form-control modern-input"
                            placeholder="Roll No">

                    </div>

                    <div class="col-md-2">

                        <label class="form-label">
                            Class
                        </label>

                        <select
                            name="class_id"
                            class="form-select modern-input">

                            <option value="">
                                All Classes
                            </option>

                            @foreach($classes as $class)

                                <option
                                    value="{{ $class->id }}"
                                    @selected(request('class_id')==$class->id)>

                                    {{ $class->name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-2">

                        <label class="form-label">
                            Section
                        </label>

                        <select
                            name="section_id"
                            class="form-select modern-input">

                            <option value="">
                                All Sections
                            </option>

                            @foreach($sections as $section)

                                <option
                                    value="{{ $section->id }}"
                                    @selected(request('section_id')==$section->id)>

                                    {{ $section->name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-3 d-flex align-items-end">

                        <button class="btn btn-search me-2">

                            <i class="bi bi-search"></i>

                            Search

                        </button>

                        <a href="{{ route('teacher.results.index') }}"
                           class="btn btn-reset">

                            <i class="bi bi-arrow-clockwise"></i>

                            Reset

                        </a>

                    </div>

                </div>

            </form>

        </div>

    </div>

    <!-- Results Table -->

    <div class="result-card">

        <div class="card-header-custom">

            <div class="header-title">

                <div class="card-icon">

                    <i class="bi bi-table"></i>

                </div>

                <div>

                    <h5 class="mb-0">
                        Published Results
                    </h5>

                    <small>
                        Student examination records
                    </small>

                </div>

            </div>

        </div>

        <div class="table-responsive">

            <table class="table modern-table align-middle mb-0">

                <thead>

                <tr>

                    <th>Student</th>

                    <th>Roll No</th>

                    <th>Class</th>

                    <th>Section</th>

                    <th>Exam</th>

                    <th>Subject</th>

                    <th>Marks</th>

                    <th>Result</th>

                    <th>Action</th>

                </tr>

                </thead>

                <tbody>

                @forelse($results as $result)

                    <tr>

                        <td>

                            <div class="student-box">

                                <div class="student-avatar">

                                    {{ strtoupper(substr($result->student->name ?? 'D',0,1)) }}

                                </div>

                                <span>

                                    {{ $result->student->name ?? 'Deleted Student' }}

                                </span>

                            </div>

                        </td>

                        <td>

                            <span class="roll-badge">

                                {{ $result->student->roll_no ?? '-' }}

                            </span>

                        </td>

                        <td>

                            {{ $result->student->schoolClass->name ?? '-' }}

                        </td>

                        <td>

                            {{ $result->student->section->name ?? '-' }}

                        </td>

                        <td>

                            {{ $result->exam->title ?? '-' }}

                        </td>

                        <td>

                            {{ $result->exam->subject->name ?? '-' }}

                        </td>

                        <td>

                            <span class="marks-badge">

                                {{ $result->obtained_marks }}

                                /

                                {{ $result->total_marks }}

                            </span>

                        </td>

                        <td>

                            @if($result->result=='Pass')

                                <span class="badge bg-success rounded-pill px-3">

                                    Pass

                                </span>

                            @else

                                <span class="badge bg-danger rounded-pill px-3">

                                    Fail

                                </span>

                            @endif

                        </td>

                        <td>

                            <a href="{{ route('teacher.results.show',$result) }}"
                               class="btn btn-view btn-sm">

                                <i class="bi bi-eye"></i>

                                View

                            </a>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="9">

                            <div class="empty-state">

                                <i class="bi bi-clipboard-x"></i>

                                <h5>

                                    No Results Found

                                </h5>

                                <p>

                                    Published results will appear here.

                                </p>

                            </div>

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="card-footer bg-white border-0">

            {{ $results->links() }}

        </div>

    </div>

</div>

<style>

.page-header{
background:linear-gradient(135deg,#111827,#2563eb);
border-radius:22px;
padding:30px;
display:flex;
justify-content:space-between;
align-items:center;
color:white;
}

.page-header p{
color:rgba(255,255,255,.8);
}

.page-badge{
background:rgba(255,255,255,.15);
padding:8px 16px;
border-radius:30px;
font-size:13px;
}

.header-icon{
width:80px;
height:80px;
border-radius:20px;
background:rgba(255,255,255,.15);
display:flex;
align-items:center;
justify-content:center;
font-size:35px;
}

.result-card{
background:white;
border-radius:22px;
overflow:hidden;
box-shadow:0 15px 35px rgba(0,0,0,.08);
}

.card-header-custom{
padding:22px;
background:#f8fafc;
border-bottom:1px solid #e5e7eb;
}

.header-title{
display:flex;
align-items:center;
gap:15px;
}

.card-icon{
width:50px;
height:50px;
border-radius:15px;
background:linear-gradient(135deg,#2563eb,#3b82f6);
color:white;
display:flex;
align-items:center;
justify-content:center;
font-size:22px;
}

.modern-input{
border-radius:12px;
padding:10px 15px;
}

.btn-search{
background:#2563eb;
color:white;
border-radius:10px;
padding:10px 20px;
}

.btn-search:hover{
background:#1d4ed8;
color:white;
}

.btn-reset{
background:#6b7280;
color:white;
border-radius:10px;
padding:10px 20px;
}

.btn-reset:hover{
background:#4b5563;
color:white;
}

.modern-table thead th{
background:#f8fafc;
padding:18px;
font-size:13px;
text-transform:uppercase;
color:#64748b;
}

.modern-table td{
padding:18px;
vertical-align:middle;
}

.modern-table tbody tr:hover{
background:#f9fafb;
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
display:flex;
align-items:center;
justify-content:center;
color:white;
font-weight:700;
}

.roll-badge{
background:#e0e7ff;
color:#4338ca;
padding:7px 14px;
border-radius:20px;
font-weight:600;
}

.marks-badge{
background:#dcfce7;
color:#15803d;
padding:7px 14px;
border-radius:20px;
font-weight:700;
}

.btn-view{
background:#2563eb;
color:white;
border-radius:10px;
}

.btn-view:hover{
background:#1d4ed8;
color:white;
}

.empty-state{
text-align:center;
padding:60px;
color:#64748b;
}

.empty-state i{
font-size:55px;
}

</style>

@endsection