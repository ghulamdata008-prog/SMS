@extends('layouts.teacher')

@section('title','Add Question')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-10">

            <div class="question-card">

                <!-- Header -->

                <div class="question-header">

                    <div class="header-icon">

                        <i class="bi bi-patch-question-fill"></i>

                    </div>

                    <div>

                        <h4 class="mb-0">

                            Add New Question

                        </h4>

                        <small>

                            Create a question for this exam

                        </small>

                    </div>

                </div>

                <!-- Body -->

                <div class="card-body p-4">

                    @if($errors->any())

                        <div class="alert alert-danger rounded-4">

                            <strong>

                                Please fix the following errors:

                            </strong>

                            <ul class="mb-0 mt-2">

                                @foreach($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif

                    <form action="{{ route('teacher.exams.questions.store',$exam) }}"
                          method="POST">

                        @csrf

                        <!-- Question -->

                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                <i class="bi bi-chat-square-text me-1 text-primary"></i>

                                Question

                            </label>

                            <textarea
                                name="question"
                                rows="4"
                                class="form-control custom-input"
                                placeholder="Enter question here..."></textarea>

                        </div>

                        <!-- Options -->

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label class="form-label fw-semibold">

                                    Option A

                                </label>

                                <input type="text"
                                       name="option_a"
                                       class="form-control custom-input"
                                       placeholder="Enter Option A">

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label fw-semibold">

                                    Option B

                                </label>

                                <input type="text"
                                       name="option_b"
                                       class="form-control custom-input"
                                       placeholder="Enter Option B">

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label fw-semibold">

                                    Option C

                                </label>

                                <input type="text"
                                       name="option_c"
                                       class="form-control custom-input"
                                       placeholder="Enter Option C">

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label fw-semibold">

                                    Option D

                                </label>

                                <input type="text"
                                       name="option_d"
                                       class="form-control custom-input"
                                       placeholder="Enter Option D">

                            </div>

                        </div>

                        <!-- Answer & Marks -->

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label class="form-label fw-semibold">

                                    Correct Answer

                                </label>

                                <select
                                    name="correct_answer"
                                    class="form-select custom-input">

                                    <option value="A">

                                        Option A

                                    </option>

                                    <option value="B">

                                        Option B

                                    </option>

                                    <option value="C">

                                        Option C

                                    </option>

                                    <option value="D">

                                        Option D

                                    </option>

                                </select>

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label fw-semibold">

                                    Marks

                                </label>

                                <input
                                    type="number"
                                    name="marks"
                                    class="form-control custom-input"
                                    placeholder="Enter Marks">

                            </div>

                        </div>

                        <!-- Buttons -->

                        <div class="d-flex gap-2 mt-4">

                            <button class="btn btn-save">

                                <i class="bi bi-check-circle-fill me-2"></i>

                                Save Question

                            </button>

                            <a href="{{ route('teacher.exams.questions',$exam) }}"
                               class="btn btn-back">

                                <i class="bi bi-arrow-left me-2"></i>

                                Back

                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<style>

.question-card{

    background:#fff;

    border-radius:22px;

    overflow:hidden;

    box-shadow:0 20px 40px rgba(15,23,42,.08);

}

.question-header{

    background:linear-gradient(135deg,#111827,#2563eb);

    color:#fff;

    padding:25px;

    display:flex;

    align-items:center;

    gap:15px;

}

.header-icon{

    width:60px;

    height:60px;

    border-radius:18px;

    background:rgba(255,255,255,.15);

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:26px;

}

.custom-input{

    border-radius:14px;

    border:1px solid #dbe4f0;

    padding:12px 15px;

    transition:.3s;

    box-shadow:none;

}

.custom-input:focus{

    border-color:#2563eb;

    box-shadow:0 0 0 .20rem rgba(37,99,235,.15);

}

.form-label{

    margin-bottom:8px;

    color:#334155;

}

.btn-save{

    background:linear-gradient(135deg,#16a34a,#22c55e);

    color:#fff;

    border:none;

    border-radius:12px;

    padding:12px 25px;

    font-weight:600;

}

.btn-save:hover{

    background:linear-gradient(135deg,#15803d,#16a34a);

    color:#fff;

    transform:translateY(-2px);

}

.btn-back{

    background:#eef2ff;

    color:#4338ca;

    border:none;

    border-radius:12px;

    padding:12px 25px;

    font-weight:600;

}

.btn-back:hover{

    background:#4338ca;

    color:#fff;

}

.alert{

    border:none;

}

</style>

@endsection