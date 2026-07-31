@extends('layouts.app')

@section('title','Manage Exams')

@section('content')

<div class="container-fluid">



<!-- Header -->
<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">

    <div>

        <h2 class="fw-bold mb-1">
            <i class="bi bi-journal-check text-primary me-2"></i>
            Exam Management
        </h2>

        <p class="text-muted mb-0">
            View and manage all submitted examinations.
        </p>

    </div>

</div>

<!-- Statistics -->

<div class="row g-4 mb-4">

    <div class="col-lg-4 col-md-6">

        <div class="card border-0 shadow-sm rounded-4 h-100">

            <div class="card-body d-flex justify-content-between align-items-center">

                <div>

                    <small class="text-muted">
                        Total Exams
                    </small>

                    <h2 class="fw-bold mb-0">

                        {{ $exams->count() }}

                    </h2>

                </div>

                <div class="bg-primary bg-opacity-10 rounded-circle p-3">

                    <i class="bi bi-journal-bookmark-fill fs-2 text-primary"></i>

                </div>

            </div>

        </div>

    </div>

    <div class="col-lg-4 col-md-6">

        <div class="card border-0 shadow-sm rounded-4 h-100">

            <div class="card-body d-flex justify-content-between align-items-center">

                <div>

                    <small class="text-muted">

                        Approved Exams

                    </small>

                    <h2 class="fw-bold text-success mb-0">

                        {{ $exams->where('status','Approved')->count() }}

                    </h2>

                </div>

                <div class="bg-success bg-opacity-10 rounded-circle p-3">

                    <i class="bi bi-patch-check-fill fs-2 text-success"></i>

                </div>

            </div>

        </div>

    </div>

    <div class="col-lg-4 col-md-6">

        <div class="card border-0 shadow-sm rounded-4 h-100">

            <div class="card-body d-flex justify-content-between align-items-center">

                <div>

                    <small class="text-muted">

                        Pending Exams

                    </small>

                    <h2 class="fw-bold text-warning mb-0">

                        {{ $exams->where('status','Pending')->count() }}

                    </h2>

                </div>

                <div class="bg-warning bg-opacity-10 rounded-circle p-3">

                    <i class="bi bi-hourglass-split fs-2 text-warning"></i>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- Table -->

<div class="card border-0 shadow rounded-4">

    <div class="card-header bg-white border-0 py-3">

        <div class="d-flex justify-content-between align-items-center">

            <h5 class="fw-bold mb-0">

                <i class="bi bi-table me-2 text-primary"></i>

                Exams List

            </h5>

            <span class="badge bg-primary rounded-pill">

                {{ $exams->count() }} Records

            </span>

        </div>

    </div>

    <div class="card-body p-0">

        <div class="table-responsive">

            <table class="table align-middle table-hover mb-0">

                <thead class="table-light">

                <tr>

                    <th>#</th>

                    <th>Exam</th>

                    <th>Teacher</th>

                    <th>Class</th>

                    <th>Subject</th>

                    <th>Date</th>

                    <th>Status</th>

                    <th class="text-center" width="270">

                        Action

                    </th>

                </tr>

                </thead>

                <tbody>

                @forelse($exams as $exam)

                <tr>

                    <td>

                        <strong>#{{ $loop->iteration }}</strong>

                    </td>

                    <td>

                        <div class="fw-semibold">

                            {{ $exam->title }}

                        </div>

                    </td>

                    <td>

                        <span class="badge bg-light text-dark">

                            {{ $exam->teacher->user->name ?? '-' }}

                        </span>

                    </td>

                    <td>

                        {{ $exam->schoolClass->name ?? '-' }}

                    </td>

                    <td>

                        {{ $exam->subject->name ?? '-' }}

                    </td>

                    <td>

                        <span class="text-muted">

                            {{ $exam->exam_date }}

                        </span>

                    </td>

                    <td>

                        @if($exam->status=='Approved')

                        <span class="badge rounded-pill bg-success px-3 py-2">

                            <i class="bi bi-check-circle-fill me-1"></i>

                            Approved

                        </span>

                        @elseif($exam->status=='Rejected')

                        <span class="badge rounded-pill bg-danger px-3 py-2">

                            <i class="bi bi-x-circle-fill me-1"></i>

                            Rejected

                        </span>

                        @else

                        <span class="badge rounded-pill bg-warning text-dark px-3 py-2">

                            <i class="bi bi-clock-fill me-1"></i>

                            Pending

                        </span>

                        @endif

                    </td>

                    <td>

                        <div class="d-flex justify-content-center align-items-center gap-2 flex-wrap">

                            <a href="{{ route('admin.exams.show',$exam) }}"
                               class="btn btn-outline-primary btn-sm rounded-pill">

                                <i class="bi bi-eye"></i>

                            </a>

                            @if($exam->status!='Approved')

                            <form action="{{ route('admin.exams.approve',$exam) }}"
                                  method="POST"
                                  class="m-0">

                                @csrf
                                @method('PATCH')

                                <button class="btn btn-outline-success btn-sm rounded-pill">

                                    <i class="bi bi-check-lg"></i>

                                </button>

                            </form>
                            @endif

                            @if($exam->status!='Rejected')

                            <form action="{{ route('admin.exams.reject',$exam) }}"
                                  method="POST"
                                  class="m-0">

                                @csrf
                                @method('PATCH')

                                <button class="btn btn-outline-danger btn-sm rounded-pill">

                                    <i class="bi bi-x-lg"></i>

                                </button>

                            </form>

                            @endif

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="8" class="text-center py-5">

                        <i class="bi bi-folder2-open fs-1 text-muted d-block mb-3"></i>

                        <h5 class="text-muted">

                            No Exams Found

                        </h5>

                    </td>

                </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <div class="card-footer bg-white border-0">

        {{ $exams->links() }}

    </div>

</div>

</div>

@endsection