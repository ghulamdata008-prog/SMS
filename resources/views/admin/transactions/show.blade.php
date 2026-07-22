@extends('layouts.app')

@section('title','Transaction Details')

@section('content')

<div class="container-fluid">


    <!-- Header -->

    <div class="mb-4">

        <h2 class="fw-bold mb-1">
            Transaction Details
        </h2>

        <p class="text-muted">
            View complete payment transaction information
        </p>

    </div>





    <div class="transaction-detail-card shadow-lg">



        <!-- Top Header -->

        <div class="detail-header">


            <div class="header-icon">

                <i class="bi bi-credit-card-2-front"></i>

            </div>



            <div>

                <span>
                    Transaction No
                </span>

                <h3>
                    {{ $transaction->transaction_no }}
                </h3>

            </div>



        </div>







        <div class="detail-body">



            <div class="row g-4">



                <!-- Student -->

                <div class="col-md-6">


                    <div class="info-card">


                        <div class="icon blue">

                            <i class="bi bi-person"></i>

                        </div>


                        <div>

                            <small>
                                Student
                            </small>

                            <h5>
                                {{ $transaction->payment->student->name }}
                            </h5>

                        </div>


                    </div>


                </div>






                <!-- Gateway -->

                <div class="col-md-6">


                    <div class="info-card">


                        <div class="icon purple">

                            <i class="bi bi-globe"></i>

                        </div>


                        <div>

                            <small>
                                Gateway
                            </small>

                            <h5>
                                {{ $transaction->gateway }}
                            </h5>

                        </div>


                    </div>


                </div>







                <!-- Amount -->

                <div class="col-md-6">


                    <div class="detail-box">


                        <span>
                            Amount
                        </span>


                        <strong class="amount">

                            Rs {{ number_format($transaction->amount,2) }}

                        </strong>


                    </div>


                </div>






                <!-- Currency -->

                <div class="col-md-6">


                    <div class="detail-box">


                        <span>
                            Currency
                        </span>


                        <strong>

                            {{ $transaction->currency }}

                        </strong>


                    </div>


                </div>







                <!-- Reference -->

                <div class="col-md-6">


                    <div class="detail-box">


                        <span>
                            Reference No
                        </span>


                        <strong>

                            {{ $transaction->reference_no }}

                        </strong>


                    </div>


                </div>








                <!-- Status -->

                <div class="col-md-6">


                    <div class="detail-box">


                        <span>
                            Status
                        </span>



                        <strong class="status">


                            {{ $transaction->status }}


                        </strong>


                    </div>


                </div>







                <!-- Created -->

                <div class="col-md-12">


                    <div class="detail-box">


                        <span>
                            Created At
                        </span>


                        <strong>

                            {{ $transaction->created_at }}

                        </strong>


                    </div>


                </div>



            </div>



        </div>







        <div class="detail-footer">


            <a href="{{ route('admin.transactions.index') }}"
            class="btn btn-back">


                <i class="bi bi-arrow-left"></i>

                Back


            </a>


        </div>





    </div>



</div>







<style>


.transaction-detail-card{

    background:white;

    border-radius:25px;

    overflow:hidden;

}




.detail-header{


    background:linear-gradient(135deg,#111827,#2563eb);

    color:white;

    padding:35px;

    display:flex;

    align-items:center;

    gap:20px;

}



.header-icon{


    width:65px;

    height:65px;

    border-radius:20px;

    background:rgba(255,255,255,.2);

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:30px;

}



.detail-header span{

    opacity:.8;

    font-size:14px;

}



.detail-header h3{

    margin:5px 0 0;

    font-weight:800;

}





.detail-body{

    padding:35px;

}





.info-card{


    display:flex;

    align-items:center;

    gap:18px;

    background:#f8fafc;

    padding:20px;

    border-radius:18px;


}



.icon{


    width:55px;

    height:55px;

    border-radius:18px;

    display:flex;

    align-items:center;

    justify-content:center;

    color:white;

    font-size:24px;

}



.blue{

    background:#2563eb;

}


.purple{

    background:#9333ea;

}




.info-card small,
.detail-box span{

    color:#64748b;

}




.info-card h5{

    margin:5px 0 0;

    font-weight:700;

}





.detail-box{


    background:#f8fafc;

    padding:20px;

    border-radius:18px;

    display:flex;

    flex-direction:column;

    gap:10px;

}





.detail-box strong{

    font-size:17px;

}





.amount{


    color:#15803d;

}





.status{


    background:#dcfce7;

    color:#15803d;

    padding:7px 15px;

    border-radius:20px;

    width:max-content;

}





.detail-footer{


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