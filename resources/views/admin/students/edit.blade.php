@extends('layouts.app')

@section('title','Edit Student')

@section('content')

<div class="container-fluid">

    <div class="card shadow">

        <div class="card-header">
            <h4>Edit Student</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('admin.students.update',$student) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                @include('admin.students._form')

            </form>

        </div>

    </div>

</div>

@endsection