@extends('layouts.app')

@section('title','Payments')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-body d-flex flex-wrap justify-content-between align-items-center">

            <div>
                <h2 class="fw-bold mb-1">
                    <i class="bi bi-wallet2 text-primary me-2"></i>
                    Payment Management
                </h2>

                <p class="text-muted mb-0">
                    Manage all student payment records from one place.
                </p>
            </div>

            <a href="{{ route('admin.payments.create') }}"
               class="btn btn-primary rounded-pill px-4 mt-3 mt-md-0">

                <i class="bi bi-plus-circle me-2"></i>

                Add Payment

            </a>

        </div>
    </div>

    <!-- Card -->
    <div class="card border-0 shadow rounded-4">

        <div class="card-header bg-white border-0 py-3">

            <h5 class="fw-bold mb-0">

                <i class="bi bi-credit-card text-primary me-2"></i>

                Payment Records

            </h5>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table align-middle table-hover">

                    <thead class="table-light">

                    <tr>

                        <th>#</th>

                        <th>Student</th>

                        <th>Amount</th>

                        <th>Method</th>

                        <th>Status</th>

                        <th>Date</th>

                        <th class="text-center" width="220">
                            Actions
                        </th>

                    </tr>

                    </thead>

                    <tbody>

                    @forelse($payments as $payment)

                        <tr>

                            <td>

                                <span class="badge bg-light text-dark">
                                    #{{ $payment->id }}
                                </span>

                            </td>

                            <td>

                                <div class="d-flex align-items-center">

                                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3"
                                         style="width:45px;height:45px;">

                                        <i class="bi bi-person-fill"></i>

                                    </div>

                                    <div>

                                        <div class="fw-semibold">

                                            {{ $payment->student->name }}

                                        </div>

                                        <small class="text-muted">

                                            Student

                                        </small>

                                    </div>

                                </div>

                            </td>

                            <td>

                                <span class="fw-bold text-success">

                                    Rs {{ number_format($payment->amount,2) }}

                                </span>

                            </td>

                            <td>

                                <span class="badge bg-light text-dark border">

                                    {{ $payment->payment_method }}

                                </span>

                            </td>

                            <td>

                                @if($payment->payment_status=='Paid')

                                    <span class="badge rounded-pill bg-success px-3 py-2">

                                        <i class="bi bi-check-circle me-1"></i>

                                        Paid

                                    </span>

                                @elseif($payment->payment_status=='Pending')

                                    <span class="badge rounded-pill bg-warning text-dark px-3 py-2">

                                        <i class="bi bi-clock-history me-1"></i>

                                        Pending

                                    </span>

                                @else

                                    <span class="badge rounded-pill bg-danger px-3 py-2">

                                        <i class="bi bi-x-circle me-1"></i>

                                        Failed

                                    </span>

                                @endif

                            </td>

                            <td>

                                <span class="text-muted">

                                    {{ $payment->payment_date }}

                                </span>

                            </td>

                          <td class="text-center align-middle">

    <div class="d-flex justify-content-center align-items-center gap-2">

        <a href="{{ route('admin.payments.show',$payment) }}"
           class="btn btn-sm btn-outline-info d-flex align-items-center">
            <i class="bi bi-eye me-1"></i>
            View
        </a>

        <a href="{{ route('admin.payments.edit',$payment) }}"
           class="btn btn-sm btn-outline-warning d-flex align-items-center">
            <i class="bi bi-pencil-square me-1"></i>
            Edit
        </a>

        <form action="{{ route('admin.payments.destroy',$payment) }}"
              method="POST"
              class="m-0 p-0 d-flex">

            @csrf
            @method('DELETE')

            <button type="submit"
                    onclick="return confirm('Delete Payment?')"
                    class="btn btn-sm btn-outline-danger d-flex align-items-center">

                <i class="bi bi-trash me-1"></i>
                Delete

            </button>

        </form>

    </div>

</td>
                        </tr>

                    @empty

                        <tr>

                            <td colspan="7">

                                <div class="text-center py-5">

                                    <i class="bi bi-wallet2 display-3 text-secondary"></i>

                                    <h5 class="fw-bold mt-3">

                                        No Payments Found

                                    </h5>

                                    <p class="text-muted">

                                        Payment records will appear here once created.

                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-4 d-flex justify-content-end">

                {{ $payments->links() }}

            </div>

        </div>

    </div>

</div>

@endsection