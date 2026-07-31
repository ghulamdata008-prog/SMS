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


@foreach($marks->unique('subject_id') as $mark)

<option
value="{{ $mark->subject_id }}"
@selected(request('subject_id') == $mark->subject_id)
>

{{ $mark->subject->name }}

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





<td class="text-center">

    <div class="action-btns">

        <a href="{{ route('teacher.marks.edit',$mark->id) }}"
           class="btn btn-primary btn-sm">
            <i class="bi bi-pencil"></i>
        </a>

        <form action="{{ route('teacher.marks.destroy',$mark->id) }}"
              method="POST"
              onsubmit="return confirm('Delete this mark?')">

            @csrf
            @method('DELETE')

            <button type="submit"
                    class="btn btn-danger btn-sm">
                <i class="bi bi-trash"></i>
            </button>

        </form>

    </div>

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
    animation:fadeIn .4s ease;
}

@keyframes fadeIn{
    from{
        opacity:0;
        transform:translateY(10px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}

/*==========================
PAGE HEADER
===========================*/

.page-header{
    background:linear-gradient(135deg,#0f172a,#2563eb);
    color:#fff;
    padding:28px 35px;
    border-radius:22px;
    margin-bottom:25px;
}

.page-header h2{
    margin:0;
    font-size:30px;
    font-weight:700;
}

.page-header p{
    margin-top:6px;
    margin-bottom:0;
    color:rgba(255,255,255,.8);
}

/*==========================
CARD
===========================*/

.marks-card{
    background:#fff;
    border-radius:22px;
    overflow:hidden;
    box-shadow:0 15px 40px rgba(0,0,0,.08);
}

.marks-header{
    background:linear-gradient(135deg,#111827,#2563eb);
    color:#fff;
    padding:22px 28px;
    display:flex;
    align-items:center;
    gap:18px;
}

.header-icon{
    width:58px;
    height:58px;
    border-radius:16px;
    background:rgba(255,255,255,.15);
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:26px;
}

.marks-header h5{
    margin-bottom:3px;
}

.marks-header small{
    color:rgba(255,255,255,.8);
}

/*==========================
FILTER
===========================*/

.filter-box{
    background:#f8fafc;
    border:1px solid #e5e7eb;
    border-radius:18px;
    padding:22px;
}

.form-label{
    font-weight:600;
    margin-bottom:8px;
}

.premium-input{
    height:50px;
    border-radius:12px;
}

.filter-btn{
    height:50px;
    border-radius:12px;
    font-weight:600;
}

/*==========================
TABLE
===========================*/

.table-wrapper{
    border:1px solid #e5e7eb;
    border-radius:18px;
    overflow:hidden;
}

.marks-table{
    margin-bottom:0;
}

.marks-table thead{
    background:#f8fafc;
}

.marks-table thead th{
    padding:18px;
    text-transform:uppercase;
    font-size:13px;
    color:#64748b;
    font-weight:700;
    border-bottom:1px solid #e5e7eb;
    vertical-align:middle;
}

.marks-table tbody td{
    padding:18px;
    vertical-align:middle;
    border-top:1px solid #f1f5f9;
}

.marks-table tbody tr:hover{
    background:#f8fafc;
}

/*==========================
NUMBER
===========================*/

.number-badge{
    width:38px;
    height:38px;
    border-radius:12px;
    display:flex;
    align-items:center;
    justify-content:center;
    background:#dbeafe;
    color:#2563eb;
    font-weight:700;
}

/*==========================
STUDENT
===========================*/

.student-box{
    display:flex;
    align-items:center;
    gap:12px;
}

.avatar{
    width:45px;
    height:45px;
    border-radius:50%;
    background:linear-gradient(135deg,#2563eb,#60a5fa);
    display:flex;
    align-items:center;
    justify-content:center;
    color:#fff;
    font-weight:bold;
    flex-shrink:0;
}

.student-box h6{
    margin:0;
    font-weight:700;
}

.student-box small{
    color:#64748b;
}

/*==========================
BADGES
===========================*/

.class-badge,
.section-badge,
.marks-badge,
.grade{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    min-width:80px;
    padding:8px 14px;
    border-radius:50px;
    font-weight:600;
}

.class-badge{
    background:#dbeafe;
    color:#2563eb;
}

.section-badge{
    background:#dcfce7;
    color:#15803d;
}

.marks-badge{
    background:#ede9fe;
    color:#6d28d9;
}

.percentage{
    font-weight:700;
    color:#2563eb;
}

.grade{
    color:#fff;
}

/*==========================
ACTION BUTTONS
===========================*/


.action-btns{
    display:flex;
    justify-content:center;
    align-items:center;
    gap:10px;
    flex-wrap:nowrap;
}

.action-btns form{
    margin:0;
    display:flex;
}

.action-btns .btn{
    width:40px;
    height:40px;
    padding:0;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius:10px;
}

.marks-table td{
    vertical-align:middle;
}

.marks-table td:last-child{
    width:120px;
    text-align:center;
}
/*==========================
PAGINATION
===========================*/

.pagination{
    justify-content:center;
}

/*==========================
RESPONSIVE
===========================*/

@media(max-width:992px){

.table-responsive{
    overflow-x:auto;
}

.marks-table{
    min-width:1100px;
}

}

</style>


@endsection