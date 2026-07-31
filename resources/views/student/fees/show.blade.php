@extends('layouts.student')

@section('title','Fee Details')

@section('content')

<div class="container-fluid">

    <!-- Header -->

    <div class="fee-header mb-4">

        <div>

            <span class="header-badge">

                <i class="bi bi-wallet2"></i>

                Student Finance

            </span>

            <h2 class="mt-3">

                Fee Details

            </h2>

            <p>

                Review your fee information and complete your payment securely.

            </p>

        </div>

        <div class="header-icon">

            <i class="bi bi-credit-card-2-front-fill"></i>

        </div>

    </div>

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="fee-card">

                <div class="fee-card-header">

                    <h5 class="mb-0">

                        <i class="bi bi-receipt-cutoff me-2"></i>

                        Fee Information

                    </h5>

                </div>

                <div class="card-body p-4">

                    <table class="table fee-table align-middle">

                        <tbody>

                            <tr>

                                <th>Fee Type</th>

                                <td>

                                    <span class="info-badge">

                                        {{ $fee->fee_type }}

                                    </span>

                                </td>

                            </tr>

                            <tr>

                                <th>Total Fee</th>

                                <td>

                                    <span class="total-badge">

                                        Rs {{ number_format($fee->total_fee,2) }}

                                    </span>

                                </td>

                            </tr>

                            <tr>

                                <th>Paid Fee</th>

                                <td>

                                    <span class="paid-badge">

                                        Rs {{ number_format($fee->paid_fee,2) }}

                                    </span>

                                </td>

                            </tr>

                            <tr>

                                <th>Remaining Fee</th>

                                <td>

                                    <span class="remaining-badge">

                                        Rs {{ number_format($fee->remaining_fee,2) }}

                                    </span>

                                </td>

                            </tr>

                            <tr>

                                <th>Status</th>

                                <td>

                                    @if($fee->status=='Paid')

                                        <span class="status success">

                                            <i class="bi bi-check-circle-fill"></i>

                                            Paid

                                        </span>

                                    @elseif($fee->status=='Partial')

                                        <span class="status warning">

                                            <i class="bi bi-clock-fill"></i>

                                            Partial

                                        </span>

                                    @else

                                        <span class="status danger">

                                            <i class="bi bi-exclamation-circle-fill"></i>

                                            Pending

                                        </span>

                                    @endif

                                </td>

                            </tr>

                        </tbody>

                    </table>

                    @if($fee->remaining_fee>0)

                    <form action="{{ route('student.fees.pay',$fee) }}" method="POST" class="mt-4">

                        @csrf

                        <input
                            type="hidden"
                            name="payment_method"
                            value="Stripe">

                        <button class="btn btn-pay w-100">

                            <i class="bi bi-credit-card me-2"></i>

                            Pay with Stripe

                        </button>

                    </form>

                    @endif

                    <a href="{{ route('student.fees.index') }}"
                       class="btn btn-back mt-3">

                        <i class="bi bi-arrow-left me-2"></i>

                        Back

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

<style>

.fee-header{
    background:linear-gradient(135deg,#111827,#2563eb);
    color:#fff;
    border-radius:24px;
    padding:35px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    box-shadow:0 15px 35px rgba(37,99,235,.25);
}

.header-badge{
    display:inline-flex;
    align-items:center;
    gap:8px;
    background:rgba(255,255,255,.15);
    padding:8px 18px;
    border-radius:30px;
    font-size:13px;
    font-weight:600;
}

.fee-header h2{
    margin-top:18px;
    font-weight:700;
}

.fee-header p{
    color:rgba(255,255,255,.85);
    margin-bottom:0;
}

.header-icon{
    width:90px;
    height:90px;
    border-radius:22px;
    background:rgba(255,255,255,.15);
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:42px;
}

.fee-card{
    background:#fff;
    border-radius:22px;
    overflow:hidden;
    box-shadow:0 15px 40px rgba(0,0,0,.08);
}

.fee-card-header{
    background:#f8fafc;
    padding:22px 25px;
    border-bottom:1px solid #e5e7eb;
}

.fee-card-header h5{
    font-weight:700;
}

.fee-table{
    margin-bottom:0;
}

.fee-table th{
    width:220px;
    color:#64748b;
    font-weight:700;
    padding:18px;
}

.fee-table td{
    padding:18px;
}

.info-badge,
.total-badge,
.paid-badge,
.remaining-badge{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    min-width:170px;
    padding:9px 16px;
    border-radius:30px;
    font-weight:600;
}

.info-badge{
    background:#e0f2fe;
    color:#0369a1;
}

.total-badge{
    background:#dbeafe;
    color:#2563eb;
}

.paid-badge{
    background:#dcfce7;
    color:#15803d;
}

.remaining-badge{
    background:#fee2e2;
    color:#dc2626;
}

.status{
    display:inline-flex;
    align-items:center;
    gap:6px;
    padding:9px 16px;
    border-radius:30px;
    font-weight:600;
}

.success{
    background:#dcfce7;
    color:#15803d;
}

.warning{
    background:#fef3c7;
    color:#b45309;
}

.danger{
    background:#fee2e2;
    color:#dc2626;
}

.btn-pay{
    height:50px;
    border:none;
    border-radius:14px;
    background:linear-gradient(135deg,#2563eb,#3b82f6);
    color:#fff;
    font-weight:600;
}

.btn-pay:hover{
    color:#fff;
    background:linear-gradient(135deg,#1d4ed8,#2563eb);
}

.btn-back{
    width:100%;
    height:50px;
    border-radius:14px;
    background:#6b7280;
    color:#fff;
    display:flex;
    align-items:center;
    justify-content:center;
    font-weight:600;
}

.btn-back:hover{
    color:#fff;
    background:#4b5563;
}

@media(max-width:768px){

.fee-header{
    flex-direction:column;
    text-align:center;
    gap:20px;
}

.fee-table th{
    width:140px;
}

.info-badge,
.total-badge,
.paid-badge,
.remaining-badge{
    min-width:130px;
}

}

</style>

@endsection