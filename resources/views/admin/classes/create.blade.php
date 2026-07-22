@extends('layouts.app')

@section('title','Add Class')

@section('content')

<div class="container-fluid">

<div class="card shadow">

<div class="card-header">
<h4>Add Class</h4>
</div>

<div class="card-body">

<form action="{{ route('admin.classes.store') }}" method="POST">

@csrf

@include('admin.classes._form')

</form>

</div>

</div>

</div>

@endsection