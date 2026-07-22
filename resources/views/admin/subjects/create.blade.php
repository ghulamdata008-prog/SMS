@extends('layouts.app')

@section('title','Add Subject')

@section('content')

<div class="container-fluid">

    <div class="card shadow">

        <div class="card-header d-flex justify-content-between">

            <h4>Add Subject</h4>

            <a href="{{ route('admin.subjects.index') }}" class="btn btn-secondary">
                Back
            </a>

        </div>

        <div class="card-body">

            <form action="{{ route('admin.subjects.store') }}" method="POST">

                @csrf

                @include('admin.subjects._form')

            </form>

        </div>

    </div>

</div>

@endsection