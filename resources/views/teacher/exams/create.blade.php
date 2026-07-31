@extends('layouts.teacher')

@section('title','Create Exam')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-10">

            <div class="card shadow border-0 rounded-4">

                <div class="card-header bg-primary text-white py-3">

                    <h4 class="mb-0">

                        <i class="bi bi-journal-plus me-2"></i>

                        Create New Exam

                    </h4>

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

                    <form action="{{ route('teacher.exams.store') }}" method="POST">

                        @csrf

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label class="form-label">

                                    Class

                                </label>

                                <select name="class_id" class="form-select">

                                    <option value="">Select Class</option>

                                    @foreach($classes as $class)

                                        <option value="{{ $class->id }}">

                                            {{ $class->name }}

                                        </option>

                                    @endforeach

                                </select>

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label">

                                    Subject

                                </label>

                                <select name="subject_id" class="form-select">

                                    <option value="">Select Subject</option>

                                    @foreach($subjects as $subject)

                                        <option value="{{ $subject->id }}">

                                            {{ $subject->name }}

                                        </option>

                                    @endforeach

                                </select>

                            </div>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">

                                Exam Title

                            </label>

                            <input type="text"
                                   name="title"
                                   class="form-control">

                        </div>

                        <div class="mb-3">

                            <label class="form-label">

                                Description

                            </label>

                            <textarea name="description"
                                      rows="4"
                                      class="form-control"></textarea>

                        </div>

                        <div class="row">

                            <div class="col-md-4 mb-3">

                                <label class="form-label">

                                    Total Marks

                                </label>

                                <input type="number"
                                       name="total_marks"
                                       class="form-control">

                            </div>

                            <div class="col-md-4 mb-3">

                                <label class="form-label">

                                    Passing Marks

                                </label>

                                <input type="number"
                                       name="passing_marks"
                                       class="form-control">

                            </div>

                            <div class="col-md-4 mb-3">

                                <label class="form-label">

                                    Exam Date

                                </label>

                                <input type="date"
                                       name="exam_date"
                                       class="form-control">

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label class="form-label">

                                    Start Time

                                </label>

                                <input type="time"
                                       name="start_time"
                                       class="form-control">

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label">

                                    End Time

                                </label>

                                <input type="time"
                                       name="end_time"
                                       class="form-control">

                            </div>

                        </div>

                        <div class="mt-4">

                            <button class="btn btn-primary">

                                <i class="bi bi-check-circle"></i>

                                Save Exam

                            </button>

                            <a href="{{ route('teacher.exams.index') }}"
                               class="btn btn-secondary">

                                Cancel

                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>
<style>
    /*=========================
  CREATE EXAM UI
==========================*/

.exam-card{
    border-radius:24px;
    overflow:hidden;
    background:#fff;
    box-shadow:0 20px 45px rgba(15,23,42,.08);
}

.exam-header{
    background:linear-gradient(135deg,#111827,#2563eb);
    color:#fff;
    padding:25px 30px;
}

.exam-header h4{
    margin:0;
    font-weight:700;
}

.form-section{
    background:#f8fafc;
    padding:18px 22px;
    border-radius:18px;
    margin-bottom:25px;
    border:1px solid #e5e7eb;
}

.form-section h6{
    font-weight:700;
    color:#1e293b;
    margin-bottom:18px;
}

.form-label{
    font-weight:600;
    color:#475569;
    margin-bottom:8px;
}

.form-control,
.form-select{

    height:52px;

    border-radius:14px;

    border:1px solid #dbe4ee;

    background:#fff;

    transition:.3s;

    box-shadow:none;

}

textarea.form-control{

    height:auto;

    min-height:120px;

    resize:none;

}

.form-control:focus,
.form-select:focus{

    border-color:#2563eb;

    box-shadow:0 0 0 .18rem rgba(37,99,235,.15);

}

.btn-save{

    background:linear-gradient(135deg,#2563eb,#4f46e5);

    color:#fff;

    border:none;

    padding:12px 28px;

    border-radius:14px;

    font-weight:600;

    transition:.3s;

}

.btn-save:hover{

    transform:translateY(-2px);

    color:#fff;

    box-shadow:0 10px 25px rgba(37,99,235,.25);

}

.btn-cancel{

    background:#eef2ff;

    color:#4338ca;

    padding:12px 28px;

    border-radius:14px;

    font-weight:600;

    border:none;

    transition:.3s;

}

.btn-cancel:hover{

    background:#e0e7ff;

    color:#3730a3;

}

.alert-danger{

    border:none;

    border-radius:16px;

    background:#fee2e2;

}

.page-title{

    margin-bottom:25px;

}

.page-title h2{

    font-weight:700;

    margin-bottom:5px;

}

.page-title p{

    color:#64748b;

}

.input-icon{

    position:relative;

}

.input-icon i{

    position:absolute;

    top:17px;

    left:16px;

    color:#94a3b8;

}

.input-icon .form-control,
.input-icon .form-select{

    padding-left:45px;

}

@media(max-width:768px){

.exam-header{

text-align:center;

}

.btn-save,
.btn-cancel{

width:100%;

margin-bottom:10px;

}

}
</style>
@endsection