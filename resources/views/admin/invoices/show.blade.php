@extends('layouts.app')

@section('title','Invoice')

@section('content')

<div class="container-fluid">


    <!-- Header -->
    <div class="mb-4">

        <h2 class="fw-bold mb-1">
            Invoice Details
        </h2>

        <p class="text-muted">
            View complete payment invoice information
        </p>

    </div>




    <div class="invoice-wrapper">


        <div class="invoice-card shadow-lg">


            <!-- Invoice Header -->

            <div class="invoice-top">


                <div>

                    <span class="invoice-label">
                        Invoice Number
                    </span>

                    <h2>
                        {{ $invoice->invoice_no }}
                    </h2>


                </div>



                <div class="invoice-status">

                    <i class="bi bi-receipt"></i>

                    Invoice

                </div>


            </div>





            <div class="invoice-body">



                <div class="row g-4">



                    <!-- Student Card -->

                    <div class="col-md-6">


                        <div class="info-box">


                            <div class="icon-box blue">

                                <i class="bi bi-person"></i>

                            </div>


                            <div>

                                <small>
                                    Student
                                </small>

                                <h5>
                                    {{ $invoice->payment->student->name }}
                                </h5>

                            </div>


                        </div>


                    </div>





                    <!-- Amount -->

                    <div class="col-md-6">


                        <div class="info-box">


                            <div class="icon-box green">

                                <i class="bi bi-cash-stack"></i>

                            </div>


                            <div>

                                <small>
                                    Amount
                                </small>

                                <h5 class="text-success">

                                    Rs {{ number_format($invoice->payment->amount,2) }}

                                </h5>


                            </div>


                        </div>


                    </div>





                    <!-- Payment Method -->

                    <div class="col-md-6">


                        <div class="detail-card">

                            <span>
                                Payment Method
                            </span>

                            <strong>
                                {{ $invoice->payment->payment_method }}
                            </strong>


                        </div>


                    </div>





                    <!-- Status -->

                    <div class="col-md-6">


                        <div class="detail-card">


                            <span>
                                Payment Status
                            </span>


                            <strong class="status-badge">

                                {{ $invoice->payment->payment_status }}

                            </strong>


                        </div>


                    </div>






                    <!-- Transaction ID -->

                    <div class="col-md-6">


                        <div class="detail-card">


                            <span>
                                Transaction ID
                            </span>


                            <strong>

                                {{ $invoice->payment->transaction_id }}

                            </strong>


                        </div>


                    </div>





                    <!-- Date -->

                    <div class="col-md-6">


                        <div class="detail-card">


                            <span>
                                Payment Date
                            </span>


                            <strong>

                                {{ $invoice->payment->payment_date }}

                            </strong>


                        </div>


                    </div>



                </div>




            </div>






            <div class="invoice-footer">


                <a href="{{ route('admin.invoices.index') }}"
                class="btn btn-back">


                    <i class="bi bi-arrow-left"></i>

                    Back


                </a>



            </div>



        </div>



    </div>



</div>




<style>


.invoice-card{

    background:white;

    border-radius:25px;

    overflow:hidden;

}



.invoice-top{


    background:linear-gradient(135deg,#2563eb,#1e40af);

    color:white;

    padding:35px;

    display:flex;

    justify-content:space-between;

    align-items:center;

}



.invoice-label{

    opacity:.8;

    font-size:14px;

}



.invoice-top h2{

    margin-top:10px;

    font-weight:800;

}



.invoice-status{

    background:rgba(255,255,255,.2);

    padding:12px 20px;

    border-radius:30px;

    font-weight:600;

}



.invoice-body{

    padding:35px;

}





.info-box{


    display:flex;

    align-items:center;

    gap:20px;

    padding:20px;

    border-radius:18px;

    background:#f8fafc;


}



.icon-box{


    width:55px;

    height:55px;

    border-radius:18px;

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:25px;

    color:white;

}



.blue{

    background:#2563eb;

}



.green{

    background:#16a34a;

}




.info-box small,
.detail-card span{

    color:#64748b;

}



.info-box h5{

    margin:5px 0 0;

    font-weight:700;

}





.detail-card{


    padding:20px;

    background:#f8fafc;

    border-radius:18px;

    display:flex;

    flex-direction:column;

    gap:8px;


}



.detail-card strong{

    font-size:16px;

}





.status-badge{


    background:#dcfce7;

    color:#15803d;

    padding:7px 15px;

    border-radius:20px;

    width:max-content;


}




.invoice-footer{


    padding:25px 35px;

    border-top:1px solid #e5e7eb;


}



.btn-back{


    background:#111827;

    color:white;

    padding:10px 25px;

    border-radius:12px;


}



.btn-back:hover{

    background:#000;

    color:white;

}



</style>


@endsection