@extends('layouts.app')

@section('title','Class Details')

@section('content')

<div class="container-fluid py-4">

    <!-- Header -->

    <div class="dashboard-header mb-4">

        <div>

            <h2 class="page-title">
                Class Details
            </h2>

            <p class="page-subtitle">
                View complete class information.
            </p>

        </div>

        <a href="{{ route('admin.classes.index') }}" class="premium-btn-secondary">

            <i class="bi bi-arrow-left-circle me-2"></i>

            Back

        </a>

    </div>


    <!-- Card -->

    <div class="premium-view-card">

        <div class="view-top">

            <div class="view-icon">

                <i class="bi bi-building-fill"></i>

            </div>

            <div>

                <h3>{{ $class->name }}</h3>

                <p>School Class Information</p>

            </div>

        </div>

        <div class="row mt-5">

            <div class="col-md-6 mb-4">

                <div class="info-box">

                    <small>Class ID</small>

                    <h5>#{{ $class->id }}</h5>

                </div>

            </div>

            <div class="col-md-6 mb-4">

                <div class="info-box">

                    <small>Class Name</small>

                    <h5>{{ $class->name }}</h5>

                </div>

            </div>

            <div class="col-md-6 mb-4">

                <div class="info-box">

                    <small>Created At</small>

                    <h5>{{ $class->created_at->format('d M Y') }}</h5>

                </div>

            </div>

            <div class="col-md-6 mb-4">

                <div class="info-box">

                    <small>Updated At</small>

                    <h5>{{ $class->updated_at->format('d M Y') }}</h5>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection