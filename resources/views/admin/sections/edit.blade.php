@extends('layouts.app')


@section('content')

<div class="container">

<h2>Edit Section</h2>


<form action="{{ route('admin.sections.update',$section) }}" method="POST">

@csrf
@method('PUT')


<label>Class</label>

<select name="class_id" class="form-control">

<option>Select Class</option>


@foreach($classes as $class)

<option 
value="{{ $class->id }}"
{{ $section->class_id == $class->id ? 'selected' : '' }}
>

{{ $class->name }}

</option>

@endforeach


</select>



 <label class="mt-3">
Section Name
</label>


<input 
type="text"
name="name"
class="form-control"
value="{{ $section->name }}"
>



<button class="btn btn-primary mt-3">
Update
</button>


<a href="{{route('admin.sections.index')}}" 
class="btn btn-secondary mt-3">

Back

</a>


</form>


</div>


@endsection