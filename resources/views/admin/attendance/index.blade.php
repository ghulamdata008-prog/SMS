@extends('layouts.app')


@section('content')


<div class="container">


<h2>
Attendance Report
</h2>


<table class="table table-bordered">


<tr>

<th>
Student
</th>

<th>
Date
</th>

<th>
Status
</th>


</tr>


@foreach($attendances as $attendance)


<tr>

<td>
{{$attendance->student->name}}
</td>


<td>
{{$attendance->attendance_date}}
</td>


<td>

{{$attendance->status}}

</td>


</tr>


@endforeach


</table>



</div>


@endsection