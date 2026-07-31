@extends('layouts.app')

@section('title','Online Result Details')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">

        <div>

            <h2 class="fw-bold mb-1">

                <i class="bi bi-award-fill text-primary me-2"></i>

                Online Result Details

            </h2>

            <p class="text-muted mb-0">

                Complete examination performance report.

            </p>

        </div>

    </div>

    <div class="row">

        <!-- Student Information -->

        <div class="col-lg-4 mb-4">

            <div class="card border-0 shadow-lg rounded-4 h-100">

                <div class="card-header bg-primary text-white rounded-top-4">

                    <h5 class="mb-0">

                        <i class="bi bi-person-circle me-2"></i>

                        Student Information

                    </h5>

                </div>

                <div class="card-body">

                    <div class="text-center mb-4">

                        <div class="rounded-circle bg-primary text-white d-inline-flex justify-content-center align-items-center"
                             style="width:90px;height:90px;font-size:36px;font-weight:700;">

                            {{ strtoupper(substr($submission->student->name,0,1)) }}

                        </div>

                        <h4 class="mt-3 mb-0">

                            {{ $submission->student->name }}

                        </h4>

                    </div>

                    <hr>

                    <div class="mb-3">

                        <small class="text-muted d-block">

                            Exam

                        </small>

                        <strong>

                            {{ $submission->exam->title }}

                        </strong>

                    </div>

                    <div class="mb-3">

                        <small class="text-muted d-block">

                            Subject

                        </small>

                        <strong>

                            {{ $submission->exam->subject->name }}

                        </strong>

                    </div>

                    <div class="mb-3">

                        <small class="text-muted d-block">

                            Teacher

                        </small>

                        <strong>

                            {{ $submission->exam->teacher->user->name ?? 'N/A' }}

                        </strong>

                    </div>

                    <hr>

                    <div class="text-center">

                        <h6 class="text-muted">

                            Overall Score

                        </h6>

                        <span class="badge bg-success rounded-pill px-4 py-3 fs-5">

                            {{ $submission->obtained_marks }}

                            /

                            {{ $submission->total_marks }}

                        </span>

                    </div>

                </div>

            </div>

        </div>

        <!-- Question Details -->

        <div class="col-lg-8">

            <div class="card border-0 shadow-lg rounded-4">

                <div class="card-header bg-white">

                    <h5 class="fw-bold mb-0">

                        <i class="bi bi-list-check text-primary me-2"></i>

                        Question Wise Report

                    </h5>

                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-hover align-middle">

                            <thead class="table-light">

                            <tr>

                                <th>#</th>

                                <th>Question</th>

                                <th>Student Answer</th>

                                <th>Correct Answer</th>

                                <th>Marks</th>

                            </tr>

                            </thead>

                            <tbody>

                            @foreach($submission->answers as $answer)

                            <tr>

                                <td>

                                    <span class="badge bg-secondary rounded-pill">

                                        {{ $loop->iteration }}

                                    </span>

                                </td>

                                <td>

                                    {{ $answer->question->question }}

                                </td>

                                <td>

                                    @if($answer->student_answer == $answer->question->correct_answer)

                                        <span class="badge bg-success rounded-pill px-3 py-2">

                                            <i class="bi bi-check-circle-fill me-1"></i>

                                            {{ $answer->student_answer }}

                                        </span>

                                    @else

                                        <span class="badge bg-danger rounded-pill px-3 py-2">

                                            <i class="bi bi-x-circle-fill me-1"></i>

                                            {{ $answer->student_answer }}

                                        </span>

                                    @endif

                                </td>

                                <td>

                                    <span class="badge bg-primary rounded-pill px-3 py-2">

                                        {{ $answer->question->correct_answer }}

                                    </span>

                                </td>

                                <td>

                                    <span class="badge bg-dark rounded-pill px-3 py-2">

                                        {{ $answer->marks }}

                                    </span>

                                </td>

                            </tr>

                            @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

            <div class="mt-4">

                <a href="{{ url()->previous() }}"
                   class="btn btn-outline-secondary rounded-pill px-4">

                    <i class="bi bi-arrow-left me-2"></i>

                    Back

                </a>

            </div>

        </div>

    </div>

</div>

@endsection