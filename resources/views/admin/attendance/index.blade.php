@extends('layouts.app')

@section('title','Attendance Report')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="card border-0 shadow-sm rounded-4 mb-4">

        <div class="card-body d-flex justify-content-between align-items-center flex-wrap">

            <div>

                <h2 class="fw-bold mb-1">

                    <i class="bi bi-clipboard2-check-fill text-primary me-2"></i>

                    Attendance Report

                </h2>

                <p class="text-muted mb-0">

                    View complete attendance records of all students.

                </p>

            </div>

            <span class="badge bg-primary fs-6 px-4 py-3 rounded-pill">

                <i class="bi bi-calendar-check me-2"></i>

                Total Records: {{ count($attendances) }}

            </span>

        </div>

    </div>

    <!-- Report Card -->
    <div class="card border-0 shadow rounded-4">

        <div class="card-header bg-white border-0 py-3">

            <h5 class="fw-bold mb-0">

                <i class="bi bi-table me-2 text-primary"></i>

                Attendance Records

            </h5>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">

                        <tr>

                            <th width="80">#</th>

                            <th>Student</th>

                            <th>Date</th>

                            <th>Status</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($attendances as $attendance)

                        <tr>

                            <td>

                                <span class="badge bg-light text-dark">

                                    {{ $loop->iteration }}

                                </span>

                            </td>

                            <td>

                                <div class="d-flex align-items-center">

                                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3"
                                         style="width:45px;height:45px;">

                                        <i class="bi bi-person-fill"></i>

                                    </div>

                                    <div>

                                        <div class="fw-semibold">

                                           {{ $attendance->student->name ?? 'Deleted Student' }}
                                        </div>

                                        <small class="text-muted">

                                            Student

                                        </small>

                                    </div>

                                </div>

                            </td>

                            <td>

                                <span class="text-secondary">

                                    <i class="bi bi-calendar3 me-2"></i>

                                    {{ $attendance->attendance_date }}

                                </span>

                            </td>

                            <td>

                                @if($attendance->status == 'Present')

                                    <span class="badge bg-success rounded-pill px-3 py-2">

                                        <i class="bi bi-check-circle-fill me-1"></i>

                                        Present

                                    </span>

                                @elseif($attendance->status == 'Absent')

                                    <span class="badge bg-danger rounded-pill px-3 py-2">

                                        <i class="bi bi-x-circle-fill me-1"></i>

                                        Absent

                                    </span>

                                @elseif($attendance->status == 'Leave')

                                    <span class="badge bg-warning text-dark rounded-pill px-3 py-2">

                                        <i class="bi bi-clock-history me-1"></i>

                                        Leave

                                    </span>

                                @else

                                    <span class="badge bg-secondary rounded-pill px-3 py-2">

                                        {{ $attendance->status }}

                                    </span>

                                @endif

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="4">

                                <div class="text-center py-5">

                                    <i class="bi bi-clipboard-x display-3 text-secondary"></i>

                                    <h4 class="fw-bold mt-3">

                                        No Attendance Records Found

                                    </h4>

                                    <p class="text-muted mb-0">

                                        Attendance records will appear here once available.

                                    </p>

                                </div>

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection