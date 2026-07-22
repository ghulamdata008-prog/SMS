@extends('layouts.app')

@section('title','Edit Teacher')

@section('content')

<div class="container-fluid">

    <div class="card shadow">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h4>Edit Teacher</h4>

            <a href="{{ route('admin.teachers.index') }}" class="btn btn-secondary">
                Back
            </a>

        </div>

        <div class="card-body">

            <form action="{{ route('admin.teachers.update',$teacher->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                @include('admin.teachers._form')

            </form>

        </div>

    </div>

</div>

@endsection