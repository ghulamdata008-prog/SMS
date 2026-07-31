@extends('layouts.student')

@section('title','My Fees')

@section('content')

<div class="container-fluid">

    <!-- Header -->

    <div class="fees-header mb-4">

        <div>

            <span class="header-badge">

                <i class="bi bi-wallet2"></i>

                Student Finance

            </span>

            <h2 class="mt-3 fw-bold">

                My Fees

            </h2>

            <p>

                View your fee records and complete online payments securely.

            </p>

        </div>

        <div class="header-icon">

            <i class="bi bi-credit-card-2-front-fill"></i>

        </div>

    </div>

    @if(session('success'))

    <div class="alert alert-success shadow-sm rounded-4">

        {{ session('success') }}

    </div>

    @endif

    <div class="fees-card">

        <div class="fees-card-header">

            <div>

                <h5 class="mb-1">

                    Fee Records

                </h5>

                <small>

                    Your complete payment history

                </small>

            </div>

            <span>

                {{ $fees->count() }} Records

            </span>

        </div>

        <div class="table-responsive">

            <table class="table fees-table align-middle mb-0">

                <thead>

                    <tr>

                        <th>#</th>

                        <th>Fee Type</th>

                        <th>Total Fee</th>

                        <th>Paid</th>

                        <th>Remaining</th>

                        <th>Status</th>

                        <th width="220">

                            Action

                        </th>

                    </tr>

                </thead>

                <tbody>

                @forelse($fees as $fee)

                <tr>

                    <td>

                        <div class="number-box">

                            {{ $loop->iteration }}

                        </div>

                    </td>

                    <td>

                        <div class="fee-info">

                            <div class="fee-icon">

                                <i class="bi bi-receipt"></i>

                            </div>

                            <strong>

                                {{ $fee->fee_type }}

                            </strong>

                        </div>

                    </td>

                    <td>

                        <span class="total-badge">

                            Rs {{ number_format($fee->total_fee,2) }}

                        </span>

                    </td>

                    <td>

                        <span class="paid-badge">

                            Rs {{ number_format($fee->paid_fee,2) }}

                        </span>

                    </td>

                    <td>

                        <span class="remaining-badge">

                            Rs {{ number_format($fee->remaining_fee,2) }}

                        </span>

                    </td>

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

                    <td>

                        <a href="{{ route('student.fees.show',$fee->id) }}"
                           class="btn btn-view btn-sm">

                            <i class="bi bi-eye"></i>

                            View

                        </a>

                        @if($fee->remaining_fee > 0)

                        <a href="{{ route('student.fees.show',$fee->id) }}"
                           class="btn btn-pay btn-sm">

                            <i class="bi bi-credit-card"></i>

                            Pay Now

                        </a>

                        @endif

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="7">

                        <div class="empty-state">

                            <i class="bi bi-wallet2"></i>

                            <h5>

                                No Fee Record Found

                            </h5>

                            <p>

                                Your fee records will appear here.

                            </p>

                        </div>

                    </td>

                </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

<style>

/*========================
    PAGE HEADER
=========================*/

.fees-header{
    background:linear-gradient(135deg,#111827,#2563eb);
    border-radius:24px;
    padding:35px;
    color:#fff;
    display:flex;
    justify-content:space-between;
    align-items:center;
    box-shadow:0 15px 35px rgba(37,99,235,.25);
    margin-bottom:30px;
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

.fees-header h2{
    margin-top:18px;
    margin-bottom:10px;
    font-size:34px;
    font-weight:700;
}

.fees-header p{
    margin:0;
    color:rgba(255,255,255,.85);
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

/*========================
      CARD
=========================*/

.fees-card{
    background:#fff;
    border-radius:22px;
    overflow:hidden;
    box-shadow:0 15px 40px rgba(0,0,0,.08);
}

.fees-card-header{
    background:#f8fafc;
    padding:22px 28px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    border-bottom:1px solid #e5e7eb;
}

.fees-card-header h5{
    margin-bottom:5px;
    font-weight:700;
}

.fees-card-header small{
    color:#64748b;
}

.fees-card-header span{
    background:#2563eb;
    color:#fff;
    padding:8px 18px;
    border-radius:30px;
    font-size:13px;
    font-weight:600;
}

/*========================
      TABLE
=========================*/

.table-responsive{
    overflow-x:auto;
}

.fees-table{
    width:100%;
    min-width:1100px;
    border-collapse:collapse;
}

.fees-table thead{
    background:#f8fafc;
}

.fees-table thead th{
    padding:18px;
    text-transform:uppercase;
    font-size:13px;
    color:#64748b;
    font-weight:700;
    border:none;
    white-space:nowrap;
}

.fees-table tbody td{
    padding:18px;
    vertical-align:middle;
    border-top:1px solid #eef2f7;
    white-space:nowrap;
}

.fees-table tbody tr{
    transition:.25s;
}

.fees-table tbody tr:hover{
    background:#f8fafc;
}

/*========================
      NUMBER
=========================*/

.number-box{
    width:40px;
    height:40px;
    margin:auto;
    border-radius:12px;
    background:#dbeafe;
    color:#2563eb;
    display:flex;
    align-items:center;
    justify-content:center;
    font-weight:700;
}

/*========================
      FEE INFO
=========================*/

.fee-info{
    display:flex;
    align-items:center;
    gap:12px;
}

.fee-icon{
    width:46px;
    height:46px;
    border-radius:14px;
    background:linear-gradient(135deg,#2563eb,#60a5fa);
    display:flex;
    align-items:center;
    justify-content:center;
    color:#fff;
    flex-shrink:0;
}

.fee-info strong{
    font-size:15px;
}

/*========================
      BADGES
=========================*/

.total-badge,
.paid-badge,
.remaining-badge{
    display:inline-flex;
    justify-content:center;
    align-items:center;
    min-width:135px;
    padding:9px 16px;
    border-radius:30px;
    font-weight:600;
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

/*========================
      STATUS
=========================*/

.status{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:6px;
    min-width:110px;
    padding:8px 16px;
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

.danger{
    background:#fee2e2;
    color:#dc2626;
}

/*========================
      ACTION BUTTONS
=========================*/

.fees-table td:last-child{
    width:220px;
}

.fees-table td:last-child div{
    display:flex;
    justify-content:center;
    align-items:center;
    gap:10px;
    flex-wrap:nowrap;
}

.btn-view,
.btn-pay{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:6px;
    width:95px;
    height:38px;
    border:none;
    border-radius:10px;
    font-size:13px;
    font-weight:600;
    text-decoration:none;
}

.btn-view{
    background:#2563eb;
    color:#fff;
}

.btn-view:hover{
    background:#1d4ed8;
    color:#fff;
}

.btn-pay{
    background:#16a34a;
    color:#fff;
}

.btn-pay:hover{
    background:#15803d;
    color:#fff;
}

/*========================
      EMPTY STATE
=========================*/

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

/*========================
      ALERT
=========================*/

.alert{
    border:none;
    border-radius:18px;
}

/*========================
      RESPONSIVE
=========================*/

@media(max-width:768px){

.fees-header{
    flex-direction:column;
    text-align:center;
    gap:20px;
}

.header-icon{
    width:75px;
    height:75px;
    font-size:34px;
}

.fees-card-header{
    flex-direction:column;
    text-align:center;
    gap:15px;
}

}
</style>

@endsection