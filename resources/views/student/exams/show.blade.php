@extends('layouts.student')

@section('title','Attempt Exam')

@section('content')

<div class="container-fluid">

    <!-- Header -->

    <div class="exam-header mb-4">

        <div>

            <span class="exam-badge">

                <i class="bi bi-pencil-square"></i>

                Online Examination

            </span>

            <h2 class="mt-3">

                {{ $exam->title }}

            </h2>

            <p>

                Read every question carefully before selecting your answer.

            </p>

        </div>

        <div class="header-icon">

            <i class="bi bi-journal-check"></i>

        </div>

    </div>

    <form action="{{ route('student.exams.submit',$exam) }}"
          method="POST">

        @csrf

        @foreach($exam->questions as $question)

        <div class="question-card mb-4">

            <div class="question-header">

                <div class="question-number">

                    Q{{ $loop->iteration }}

                </div>

                <h5 class="mb-0">

                    {{ $question->question }}

                </h5>

            </div>

            <div class="question-body">

                <label class="option-box">

                    <input
                        type="radio"
                        class="form-check-input"
                        name="answer[{{ $question->id }}]"
                        value="A"
                        required>

                    <span>

                        <strong>A.</strong>

                        {{ $question->option_a }}

                    </span>

                </label>

                <label class="option-box">

                    <input
                        type="radio"
                        class="form-check-input"
                        name="answer[{{ $question->id }}]"
                        value="B">

                    <span>

                        <strong>B.</strong>

                        {{ $question->option_b }}

                    </span>

                </label>

                <label class="option-box">

                    <input
                        type="radio"
                        class="form-check-input"
                        name="answer[{{ $question->id }}]"
                        value="C">

                    <span>

                        <strong>C.</strong>

                        {{ $question->option_c }}

                    </span>

                </label>

                <label class="option-box">

                    <input
                        type="radio"
                        class="form-check-input"
                        name="answer[{{ $question->id }}]"
                        value="D">

                    <span>

                        <strong>D.</strong>

                        {{ $question->option_d }}

                    </span>

                </label>

            </div>

        </div>

        @endforeach

        <div class="text-end mt-4">

            <button class="btn btn-success submit-btn">

                <i class="bi bi-check-circle-fill me-2"></i>

                Submit Exam

            </button>

        </div>

    </form>

</div>

<style>

.exam-header{

    background:linear-gradient(135deg,#111827,#2563eb);

    color:#fff;

    padding:35px;

    border-radius:24px;

    display:flex;

    justify-content:space-between;

    align-items:center;

    margin-bottom:30px;

    box-shadow:0 15px 35px rgba(37,99,235,.25);

}

.exam-badge{

    background:rgba(255,255,255,.15);

    padding:8px 18px;

    border-radius:30px;

    font-size:13px;

}

.exam-header h2{

    font-weight:700;

    margin-top:18px;

}

.exam-header p{

    color:rgba(255,255,255,.8);

}

.header-icon{

    width:90px;

    height:90px;

    border-radius:20px;

    background:rgba(255,255,255,.15);

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:42px;

}

.question-card{

    background:#fff;

    border-radius:22px;

    overflow:hidden;

    box-shadow:0 12px 30px rgba(0,0,0,.08);

    transition:.3s;

}

.question-card:hover{

    transform:translateY(-5px);

}

.question-header{

    background:#f8fafc;

    padding:20px 25px;

    display:flex;

    align-items:center;

    gap:18px;

    border-bottom:1px solid #e5e7eb;

}

.question-number{

    width:55px;

    height:55px;

    border-radius:16px;

    background:linear-gradient(135deg,#2563eb,#60a5fa);

    color:#fff;

    display:flex;

    align-items:center;

    justify-content:center;

    font-weight:700;

    font-size:18px;

}

.question-body{

    padding:25px;

}

.option-box{

    display:flex;

    align-items:center;

    gap:15px;

    background:#f8fafc;

    border:2px solid transparent;

    border-radius:16px;

    padding:16px 18px;

    margin-bottom:15px;

    cursor:pointer;

    transition:.3s;

}

.option-box:hover{

    border-color:#2563eb;

    background:#eef4ff;

}

.option-box input{

    transform:scale(1.2);

}

.option-box span{

    font-size:15px;

    color:#111827;

}

.submit-btn{

    border-radius:50px;

    padding:14px 35px;

    font-size:17px;

    font-weight:600;

    box-shadow:0 12px 25px rgba(34,197,94,.25);

}

@media(max-width:768px){

.exam-header{

    flex-direction:column;

    text-align:center;

    gap:20px;

}

.question-header{

    flex-direction:column;

    text-align:center;

}

.option-box{

    align-items:flex-start;

}

}

</style>

@endsection