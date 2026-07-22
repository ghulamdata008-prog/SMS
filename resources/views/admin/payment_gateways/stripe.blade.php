@extends('layouts.app')

@section('title','Stripe Settings')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">

        <div>

            <h2 class="fw-bold mb-1">
                <i class="bi bi-stripe text-primary me-2"></i>
                Stripe Payment Gateway
            </h2>

            <p class="text-muted mb-0">
                Configure your Stripe payment gateway settings.
            </p>

        </div>

        <a href="{{ route('admin.payment-gateways.index') }}"
           class="btn btn-outline-secondary rounded-pill px-4">

            <i class="bi bi-arrow-left-circle me-1"></i>

            Back

        </a>

    </div>

    <div class="row justify-content-center">

        <div class="col-xl-9 col-lg-10">

            <div class="card border-0 shadow-lg rounded-4">

                <div class="card-header bg-primary text-white py-4 rounded-top-4">

                    <div class="d-flex align-items-center">

                        <div class="bg-white text-primary rounded-circle d-flex justify-content-center align-items-center me-3"
                             style="width:60px;height:60px;">

                            <i class="bi bi-credit-card-2-front-fill fs-3"></i>

                        </div>

                        <div>

                            <h4 class="mb-1 fw-bold">

                                Stripe Configuration

                            </h4>

                            <small>

                                Secure Card Payment Settings

                            </small>

                        </div>

                    </div>

                </div>

                <div class="card-body p-5">

                    @if($errors->any())

                    <div class="alert alert-danger rounded-4">

                        <h6 class="fw-bold">

                            <i class="bi bi-exclamation-triangle-fill me-2"></i>

                            Please fix the following errors

                        </h6>

                        <!-- <ul class="mb-0 mt-2">

                            @foreach($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul> -->

                    </div>

                    @endif

                    <form action="{{ route('admin.payment-gateways.stripe.store') }}"
                          method="POST">

                        @csrf

                        <!-- Publishable Key -->

                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                Publishable Key

                            </label>

                            <div class="input-group">

                                <span class="input-group-text">

                                    <i class="bi bi-key-fill text-primary"></i>

                                </span>

                                <input type="text"
                                       name="publishable_key"
                                       value="{{ old('publishable_key',$gateway->publishable_key) }}"
                                       class="form-control"
                                       placeholder="pk_test_xxxxxxxxxxxxxx">

                            </div>

                        </div>

                        <!-- Secret Key -->

                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                Secret Key

                            </label>

                            <div class="input-group">

                                <span class="input-group-text">

                                    <i class="bi bi-shield-lock-fill text-danger"></i>

                                </span>

                                <input type="text"
                                       name="secret_key"
                                       value="{{ old('secret_key',$gateway->secret_key) }}"
                                       class="form-control"
                                       placeholder="sk_test_xxxxxxxxxxxxxx">

                            </div>

                        </div>

                        <div class="row">

                            <!-- Currency -->

                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-semibold">

                                    Currency

                                </label>

                                <div class="input-group">

                                    <span class="input-group-text">

                                        <i class="bi bi-currency-exchange"></i>

                                    </span>

                                    <input type="text"
                                           name="currency"
                                           value="{{ old('currency',$gateway->currency ?? 'PKR') }}"
                                           class="form-control">

                                </div>

                            </div>

                            <!-- Environment -->

                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-semibold">

                                    Environment

                                </label>

                                <div class="input-group">

                                    <span class="input-group-text">

                                        <i class="bi bi-globe2"></i>

                                    </span>

                                    <select name="environment"
                                            class="form-select">

                                        <option value="Sandbox"
                                            {{ ($gateway->environment=='Sandbox')?'selected':'' }}>

                                            Sandbox

                                        </option>

                                        <option value="Live"
                                            {{ ($gateway->environment=='Live')?'selected':'' }}>

                                            Live

                                        </option>

                                    </select>

                                </div>

                            </div>

                        </div>

                        <!-- Status -->

                        <div class="card bg-light border-0 rounded-4 mb-4">

                            <div class="card-body d-flex justify-content-between align-items-center">

                                <div>

                                    <h6 class="fw-bold mb-1">

                                        Enable Stripe

                                    </h6>

                                    <small class="text-muted">

                                        Activate Stripe payments for your application.

                                    </small>

                                </div>

                                <div class="form-check form-switch">

                                    <input class="form-check-input fs-4"
                                           type="checkbox"
                                           name="status"
                                           value="1"
                                           {{ $gateway->status ? 'checked':'' }}>

                                </div>

                            </div>

                        </div>

                        <!-- Buttons -->

                        <div class="d-flex justify-content-end gap-3">

                            <a href="{{ route('admin.payment-gateways.index') }}"
                               class="btn btn-outline-secondary rounded-pill px-4">

                                <i class="bi bi-x-circle me-1"></i>

                                Cancel

                            </a>

                            <button class="btn btn-primary rounded-pill px-5">

                                <i class="bi bi-check-circle-fill me-2"></i>

                                Save Settings

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection