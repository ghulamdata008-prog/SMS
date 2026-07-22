@extends('layouts.app')

@section('title','Student Details')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="page-header mb-4">

        <div>
            <h2 class="page-title">
                Student Details
            </h2>

            <p class="page-subtitle">
                View complete student information
            </p>
        </div>

        <a href="{{ route('admin.students.index') }}" class="premium-btn-secondary">
            <i class="bi bi-arrow-left-circle me-2"></i>
            Back
        </a>

    </div>

    <div class="student-profile-card">

        <div class="profile-top">

            <div class="profile-image">

                @if($student->profile_image)

                    <img src="{{ asset('storage/'.$student->profile_image) }}">

                @else

                    <div class="profile-placeholder">

                        <i class="bi bi-person-fill"></i>

                    </div>

                @endif

            </div>

            <div class="profile-info">

                <h3>{{ $student->name }}</h3>

                <p>{{ $student->email }}</p>

                <span class="status-badge">
                    Active Student
                </span>

            </div>

        </div>

        <div class="details-grid">

            <div class="detail-card">

                <div class="icon blue">

                    <i class="bi bi-envelope-fill"></i>

                </div>

                <div>

                    <small>Email</small>

                    <h6>{{ $student->email }}</h6>

                </div>

            </div>

            <div class="detail-card">

                <div class="icon green">

                    <i class="bi bi-telephone-fill"></i>

                </div>

                <div>

                    <small>Phone</small>

                    <h6>{{ $student->phone }}</h6>

                </div>

            </div>

            <div class="detail-card">

                <div class="icon orange">

                    <i class="bi bi-building-fill"></i>

                </div>

                <div>

                    <small>Class</small>

                    <h6>{{ $student->schoolClass->name ?? 'No Class' }}</h6>

                </div>

            </div>

            <div class="detail-card">

                <div class="icon purple">

                    <i class="bi bi-geo-alt-fill"></i>

                </div>

                <div>

                    <small>Address</small>

                    <h6>{{ $student->address ?: 'Not Available' }}</h6>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection