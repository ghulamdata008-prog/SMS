@extends('layouts.app')


@section('content')


<div class="container">


<h3>
Edit Marks
</h3>


<form method="POST"
action="{{route('admin.marks.update',$mark)}}">


@csrf

@method('PUT')


<label>
Marks
</label>


<input
    type="number"
    name="total_marks"
    value="{{ old('total_marks',$mark->total_marks) }}"
    class="form-control">

<input
    type="number"
    name="obtained_marks"
    value="{{ old('obtained_marks',$mark->obtained_marks) }}"
    class="form-control">


<br>


<button class="btn btn-primary">

Update

</button>


</form>


</div>


@endsection