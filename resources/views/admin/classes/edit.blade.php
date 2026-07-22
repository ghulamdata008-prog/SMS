@extends('layouts.app')

@section('title','Edit Class')

@section('content')

<div class="container-fluid">

<div class="card shadow">

<div class="card-header">
<h4>Edit Class</h4>
</div>

<div class="card-body">

<form action="{{ route('admin.classes.update',$class) }}" method="POST">

@csrf
@method('PUT')

@include('admin.classes._form')

</form>

</div>

</div>

</div>

@endsection