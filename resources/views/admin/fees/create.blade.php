@extends('layouts.app')

@section('title','Add Fee')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="card border-0 shadow-sm rounded-4 mb-4">

        <div class="card-body d-flex justify-content-between align-items-center flex-wrap">

            <div>

                <h2 class="fw-bold mb-1">

                    <i class="bi bi-cash-stack text-primary me-2"></i>

                    Add Student Fee

                </h2>

                <p class="text-muted mb-0">

                    Create a new fee record for a student.

                </p>

            </div>

            <a href="{{ route('admin.fees.index') }}"
               class="btn btn-outline-secondary rounded-pill px-4">

                <i class="bi bi-arrow-left me-2"></i>

                Back

            </a>

        </div>

    </div>


    <!-- Form Card -->

    <div class="card border-0 shadow rounded-4">

        <div class="card-header bg-white border-0 py-4">

            <h5 class="fw-bold mb-0">

                <i class="bi bi-pencil-square text-primary me-2"></i>

                Fee Information

            </h5>

        </div>

        <div class="card-body p-4">

            <form action="{{ route('admin.fees.store') }}"
                  method="POST">

                @csrf

                @include('admin.fees.form')

            </form>

        </div>

    </div>

</div>

@endsection