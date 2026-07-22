@extends('layouts.app')

@section('title','Add Teacher')

@section('content')

<div class="container-fluid">

    <div class="card shadow">

        <div class="card-header d-flex justify-content-between">

            <h4>Add Teacher</h4>

            <a href="{{ route('admin.teachers.index') }}" class="btn btn-secondary">
                Back
            </a>

        </div>

        <div class="card-body">

            <form id="teacherForm"
                  action="{{ route('admin.teachers.store') }}"
                  method="POST">

                @csrf

                @include('admin.teachers._form')

            </form>

        </div>

    </div>

</div>

@endsection