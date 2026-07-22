@extends('layouts.teacher')

@section('title','View Marks')

@section('content')

<div class="container-fluid teacher-page">


    <!-- Header -->

    <div class="page-header mb-4">

        <h2 class="fw-bold mb-1">
            Student Marks
        </h2>

        <p class="text-muted">
            View and manage examination results
        </p>

    </div>



    @if(session('success'))

    <div class="alert alert-success shadow-sm rounded-4 border-0">

        <i class="bi bi-check-circle-fill me-2"></i>

        {{ session('success') }}

    </div>

    @endif





    <div class="marks-card shadow-lg">


        <!-- Header -->

        <div class="marks-header">


            <div class="header-icon">

                <i class="bi bi-journal-check"></i>

            </div>


            <div>

                <h5 class="mb-1">
                    Student Result Records
                </h5>

                <small>
                    Complete marks overview
                </small>

            </div>


        </div>





        <div class="card-body p-4">



<form method="GET">


<div class="filter-box mb-4">


<div class="row g-3 align-items-end">



<div class="col-md-4">


<label class="form-label fw-semibold">
Subject
</label>


<select
name="subject_id"
class="form-select premium-input">


<option value="">
All Subjects
</option>


@foreach($assignments as $assignment)


<option

value="{{ $assignment->subject_id }}"

@selected(request('subject_id') == $assignment->subject_id)

>


{{ $assignment->subject->name }}


</option>


@endforeach


</select>


</div>





<div class="col-md-4">


<label class="form-label fw-semibold">
Search Student
</label>


<input

type="text"

name="search"

class="form-control premium-input"

placeholder="Search Student"

value="{{ request('search') }}">


</div>





<div class="col-md-2">


<button class="btn btn-primary w-100 filter-btn">


<i class="bi bi-search"></i>

Filter


</button>


</div>



</div>


</div>


</form>









<div class="table-wrapper">


<div class="table-responsive">


<table class="table marks-table align-middle mb-0">


<thead>


<tr>


<th>
#
</th>

<th>
Student
</th>

<th>
Class
</th>

<th>
Section
</th>

<th>
Subject
</th>

<th>
Marks
</th>

<th>
Percentage
</th>

<th>
Grade
</th>

<th width="180">
Action
</th>


</tr>


</thead>



<tbody>



@forelse($marks as $mark)


@php

$percentage = 0;

if($mark->total_marks > 0){

$percentage = ($mark->obtained_marks / $mark->total_marks) * 100;

}


if($percentage >= 90){

$grade='A+';
$color='success';

}elseif($percentage >= 80){

$grade='A';
$color='primary';

}elseif($percentage >= 70){

$grade='B';
$color='info';

}elseif($percentage >= 60){

$grade='C';
$color='warning';

}elseif($percentage >= 50){

$grade='D';
$color='dark';

}else{

$grade='F';
$color='danger';

}

@endphp





<tr>


<td>

<span class="number-badge">

{{ $loop->iteration }}

</span>

</td>





<td>


<div class="student-box">


<div class="avatar">


{{ strtoupper(substr($mark->student->name,0,1)) }}


</div>


<div>


<h6 class="mb-0">

{{ $mark->student->name }}

</h6>


<small>

Student

</small>


</div>


</div>


</td>





<td>


<span class="class-badge">

{{ $mark->student->schoolClass->name ?? '-' }}

</span>


</td>




<td>


<span class="section-badge">

{{ $mark->student->section->name ?? '-' }}

</span>


</td>





<td>

<strong>

{{ $mark->subject->name }}

</strong>

</td>





<td>


<span class="marks-badge">

{{ $mark->obtained_marks }}

/

{{ $mark->total_marks }}

</span>


</td>





<td>


<div class="percentage">


{{ number_format($percentage,2) }}%


</div>


</td>






<td>


<span class="grade bg-{{ $color }}">


{{ $grade }}


</span>


</td>





<td>


<a href="{{ route('teacher.marks.edit',$mark->id) }}"

class="btn btn-edit btn-sm">


<i class="bi bi-pencil"></i>

Edit


</a>





<form

action="{{ route('teacher.marks.destroy',$mark->id) }}"

method="POST"

class="d-inline">


@csrf

@method('DELETE')



<button

onclick="return confirm('Delete this mark?')"

class="btn btn-delete btn-sm">


<i class="bi bi-trash"></i>

Delete


</button>


</form>


</td>




</tr>



@empty


<tr>

<td colspan="9" class="text-center py-5 text-danger">


<i class="bi bi-journal-x fs-2"></i>

<h5>
No Marks Found
</h5>


</td>

</tr>


@endforelse



</tbody>



</table>



</div>


</div>




<div class="mt-4">

{{ $marks->links() }}

</div>




</div>



</div>


</div>







<style>


.teacher-page{

padding:10px;

}



.page-header h2{

font-size:30px;

}



.marks-card{

background:white;

border-radius:25px;

overflow:hidden;

}



.marks-header{

background:linear-gradient(135deg,#111827,#2563eb);

padding:25px;

color:white;

display:flex;

align-items:center;

gap:15px;

}



.header-icon{

height:55px;

width:55px;

border-radius:18px;

background:rgba(255,255,255,.2);

display:flex;

align-items:center;

justify-content:center;

font-size:25px;

}



.filter-box{

background:#f8fafc;

padding:20px;

border-radius:20px;

}



.premium-input{

border-radius:14px;

padding:12px;

}



.filter-btn{

padding:12px;

border-radius:14px;

}



.table-wrapper{

border-radius:20px;

overflow:hidden;

border:1px solid #e5e7eb;

}



.marks-table thead{

background:#111827;

color:white;

}



.marks-table th{

padding:18px;

font-size:13px;

text-transform:uppercase;

}



.marks-table td{

padding:16px;

}



.marks-table tbody tr:hover{

background:#f8fafc;

}



.student-box{

display:flex;

align-items:center;

gap:12px;

}



.avatar{

width:42px;

height:42px;

border-radius:50%;

background:linear-gradient(135deg,#2563eb,#60a5fa);

color:white;

display:flex;

align-items:center;

justify-content:center;

font-weight:bold;

}



.number-badge{

background:#dbeafe;

color:#2563eb;

padding:8px 12px;

border-radius:20px;

font-weight:bold;

}



.class-badge{

background:#dcfce7;

color:#15803d;

padding:7px 12px;

border-radius:20px;

}



.section-badge{

background:#fef3c7;

color:#b45309;

padding:7px 12px;

border-radius:20px;

}



.marks-badge{

background:#ede9fe;

color:#6d28d9;

padding:8px 14px;

border-radius:20px;

font-weight:700;

}



.percentage{

font-weight:700;

color:#2563eb;

}



.grade{

padding:8px 14px;

border-radius:20px;

color:white;

font-weight:700;

}



.btn-edit{

background:#f59e0b;

color:white;

border-radius:10px;

}



.btn-delete{

background:#ef4444;

color:white;

border-radius:10px;

}


</style>


@endsection