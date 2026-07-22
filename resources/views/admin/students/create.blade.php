@extends('layouts.app')

@section('title','Add Student')

@section('content')

<div class="container-fluid">

    <div class="card shadow">

        <div class="card-header">
            <h4>Add Student</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('admin.students.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                @include('admin.students._form')

            </form>

        </div>

    </div>

</div>

@endsection