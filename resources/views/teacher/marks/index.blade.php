@extends('layouts.teacher')

@section('title','Select Exam')

@section('content')

<div class="container-fluid">

    <!-- Header -->

    <div class="page-header mb-4">

        <div>

            <span class="page-badge">

                <i class="bi bi-award-fill"></i>

                Teacher Panel

            </span>

            <h2 class="mt-3 fw-bold">

                Select Exam

            </h2>

            <p>

                Choose an exam to enter or manage student marks.

            </p>

        </div>

        <div class="header-icon">

            <i class="bi bi-clipboard-check-fill"></i>

        </div>

    </div>

    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="exam-card">

                <div class="exam-header">

                    <div class="header-left">

                        <div class="icon-box">

                            <i class="bi bi-journal-text"></i>

                        </div>

                        <div>

                            <h4 class="mb-1">

                                Exam Selection

                            </h4>

                            <small>

                                Select an examination to continue

                            </small>

                        </div>

                    </div>

                </div>

                <div class="card-body p-4">

                    <div class="form-section">

                        <label class="form-label">

                            <i class="bi bi-list-check me-2"></i>

                            Choose Exam

                        </label>

                        <select class="form-select" id="exam">

                            <option value="">

                                Select Exam

                            </option>

                            @foreach($exams as $exam)

                            <option value="{{ route('teacher.marks.create',$exam) }}">

                                {{ $exam->title }}

                                -

                                {{ $exam->subject->name }}

                                -

                                {{ $exam->schoolClass->name }}

                            </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="info-box mt-4">

                        <div class="info-icon">

                            <i class="bi bi-info-circle-fill"></i>

                        </div>

                        <div>

                            <h6 class="mb-1">

                                Quick Tip

                            </h6>

                            <small>

                                After selecting an exam you will automatically be redirected to the marks entry page.

                            </small>

                        </div>

                    </div>

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

display:inline-flex;

align-items:center;

gap:8px;

}

.page-header p{

margin:0;

color:rgba(255,255,255,.8);

}

.header-icon{

width:85px;

height:85px;

border-radius:22px;

background:rgba(255,255,255,.15);

display:flex;

align-items:center;

justify-content:center;

font-size:40px;

}

.exam-card{

background:#fff;

border-radius:24px;

overflow:hidden;

box-shadow:0 20px 45px rgba(15,23,42,.08);

}

.exam-header{

background:linear-gradient(135deg,#111827,#2563eb);

padding:22px 28px;

color:#fff;

}

.header-left{

display:flex;

align-items:center;

gap:16px;

}

.icon-box{

width:58px;

height:58px;

border-radius:18px;

background:rgba(255,255,255,.15);

display:flex;

align-items:center;

justify-content:center;

font-size:25px;

}

.form-section{

background:#f8fafc;

border:1px solid #e2e8f0;

border-radius:18px;

padding:24px;

}

.form-label{

font-weight:700;

color:#334155;

margin-bottom:12px;

}

.form-select{

height:56px;

border-radius:14px;

border:1px solid #dbe4ee;

font-size:15px;

box-shadow:none;

}

.form-select:focus{

border-color:#2563eb;

box-shadow:0 0 0 .18rem rgba(37,99,235,.15);

}

.info-box{

display:flex;

align-items:center;

gap:15px;

padding:18px;

border-radius:18px;

background:#eff6ff;

border:1px solid #bfdbfe;

}

.info-icon{

width:50px;

height:50px;

border-radius:14px;

background:#2563eb;

color:#fff;

display:flex;

align-items:center;

justify-content:center;

font-size:22px;

}

.info-box h6{

font-weight:700;

color:#1e3a8a;

}

.info-box small{

color:#64748b;

}

</style>

<script>

document.getElementById('exam').addEventListener('change', function () {

    if(this.value){

        window.location.href = this.value;

    }

});

</script>

@endsection