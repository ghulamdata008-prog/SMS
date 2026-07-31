@extends('layouts.app')

@section('title','Online Exam Results')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                <i class="bi bi-award-fill text-primary me-2"></i>
                Online Exam Results
            </h2>

            <p class="text-muted mb-0">
                View and manage all submitted online examination results.
            </p>
        </div>

        <span class="badge bg-primary fs-6 px-3 py-2 rounded-pill shadow-sm">
            Total Results :
            {{ $submissions->total() }}
        </span>

    </div>


    <div class="card border-0 shadow-lg rounded-4">

        <div class="card-header bg-white border-0 py-3">

            <h5 class="fw-bold mb-0">

                <i class="bi bi-table text-primary me-2"></i>

                Result Management

            </h5>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">

                    <tr>

                        <th>#</th>

                        <th>Student</th>

                        <th>Class</th>

                        <th>Section</th>

                        <th>Exam</th>

                        <th>Subject</th>

                        <th>Teacher</th>

                        <th>Marks</th>

                        <th>Status</th>

                        <th class="text-center">Action</th>

                    </tr>

                    </thead>

                    <tbody>

                    @forelse($submissions as $submission)

                    <tr>

                        <td>

                            <span class="badge bg-secondary rounded-pill">

                                {{ $loop->iteration }}

                            </span>

                        </td>

                        <td>

                            <div class="d-flex align-items-center">

                                <div class="rounded-circle bg-primary text-white d-flex justify-content-center align-items-center me-3"
                                     style="width:42px;height:42px;font-weight:700;">

                                    {{ strtoupper(substr($submission->student->name,0,1)) }}

                                </div>

                                <div>

                                    <div class="fw-semibold">

                                        {{ $submission->student->name }}

                                    </div>

                                </div>

                            </div>

                        </td>

                        <td>

                            <span class="badge bg-info text-dark rounded-pill px-3">

                                {{ $submission->student->schoolClass->name }}

                            </span>

                        </td>

                        <td>

                            <span class="badge bg-secondary rounded-pill px-3">

                                {{ $submission->student->section->name }}

                            </span>

                        </td>

                        <td>

                            <strong>

                                {{ $submission->exam->title }}

                            </strong>

                        </td>

                        <td>

                            {{ $submission->exam->subject->name }}

                        </td>

                        <td>

                            {{ $submission->exam->teacher->user->name ?? 'N/A' }}

                        </td>

                        <td>

                            <span class="badge bg-primary rounded-pill px-3 py-2">

                                {{ $submission->obtained_marks }}

                                /

                                {{ $submission->total_marks }}

                            </span>

                        </td>

                        <td>

                            @if($submission->status=='Published')

                                <span class="badge bg-success rounded-pill px-3 py-2">

                                    <i class="bi bi-check-circle-fill me-1"></i>

                                    Published

                                </span>

                            @else

                                <span class="badge bg-warning text-dark rounded-pill px-3 py-2">

                                    <i class="bi bi-clock-fill me-1"></i>

                                    Pending

                                </span>

                            @endif

                        </td>

                        <td class="text-center">

                            <a href="{{ route('admin.online-results.show',$submission) }}"
                               class="btn btn-outline-primary btn-sm rounded-pill px-3">

                                <i class="bi bi-eye-fill me-1"></i>

                                View

                            </a>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="10">

                            <div class="text-center py-5">

                                <i class="bi bi-file-earmark-excel display-3 text-muted"></i>

                                <h5 class="mt-3 text-muted">

                                    No Online Exam Results Found

                                </h5>

                            </div>

                        </td>

                    </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

            <div class="d-flex justify-content-end mt-4">

                {{ $submissions->links() }}

            </div>

        </div>

    </div>

</div>

@endsection