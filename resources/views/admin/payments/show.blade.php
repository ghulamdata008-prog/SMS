@extends('layouts.app')

@section('title','Payment Details')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="card border-0 shadow-sm rounded-4 mb-4">

        <div class="card-body d-flex justify-content-between align-items-center flex-wrap">

            <div>

                <h2 class="fw-bold mb-1">

                    <i class="bi bi-receipt-cutoff text-primary me-2"></i>

                    Payment Details

                </h2>

                <p class="text-muted mb-0">

                    View complete payment information.

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

        <div class="col-lg-9">

            <div class="card border-0 shadow rounded-4">

                <div class="card-header bg-primary text-white py-3">

                    <h4 class="mb-0">

                        <i class="bi bi-credit-card-2-front-fill me-2"></i>

                        Payment Information

                    </h4>

                </div>

                <div class="card-body p-4">

                    <table class="table align-middle">

                        <tbody>

                            <tr>

                                <th width="260" class="text-secondary">

                                    <i class="bi bi-person-fill me-2 text-primary"></i>

                                    Student

                                </th>

                                <td class="fw-semibold">

                                    {{ $payment->student->name }}

                                </td>

                            </tr>

                            <tr>

                                <th class="text-secondary">

                                    <i class="bi bi-cash-stack me-2 text-success"></i>

                                    Amount

                                </th>

                                <td>

                                    <span class="badge bg-success fs-6 px-3 py-2">

                                        Rs {{ number_format($payment->amount,2) }}

                                    </span>

                                </td>

                            </tr>

                            <tr>

                                <th class="text-secondary">

                                    <i class="bi bi-bank me-2 text-warning"></i>

                                    Gateway

                                </th>

                                <td>

                                    <span class="badge bg-light text-dark border">

                                        {{ $payment->payment_gateway }}

                                    </span>

                                </td>

                            </tr>

                            <tr>

                                <th class="text-secondary">

                                    <i class="bi bi-credit-card me-2 text-info"></i>

                                    Method

                                </th>

                                <td>

                                    {{ $payment->payment_method }}

                                </td>

                            </tr>

                            <tr>

                                <th class="text-secondary">

                                    <i class="bi bi-check-circle me-2 text-primary"></i>

                                    Status

                                </th>

                                <td>

                                    @if($payment->payment_status=='Paid')

                                        <span class="badge bg-success rounded-pill px-3 py-2">

                                            <i class="bi bi-check-circle-fill me-1"></i>

                                            Paid

                                        </span>

                                    @elseif($payment->payment_status=='Pending')

                                        <span class="badge bg-warning text-dark rounded-pill px-3 py-2">

                                            <i class="bi bi-clock-history me-1"></i>

                                            Pending

                                        </span>

                                    @else

                                        <span class="badge bg-danger rounded-pill px-3 py-2">

                                            <i class="bi bi-x-circle-fill me-1"></i>

                                            Failed

                                        </span>

                                    @endif

                                </td>

                            </tr>

                            <tr>

                                <th class="text-secondary">

                                    <i class="bi bi-upc-scan me-2 text-dark"></i>

                                    Transaction ID

                                </th>

                                <td>

                                    <code>

                                        {{ $payment->transaction_id }}

                                    </code>

                                </td>

                            </tr>

                            <tr>

                                <th class="text-secondary">

                                    <i class="bi bi-hash me-2 text-danger"></i>

                                    Reference No

                                </th>

                                <td>

                                    <code>

                                        {{ $payment->reference_no }}

                                    </code>

                                </td>

                            </tr>

                            <tr>

                                <th class="text-secondary">

                                    <i class="bi bi-calendar-event me-2 text-primary"></i>

                                    Payment Date

                                </th>

                                <td>

                                    {{ $payment->payment_date }}

                                </td>

                            </tr>

                        </tbody>

                    </table>

                    <hr class="my-4">

                    <div class="d-flex justify-content-end">

                        <a href="{{ route('admin.payments.index') }}"
                           class="btn btn-primary rounded-pill px-4">

                            <i class="bi bi-arrow-left-circle me-2"></i>

                            Back to Payments

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection