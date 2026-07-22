@extends('layouts.app')

@section('title','Student Result Card')

@section('content')

<div class="container-fluid py-4">

    <!-- Header -->

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">

                Student Result Card

            </h3>

            <p class="text-muted mb-0">

                Complete academic performance report

            </p>

        </div>

    </div>

    <!-- Result Card -->

    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

        <!-- Card Header -->

        <div class="card-header bg-primary text-white py-4">

            <div class="d-flex align-items-center">

                <div class="bg-white bg-opacity-25 rounded-circle d-flex justify-content-center align-items-center me-3"
                     style="width:60px;height:60px;">

                    <i class="bi bi-person-fill fs-3"></i>

                </div>

                <div>

                    <h4 class="mb-1 fw-bold">

                        {{ $student->name }}

                    </h4>

                    <small>

                        Student Academic Report

                    </small>

                </div>

            </div>

        </div>

        <!-- Card Body -->

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-dark">

                        <tr>

                            <th class="ps-4">

                                Subject

                            </th>

                            <th class="text-center">

                                Obtained Marks

                            </th>

                        </tr>

                    </thead>

                    <tbody>

                    @forelse($student->marks as $mark)

                        <tr>

                            <td class="ps-4">

                                <div class="d-flex align-items-center">

                                    <div class="bg-info bg-opacity-10 rounded-circle d-flex justify-content-center align-items-center me-3"
                                         style="width:45px;height:45px;">

                                        <i class="bi bi-book-fill text-info"></i>

                                    </div>

                                    <strong>

                                        {{ $mark->subject->name }}

                                    </strong>

                                </div>

                            </td>

                            <td class="text-center">

                                <span class="badge bg-success fs-6 px-4 py-2 rounded-pill">

                                    {{ $mark->obtained_marks }}

                                </span>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="2" class="text-center py-5">

                                <i class="bi bi-award fs-1 text-secondary"></i>

                                <h5 class="mt-3 text-muted">

                                    No Result Available

                                </h5>

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        <!-- Footer -->

        <div class="card-footer bg-light text-end">

            <a href="{{ url()->previous() }}"
               class="btn btn-secondary rounded-pill px-4">

                <i class="bi bi-arrow-left me-2"></i>

                Back

            </a>

        </div>

    </div>

</div>

@endsection