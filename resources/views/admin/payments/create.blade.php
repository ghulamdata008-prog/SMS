@extends('layouts.app')

@section('title','Add Payment')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="card border-0 shadow-sm rounded-4 mb-4">

        <div class="card-body d-flex justify-content-between align-items-center flex-wrap">

            <div>

                <h2 class="fw-bold mb-1">

                    <i class="bi bi-wallet2 text-primary me-2"></i>

                    Add Payment

                </h2>

                <p class="text-muted mb-0">

                    Record a new student payment quickly and securely.

                </p>

            </div>

            <a href="{{ route('admin.payments.index') }}"
               class="btn btn-outline-secondary rounded-pill px-4 mt-3 mt-md-0">

                <i class="bi bi-arrow-left me-2"></i>

                Back

            </a>

        </div>

    </div>

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card border-0 shadow rounded-4">

                <div class="card-header bg-primary text-white py-3">

                    <h4 class="mb-0">

                        <i class="bi bi-credit-card-2-front-fill me-2"></i>

                        Payment Information

                    </h4>

                </div>

                <div class="card-body p-4">

                    <form action="{{ route('admin.payments.store') }}"
                          method="POST">

                        @csrf

                        <!-- Fee -->

                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                <i class="bi bi-receipt me-2 text-primary"></i>

                                Select Fee

                            </label>

                            <select
                                name="fee_id"
                                class="form-select form-select-lg">

                                <option value="">

                                    Select Fee

                                </option>

                                @foreach($fees as $fee)

                                <option value="{{ $fee->id }}">

                                    {{ $fee->student->name }}

                                    -

                                    Rs {{ $fee->remaining_amount }}

                                </option>

                                @endforeach

                            </select>

                        </div>

                        <!-- Amount -->

                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                <i class="bi bi-cash-stack me-2 text-success"></i>

                                Payment Amount

                            </label>

                            <div class="input-group input-group-lg">

                                <span class="input-group-text">

                                    Rs

                                </span>

                                <input
                                    type="number"
                                    step="0.01"
                                    name="amount"
                                    class="form-control"
                                    placeholder="Enter Amount">

                            </div>

                        </div>

                        <!-- Payment Method -->

                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                <i class="bi bi-credit-card me-2 text-warning"></i>

                                Payment Method

                            </label>

                            <select
                                name="payment_method"
                                class="form-select form-select-lg">

                                <option value="Cash">

                                    Cash

                                </option>

                                <option value="Bank">

                                    Bank Transfer

                                </option>

                                <option value="Stripe">

                                    Stripe

                                </option>

                                <option value="PayPal">

                                    PayPal

                                </option>

                                <option value="Monify">

                                    Monnify

                                </option>

                            </select>

                        </div>

                        <!-- Notes -->

                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                <i class="bi bi-journal-text me-2 text-info"></i>

                                Notes

                            </label>

                            <textarea
                                name="notes"
                                rows="4"
                                class="form-control"
                                placeholder="Write payment notes (Optional)"></textarea>

                        </div>

                        <hr class="my-4">

                        <!-- Buttons -->

                        <div class="d-flex justify-content-end gap-3 flex-wrap">

                            <a href="{{ route('admin.payments.index') }}"
                               class="btn btn-light border rounded-pill px-4">

                                <i class="bi bi-x-circle me-2"></i>

                                Cancel

                            </a>

                            <button class="btn btn-primary rounded-pill px-5">

                                <i class="bi bi-check-circle-fill me-2"></i>

                                Save Payment

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection