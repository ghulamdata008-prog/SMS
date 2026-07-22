@extends('layouts.app')

@section('title','Subject Details')

@section('content')

<div class="container-fluid py-4">

    <!-- Header -->

    <div class="dashboard-header mb-4">

        <div>

            <h2 class="dashboard-title">

                Subject Details

            </h2>

            <p class="dashboard-subtitle">

                View complete information about this subject.

            </p>

        </div>

        <a href="{{ route('admin.subjects.index') }}"
           class="premium-btn-secondary">
            <i class="bi bi-arrow-left-circle me-2"></i>

            Back

        </a>

    </div>


    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="premium-view-card">

                <!-- Card Header -->

                <div class="premium-view-header">

                    <div class="subject-avatar">

                        {{ strtoupper(substr($subject->name,0,1)) }}

                    </div>

                    <div>

                        <h3 class="mb-1">

                            {{ $subject->name }}

                        </h3>

                        <span class="text-light">

                            School Subject

                        </span>

                    </div>

                </div>


                <!-- Details -->

                <div class="premium-view-body">

                    <div class="info-row">

                        <div class="info-label">

                            <i class="bi bi-book-fill"></i>

                            Subject Name

                        </div>

                        <div class="info-value">

                            {{ $subject->name }}

                        </div>

                    </div>


                    <div class="info-row">

                        <div class="info-label">

                            <i class="bi bi-upc-scan"></i>

                            Subject Code

                        </div>

                        <div class="info-value">

                            <span class="badge info-badge">

                                {{ $subject->code }}

                            </span>

                        </div>

                    </div>


                    <div class="info-row">

                        <div class="info-label">

                            <i class="bi bi-building"></i>

                            Class

                        </div>

                        <div class="info-value">

                            {{ $subject->schoolClass->name }}

                        </div>

                    </div>


                    <div class="info-row">

                        <div class="info-label">

                            <i class="bi bi-check-circle-fill"></i>

                            Status

                        </div>

                        <div class="info-value">

                            @if($subject->status)

                                <span class="badge bg-success px-3 py-2">

                                    Active

                                </span>

                            @else

                                <span class="badge bg-danger px-3 py-2">

                                    Inactive

                                </span>

                            @endif

                        </div>

                    </div>

                </div>


                <!-- Footer -->

                <div class="premium-view-footer">

                    <a href="{{ route('admin.subjects.index') }}"
                       class="btn btn-secondary premium-btn">

                        <i class="bi bi-arrow-left"></i>

                        Back

                    </a>

                    <a href="{{ route('admin.subjects.edit',$subject->id) }}"
                       class="btn btn-warning premium-btn">

                        <i class="bi bi-pencil-square"></i>

                        Edit Subject

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection