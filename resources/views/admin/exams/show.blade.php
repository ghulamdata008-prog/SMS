@extends('layouts.app')

@section('title','Exam Details')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">

        <div>

            <h2 class="fw-bold mb-1">

                <i class="bi bi-journal-text text-primary me-2"></i>

                {{ $exam->title }}

            </h2>

            <p class="text-muted mb-0">

                Complete examination information and questions.

            </p>

        </div>

        <a href="{{ route('admin.exams.index') }}"
           class="btn btn-outline-secondary rounded-pill">

            <i class="bi bi-arrow-left me-1"></i>

            Back

        </a>

    </div>

    <div class="row">

        <!-- Exam Information -->

        <div class="col-lg-4 mb-4">

            <div class="card border-0 shadow rounded-4 h-100">

                <div class="card-header bg-primary text-white rounded-top-4">

                    <h5 class="mb-0">

                        <i class="bi bi-info-circle-fill me-2"></i>

                        Exam Information

                    </h5>

                </div>

                <div class="card-body">

                    <div class="mb-3">

                        <small class="text-muted d-block">

                            Teacher

                        </small>

                        <strong>

                            {{ $exam->teacher->user->name ?? '-' }}

                        </strong>

                    </div>

                    <hr>

                    <div class="mb-3">

                        <small class="text-muted d-block">

                            Class

                        </small>

                        <strong>

                            {{ $exam->schoolClass->name ?? '-' }}

                        </strong>

                    </div>

                    <hr>

                    <div class="mb-3">

                        <small class="text-muted d-block">

                            Subject

                        </small>

                        <strong>

                            {{ $exam->subject->name ?? '-' }}

                        </strong>

                    </div>

                    <hr>

                    <div class="mb-3">

                        <small class="text-muted d-block">

                            Total Marks

                        </small>

                        <span class="badge bg-primary rounded-pill px-3 py-2">

                            {{ $exam->total_marks }}

                        </span>

                    </div>

                    <hr>

                    <div class="mb-3">

                        <small class="text-muted d-block">

                            Passing Marks

                        </small>

                        <span class="badge bg-success rounded-pill px-3 py-2">

                            {{ $exam->passing_marks }}

                        </span>

                    </div>

                    <hr>

                    <div>

                        <small class="text-muted d-block">

                            Status

                        </small>

                        @if($exam->status=='Approved')

                        <span class="badge bg-success rounded-pill px-3 py-2">

                            <i class="bi bi-check-circle-fill me-1"></i>

                            Approved

                        </span>

                        @elseif($exam->status=='Rejected')

                        <span class="badge bg-danger rounded-pill px-3 py-2">

                            <i class="bi bi-x-circle-fill me-1"></i>

                            Rejected

                        </span>

                        @else

                        <span class="badge bg-warning text-dark rounded-pill px-3 py-2">

                            <i class="bi bi-clock-fill me-1"></i>

                            Pending

                        </span>

                        @endif

                    </div>

                </div>

            </div>

        </div>

        <!-- Questions -->

        <div class="col-lg-8">

            <div class="card border-0 shadow rounded-4">

                <div class="card-header bg-white">

                    <h5 class="fw-bold mb-0">

                        <i class="bi bi-patch-question-fill text-primary me-2"></i>

                        Exam Questions

                    </h5>

                </div>

                <div class="card-body">

                    @forelse($exam->questions as $question)

                    <div class="card border-0 shadow-sm rounded-4 mb-4">

                        <div class="card-body">

                            <div class="d-flex justify-content-between align-items-start mb-3">

                                <h5 class="fw-bold mb-0">

                                    <span class="badge bg-primary me-2">

                                        Q{{ $loop->iteration }}

                                    </span>

                                    {{ $question->question }}

                                </h5>

                                <span class="badge bg-dark">

                                    {{ $question->marks }} Marks

                                </span>

                            </div>

                            <div class="list-group mb-3">

                                <div class="list-group-item">

                                    <strong>A.</strong>

                                    {{ $question->option_a }}

                                </div>

                                <div class="list-group-item">

                                    <strong>B.</strong>

                                    {{ $question->option_b }}

                                </div>

                                <div class="list-group-item">

                                    <strong>C.</strong>

                                    {{ $question->option_c }}

                                </div>

                                <div class="list-group-item">

                                    <strong>D.</strong>

                                    {{ $question->option_d }}

                                </div>

                            </div>

                            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">

                                <span class="badge bg-success rounded-pill px-3 py-2">

                                    <i class="bi bi-check-circle-fill me-1"></i>

                                    Correct Answer :

                                    {{ $question->correct_answer }}

                                </span>

                                <span class="badge bg-primary rounded-pill px-3 py-2">

                                    {{ $question->marks }} Marks

                                </span>

                            </div>

                        </div>

                    </div>

                    @empty

                    <div class="text-center py-5">

                        <i class="bi bi-journal-x fs-1 text-muted"></i>

                        <h5 class="mt-3 text-muted">

                            No Questions Available

                        </h5>

                    </div>

                    @endforelse

                </div>

            </div>

        </div>

    </div>

</div>

@endsection