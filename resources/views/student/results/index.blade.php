@extends('layouts.student')

@section('title','My Results')

@section('content')

<div class="result-page">


    <!-- Header -->

    <div class="result-hero mb-4">

        <div>

            <span class="result-badge">

                <i class="bi bi-award-fill"></i>

                Academic Performance

            </span>


            <h2 class="mt-3">

                My Results

            </h2>


            <p>
                Check your subject wise marks, percentage and grade.
            </p>

        </div>


        <div class="result-icon">

            <i class="bi bi-mortarboard-fill"></i>

        </div>


    </div>




@if($marks->count())


<div class="result-card">


    <div class="result-card-header">

        <h4>

            Subject Results

        </h4>


        <span>

            {{ $marks->count() }} Subjects

        </span>


    </div>




    <div class="card-body p-4">


        <div class="table-responsive">


            <table class="table result-table align-middle">


                <thead>

                    <tr>

                        <th>#</th>

                        <th>Subject</th>

                        <th>Total Marks</th>

                        <th>Obtained</th>

                        <th>Percentage</th>

                    </tr>

                </thead>



                <tbody>


                @foreach($marks as $mark)


                <tr>


                    <td>

                        <div class="number-box">

                            {{ $loop->iteration }}

                        </div>

                    </td>



                    <td>

                        <div class="subject-name">

                            <div class="subject-icon">

                                <i class="bi bi-book"></i>

                            </div>


                            {{ $mark->subject->name }}

                        </div>

                    </td>



                    <td>

                        <span class="marks-badge total">

                            {{ $mark->total_marks }}

                        </span>

                    </td>




                    <td>

                        <span class="marks-badge obtained">

                            {{ $mark->obtained_marks }}

                        </span>

                    </td>




                    <td>


                        <span class="percentage-badge">


                            {{ round(($mark->obtained_marks / $mark->total_marks) * 100,2) }}%


                        </span>


                    </td>



                </tr>


                @endforeach



                </tbody>



            </table>



        </div>



        <!-- Summary -->


        <div class="summary-grid mt-4">


            <div class="summary-card blue">

                <i class="bi bi-calculator-fill"></i>

                <div>

                    <small>
                        Total Marks
                    </small>

                    <h3>
                        {{ $totalMarks }}
                    </h3>

                </div>

            </div>




            <div class="summary-card green">

                <i class="bi bi-check-circle-fill"></i>

                <div>

                    <small>
                        Obtained
                    </small>

                    <h3>
                        {{ $obtainedMarks }}
                    </h3>

                </div>

            </div>





            <div class="summary-card orange">

                <i class="bi bi-percent"></i>

                <div>

                    <small>
                        Percentage
                    </small>

                    <h3>
                        {{ $percentage }}%
                    </h3>

                </div>

            </div>





            <div class="summary-card purple">

                <i class="bi bi-award-fill"></i>

                <div>

                    <small>
                        Grade
                    </small>

                    <h3>
                        {{ $grade }}
                    </h3>

                </div>

            </div>



        </div>



    </div>


</div>




@else


<div class="empty-result">


    <i class="bi bi-clipboard-x"></i>


    <h4>
        No Result Available
    </h4>


    <p>
        Your marks will appear here after evaluation.
    </p>


</div>



@endif

<div class="result-card mt-4">

    <div class="result-card-header">

        <h4>
            Online Exam Results
        </h4>

        <span>
            {{ $examResults->count() }} Exams
        </span>

    </div>

    <div class="card-body p-4">

        @if($examResults->count())

        <div class="table-responsive">

            <table class="table result-table align-middle">

                <thead>

                    <tr>

                        <th>#</th>

                        <th>Exam</th>

                        <th>Marks</th>

                        <th>Percentage</th>

                        <th>Result</th>

                        <th>Date</th>

                    </tr>

                </thead>

                <tbody>

                @foreach($examResults as $examResult)

                <tr>

                    <td>

                        <div class="number-box">

                            {{ $loop->iteration }}

                        </div>

                    </td>

                    <td>

                        <div class="subject-name">

                            <div class="subject-icon">

                                <i class="bi bi-journal-check"></i>

                            </div>

                            {{ $examResult->exam->title ?? 'Online Exam' }}

                        </div>

                    </td>

                    <td>

                        <span class="marks-badge obtained">

                            {{ $examResult->obtained_marks }}

                            /

                            {{ $examResult->total_marks }}

                        </span>

                    </td>

                    <td>

                        <span class="percentage-badge">

                            {{ $examResult->total_marks > 0
                                ? round(($examResult->obtained_marks / $examResult->total_marks) * 100, 2)
                                : 0 }}%

                        </span>

                    </td>

                    <td>

                        @if($examResult->result == 'Pass')

                            <span class="badge bg-success">

                                Pass

                            </span>

                        @else

                            <span class="badge bg-danger">

                                Fail

                            </span>

                        @endif

                    </td>

                    <td>

                        {{ $examResult->submitted_at ? $examResult->submitted_at->format('d M Y') : '-' }}

                    </td>

                </tr>

                @endforeach

                </tbody>

            </table>

        </div>

        @else

        <div class="alert alert-info mb-0">

            You have not attempted any online exam yet.

        </div>

        @endif

    </div>

</div>

</div>




<style>


.result-page{
    animation:fadeIn .45s ease;
}

@keyframes fadeIn{
    from{
        opacity:0;
        transform:translateY(15px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}

/* ====================================
   HERO
==================================== */

.result-hero{

    background:linear-gradient(135deg,#111827,#2563eb);

    border-radius:24px;

    padding:35px;

    color:#fff;

    display:flex;

    justify-content:space-between;

    align-items:center;

    box-shadow:0 15px 35px rgba(37,99,235,.25);

    margin-bottom:30px;

}

.result-badge{

    background:rgba(255,255,255,.15);

    color:#fff;

    padding:8px 18px;

    border-radius:50px;

    font-size:13px;

    font-weight:600;

    display:inline-flex;

    align-items:center;

    gap:8px;

}

.result-hero h2{

    margin-top:18px;

    margin-bottom:10px;

    font-size:34px;

    font-weight:700;

}

.result-hero p{

    color:rgba(255,255,255,.82);

    margin:0;

}

.result-icon{

    width:90px;

    height:90px;

    border-radius:22px;

    background:rgba(255,255,255,.15);

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:42px;

}

/* ====================================
   RESULT CARD
==================================== */

.result-card{

    background:#fff;

    border-radius:22px;

    overflow:hidden;

    box-shadow:0 15px 40px rgba(0,0,0,.08);

}

.result-card-header{

    background:linear-gradient(135deg,#111827,#2563eb);

    color:#fff;

    padding:22px 25px;

    display:flex;

    justify-content:space-between;

    align-items:center;

}

.result-card-header h4{

    margin:0;

    font-weight:700;

}

.result-card-header span{

    background:rgba(255,255,255,.15);

    color:#fff;

    padding:8px 18px;

    border-radius:30px;

    font-weight:600;

}

/* ====================================
   TABLE
==================================== */

.result-table{

    margin:0;

}

.result-table thead{

    background:#f8fafc;

}

.result-table thead th{

    border:none;

    color:#64748b;

    font-size:13px;

    font-weight:700;

    text-transform:uppercase;

    padding:18px;

}

.result-table tbody td{

    padding:18px;

    vertical-align:middle;

    border-top:1px solid #eef2f7;

}

.result-table tbody tr{

    transition:.3s;

}

.result-table tbody tr:hover{

    background:#f8fafc;

}

/* ====================================
   NUMBER
==================================== */

.number-box{

    width:38px;

    height:38px;

    border-radius:12px;

    background:#dbeafe;

    color:#2563eb;

    display:flex;

    align-items:center;

    justify-content:center;

    font-weight:700;

}

/* ====================================
   SUBJECT
==================================== */

.subject-name{

    display:flex;

    align-items:center;

    gap:12px;

    font-weight:600;

}

.subject-icon{

    width:45px;

    height:45px;

    border-radius:14px;

    background:linear-gradient(135deg,#6366f1,#8b5cf6);

    color:#fff;

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:18px;

}

/* ====================================
   BADGES
==================================== */

.marks-badge{

    padding:8px 16px;

    border-radius:30px;

    font-size:13px;

    font-weight:700;

}

.total{

    background:#dbeafe;

    color:#2563eb;

}

.obtained{

    background:#dcfce7;

    color:#15803d;

}

.percentage-badge{

    background:#fef3c7;

    color:#b45309;

    padding:8px 16px;

    border-radius:30px;

    font-size:13px;

    font-weight:700;

}

/* ====================================
   SUMMARY
==================================== */

.summary-grid{

    display:grid;

    grid-template-columns:repeat(4,1fr);

    gap:20px;

    margin-top:30px;

}

.summary-card{

    border-radius:22px;

    padding:25px;

    color:#fff;

    display:flex;

    align-items:center;

    gap:18px;

    box-shadow:0 10px 30px rgba(0,0,0,.12);

    transition:.3s;

}

.summary-card:hover{

    transform:translateY(-6px);

}

.summary-card i{

    font-size:36px;

}

.summary-card small{

    color:rgba(255,255,255,.8);

}

.summary-card h3{

    margin:5px 0;

    font-weight:700;

}

.blue{

    background:linear-gradient(135deg,#2563eb,#3b82f6);

}

.green{

    background:linear-gradient(135deg,#059669,#10b981);

}

.orange{

    background:linear-gradient(135deg,#ea580c,#fb923c);

}

.purple{

    background:linear-gradient(135deg,#7c3aed,#a855f7);

}

/* ====================================
   EMPTY
==================================== */

.empty-result{

    background:#fff;

    border-radius:22px;

    padding:70px 30px;

    text-align:center;

    box-shadow:0 15px 40px rgba(0,0,0,.08);

    color:#64748b;

}

.empty-result i{

    font-size:65px;

    color:#94a3b8;

    margin-bottom:20px;

}

.empty-result h4{

    font-weight:700;

    margin-bottom:10px;

}

/* ====================================
   RESPONSIVE
==================================== */

@media(max-width:992px){

    .summary-grid{

        grid-template-columns:repeat(2,1fr);

    }

    .result-hero{

        flex-direction:column;

        text-align:center;

        gap:25px;

    }

}

@media(max-width:768px){

    .summary-grid{

        grid-template-columns:1fr;

    }

    .result-card-header{

        flex-direction:column;

        gap:15px;

        text-align:center;

    }

}
</style>


@endsection