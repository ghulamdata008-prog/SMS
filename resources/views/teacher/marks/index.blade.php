@extends('layouts.teacher')

@section('title','Add Marks')

@section('content')

<div class="container-fluid teacher-page">


    <!-- Header -->

    <div class="page-header mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                Add Student Marks
            </h2>

            <p class="text-muted">
                Manage student examination results
            </p>

        </div>

    </div>



    @if(session('success'))

    <div class="alert alert-success shadow-sm border-0 rounded-4">

        <i class="bi bi-check-circle-fill me-2"></i>

        {{ session('success') }}

    </div>

    @endif




    @if($errors->any())

    <div class="alert alert-danger shadow-sm border-0 rounded-4">

        <ul class="mb-0">

            @foreach($errors->all() as $error)

            <li>
                {{ $error }}
            </li>

            @endforeach

        </ul>

    </div>

    @endif






    <div class="premium-card shadow-lg">


        <div class="card-header-premium">


            <div class="header-icon">

                <i class="bi bi-journal-check"></i>

            </div>


            <div>

                <h5>
                    Student Marks Entry
                </h5>

                <small>
                    Add examination marks
                </small>

            </div>


        </div>





        <div class="card-body p-4">



<form action="{{ route('teacher.marks.store') }}" method="POST">

@csrf




<div class="row g-4 mb-4">


<div class="col-md-6">


<label class="form-label fw-semibold">
Subject
</label>


<select
name="subject_id"
class="form-select premium-input"
required>


<option value="">
Select Subject
</option>


@foreach($assignments as $assignment)


<option value="{{ $assignment->subject_id }}">


{{ $assignment->subject->name }}

({{ $assignment->schoolClass->name }}

-

{{ $assignment->section->name }})


</option>


@endforeach


</select>


</div>





<div class="col-md-3">


<label class="form-label fw-semibold">

Total Marks

</label>


<input

type="number"

name="total_marks"

class="form-control premium-input"

value="100"

min="1"

required>


</div>


</div>







<div class="table-wrapper">


<div class="table-responsive">


<table class="table marks-table align-middle mb-0">


<thead>


<tr>

<th width="70">
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


<th width="200">
Obtained Marks
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

<div class="student-info">


<div class="avatar">

{{ strtoupper(substr($student->name,0,1)) }}

</div>


<div>

<h6 class="mb-0">

{{ $student->name }}

</h6>


<small>
{{ $student->email ?? '' }}
</small>


</div>


</div>


</td>




<td>

<span class="class-badge">

{{ $student->schoolClass->name ?? '-' }}

</span>

</td>




<td>

<span class="section-badge">

{{ $student->section->name ?? '-' }}

</span>

</td>




<td>


<input

type="number"

name="marks[{{ $student->id }}]"

class="form-control premium-input obtained-mark"

min="0"

placeholder="Enter Marks"

required>


</td>



</tr>



@empty


<tr>

<td colspan="5"
class="text-center py-5 text-danger">


<i class="bi bi-people fs-3"></i>

<h5>
No Students Found
</h5>


</td>

</tr>


@endforelse



</tbody>


</table>


</div>

</div>





@if($students->count())


<div class="action-area">


<a href="{{ route('teacher.marks.view') }}"

class="btn btn-success px-4 rounded-3">


<i class="bi bi-eye"></i>

View Marks

</a>




<button

type="submit"

class="btn btn-primary px-4 rounded-3">


<i class="bi bi-save"></i>

Save Marks


</button>



</div>


@endif





</form>



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





.premium-card{

background:white;

border-radius:25px;

overflow:hidden;

}




.card-header-premium{


background:linear-gradient(135deg,#111827,#2563eb);

color:white;

padding:25px;

display:flex;

align-items:center;

gap:15px;


}



.header-icon{


width:55px;

height:55px;

border-radius:18px;

background:rgba(255,255,255,.2);

display:flex;

align-items:center;

justify-content:center;

font-size:25px;


}



.header-icon i{

color:white;

}




.premium-input{


border-radius:14px;

padding:12px 15px;

border:1px solid #e2e8f0;


}



.premium-input:focus{


box-shadow:0 0 0 4px rgba(37,99,235,.15);

border-color:#2563eb;


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




.marks-table tbody tr{


transition:.3s;


}



.marks-table tbody tr:hover{


background:#f8fafc;


}




.student-info{


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




.student-info small{


color:#64748b;


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

padding:7px 14px;

border-radius:20px;

font-weight:600;


}



.section-badge{


background:#fef3c7;

color:#b45309;

padding:7px 14px;

border-radius:20px;

font-weight:600;


}



.action-area{


display:flex;

justify-content:flex-end;

gap:15px;

margin-top:25px;


}


</style>





<script>

document.addEventListener('DOMContentLoaded', function () {


const totalMarks=document.querySelector('[name="total_marks"]');


function updateMax(){


document.querySelectorAll('.obtained-mark').forEach(function(input){


input.max=totalMarks.value;


});


}



updateMax();


totalMarks.addEventListener('keyup',updateMax);

totalMarks.addEventListener('change',updateMax);



});


</script>


@endsection