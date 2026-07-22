@extends('layouts.app')

@section('title','Marks Management')

@section('content')

<div class="container-fluid py-4">

    <!-- Header -->

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">

                Marks Management

            </h3>

            <p class="text-muted mb-0">

                Manage students marks and results

            </p>

        </div>

    </div>


    <!-- Card -->

    <div class="card border-0 shadow-lg rounded-4">

        <div class="card-header bg-white border-0 py-4">

            <div class="d-flex align-items-center">

                <div class="bg-primary bg-opacity-10 rounded-circle p-3 me-3">

                    <i class="bi bi-award-fill text-primary fs-4"></i>

                </div>

                <div>

                    <h5 class="fw-bold mb-0">

                        Student Marks

                    </h5>

                    <small class="text-muted">

                        All Marks Records

                    </small>

                </div>

            </div>

        </div>

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-dark">

                        <tr>

                            <th class="ps-4">Student</th>

                            <th>Subject</th>

                            <th>Marks</th>

                            <th class="text-center">Action</th>

                        </tr>

                    </thead>

                    <tbody>

                    @forelse($marks as $mark)

                        <tr>

                            <!-- Student -->

                            <td class="ps-4">

                                <div class="d-flex align-items-center">

                                    <div class="bg-primary text-white rounded-circle d-flex justify-content-center align-items-center me-3"
                                         style="width:45px;height:45px;">

                                        {{ strtoupper(substr($mark->student->name,0,1)) }}

                                    </div>

                                    <div>

                                        <h6 class="mb-0 fw-semibold">

                                            {{ $mark->student->name }}

                                        </h6>

                                        <small class="text-muted">

                                            Student

                                        </small>

                                    </div>

                                </div>

                            </td>

                            <!-- Subject -->

                            <td>

                                <span class="badge rounded-pill bg-info-subtle text-info px-3 py-2">

                                    <i class="bi bi-book me-1"></i>

                                    {{ $mark->subject->name }}

                                </span>

                            </td>

                            <!-- Marks -->

                            <td>

                                <div class="fw-bold fs-6">

                                    {{ $mark->obtained_marks }}

                                    /

                                    {{ $mark->total_marks }}

                                </div>

                                <small class="text-success fw-semibold">

                                    {{ number_format(($mark->obtained_marks/$mark->total_marks)*100,2) }}%

                                </small>

                                <div class="progress mt-2" style="height:7px;">

                                    <div class="progress-bar bg-success"

                                         role="progressbar"

                                         style="width: {{ ($mark->obtained_marks/$mark->total_marks)*100 }}%">

                                    </div>

                                </div>

                            </td>

                            <!-- Actions -->

                            <td class="text-center">

                                <div class="d-flex justify-content-center gap-2 flex-wrap">

                                    <a href="{{ route('admin.marks.edit',$mark) }}"
                                       class="btn btn-warning btn-sm rounded-pill px-3">

                                        <i class="bi bi-pencil-square me-1"></i>

                                        Edit

                                    </a>

                                    <a href="{{ route('admin.marks.result',$mark->student->id) }}"
                                       class="btn btn-success btn-sm rounded-pill px-3">

                                        <i class="bi bi-bar-chart-line me-1"></i>

                                        Result

                                    </a>

                                    <form action="{{ route('admin.marks.destroy',$mark) }}"
                                          method="POST"
                                          class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger btn-sm rounded-pill px-3">

                                            <i class="bi bi-trash me-1"></i>

                                            Delete

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4" class="text-center py-5">

                                <i class="bi bi-award fs-1 text-secondary"></i>

                                <h5 class="mt-3 text-muted">

                                    No Marks Found

                                </h5>

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