@extends('layouts.teacher')

@section('title','Attendance')

@section('content')

<div class="container-fluid">


@if(session('success'))

<div class="alert alert-success alert-dismissible fade show shadow-sm rounded-4">

{{ session('success') }}

<button 
type="button"
class="btn-close"
data-bs-dismiss="alert">
</button>

</div>

@endif



<div class="attendance-card shadow-lg">


<div class="attendance-header">


<div class="header-icon">

<i class="bi bi-calendar-check-fill"></i>

</div>


<div>

<h3>
Student Attendance
</h3>

<p>
Manage daily student attendance records
</p>

</div>



</div>





<div class="attendance-body">


<form action="{{ route('teacher.attendance.store') }}" method="POST">

@csrf



<div class="top-section">


<div>

<h5 class="fw-bold">
Mark Attendance
</h5>

<span class="text-muted">
Select attendance status for each student
</span>

</div>



<div>


<label class="form-label fw-semibold">
Attendance Date
</label>


<input
type="date"
name="attendance_date"
class="form-control premium-input"
value="{{ old('attendance_date', date('Y-m-d')) }}"
required>


</div>


</div>





@error('attendance_date')

<div class="alert alert-danger rounded-4">

{{ $message }}

</div>

@enderror





<div class="table-responsive">


<table class="table premium-table align-middle">


<thead>

<tr>

<th>#</th>

<th>Student</th>

<th>Class</th>

<th>Section</th>

<th width="350">
Attendance
</th>


</tr>

</thead>




<tbody>


@forelse($students as $student)


<tr>


<td>

<span class="number-badge">

{{ $loop->iteration }}

</span>

</td>



<td>

<div class="student-box">


<div class="avatar">

{{ strtoupper(substr($student->name,0,1)) }}

</div>


<div>

<h6>
{{ $student->name }}
</h6>


<small>
{{ $student->email ?? '' }}
</small>


</div>


</div>

</td>



<td>

<span class="info-badge">

<i class="bi bi-building"></i>

{{ $student->schoolClass->name ?? '-' }}

</span>

</td>




<td>

<span class="info-badge">

<i class="bi bi-people"></i>

{{ $student->section->name ?? '-' }}

</span>

</td>





<td>


<div class="attendance-options">



<label class="status-option present">

<input
type="radio"
name="attendance[{{ $student->id }}]"
value="Present"
checked>


<span>

<i class="bi bi-check-circle"></i>

Present

</span>


</label>





<label class="status-option absent">

<input
type="radio"
name="attendance[{{ $student->id }}]"
value="Absent">


<span>

<i class="bi bi-x-circle"></i>

Absent

</span>


</label>





<label class="status-option leave">


<input
type="radio"
name="attendance[{{ $student->id }}]"
value="Leave">


<span>

<i class="bi bi-clock"></i>

Leave

</span>


</label>




</div>



</td>



</tr>



@empty


<tr>

<td colspan="5">

<div class="empty-state">

<i class="bi bi-people"></i>

<h5>
No Students Found
</h5>

<p>
Students will appear here.

</p>

</div>

</td>

</tr>



@endforelse



</tbody>


</table>


</div>





@if($students->count())


<div class="text-end mt-4">


<button class="save-btn">

<i class="bi bi-check-circle"></i>

Save Attendance

</button>


</div>


@endif




</form>


</div>


</div>



</div>



<style>

.attendance-card{
    background:#fff;
    border-radius:25px;
    overflow:hidden;
    width:100%;
}


/* HEADER */

.attendance-header{

    background:linear-gradient(135deg,#111827,#2563eb);

    padding:28px 35px;

    color:white;

    display:flex;

    align-items:center;

    gap:18px;

}


.header-icon{

    width:60px;
    height:60px;

    border-radius:18px;

    background:rgba(255,255,255,.15);

    display:flex;
    align-items:center;
    justify-content:center;

    font-size:28px;

}


/* BODY */

.attendance-body{

    padding:30px;

}



/* TOP AREA */

.top-section{

    display:flex;

    justify-content:space-between;

    align-items:flex-end;

    gap:20px;

    margin-bottom:30px;

}



.top-section h5{

    font-size:22px;

}




.premium-input{

    width:220px;

    height:45px;

    border-radius:12px;

    border:1px solid #ddd;

}



/* TABLE */


.table-responsive{

    overflow-x:auto;

}



.premium-table{

    width:100%;

    table-layout:fixed;

    border-collapse:separate;

    border-spacing:0 12px;

}




.premium-table thead th{

    background:#f8fafc;

    padding:16px;

    color:#64748b;

    font-size:13px;

    text-transform:uppercase;

    white-space:nowrap;

}



.premium-table tbody tr{

    background:white;

    box-shadow:0 5px 15px rgba(0,0,0,.06);

}



.premium-table td{

    padding:16px;

    vertical-align:middle;

}




/* COLUMN WIDTH */


.premium-table th:nth-child(1),
.premium-table td:nth-child(1){

    width:60px;

}



.premium-table th:nth-child(2),
.premium-table td:nth-child(2){

    width:280px;

}



.premium-table th:nth-child(3),
.premium-table td:nth-child(3){

    width:150px;

}



.premium-table th:nth-child(4),
.premium-table td:nth-child(4){

    width:150px;

}



.premium-table th:nth-child(5),
.premium-table td:nth-child(5){

    width:360px;

}





/* STUDENT */


.student-box{

    display:flex;

    align-items:center;

    gap:12px;

}



.avatar{

    width:42px;

    height:42px;

    flex-shrink:0;

    border-radius:50%;

    background:linear-gradient(135deg,#2563eb,#60a5fa);

    color:white;

    display:flex;

    justify-content:center;

    align-items:center;

    font-weight:700;

}




.student-box h6{

    margin:0;

    font-weight:700;

}



.student-box small{

    color:#64748b;

}





/* BADGES */


.number-badge{

    display:inline-flex;

    justify-content:center;

    align-items:center;

    width:35px;

    height:35px;

    border-radius:50%;

    background:#dbeafe;

    color:#2563eb;

    font-weight:700;

}




.info-badge{

    display:inline-flex;

    align-items:center;

    gap:6px;

    background:#eff6ff;

    color:#2563eb;

    padding:8px 14px;

    border-radius:20px;

    white-space:nowrap;

    font-size:14px;

}





/* ATTENDANCE BUTTONS */


.attendance-options{

    display:flex;

    align-items:center;

    justify-content:center;

    gap:12px;

}




.status-option{

    position:relative;

}



.status-option input{

    display:none;

}



.status-option span{

    display:flex;

    align-items:center;

    gap:5px;

    padding:9px 15px;

    border-radius:20px;

    cursor:pointer;

    font-size:14px;

    font-weight:600;

    white-space:nowrap;

}



.present span{

    background:#dcfce7;

    color:#15803d;

}



.absent span{

    background:#fee2e2;

    color:#dc2626;

}



.leave span{

    background:#fef3c7;

    color:#b45309;

}



.status-option input:checked + span{

    outline:3px solid rgba(37,99,235,.25);

}




/* SAVE BUTTON */


.save-btn{

    background:#2563eb;

    color:white;

    border:none;

    padding:12px 30px;

    border-radius:14px;

    font-weight:700;

}



.save-btn:hover{

    background:#1d4ed8;

}




/* RESPONSIVE */


@media(max-width:992px){


.top-section{

    flex-direction:column;

    align-items:flex-start;

}


.attendance-options{

    justify-content:flex-start;

    flex-wrap:wrap;

}


}
</style>
@endsection