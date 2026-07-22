@extends('layouts.app')

@section('title', $paymentGateway->display_name.' Details')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                <i class="bi bi-credit-card-2-front-fill text-primary me-2"></i>
                {{ $paymentGateway->display_name }}
            </h2>

            <p class="text-muted mb-0">
                Manage and review gateway configuration
            </p>

        </div>

        <a href="{{ route('admin.payment-gateways.index') }}"
           class="btn btn-outline-secondary rounded-pill px-4">

            <i class="bi bi-arrow-left-circle me-1"></i>

            Back

        </a>

    </div>

    <div class="row g-4">

        <!-- Left -->

        <div class="col-lg-8">

            <div class="card border-0 shadow-lg rounded-4">

                <div class="card-header bg-primary text-white rounded-top-4 py-3">

                    <h5 class="mb-0">

                        <i class="bi bi-info-circle-fill me-2"></i>

                        Gateway Information

                    </h5>

                </div>

                <div class="card-body p-4">

                    <div class="row gy-4">

                        <div class="col-md-6">

                            <small class="text-muted d-block">

                                Gateway

                            </small>

                            <h6 class="fw-bold">

                                {{ $paymentGateway->gateway }}

                            </h6>

                        </div>

                        <div class="col-md-6">

                            <small class="text-muted d-block">

                                Status

                            </small>

                            @if($paymentGateway->status)

                                <span class="badge bg-success px-3 py-2">

                                    Enabled

                                </span>

                            @else

                                <span class="badge bg-danger px-3 py-2">

                                    Disabled

                                </span>

                            @endif

                        </div>

                        <div class="col-md-6">

                            <small class="text-muted d-block">

                                Environment

                            </small>

                            <span class="badge bg-warning text-dark px-3 py-2">

                                {{ $paymentGateway->environment }}

                            </span>

                        </div>

                        <div class="col-md-6">

                            <small class="text-muted d-block">

                                Currency

                            </small>

                            <h6 class="fw-bold">

                                {{ $paymentGateway->currency }}

                            </h6>

                        </div>

                        <div class="col-12">

                            <small class="text-muted d-block">

                                Last Updated

                            </small>

                            <h6 class="fw-bold">

                                {{ $paymentGateway->updated_at?->format('d M Y h:i A') }}

                            </h6>

                        </div>

                    </div>

                </div>

            </div>


            {{-- Stripe --}}
            @if($paymentGateway->gateway=='Stripe')

            <div class="card border-0 shadow-lg rounded-4 mt-4">

                <div class="card-header bg-dark text-white py-3 rounded-top-4">

                    <h5 class="mb-0">

                        <i class="bi bi-credit-card me-2"></i>

                        Stripe Credentials

                    </h5>

                </div>

                <div class="card-body">

                    <table class="table align-middle">

                        <tr>

                            <th width="220">

                                Publishable Key

                            </th>

                            <td class="text-break">

                                {{ $paymentGateway->publishable_key }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Secret Key

                            </th>

                            <td>

                                **************

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Webhook Secret

                            </th>

                            <td>

                                **************

                            </td>

                        </tr>

                    </table>

                </div>

            </div>

            @endif


            {{-- PayPal --}}
            @if($paymentGateway->gateway=='PayPal')

            <div class="card border-0 shadow-lg rounded-4 mt-4">

                <div class="card-header bg-info text-white py-3 rounded-top-4">

                    <h5 class="mb-0">

                        <i class="bi bi-paypal me-2"></i>

                        PayPal Credentials

                    </h5>

                </div>

                <div class="card-body">

                    <table class="table">

                        <tr>

                            <th width="220">

                                Secret Key

                            </th>

                            <td>

                                **************

                            </td>

                        </tr>

                    </table>

                </div>

            </div>

            @endif


            {{-- Monnify --}}
            @if($paymentGateway->gateway=='Monnify')

            <div class="card border-0 shadow-lg rounded-4 mt-4">

                <div class="card-header bg-warning py-3 rounded-top-4">

                    <h5 class="mb-0">

                        <i class="bi bi-bank2 me-2"></i>

                        Monnify Credentials

                    </h5>

                </div>

                <div class="card-body">

                    <table class="table align-middle">

                        <tr>

                            <th width="220">

                                Secret Key

                            </th>

                            <td>

                                **************

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Contract Code

                            </th>

                            <td>

                                {{ $paymentGateway->contract_code }}

                            </td>

                        </tr>

                    </table>

                </div>

            </div>

            @endif

        </div>


        <!-- Right Side -->

        <div class="col-lg-4">

            <div class="card border-0 shadow-lg rounded-4">

                <div class="card-header bg-success text-white rounded-top-4 py-3">

                    <h5 class="mb-0">

                        <i class="bi bi-shield-check me-2"></i>

                        Gateway Status

                    </h5>

                </div>

                <div class="card-body">

                    <div class="text-center mb-4">

                        <div class="display-3 text-success">

                            <i class="bi bi-credit-card-2-front-fill"></i>

                        </div>

                    </div>

                    <ul class="list-group list-group-flush">

                        <li class="list-group-item d-flex justify-content-between">

                            <strong>

                                Gateway

                            </strong>

                            <span>

                                {{ $paymentGateway->gateway }}

                            </span>

                        </li>

                        <li class="list-group-item d-flex justify-content-between">

                            <strong>

                                Environment

                            </strong>

                            <span>

                                {{ $paymentGateway->environment }}

                            </span>

                        </li>

                        <li class="list-group-item d-flex justify-content-between">

                            <strong>

                                Currency

                            </strong>

                            <span>

                                {{ $paymentGateway->currency }}

                            </span>

                        </li>

                    </ul>

                    <div class="d-grid mt-4">

                        @if($paymentGateway->gateway=='Stripe')

                        <a href="{{ route('admin.payment-gateways.stripe') }}"
                           class="btn btn-primary rounded-pill">

                            <i class="bi bi-pencil-square me-1"></i>

                            Edit Stripe

                        </a>

                        @endif

                        @if($paymentGateway->gateway=='PayPal')

                        <a href="{{ route('admin.payment-gateways.paypal') }}"
                           class="btn btn-info text-white rounded-pill">

                            <i class="bi bi-pencil-square me-1"></i>

                            Edit PayPal

                        </a>

                        @endif

                        @if($paymentGateway->gateway=='Monnify')

                        <a href="{{ route('admin.payment-gateways.monnify') }}"
                           class="btn btn-warning rounded-pill">

                            <i class="bi bi-pencil-square me-1"></i>

                            Edit Monnify

                        </a>

                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection