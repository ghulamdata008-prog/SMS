@extends('layouts.app')

@section('title','Section Details')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="page-header mb-4">

        <div>
            <h2 class="page-title">
                <i class="bi bi-grid-3x3-gap-fill me-2 text-primary"></i>
                Section Details
            </h2>

            <p class="page-subtitle">
                View complete information about this section.
            </p>
        </div>

        <div>

            <a href="{{ route('admin.sections.edit',$section) }}"
               class="btn btn-warning premium-btn">

                <i class="bi bi-pencil-square me-1"></i>
                Edit

            </a>

            <a href="{{ route('admin.sections.index') }}"
               class="premium-btn-secondary">

                <i class="bi bi-arrow-left-circle me-2"></i>

                Back

            </a>

        </div>

    </div>


    <div class="dashboard-box">

        <div class="row">

            <!-- Left Card -->
            <div class="col-lg-4">

                <div class="profile-card">

                    <div class="profile-avatar bg-primary">

                        <i class="bi bi-grid-3x3-gap-fill"></i>

                    </div>

                    <h4 class="mt-3">
                        {{ $section->name }}
                    </h4>

                    <span class="badge bg-primary px-3 py-2 rounded-pill">
                        Section
                    </span>

                </div>

            </div>

            <!-- Right Card -->
            <div class="col-lg-8">

                <div class="details-card">

                    <div class="detail-item">

                        <span class="detail-label">
                            Class
                        </span>

                        <h5>
                            {{ $section->schoolClass->name }}
                        </h5>

                    </div>

                    <hr>

                    <div class="detail-item">

                        <span class="detail-label">
                            Section Name
                        </span>

                        <h5>
                            {{ $section->name }}
                        </h5>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection