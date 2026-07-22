@extends('layouts.app')

@section('title','Teacher Details')

@section('content')

<div class="container-fluid py-4">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="page-title mb-1">
                Teacher Details
            </h2>

            <p class="text-muted mb-0">
                Complete information about the teacher
            </p>
        </div>

        <a href="{{ route('admin.teachers.index') }}"
           class="premium-btn-secondary">

<i class="bi bi-arrow-left-circle me-2"></i>

            Back

        </a>

    </div>



    <div class="teacher-profile-card">

        <div class="profile-top">

            <div class="teacher-avatar">

                {{ strtoupper(substr($teacher->user->name,0,1)) }}

            </div>

            <div>

                <h3 class="mb-1">

                    {{ $teacher->user->name }}

                </h3>

                <p class="text-muted mb-0">

                    {{ $teacher->user->email }}

                </p>

            </div>

        </div>



        <div class="row mt-5 g-4">

            <div class="col-lg-6">

                <div class="info-box">

                    <span>Phone</span>

                    <h6>{{ $teacher->phone }}</h6>

                </div>

            </div>

            <div class="col-lg-6">

                <div class="info-box">

                    <span>Qualification</span>

                    <h6>{{ $teacher->qualification }}</h6>

                </div>

            </div>

            <div class="col-lg-6">

                <div class="info-box">

                    <span>Salary</span>

                    <h6>

                        Rs. {{ number_format($teacher->salary,2) }}

                    </h6>

                </div>

            </div>

            <div class="col-lg-6">

                <div class="info-box">

                    <span>Subjects</span>

                    <div class="mt-2">

                        @foreach($teacher->subjects as $subject)

                            <span class="subject-badge">

                                {{ $subject->name }}

                            </span>

                        @endforeach

                    </div>

                </div>

            </div>

            <div class="col-12">

                <div class="info-box">

                    <span>Address</span>

                    <p class="mb-0 mt-2">

                        {{ $teacher->address }}

                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection