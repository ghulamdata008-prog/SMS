@extends('layouts.app')

@section('title','Transactions')

@section('content')

<div class="container-fluid">


    <!-- Page Header -->
    <div class="mb-4">

        <h2 class="fw-bold mb-1">
            Transaction History
        </h2>

        <p class="text-muted">
            Manage all payment transactions
        </p>

    </div>




    <!-- Transaction Card -->

    <div class="transaction-card shadow-lg border-0">


        <div class="transaction-header">


            <div class="header-icon">

                <i class="bi bi-credit-card"></i>

            </div>


            <div>

                <h5 class="mb-1">
                    Payment Transactions
                </h5>

                <small>
                    Complete transaction records
                </small>

            </div>


        </div>





        <div class="table-responsive">


            <table class="table transaction-table align-middle mb-0">


                <thead>

                    <tr>

                        <th>ID</th>

                        <th>Transaction No</th>

                        <th>Student</th>

                        <th>Gateway</th>

                        <th>Amount</th>

                        <th>Status</th>

                        <th>Date</th>

                        <th width="170">
                            Action
                        </th>

                    </tr>


                </thead>



                <tbody>



                @forelse($transactions as $transaction)


                    <tr>



                        <td>

                            <span class="id-badge">

                                {{ $transaction->id }}

                            </span>

                        </td>




                        <td>

                            <span class="transaction-number">

                                {{ $transaction->transaction_no }}

                            </span>


                        </td>





                        <td>


                            <div class="student-box">


                                <div class="student-avatar">

                                    {{ strtoupper(substr($transaction->payment->student->name,0,1)) }}

                                </div>


                                <span>

                                    {{ $transaction->payment->student->name }}

                                </span>


                            </div>


                        </td>






                        <td>


                            <span class="gateway-badge">


                                <i class="bi bi-globe"></i>

                                {{ $transaction->gateway }}


                            </span>


                        </td>






                        <td>


                            <span class="amount">


                                Rs {{ number_format($transaction->amount,2) }}


                            </span>


                        </td>






                        <td>


                            @if($transaction->status=="Success")


                                <span class="status success">

                                    <i class="bi bi-check-circle"></i>

                                    Success

                                </span>



                            @elseif($transaction->status=="Pending")


                                <span class="status pending">

                                    <i class="bi bi-clock"></i>

                                    Pending

                                </span>



                            @elseif($transaction->status=="Failed")


                                <span class="status failed">

                                    <i class="bi bi-x-circle"></i>

                                    Failed

                                </span>



                            @else


                                <span class="status refunded">

                                    <i class="bi bi-arrow-repeat"></i>

                                    Refunded

                                </span>



                            @endif



                        </td>






                        <td>


                            <span class="date">

                                {{ $transaction->created_at->format('d M Y') }}


                            </span>


                        </td>







                        <td>


                            <a href="{{ route('admin.transactions.show',$transaction) }}"
                               class="btn btn-view btn-sm">


                                <i class="bi bi-eye"></i>

                                View


                            </a>





                            <form action="{{ route('admin.transactions.destroy',$transaction) }}"
                                  method="POST"
                                  class="d-inline">


                                @csrf

                                @method('DELETE')



                                <button

                                onclick="return confirm('Delete Transaction?')"

                                class="btn btn-delete btn-sm">


                                    <i class="bi bi-trash"></i>

                                    Delete


                                </button>


                            </form>



                        </td>



                    </tr>




                @empty


                    <tr>

                        <td colspan="8">


                            <div class="empty-state">


                                <i class="bi bi-credit-card-2-front"></i>


                                <h5>
                                    No Transactions Found
                                </h5>


                                <p>
                                    Payment records will appear here.
                                </p>


                            </div>


                        </td>


                    </tr>



                @endforelse



                </tbody>


            </table>


        </div>



        <div class="p-4">

            {{ $transactions->links() }}

        </div>



    </div>



</div>






<style>

/* ===========================
   TRANSACTION CARD
=========================== */

.transaction-card{
    background:#fff;
    border-radius:24px;
    overflow:hidden;
    border:none;
    box-shadow:0 15px 40px rgba(15,23,42,.08);
}

/* ===========================
   HEADER
=========================== */

.transaction-header{
    padding:22px 28px;
    background:#111827;
    color:#fff;
    display:flex;
    align-items:center;
    gap:15px;
}

.header-icon{
    width:52px;
    height:52px;
    border-radius:16px;
    background:rgba(255,255,255,.12);
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:22px;
}

/* ===========================
   TABLE
=========================== */

.table-responsive{
    overflow-x:auto;
}

.transaction-table{
    width:100%;
    margin:0;
    border-collapse:collapse;
}

.transaction-table thead{
    background:#111827;
}

.transaction-table thead th{
    color:#fff;
    font-size:15px;
    font-weight:700;
    padding:18px 20px;
    border:none;
    white-space:nowrap;
}

.transaction-table tbody td{
    padding:18px 20px;
    vertical-align:middle;
    border-top:1px solid #eef2f7;
}

.transaction-table tbody tr{
    transition:.25s;
}

.transaction-table tbody tr:hover{
    background:#f8fafc;
}

/* ===========================
   ID
=========================== */

.id-badge{
    width:40px;
    height:40px;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius:12px;
    background:#eef2ff;
    color:#2563eb;
    font-weight:700;
}

/* ===========================
   TRANSACTION NUMBER
=========================== */

.transaction-number{
    color:#2563eb;
    font-weight:700;
    font-size:15px;
}

/* ===========================
   STUDENT
=========================== */

.student-box{
    display:flex;
    align-items:center;
    gap:12px;
}

.student-avatar{
    width:42px;
    height:42px;
    border-radius:50%;
    background:linear-gradient(135deg,#3b82f6,#2563eb);
    color:#fff;
    display:flex;
    align-items:center;
    justify-content:center;
    font-weight:700;
    font-size:16px;
}

.student-box span{
    font-weight:600;
    color:#111827;
}

/* ===========================
   GATEWAY
=========================== */

.gateway-badge{
    display:inline-block;
    padding:7px 16px;
    border-radius:20px;
    background:#dbeafe;
    color:#2563eb;
    font-weight:600;
}

/* ===========================
   AMOUNT
=========================== */

.amount{
    display:inline-block;
    padding:8px 16px;
    border-radius:20px;
    background:#dcfce7;
    color:#15803d;
    font-weight:700;
}

/* ===========================
   STATUS
=========================== */

.status{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    padding:8px 16px;
    border-radius:20px;
    font-weight:600;
    min-width:95px;
}

.success{
    background:#dcfce7;
    color:#15803d;
}

.pending{
    background:#fef3c7;
    color:#b45309;
}

.failed{
    background:#fee2e2;
    color:#dc2626;
}

.refunded{
    background:#e5e7eb;
    color:#374151;
}

/* ===========================
   ACTION BUTTONS
=========================== */

.transaction-table td:last-child{
    white-space:nowrap;
}

.btn-view,
.btn-delete{
    border:none;
    border-radius:12px;
    padding:9px 16px;
    font-size:13px;
    font-weight:600;
    transition:.25s;
}

.btn-view{
    background:#2563eb;
    color:#fff;
}

.btn-view:hover{
    background:#1d4ed8;
    color:#fff;
    transform:translateY(-2px);
}

.btn-delete{
    background:#fee2e2;
    color:#dc2626;
}

.btn-delete:hover{
    background:#dc2626;
    color:#fff;
    transform:translateY(-2px);
}

/* ===========================
   EMPTY STATE
=========================== */

.empty-state{
    padding:70px 20px;
    text-align:center;
    color:#64748b;
}

.empty-state i{
    font-size:55px;
    color:#94a3b8;
    margin-bottom:15px;
}

.empty-state h5{
    font-weight:700;
    margin-top:15px;
}

.empty-state p{
    margin:0;
    color:#94a3b8;
}
</style>


@endsection