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

.transaction-card{

    background:#fff;
    border-radius:22px;
    overflow:hidden;

}


/* HEADER */

.transaction-header{

    padding:25px;

    background:linear-gradient(135deg,#111827,#2563eb);

    color:white;

    display:flex;

    align-items:center;

    gap:15px;

}


.header-icon{

    width:55px;
    height:55px;

    border-radius:16px;

    background:rgba(255,255,255,.2);

    display:flex;
    align-items:center;
    justify-content:center;

    font-size:24px;

}



/* TABLE */

.table-responsive{

    overflow-x:auto;

}



.transaction-table{

    width:100%;

    margin:0;

    vertical-align:middle;

}



.transaction-table thead th{

    background:#f8fafc;

    padding:18px 15px;

    color:#64748b;

    font-size:13px;

    font-weight:700;

    text-transform:uppercase;

    white-space:nowrap;

    border-bottom:1px solid #e5e7eb;

}



.transaction-table tbody td{

    padding:18px 15px;

    vertical-align:middle;

    white-space:nowrap;

}



.transaction-table tbody tr{

    transition:.3s;

}


.transaction-table tbody tr:hover{

    background:#f8fafc;

}



/* ID */


.id-badge{

    background:#e0e7ff;

    color:#4338ca;

    padding:6px 12px;

    border-radius:20px;

    font-weight:700;

}





/* Transaction No */


.transaction-number{

    color:#2563eb;

    font-weight:700;

}





/* Student */


.student-box{

    display:flex;

    align-items:center;

    gap:12px;

}



.student-avatar{

    width:42px;

    height:42px;

    flex-shrink:0;

    border-radius:50%;

    background:linear-gradient(135deg,#2563eb,#60a5fa);

    color:#fff;

    display:flex;

    align-items:center;

    justify-content:center;

    font-weight:700;

}



.student-box span{

    font-weight:600;

}




/* Gateway */


.gateway-badge{

    background:#cffafe;

    color:#0369a1;

    padding:7px 14px;

    border-radius:20px;

    font-weight:600;

}





/* Amount */


.amount{

    background:#dcfce7;

    color:#15803d;

    padding:8px 14px;

    border-radius:20px;

    font-weight:700;

}





/* STATUS */


.status{

    display:inline-flex;

    align-items:center;

    gap:5px;

    padding:7px 14px;

    border-radius:20px;

    font-weight:600;

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





/* ACTION */


.transaction-table td:last-child{

    min-width:160px;

}



.btn-view,
.btn-delete{

    border-radius:10px;

    padding:7px 13px;

    font-size:13px;

    font-weight:600;

}



.btn-view{

    background:#2563eb;

    color:#fff;

}



.btn-view:hover{

    background:#1d4ed8;

    color:white;

}



.btn-delete{

    background:#ef4444;

    color:white;

}



.btn-delete:hover{

    background:#dc2626;

    color:white;

}





/* EMPTY */

.empty-state{

    padding:50px;

    text-align:center;

    color:#64748b;

}


.empty-state i{

    font-size:45px;

}



</style>


@endsection