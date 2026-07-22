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

    border-radius:20px;
    overflow:hidden;

}



.invoice-header{

    background:linear-gradient(135deg,#111827,#2563eb);
    color:white;
    padding:20px;

}



.invoice-icon{

    width:50px;
    height:50px;
    background:rgba(255,255,255,.2);
    border-radius:15px;

    display:flex;
    align-items:center;
    justify-content:center;

    font-size:24px;

    margin-right:15px;

}




.invoice-table thead{

    background:#f8fafc;

}



.invoice-table th{

    padding:18px;
    color:#64748b;
    font-size:14px;
    text-transform:uppercase;

}



.invoice-table td{

    padding:18px;

}



.invoice-table tbody tr{

    transition:.3s;

}



.invoice-table tbody tr:hover{

    background:#f8fafc;
    transform:scale(1.01);

}




.id-badge{

    background:#e0e7ff;
    color:#4338ca;

    padding:7px 12px;
    border-radius:20px;

    font-weight:600;

}



.invoice-number{

    font-weight:700;
    color:#2563eb;

}



.student-info{

    display:flex;
    align-items:center;
    gap:10px;

}



.student-avatar{


    width:40px;
    height:40px;

    border-radius:50%;

    background:linear-gradient(135deg,#2563eb,#60a5fa);

    color:white;

    display:flex;
    align-items:center;
    justify-content:center;

    font-weight:bold;

}



.amount{

    background:#dcfce7;
    color:#15803d;

    padding:8px 14px;

    border-radius:20px;

    font-weight:700;

}



.date{

    color:#64748b;

}




.btn-view{

    background:#2563eb;
    color:white;
    border-radius:10px;

}



.btn-view:hover{

    background:#1d4ed8;
    color:white;

}




.btn-delete{

    background:#ef4444;
    color:white;
    border-radius:10px;

}



.btn-delete:hover{

    background:#dc2626;
    color:white;

}




.empty-state{

    text-align:center;
    padding:50px;

    color:#64748b;

}



.empty-state i{

    font-size:50px;

}



</style>


@endsection