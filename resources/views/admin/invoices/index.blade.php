@extends('layouts.app')

@section('title','Invoices')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                Invoices
            </h2>

            <p class="text-muted mb-0">
                Manage student payment invoices
            </p>
        </div>

    </div>


    <!-- Invoice Card -->
    <div class="card invoice-card border-0 shadow-lg">


        <div class="card-header invoice-header">

            <div class="d-flex align-items-center">

                <div class="invoice-icon">
                    <i class="bi bi-receipt-cutoff"></i>
                </div>

                <div>
                    <h5 class="mb-0 fw-bold">
                        Invoice Records
                    </h5>

                    <small>
                        All generated invoices
                    </small>
                </div>

            </div>

        </div>


        <div class="card-body p-0">


            <div class="table-responsive">

                <table class="table invoice-table align-middle mb-0">


                    <thead>

                        <tr>

                            <th>#</th>

                            <th>
                                Invoice No
                            </th>

                            <th>
                                Student
                            </th>

                            <th>
                                Amount
                            </th>

                            <th>
                                Date
                            </th>

                            <th>
                                Action
                            </th>

                        </tr>

                    </thead>


                    <tbody>


                    @forelse($invoices as $invoice)


                    <tr>


                        <td>

                            <span class="id-badge">
                                {{ $invoice->id }}
                            </span>

                        </td>


                        <td>

                            <span class="invoice-number">

                                {{ $invoice->invoice_no }}

                            </span>

                        </td>



                        <td>

                            <div class="student-info">


                                <div class="student-avatar">

                                    {{ strtoupper(substr($invoice->payment->student->name,0,1)) }}

                                </div>


                                <span>

                                    {{ $invoice->payment->student->name }}

                                </span>


                            </div>


                        </td>
 <td>

                            <span class="amount">

                                Rs {{ number_format($invoice->payment->amount,2) }}

                            </span>

                        </td>
 <td>

                            <span class="date">

                                {{ $invoice->created_at->format('d M Y') }}

                            </span>

                        </td>
 <td>


                            <a href="{{ route('admin.invoices.show',$invoice) }}"
                            class="btn btn-view btn-sm">


                                <i class="bi bi-eye"></i>
                                View


                            </a>

 <form action="{{ route('admin.invoices.destroy',$invoice) }}"
                            method="POST"
                            class="d-inline">


                                @csrf

                                @method('DELETE')



                                <button
                                class="btn btn-delete btn-sm"
                                onclick="return confirm('Delete Invoice?')">


                                    <i class="bi bi-trash"></i>
                                    Delete


                                </button>



                            </form>


                        </td>



                    </tr>



                    @empty



                    <tr>

                        <td colspan="6">


                            <div class="empty-state">


                                <i class="bi bi-file-earmark-x"></i>

                                <h5>
                                    No Invoice Found
                                </h5>


                                <p>
                                    Invoice records will appear here.
                                </p>


                            </div>


                        </td>


                    </tr>



                    @endforelse



                    </tbody>



                </table>


            </div>



        </div>



        <div class="card-footer bg-white border-0">

            {{ $invoices->links() }}

        </div>


    </div>


</div>



<style>


.invoice-card{
    border:none;
    border-radius:26px;
    overflow:hidden;
    background:#fff;
    box-shadow:0 20px 50px rgba(15,23,42,.08);
}

.invoice-header{
    background:#111827;
    color:#fff;
    padding:24px 28px;
    border:none;
}

.invoice-header h5{
    font-weight:700;
    margin-bottom:3px;
}

.invoice-header small{
    color:#cbd5e1;
    font-size:14px;
}

.invoice-icon{

    width:54px;
    height:54px;

    border-radius:16px;

    display:flex;
    align-items:center;
    justify-content:center;

    background:#334155;

    font-size:24px;

    margin-right:14px;

    color:#fff;
}


.invoice-table{
    margin-bottom:0;
}

.invoice-table thead{

    background:#111827;

}

.invoice-table thead th{

    color:#fff;

    font-size:15px;

    font-weight:700;

    border:none;

    padding:18px;

    text-transform:none;

}

.invoice-table tbody td{

    padding:18px;

    vertical-align:middle;

    border-color:#eef2f7;

}

.invoice-table tbody tr{

    transition:.3s;

}

.invoice-table tbody tr:hover{

    background:#f8fafc;

}

.id-badge{

    display:inline-flex;

    width:40px;

    height:40px;

    justify-content:center;

    align-items:center;

    background:#edf2ff;

    color:#2563eb;

    border-radius:12px;

    font-weight:700;

}

.invoice-number{

    font-weight:700;

    color:#2563eb;

    font-size:18px;

}

.student-info{

    display:flex;

    align-items:center;

    gap:12px;

}

.student-avatar{

    width:44px;

    height:44px;

    border-radius:50%;

    display:flex;

    justify-content:center;

    align-items:center;

    background:linear-gradient(135deg,#3b82f6,#2563eb);

    color:#fff;

    font-weight:700;

}

.amount{

    background:#dcfce7;

    color:#15803d;

    padding:8px 18px;

    border-radius:50px;

    font-weight:700;

}

.date{

    color:#64748b;

    font-weight:500;

}

.btn-view{

    background:#2563eb;

    color:#fff;

    border:none;

    border-radius:12px;

    padding:7px 16px;

    font-weight:600;

}

.btn-view:hover{

    background:#1d4ed8;

    color:#fff;

}

.btn-delete{

    background:#ef4444;

    color:#fff;

    border:none;

    border-radius:12px;

    padding:7px 16px;

    font-weight:600;

}

.btn-delete:hover{

    background:#dc2626;

    color:#fff;

}

.card-footer{

    background:#fff !important;

    border:none;

    padding:18px 25px;

}

.empty-state{

    text-align:center;

    padding:60px;

}

.empty-state i{

    font-size:55px;

    color:#94a3b8;

}

.empty-state h5{

    margin-top:15px;

    font-weight:700;

}

.empty-state p{

    color:#64748b;

}

</style>


@endsection