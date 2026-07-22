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



</div>




<style>


.result-page{

animation:.4s ease fade;

}


@keyframes fade{

from{

opacity:0;

transform:translateY(15px);

}

to{

opacity:1;

transform:translateY(0);

}

}




/* Hero */


.result-hero{

background:
linear-gradient(135deg,#059669,#2563eb);

padding:35px;

border-radius:25px;

color:white;

display:flex;

justify-content:space-between;

align-items:center;

}


.result-badge{

background:rgba(255,255,255,.15);

padding:8px 18px;

border-radius:50px;

font-size:14px;

}


.result-hero h2{

font-size:35px;

font-weight:700;

}


.result-hero p{

opacity:.8;

}



.result-icon{

width:90px;

height:90px;

border-radius:25px;

background:rgba(255,255,255,.15);

display:flex;

align-items:center;

justify-content:center;

font-size:45px;

}




/* Card */


.result-card{

background:white;

border-radius:25px;

box-shadow:0 15px 40px rgba(0,0,0,.08);

overflow:hidden;

}



.result-card-header{

padding:25px;

background:#f8fafc;

display:flex;

justify-content:space-between;

align-items:center;

}



.result-card-header span{

background:#2563eb;

color:white;

padding:8px 18px;

border-radius:50px;

}



/* Table */


.result-table{

border-collapse:separate;

border-spacing:0 12px;

}



.result-table thead th{

border:0;

color:#64748b;

}



.result-table tbody tr{

background:white;

box-shadow:0 5px 15px rgba(0,0,0,.05);

}



.result-table td{

border:0;

padding:18px;

}



.number-box{

width:35px;

height:35px;

border-radius:12px;

background:#dbeafe;

color:#2563eb;

display:flex;

align-items:center;

justify-content:center;

font-weight:bold;

}



.subject-name{

display:flex;

align-items:center;

gap:12px;

font-weight:600;

}



.subject-icon{

width:42px;

height:42px;

background:#ede9fe;

color:#7c3aed;

border-radius:12px;

display:flex;

align-items:center;

justify-content:center;

}




.marks-badge{

padding:8px 15px;

border-radius:50px;

font-weight:600;

}



.total{

background:#dbeafe;

color:#2563eb;

}


.obtained{

background:#dcfce7;

color:#16a34a;

}



.percentage-badge{

background:#fef3c7;

color:#d97706;

padding:8px 15px;

border-radius:50px;

font-weight:600;

}



/* Summary */


.summary-grid{

display:grid;

grid-template-columns:repeat(4,1fr);

gap:20px;

}



.summary-card{

padding:25px;

border-radius:22px;

color:white;

display:flex;

align-items:center;

gap:18px;

}


.summary-card i{

font-size:35px;

}


.summary-card small{

opacity:.8;

}



.summary-card h3{

margin:5px 0;

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


.purple{

background:linear-gradient(135deg,#7c3aed,#a855f7);

}



/* Empty */


.empty-result{

background:white;

padding:60px;

border-radius:25px;

text-align:center;

box-shadow:0 15px 40px rgba(0,0,0,.08);

color:#64748b;

}


.empty-result i{

font-size:60px;

}



@media(max-width:992px){

.summary-grid{

grid-template-columns:1fr;

}

}


</style>


@endsection