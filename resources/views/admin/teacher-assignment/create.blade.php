@extends('layouts.app')


@section('title','Assign Teacher')


@section('content')


<div class="container-fluid">


<h3 class="fw-bold mb-4">
    Assign Teacher
</h3>



<!-- @if ($errors->any())

<div class="alert alert-danger">

@foreach($errors->all() as $error)

<p class="mb-0">
    {{ $error }}
</p>

@endforeach

</div>

@endif -->





<div class="card shadow border-0 rounded-4">


<div class="card-body">


<form method="POST"
action="{{route('admin.teacher.assignment.store')}}">

@csrf



<div class="row">



<!-- Teacher -->

<div class="col-md-6 mb-3">


<label class="form-label">
Teacher
</label>


<select name="teacher_id" 
class="form-control">


<option value="">
Select Teacher
</option>


@foreach($teachers as $teacher)

<option value="{{$teacher->id}}">
{{$teacher->name}}
</option>

@endforeach


</select>


</div>





<!-- Subject -->

<div class="col-md-6 mb-3">


<label class="form-label">
Subject
</label>


<select name="subject_id"
class="form-control">


<option value="">
Select Subject
</option>


@foreach($subjects as $subject)


<option value="{{$subject->id}}">
{{$subject->name}}
</option>


@endforeach


</select>


</div>






<!-- Class -->

<div class="col-md-6 mb-3">


<label class="form-label">
Class
</label>


<select name="school_class_id"
class="form-control">


<option value="">
Select Class
</option>


@foreach($classes as $class)


<option value="{{$class->id}}">
{{$class->name}}
</option>


@endforeach


</select>


</div>







<!-- Section -->

<div class="col-md-6 mb-3">


<label class="form-label">
Section
</label>


<select name="section_id"
class="form-control">


<option value="">
Select Section
</option>


@foreach($sections as $section)


<option value="{{$section->id}}">
{{$section->name}}
</option>


@endforeach


</select>


</div>



</div>




<button type="submit" class="btn btn-success">

Assign Teacher

</button>



<a href="{{route('admin.teacher.assignment.index')}}"
class="btn btn-secondary">

Back

</a>



</form>


</div>


</div>



</div>


@endsection