@extends('layouts.teacher')

@section('title','Attendance History')

@section('content')

<div class="container-fluid">


<!-- Header -->

<div class="page-header mb-4">

    <h2 class="fw-bold mb-1">
        Attendance History
    </h2>

    <p class="text-muted">
        Monitor student attendance records
    </p>

</div>




<!-- Summary Cards -->

<div class="row g-4 mb-4">


<div class="col-lg-4 col-md-6">

<div class="summary-card present-card">


<div class="icon-box">

<i class="bi bi-check-circle-fill"></i>

</div>


<div>

<span>
Present
</span>

<h2>
{{ $present }}
</h2>

</div>


</div>


</div>




<div class="col-lg-4 col-md-6">

<div class="summary-card absent-card">


<div class="icon-box">

<i class="bi bi-x-circle-fill"></i>

</div>


<div>

<span>
Absent
</span>

<h2>
{{ $absent }}
</h2>

</div>


</div>


</div>





<div class="col-lg-4 col-md-6">

<div class="summary-card leave-card">


<div class="icon-box">

<i class="bi bi-clock-fill"></i>

</div>


<div>

<span>
Leave
</span>

<h2>
{{ $leave }}
</h2>

</div>


</div>


</div>



</div>







<!-- Main Card -->


<div class="history-card shadow-lg">



<div class="history-header">


<div>

<h5>
Attendance Records
</h5>


<small>
Complete student attendance history
</small>


</div>


<i class="bi bi-calendar-check-fill"></i>


</div>







<div class="card-body p-4">





<!-- Filters -->


<form method="GET" class="filter-box mb-4">


<div class="row g-3">



<div class="col-lg-3 col-md-6">

<input
type="date"
name="date"
value="{{ request('date') }}"
class="form-control premium-input">

</div>





<div class="col-lg-2 col-md-6">

<select name="class_id"
class="form-select premium-input">


<option value="">
All Classes
</option>


@foreach($assignments as $item)


<option

value="{{ $item->school_class_id }}"

@selected(request('class_id') == $item->school_class_id)

>

{{ $item->schoolClass->name }}


</option>


@endforeach


</select>


</div>






<div class="col-lg-2 col-md-6">


<select name="section_id"
class="form-select premium-input">


<option value="">
All Sections
</option>


@foreach($assignments as $item)


<option

value="{{ $item->section_id }}"

@selected(request('section_id') == $item->section_id)

>

{{ $item->section->name }}


</option>


@endforeach


</select>


</div>






<div class="col-lg-3 col-md-6">


<input

type="text"

name="search"

value="{{ request('search') }}"

class="form-control premium-input"

placeholder="Search Student">


</div>





<div class="col-lg-2 col-md-12">


<button class="filter-btn w-100">

<i class="bi bi-search"></i>

Filter

</button>


</div>



</div>


</form>








<!-- Table -->


<div class="table-responsive">


<table class="table history-table align-middle">



<thead>


<tr>

<th>#</th>

<th>Student</th>

<th>Class</th>

<th>Section</th>

<th>Date</th>

<th>Day</th>

<th>Status</th>

</tr>


</thead>




<tbody>



@forelse($attendances as $attendance)


<tr>


<td>

<span class="number">

{{ $loop->iteration }}

</span>

</td>




<td>


<div class="student">


<div class="avatar">

{{ strtoupper(substr($attendance->student->name,0,1)) }}

</div>


<span>

{{ $attendance->student->name }}

</span>


</div>


</td>




<td>

<span class="badge-info">

{{ $attendance->student->schoolClass->name ?? '-' }}

</span>

</td>




<td>

<span class="badge-info">

{{ $attendance->student->section->name ?? '-' }}

</span>

</td>





<td>


<i class="bi bi-calendar3 text-primary"></i>


{{ \Carbon\Carbon::parse($attendance->attendance_date)->format('d M Y') }}


</td>





<td>


{{ \Carbon\Carbon::parse($attendance->attendance_date)->format('l') }}


</td>






<td>


@if($attendance->status == 'Present')


<span class="status present">

<i class="bi bi-check-circle"></i>

Present

</span>


@elseif($attendance->status == 'Absent')


<span class="status absent">

<i class="bi bi-x-circle"></i>

Absent

</span>


@else


<span class="status leave">

<i class="bi bi-clock"></i>

Leave

</span>


@endif



</td>



</tr>



@empty


<tr>

<td colspan="7">


<div class="empty-state">


<i class="bi bi-calendar-x"></i>


<h5>
No Attendance Found
</h5>


<p>
Attendance records will appear here.
</p>


</div>


</td>


</tr>



@endforelse



</tbody>


</table>


</div>




<div class="mt-4">

{{ $attendances->links() }}

</div>



</div>


</div>


</div>







<style>


.history-card{

background:white;

border-radius:25px;

overflow:hidden;

}





.history-header{


padding:25px 30px;

background:linear-gradient(135deg,#111827,#2563eb);

color:white;

display:flex;

justify-content:space-between;

align-items:center;


}


.history-header h5{

font-weight:700;

margin:0;

}


.history-header i{

font-size:35px;

opacity:.8;

}




.summary-card{

padding:25px;

border-radius:22px;

display:flex;

align-items:center;

gap:20px;

color:white;

box-shadow:0 10px 25px rgba(0,0,0,.08);

}



.summary-card h2{

margin:5px 0 0;

font-weight:800;

}



.summary-card span{

font-weight:600;

}




.present-card{

background:linear-gradient(135deg,#059669,#10b981);

}



.absent-card{

background:linear-gradient(135deg,#dc2626,#ef4444);

}



.leave-card{

background:linear-gradient(135deg,#d97706,#f59e0b);

}




.summary-card .icon-box{


width:60px;

height:60px;

border-radius:18px;

background:rgba(255,255,255,.2);

display:flex;

align-items:center;

justify-content:center;

font-size:28px;

}





.premium-input{

height:45px;

border-radius:14px;

border:1px solid #e5e7eb;

}





.filter-btn{


background:#2563eb;

color:white;

border:none;

border-radius:14px;

font-weight:600;

}





.history-table{

border-collapse:separate;

border-spacing:0 12px;

}




.history-table thead th{

background:#f8fafc;

padding:16px;

font-size:13px;

color:#64748b;

text-transform:uppercase;

}



.history-table tbody tr{


background:white;

box-shadow:0 5px 15px rgba(0,0,0,.05);


}



.history-table td{

padding:18px;

}





.student{

display:flex;

align-items:center;

gap:12px;

font-weight:600;

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



.number{

background:#dbeafe;

color:#2563eb;

padding:7px 12px;

border-radius:20px;

font-weight:bold;

}



.badge-info{


background:#eff6ff;

color:#2563eb;

padding:7px 14px;

border-radius:20px;

font-weight:600;

}




.status{

padding:8px 15px;

border-radius:20px;

font-weight:700;

display:inline-flex;

gap:5px;

align-items:center;

}



.status.present{

background:#dcfce7;

color:#15803d;

}



.status.absent{

background:#fee2e2;

color:#dc2626;

}



.status.leave{

background:#fef3c7;

color:#b45309;

}




.empty-state{

text-align:center;

padding:50px;

color:#64748b;

}


.empty-state i{

font-size:50px;

}


</style>


@endsection