@extends('layouts.app')

@section('title','Payment Gateways')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="card border-0 shadow-sm rounded-4 mb-4">

        <div class="card-body d-flex justify-content-between align-items-center flex-wrap">

            <div>

                <h2 class="fw-bold mb-2">

                    <i class="bi bi-credit-card-2-front-fill text-primary me-2"></i>

                    Payment Gateway Settings

                </h2>

                <p class="text-muted mb-0">

                    Configure and manage all payment gateways from one dashboard.

                </p>

            </div>

            <span class="badge bg-primary-subtle text-primary fs-6 px-4 py-2 rounded-pill">

                <i class="bi bi-shield-check me-2"></i>

                Secure Payments

            </span>

        </div>

    </div>

    <div class="row g-4">

        <!-- Stripe -->
        <div class="col-lg-4 col-md-6">

            <div class="card border-0 shadow rounded-4 h-100">

                <div class="card-body text-center p-5">

                    <div class="mb-4">

                        <img src="data:image/webp;base64,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"
                             width="75">

                    </div>

                    <h3 class="fw-bold">

                        Stripe

                    </h3>

                    <p class="text-muted mb-4">

                        Accept Credit & Debit Card payments securely.

                    </p>

                    <div class="d-grid gap-2">

                        <a href="{{ route('admin.payment-gateways.stripe') }}"
                           class="btn btn-primary rounded-pill">

                            <i class="bi bi-gear-fill me-2"></i>

                            Configure Stripe

                        </a>

                        @if($stripe)

                        <a href="{{ route('admin.payment-gateways.show',$stripe->id) }}"
                           class="btn btn-outline-primary rounded-pill">

                            <i class="bi bi-eye-fill me-2"></i>

                            View Configuration

                        </a>

                        @endif

                    </div>

                </div>

            </div>

        </div>

        <!-- PayPal -->

        <div class="col-lg-4 col-md-6">

            <div class="card border-0 shadow rounded-4 h-100">

                <div class="card-body text-center p-5">

                    <div class="mb-4">

                        <img src="https://www.paypalobjects.com/webstatic/icon/pp258.png"
                             width="75">

                    </div>

                    <h3 class="fw-bold">

                        PayPal

                    </h3>

                    <p class="text-muted mb-4">

                        International online payment solution.

                    </p>

                    <div class="d-grid gap-2">

                        <a href="{{ route('admin.payment-gateways.paypal') }}"
                           class="btn btn-info text-white rounded-pill">

                            <i class="bi bi-gear-fill me-2"></i>

                            Configure PayPal

                        </a>

                        @if($paypal)

                        <a href="{{ route('admin.payment-gateways.show',$paypal->id) }}"
                           class="btn btn-outline-info rounded-pill">

                            <i class="bi bi-eye-fill me-2"></i>

                            View Configuration

                        </a>

                        @endif

                    </div>

                </div>

            </div>

        </div>

        <!-- Monnify -->

        <div class="col-lg-4 col-md-6">

            <div class="card border-0 shadow rounded-4 h-100">

                <div class="card-body text-center p-5">

                    <div class="mb-4">

                        <div class="rounded-circle bg-warning bg-opacity-25 d-inline-flex align-items-center justify-content-center"
                             style="width:90px;height:90px;">

                            <i class="bi bi-bank2 text-warning"
                               style="font-size:42px;"></i>

                        </div>

                    </div>

                    <h3 class="fw-bold">

                        Monnify

                    </h3>

                    <p class="text-muted mb-4">

                        African payment gateway integration.

                    </p>

                    <div class="d-grid gap-2">

                        <a href="{{ route('admin.payment-gateways.monnify') }}"
                           class="btn btn-warning rounded-pill">

                            <i class="bi bi-gear-fill me-2"></i>

                            Configure Monnify

                        </a>

                        @if($monnify)

                        <a href="{{ route('admin.payment-gateways.show',$monnify->id) }}"
                           class="btn btn-outline-warning rounded-pill">

                            <i class="bi bi-eye-fill me-2"></i>

                            View Configuration

                        </a>

                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection