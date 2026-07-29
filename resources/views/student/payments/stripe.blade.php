@extends('layouts.student')

@section('title', 'Stripe Payment')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow-lg border-0 rounded-4">

                <div class="card-header bg-primary text-white text-center py-4">

                    <h3 class="mb-1">
                        <i class="bi bi-credit-card-2-front-fill"></i>
                        Stripe Secure Payment
                    </h3>

                    <small>Complete your school fee payment securely</small>

                </div>

                <div class="card-body p-4">

                    <!-- Student Information -->

                    <div class="card border-0 bg-light mb-4">

                        <div class="card-body">

                            <h5 class="text-primary mb-3">
                                Student Information
                            </h5>

                            <table class="table table-borderless mb-0">

                                <tr>
                                    <th width="180">Student Name</th>
                                    <td>{{ $payment->student->name }}</td>
                                </tr>

                                <tr>
                                    <th>Email</th>
                                    <td>{{ $payment->student->email }}</td>
                                </tr>

                                <tr>
                                    <th>Class</th>
                                    <td>
                                        {{ $payment->student->schoolClass->name ?? 'N/A' }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>Section</th>
                                    <td>
                                        {{ $payment->student->section->name ?? 'N/A' }}
                                    </td>
                                </tr>

                            </table>

                        </div>

                    </div>

                    <!-- Fee Information -->

                    <div class="card border-0 bg-light mb-4">

                        <div class="card-body">

                            <h5 class="text-success mb-3">
                                Fee Details
                            </h5>

                            <table class="table table-borderless mb-0">

                                <tr>
                                    <th width="180">Fee Type</th>
                                    <td>{{ $payment->fee->fee_type }}</td>
                                </tr>

                                <tr>
                                    <th>Amount</th>
                                    <td class="fw-bold text-success">
                                        PKR {{ number_format($payment->amount,2) }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>Status</th>
                                    <td>

                                        <span class="badge bg-warning">
                                            {{ $payment->payment_status }}
                                        </span>

                                    </td>
                                </tr>

                            </table>

                        </div>

                    </div>

                    <!-- Payment Form -->

                    <form id="payment-form"
                          action="{{ route('student.stripe.process',$payment) }}"
                          method="POST">

                        @csrf

                        <div class="mb-3">

                            <label class="form-label">
                                Card Holder Name
                            </label>

                            <input
                                type="text"
                                name="card_name"
                                class="form-control"
                                value="{{ $payment->student->name }}"
                                required>

                        </div>

                        <div class="mb-4">

                            <label class="form-label">
                                Card Details
                            </label>

                            <!-- Stripe Card Element -->

                            <div id="card-element"
                                 class="form-control p-3"
                                 style="height:50px;">
                            </div>

                            <small class="text-muted">
                                Visa, Mastercard and other cards are supported.
                            </small>

                        </div>

                        <div id="card-errors"
                             class="text-danger mb-3">
                        </div>

                        <button
                            class="btn btn-primary btn-lg w-100">

                            <i class="bi bi-lock-fill"></i>

                            Pay PKR {{ number_format($payment->amount,2) }}

                        </button>

                    </form>

                    <div class="text-center mt-4">

                        <a href="{{ route('student.fees.show',$payment->fee) }}"
                           class="btn btn-outline-secondary">

                            Back to Fee Details

                        </a>

                    </div>

                </div>

                <div class="card-footer bg-white text-center">

                    <small class="text-muted">

                        🔒 Your payment is protected by Stripe Secure Checkout.

                    </small>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection