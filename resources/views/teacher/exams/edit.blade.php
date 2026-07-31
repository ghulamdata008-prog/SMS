@extends('layouts.teacher')

@section('title','Edit Exam')

@section('content')

<div class="container-fluid">

    <!-- Page Header -->
    <div class="page-header mb-4">

        <div>

            <span class="page-badge">

                <i class="bi bi-pencil-square"></i>

                Teacher Panel

            </span>

            <h2 class="mt-3 fw-bold">

                Edit Exam

            </h2>

            <p>

                Update your examination information.

            </p>

        </div>

        <div class="header-icon">

            <i class="bi bi-journal-text"></i>

        </div>

    </div>

    <div class="row justify-content-center">

        <div class="col-lg-10">

            <div class="exam-card">

                <div class="exam-header">

                    <div class="header-left">

                        <div class="icon-box">

                            <i class="bi bi-pencil-square"></i>

                        </div>

                        <div>

                            <h4>

                                Edit Examination

                            </h4>

                            <small>

                                Modify exam details

                            </small>

                        </div>

                    </div>

                </div>

                <div class="card-body p-4">

                    @if($errors->any())

                    <div class="alert alert-danger">

                        <ul class="mb-0">

                            @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                    @endif

                    <form action="{{ route('teacher.exams.update',$exam) }}"
                          method="POST">

                        @csrf
                        @method('PUT')

                        <!-- Academic Information -->

                        <div class="form-section">

                            <h6>

                                <i class="bi bi-mortarboard-fill me-2"></i>

                                Academic Information

                            </h6>

                            <div class="row">

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">

                                        Exam Title

                                    </label>

                                    <input
                                        type="text"
                                        name="title"
                                        class="form-control"
                                        value="{{ old('title',$exam->title) }}"
                                        required>

                                </div>

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">

                                        Subject

                                    </label>

                                    <select
                                        name="subject_id"
                                        class="form-select"
                                        required>

                                        @foreach($subjects as $subject)

                                        <option
                                            value="{{ $subject->id }}"
                                            @selected($subject->id==$exam->subject_id)>

                                            {{ $subject->name }}

                                        </option>

                                        @endforeach

                                    </select>

                                </div>

                                <div class="col-md-6">

                                    <label class="form-label">

                                        Class

                                    </label>

                                    <select
                                        name="class_id"
                                        class="form-select"
                                        required>

                                        @foreach($classes as $class)

                                        <option
                                            value="{{ $class->id }}"
                                            @selected($class->id==$exam->class_id)>

                                            {{ $class->name }}

                                        </option>

                                        @endforeach

                                    </select>

                                </div>

                            </div>

                        </div>

                        <!-- Marks -->

                        <div class="form-section">

                            <h6>

                                <i class="bi bi-award-fill me-2"></i>

                                Marks

                            </h6>

                            <div class="row">

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">

                                        Total Marks

                                    </label>

                                    <input
                                        type="number"
                                        name="total_marks"
                                        class="form-control"
                                        value="{{ old('total_marks',$exam->total_marks) }}"
                                        required>

                                </div>

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">

                                        Passing Marks

                                    </label>

                                    <input
                                        type="number"
                                        name="passing_marks"
                                        class="form-control"
                                        value="{{ old('passing_marks',$exam->passing_marks) }}"
                                        required>

                                </div>

                            </div>

                        </div>

                        <!-- Schedule -->

                        <div class="form-section">

                            <h6>

                                <i class="bi bi-calendar-event-fill me-2"></i>

                                Schedule

                            </h6>

                            <div class="row">

                                <div class="col-md-4 mb-3">

                                    <label class="form-label">

                                        Exam Date

                                    </label>

                                    <input
                                        type="date"
                                        name="exam_date"
                                        class="form-control"
                                        value="{{ old('exam_date',$exam->exam_date) }}"
                                        required>

                                </div>

                                <div class="col-md-4 mb-3">

                                    <label class="form-label">

                                        Start Time

                                    </label>

                                    <input
                                        type="time"
                                        name="start_time"
                                        class="form-control"
                                        value="{{ old('start_time',$exam->start_time) }}"
                                        required>

                                </div>

                                <div class="col-md-4 mb-3">

                                    <label class="form-label">

                                        End Time

                                    </label>

                                    <input
                                        type="time"
                                        name="end_time"
                                        class="form-control"
                                        value="{{ old('end_time',$exam->end_time) }}"
                                        required>

                                </div>

                            </div>

                        </div>

                        <!-- Description -->

                        <div class="form-section">

                            <h6>

                                <i class="bi bi-card-text me-2"></i>

                                Description

                            </h6>

                            <textarea
                                name="description"
                                rows="5"
                                class="form-control">{{ old('description',$exam->description) }}</textarea>

                        </div>

                        <div class="d-flex justify-content-between mt-4">

                            <a href="{{ route('teacher.exams.index') }}"
                               class="btn btn-cancel">

                                <i class="bi bi-arrow-left"></i>

                                Back

                            </a>

                            <button class="btn btn-save">

                                <i class="bi bi-save"></i>

                                Update Exam

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<style>

.page-header{

background:linear-gradient(135deg,#111827,#2563eb);

border-radius:24px;

padding:30px;

display:flex;

justify-content:space-between;

align-items:center;

color:#fff;

}

.page-badge{

background:rgba(255,255,255,.15);

padding:8px 18px;

border-radius:50px;

font-size:14px;

}

.page-header p{

color:rgba(255,255,255,.8);

margin:0;

}

.header-icon{

width:80px;

height:80px;

border-radius:22px;

background:rgba(255,255,255,.15);

display:flex;

align-items:center;

justify-content:center;

font-size:38px;

}

.exam-card{

background:#fff;

border-radius:24px;

overflow:hidden;

box-shadow:0 18px 45px rgba(0,0,0,.08);

}

.exam-header{

background:linear-gradient(135deg,#111827,#2563eb);

padding:22px 28px;

color:#fff;

}

.header-left{

display:flex;

align-items:center;

gap:15px;

}

.icon-box{

width:55px;

height:55px;

border-radius:16px;

background:rgba(255,255,255,.15);

display:flex;

align-items:center;

justify-content:center;

font-size:24px;

}

.form-section{

background:#f8fafc;

border:1px solid #e5e7eb;

border-radius:18px;

padding:22px;

margin-bottom:22px;

}

.form-section h6{

font-weight:700;

margin-bottom:20px;

color:#1e293b;

}

.form-label{

font-weight:600;

color:#475569;

}

.form-control,

.form-select{

height:52px;

border-radius:14px;

border:1px solid #dbe4ee;

box-shadow:none;

}

textarea.form-control{

height:auto;

resize:none;

}

.form-control:focus,

.form-select:focus{

border-color:#2563eb;

box-shadow:0 0 0 .15rem rgba(37,99,235,.15);

}

.btn-save{

background:linear-gradient(135deg,#2563eb,#4f46e5);

color:#fff;

border:none;

padding:12px 28px;

border-radius:14px;

font-weight:600;

}

.btn-save:hover{

color:#fff;

transform:translateY(-2px);

}

.btn-cancel{

background:#eef2ff;

color:#4338ca;

padding:12px 28px;

border-radius:14px;

font-weight:600;

border:none;

}

.btn-cancel:hover{

background:#e0e7ff;

color:#312e81;

}

.alert-danger{

border-radius:16px;

border:none;

}

</style>

@endsection