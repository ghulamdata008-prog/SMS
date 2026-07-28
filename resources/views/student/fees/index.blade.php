@extends('layouts.student')

@section('title','My Fees')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold">
                <i class="bi bi-wallet2"></i>
                My Fees
            </h2>

            <p class="text-muted">
                View your fee details and pay online.
            </p>

        </div>

    </div>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <div class="card shadow border-0">

        <div class="card-body">

            <table class="table table-hover align-middle">

                <thead class="table-dark">

                    <tr>

                        <th>#</th>

                        <th>Fee Type</th>

                        <th>Total Fee</th>

                        <th>Paid</th>

                        <th>Remaining</th>

                        <th>Status</th>

                        <th width="230">Action</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($fees as $fee)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $fee->fee_type }}</td>

                        <td>Rs {{ number_format($fee->total_fee,2) }}</td>

                        <td class="text-success">
                            Rs {{ number_format($fee->paid_fee,2) }}
                        </td>

                        <td class="text-danger">
                            Rs {{ number_format($fee->remaining_fee,2) }}
                        </td>

                        <td>

                            @if($fee->status=='Paid')

                                <span class="badge bg-success">

                                    Paid

                                </span>

                            @elseif($fee->status=='Partial')

                                <span class="badge bg-warning">

                                    Partial

                                </span>

                            @else

                                <span class="badge bg-danger">

                                    Pending

                                </span>

                            @endif

                        </td>

                        <td>

                            <a href="{{ route('student.fees.show',$fee->id) }}"
                               class="btn btn-info btn-sm">

                                <i class="bi bi-eye"></i>

                                View

                            </a>

                            @if($fee->remaining_fee > 0)

                                <a href="{{ route('student.fees.show',$fee->id) }}"
                                   class="btn btn-success btn-sm">

                                    <i class="bi bi-credit-card"></i>

                                    Pay Now

                                </a>

                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7" class="text-center">

                            No Fee Record Found.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection