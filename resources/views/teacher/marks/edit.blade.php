@extends('layouts.teacher')

@section('title','Edit Marks')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3 class="fw-bold">
            Edit Student Marks
        </h3>

        <a href="{{ route('teacher.marks.view') }}"
           class="btn btn-secondary">

            <i class="bi bi-arrow-left"></i>

            Back

        </a>

    </div>

    @if($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <div class="card shadow border-0 rounded-4">

        <div class="card-body">

            <form action="{{ route('teacher.marks.update',$mark->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Student

                        </label>

                        <input
                            type="text"
                            class="form-control"
                            value="{{ $mark->student->name }}"
                            readonly>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Subject

                        </label>

                        <input
                            type="text"
                            class="form-control"
                            value="{{ $mark->subject->name }}"
                            readonly>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Total Marks

                        </label>

                        <input
                            type="number"
                            name="total_marks"
                            class="form-control"
                            value="{{ old('total_marks',$mark->total_marks) }}"
                            min="1"
                            required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Obtained Marks

                        </label>

                        <input
                            type="number"
                            name="obtained_marks"
                            class="form-control"
                            value="{{ old('obtained_marks',$mark->obtained_marks) }}"
                            min="0"
                            required>

                    </div>

                </div>

                @php

                    $percentage = 0;

                    if($mark->total_marks > 0){

                        $percentage = ($mark->obtained_marks / $mark->total_marks) * 100;

                    }

                @endphp

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Percentage

                        </label>

                        <input
                            type="text"
                            class="form-control"
                            value="{{ number_format($percentage,2) }} %"
                            readonly>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Grade

                        </label>

                        <input
                            type="text"
                            class="form-control"
                            value="@if($percentage>=90) A+
                                   @elseif($percentage>=80) A
                                   @elseif($percentage>=70) B
                                   @elseif($percentage>=60) C
                                   @elseif($percentage>=50) D
                                   @else F
                                   @endif"
                            readonly>

                    </div>

                </div>

                <div class="text-end">

                    <button
                        type="submit"
                        class="btn btn-primary">

                        <i class="bi bi-check-circle"></i>

                        Update Marks

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection