@extends('layouts.app')

@section('title','Fee Management')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="card border-0 shadow-sm mb-4 rounded-4">
        <div class="card-body d-flex justify-content-between align-items-center flex-wrap">

            <div>
                <h2 class="fw-bold mb-1">
                    <i class="bi bi-cash-coin text-primary me-2"></i>
                    Fee Management
                </h2>

                <p class="text-muted mb-0">
                    Manage student fee records
                </p>
            </div>

            <a href="{{ route('admin.fees.create') }}"
               class="btn btn-primary rounded-pill px-4">

                <i class="bi bi-plus-circle me-2"></i>

                Add Fee

            </a>

        </div>
    </div>


    <!-- Table Card -->

    <div class="card border-0 shadow rounded-4">

        <div class="card-header bg-white border-0 py-3">

            <h5 class="fw-bold mb-0">

                <i class="bi bi-table me-2 text-primary"></i>

                Fee Records

            </h5>

        </div>

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-dark">

                    <tr>

                        <th class="ps-4">#</th>

                        <th>Student</th>

                        <th>Class</th>

                        <th>Fee Type</th>

                        <th>Total</th>

                        <th>Paid</th>

                        <th>Remaining</th>

                        <th>Status</th>

                        <th class="text-center pe-4">
                            Action
                        </th>

                    </tr>

                    </thead>

                    <tbody>

                    @foreach($fees as $fee)

                        <tr>

                            <td class="ps-4 fw-bold">

                                {{ $loop->iteration }}

                            </td>

                            <td>

                                <div class="d-flex align-items-center">

                                    <div class="rounded-circle bg-primary text-white fw-bold d-flex justify-content-center align-items-center me-3"
                                         style="width:45px;height:45px;">

                                        {{ strtoupper(substr($fee->student->name,0,1)) }}

                                    </div>

                                    <div>

                                        <div class="fw-semibold">

                                            {{ $fee->student->name }}

                                        </div>

                                    </div>

                                </div>

                            </td>

                            <td>

                                <span class="badge bg-primary-subtle text-primary px-3 py-2">

                                    {{ $fee->schoolClass->name }}

                                </span>

                            </td>

                            <td>

                                <span class="badge bg-info-subtle text-info px-3 py-2">

                                    {{ $fee->fee_type }}

                                </span>

                            </td>

                            <td class="fw-bold">

                                Rs {{ number_format($fee->amount) }}

                            </td>

                            <td class="fw-bold text-success">

                                Rs {{ number_format($fee->paid_amount) }}

                            </td>

                            <td class="fw-bold text-danger">

                                Rs {{ number_format($fee->remaining_amount) }}

                            </td>

                            <td>

                                @if($fee->status=='Paid')

                                    <span class="badge rounded-pill bg-success px-3 py-2">

                                        <i class="bi bi-check-circle me-1"></i>

                                        Paid

                                    </span>

                                @elseif($fee->status=='Partial')

                                    <span class="badge rounded-pill bg-warning text-dark px-3 py-2">

                                        <i class="bi bi-hourglass-split me-1"></i>

                                        Partial

                                    </span>

                                @else

                                    <span class="badge rounded-pill bg-danger px-3 py-2">

                                        <i class="bi bi-exclamation-circle me-1"></i>

                                        Pending

                                    </span>

                                @endif

                            </td>

                            <td class="text-center pe-4">

    <div class="d-flex justify-content-center align-items-center gap-2">

        <a href="{{ route('admin.fees.show',$fee) }}"
           class="btn btn-outline-info btn-sm">
            <i class="bi bi-eye"></i>
        </a>

        <a href="{{ route('admin.fees.edit',$fee) }}"
           class="btn btn-outline-warning btn-sm">
            <i class="bi bi-pencil-square"></i>
        </a>

        <form action="{{ route('admin.fees.destroy',$fee) }}"
              method="POST"
              class="m-0">

            @csrf
            @method('DELETE')

            <button
                onclick="return confirm('Delete Fee?')"
                class="btn btn-outline-danger btn-sm">

                <i class="bi bi-trash"></i>

            </button>

        </form>

    </div>

</td>
                        </tr>

                    @endforeach

                    </tbody>

                </table>

            </div>

        </div>

        <div class="card-footer bg-white border-0">

            {{ $fees->links() }}

        </div>

    </div>

</div>

@endsection