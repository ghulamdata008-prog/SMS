@extends('layouts.student')

@section('title','Payment History')

@section('content')

<div class="container-fluid">

    <!-- Header -->

    <div class="payment-header mb-4">

        <div>

            <span class="header-badge">

                <i class="bi bi-credit-card-2-front"></i>

                Student Finance

            </span>

            <h2 class="mt-3">

                Payment History

            </h2>

            <p>

                View all your completed and pending payment transactions.

            </p>

        </div>

        <div class="header-icon">

            <i class="bi bi-wallet2"></i>

        </div>

    </div>

    <div class="payment-card">

        <div class="payment-card-header">

            <div>

                <h5 class="mb-1">

                    Payment Records

                </h5>

                <small>

                    Complete transaction history

                </small>

            </div>

            <span>

                {{ $payments->count() }} Records

            </span>

        </div>

        <div class="table-responsive">

            <table class="table payment-table align-middle mb-0">

                <thead>

                    <tr>

                        <th>#</th>

                        <th>Invoice</th>

                        <th>Amount</th>

                        <th>Method</th>

                        <th>Status</th>

                        <th>Date</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($payments as $payment)

                <tr>

                    <td>

                        <div class="number-box">

                            {{ $loop->iteration }}

                        </div>

                    </td>

                    <td>

                        <div class="invoice-box">

                            <div class="invoice-icon">

                                <i class="bi bi-receipt"></i>

                            </div>

                            <strong>

                                {{ $payment->reference_no }}

                            </strong>

                        </div>

                    </td>

                    <td>

                        <span class="amount-badge">

                            Rs {{ number_format($payment->amount,2) }}

                        </span>

                    </td>

                    <td>

                        <span class="method-badge">

                            {{ $payment->payment_method }}

                        </span>

                    </td>

                    <td>

                        @if($payment->payment_status=='Paid')

                            <span class="status success">

                                <i class="bi bi-check-circle-fill"></i>

                                Paid

                            </span>

                        @else

                            <span class="status warning">

                                <i class="bi bi-clock-fill"></i>

                                Pending

                            </span>

                        @endif

                    </td>

                    <td>

                        <span class="date-badge">

                            {{ \Carbon\Carbon::parse($payment->payment_date)->format('d M Y') }}

                        </span>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="6">

                        <div class="empty-state">

                            <i class="bi bi-wallet2"></i>

                            <h5>

                                No Payment History Found

                            </h5>

                            <p>

                                Your payment transactions will appear here.

                            </p>

                        </div>

                    </td>

                </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="card-footer bg-white border-0 py-3">

            {{ $payments->links() }}

        </div>

    </div>

</div>

<style>

/* HEADER */

.payment-header{
    background:linear-gradient(135deg,#111827,#2563eb);
    border-radius:24px;
    padding:35px;
    color:#fff;
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

.payment-header h2{
    margin-top:18px;
    margin-bottom:10px;
    font-size:34px;
    font-weight:700;
}

.payment-header p{
    margin:0;
    color:rgba(255,255,255,.85);
}

.header-icon{
    width:90px;
    height:90px;
    border-radius:22px;
    background:rgba(255,255,255,.15);
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:42px;
}

/* CARD */

.payment-card{
    background:#fff;
    border-radius:22px;
    overflow:hidden;
    box-shadow:0 15px 40px rgba(0,0,0,.08);
}

.payment-card-header{
    background:#f8fafc;
    padding:22px 28px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    border-bottom:1px solid #e5e7eb;
}

.payment-card-header h5{
    font-weight:700;
}

.payment-card-header small{
    color:#64748b;
}

.payment-card-header span{
    background:#2563eb;
    color:#fff;
    padding:8px 18px;
    border-radius:30px;
    font-size:13px;
    font-weight:600;
}

/* TABLE */

.payment-table{
    min-width:1000px;
}

.payment-table thead{
    background:#f8fafc;
}

.payment-table thead th{
    padding:18px;
    color:#64748b;
    font-size:13px;
    font-weight:700;
    text-transform:uppercase;
    border:none;
}

.payment-table tbody td{
    padding:18px;
    vertical-align:middle;
    border-top:1px solid #eef2f7;
}

.payment-table tbody tr{
    transition:.3s;
}

.payment-table tbody tr:hover{
    background:#f8fafc;
}

/* NUMBER */

.number-box{
    width:40px;
    height:40px;
    border-radius:12px;
    background:#dbeafe;
    color:#2563eb;
    display:flex;
    justify-content:center;
    align-items:center;
    font-weight:700;
}

/* INVOICE */

.invoice-box{
    display:flex;
    align-items:center;
    gap:12px;
}

.invoice-icon{
    width:46px;
    height:46px;
    border-radius:14px;
    background:linear-gradient(135deg,#2563eb,#60a5fa);
    color:#fff;
    display:flex;
    justify-content:center;
    align-items:center;
}

/* BADGES */

.amount-badge{
    background:#dbeafe;
    color:#2563eb;
}

.method-badge{
    background:#ede9fe;
    color:#6d28d9;
}

.date-badge{
    background:#f3f4f6;
    color:#374151;
}

.amount-badge,
.method-badge,
.date-badge{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    min-width:120px;
    padding:8px 14px;
    border-radius:30px;
    font-weight:600;
}

/* STATUS */

.status{
    display:inline-flex;
    align-items:center;
    gap:6px;
    min-width:110px;
    justify-content:center;
    padding:8px 15px;
    border-radius:30px;
    font-size:13px;
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

/* EMPTY */

.empty-state{
    padding:70px 20px;
    text-align:center;
    color:#64748b;
}

.empty-state i{
    font-size:60px;
    color:#94a3b8;
    margin-bottom:15px;
}

/* PAGINATION */

.pagination{
    justify-content:center;
}

/* RESPONSIVE */

@media(max-width:768px){

.payment-header{
    flex-direction:column;
    text-align:center;
    gap:20px;
}

.payment-card-header{
    flex-direction:column;
    text-align:center;
    gap:15px;
}

.payment-table{
    min-width:850px;
}

}

</style>

@endsection