@extends('layouts.app')

@section('title','Monnify Settings')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">

        <div>

            <h2 class="fw-bold mb-1">

                <i class="bi bi-bank2 text-warning me-2"></i>

                Monnify Gateway Settings

            </h2>

            <p class="text-muted mb-0">

                Configure your Monnify payment gateway securely.

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

                <div class="card-header bg-warning py-4 rounded-top-4">

                    <div class="d-flex align-items-center">

                        <div class="bg-white text-warning rounded-circle d-flex justify-content-center align-items-center me-3"
                             style="width:60px;height:60px;">

                            <i class="bi bi-bank2 fs-2"></i>

                        </div>

                        <div>

                            <h4 class="fw-bold mb-1">

                                Monnify Configuration

                            </h4>

                            <small class="text-dark">

                                African Payment Gateway Settings

                            </small>

                        </div>

                    </div>

                </div>

                <div class="card-body p-5">

                    <form action="{{ route('admin.payment-gateways.monnify.store') }}"
                          method="POST">

                        @csrf

                        <!-- Client ID -->

                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                Client ID

                            </label>

                            <div class="input-group">

                                <span class="input-group-text">

                                    <i class="bi bi-person-badge-fill text-warning"></i>

                                </span>

                                <input
                                    type="text"
                                    name="client_id"
                                    value="{{ old('client_id',$gateway->client_id) }}"
                                    class="form-control"
                                    placeholder="Enter Client ID">

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

                                <input
                                    type="text"
                                    name="secret_key"
                                    value="{{ old('secret_key',$gateway->secret_key) }}"
                                    class="form-control"
                                    placeholder="Enter Secret Key">

                            </div>

                        </div>

                        <!-- Contract Code -->

                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                Contract Code

                            </label>

                            <div class="input-group">

                                <span class="input-group-text">

                                    <i class="bi bi-file-earmark-lock-fill text-success"></i>

                                </span>

                                <input
                                    type="text"
                                    name="contract_code"
                                    value="{{ old('contract_code',$gateway->contract_code) }}"
                                    class="form-control"
                                    placeholder="Enter Contract Code">

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

                                    <input
                                        type="text"
                                        name="currency"
                                        value="{{ old('currency',$gateway->currency ?? 'NGN') }}"
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

                                    <select
                                        name="environment"
                                        class="form-select">

                                        <option value="Sandbox"
                                            {{ $gateway->environment=='Sandbox' ? 'selected':'' }}>

                                            Sandbox

                                        </option>

                                        <option value="Live"
                                            {{ $gateway->environment=='Live' ? 'selected':'' }}>

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

                                        Enable Monnify

                                    </h6>

                                    <small class="text-muted">

                                        Allow payments through Monnify.

                                    </small>

                                </div>

                                <div class="form-check form-switch">

                                    <input
                                        class="form-check-input fs-4"
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

                            <button class="btn btn-warning rounded-pill px-5">

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