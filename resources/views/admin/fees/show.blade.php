@extends('layouts.app')

@section('title','Fee Details')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="card border-0 shadow-sm rounded-4 mb-4">

        <div class="card-body d-flex justify-content-between align-items-center flex-wrap">

            <div>

                <h2 class="fw-bold mb-1">
                    <i class="bi bi-receipt-cutoff text-primary me-2"></i>
                    Fee Details
                </h2>

                <p class="text-muted mb-0">
                    Complete information about the student's fee record.
                </p>

            </div>

            <a href="{{ route('admin.fees.index') }}"
               class="btn btn-outline-secondary rounded-pill px-4">

                <i class="bi bi-arrow-left me-2"></i>

                Back

            </a>

        </div>

    </div>


    <!-- Details Card -->

    <div class="card border-0 shadow rounded-4">

        <div class="card-body p-4">

            <div class="row g-4">

                <div class="col-md-6">

                    <div class="border rounded-4 p-3 h-100">

                        <small class="text-muted d-block mb-1">
                            Student
                        </small>

                        <h5 class="fw-bold mb-0">

                            <i class="bi bi-person-circle text-primary me-2"></i>

                            {{ $fee->student->name }}

                        </h5>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="border rounded-4 p-3 h-100">

                        <small class="text-muted d-block mb-1">
                            Class
                        </small>

                        <h5 class="fw-bold mb-0">

                            <i class="bi bi-building text-success me-2"></i>

                            {{ $fee->schoolClass->name }}

                        </h5>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="border rounded-4 p-3 h-100">

                        <small class="text-muted d-block mb-1">
                            Fee Type
                        </small>

                        <h5 class="fw-bold mb-0">

                            <i class="bi bi-wallet2 text-warning me-2"></i>

                            {{ $fee->fee_type }}

                        </h5>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="border rounded-4 p-3 h-100">

                        <small class="text-muted d-block mb-1">
                            Total Fee
                        </small>

                        <h5 class="fw-bold text-primary mb-0">

                            Rs {{ number_format($fee->amount) }}

                        </h5>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="border rounded-4 p-3 h-100">

                        <small class="text-muted d-block mb-1">
                            Paid Amount
                        </small>

                        <h5 class="fw-bold text-success mb-0">

                            Rs {{ number_format($fee->paid_amount) }}

                        </h5>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="border rounded-4 p-3 h-100">

                        <small class="text-muted d-block mb-1">
                            Remaining Amount
                        </small>

                        <h5 class="fw-bold text-danger mb-0">

                            Rs {{ number_format($fee->remaining_amount) }}

                        </h5>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="border rounded-4 p-3 h-100">

                        <small class="text-muted d-block mb-2">
                            Status
                        </small>

                        @if($fee->status=='Paid')

                            <span class="badge bg-success rounded-pill px-3 py-2">

                                <i class="bi bi-check-circle me-1"></i>

                                {{ $fee->status }}

                            </span>

                        @elseif($fee->status=='Partial')

                            <span class="badge bg-warning text-dark rounded-pill px-3 py-2">

                                <i class="bi bi-hourglass-split me-1"></i>

                                {{ $fee->status }}

                            </span>

                        @else

                            <span class="badge bg-danger rounded-pill px-3 py-2">

                                <i class="bi bi-exclamation-circle me-1"></i>

                                {{ $fee->status }}

                            </span>

                        @endif

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="border rounded-4 p-3 h-100">

                        <small class="text-muted d-block mb-1">
                            Due Date
                        </small>

                        <h5 class="fw-bold mb-0">

                            <i class="bi bi-calendar-event text-info me-2"></i>

                            {{ $fee->due_date }}

                        </h5>

                    </div>

                </div>

            </div>

            <hr class="my-4">

            <div class="text-end">

                <a href="{{ route('admin.fees.index') }}"
                   class="btn btn-primary rounded-pill px-4">

                    <i class="bi bi-arrow-left me-2"></i>

                    Back to Fee List

                </a>

            </div>

        </div>

    </div>

</div>

@endsection