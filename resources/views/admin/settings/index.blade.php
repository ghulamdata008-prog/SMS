@extends('layouts.app')


@section('title','School Settings')


@section('content')


<div class="container-fluid">


    <!-- Header -->

    <div class="mb-4">


        <h2 class="fw-bold mb-1">
            School Settings
        </h2>


        <p class="text-muted">
            Manage your school information and configuration
        </p>


    </div>





    @if(session('success'))


        <div class="alert success-alert shadow-sm">

            <i class="bi bi-check-circle-fill"></i>

            {{session('success')}}

        </div>


    @endif







    <div class="settings-card shadow-lg">



        <!-- Card Header -->

        <div class="settings-header">


            <div class="header-icon">


                <i class="bi bi-gear-fill"></i>


            </div>



            <div>


                <h5 class="mb-1">

                    General Settings

                </h5>


                <small>

                    Update school details

                </small>


            </div>


        </div>







        <div class="settings-body">



            <form method="POST"
            action="{{route('admin.settings.update')}}">


                @csrf





                <div class="row g-4">



                    <!-- School Name -->


                    <div class="col-md-6">


                        <label class="form-label">

                            School Name

                        </label>


                        <div class="input-group-custom">


                            <i class="bi bi-building"></i>


                            <input type="text"

                            name="school_name"

                            class="form-control"

                            value="{{$setting->school_name ?? ''}}">


                        </div>


                    </div>







                    <!-- Email -->


                    <div class="col-md-6">


                        <label class="form-label">

                            Email

                        </label>



                        <div class="input-group-custom">


                            <i class="bi bi-envelope"></i>


                            <input type="email"

                            name="email"

                            class="form-control"

                            value="{{$setting->email ?? ''}}">


                        </div>


                    </div>







                    <!-- Phone -->


                    <div class="col-md-6">


                        <label class="form-label">

                            Phone

                        </label>



                        <div class="input-group-custom">


                            <i class="bi bi-telephone"></i>


                            <input type="text"

                            name="phone"

                            class="form-control"

                            value="{{$setting->phone ?? ''}}">


                        </div>


                    </div>







                    <!-- Address -->


                    <div class="col-md-12">


                        <label class="form-label">

                            Address

                        </label>



                        <div class="input-group-custom textarea-box">


                            <i class="bi bi-geo-alt"></i>


                            <textarea

                            name="address"

                            class="form-control">{{$setting->address ?? ''}}</textarea>


                        </div>


                    </div>



                </div>







                <div class="mt-4">


                    <button class="btn save-btn">


                        <i class="bi bi-save"></i>

                        Save Settings


                    </button>


                </div>





            </form>



        </div>



    </div>




</div>







<style>


.settings-card{


    background:white;

    border-radius:25px;

    overflow:hidden;


}





/* SAME ADMIN THEME */

.settings-header{


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


    border-radius:18px;


    background:rgba(255,255,255,.18);


    display:flex;


    align-items:center;


    justify-content:center;


    font-size:25px;


}





.settings-body{


    padding:35px;


}





.success-alert{


    background:#dcfce7;


    color:#15803d;


    border:none;


    border-radius:15px;


    padding:15px 20px;


    display:flex;


    align-items:center;


    gap:10px;


}





.form-label{


    font-weight:700;


    color:#334155;


}





.input-group-custom{


    display:flex;


    align-items:center;


    gap:12px;


    background:#f8fafc;


    border-radius:15px;


    padding:5px 15px;


    border:1px solid #e2e8f0;


}



.input-group-custom i{


    color:#2563eb;


    font-size:18px;


}




.input-group-custom .form-control{


    border:none;


    background:transparent;


    padding:12px;


}




.input-group-custom .form-control:focus{


    box-shadow:none;


    background:transparent;


}





.textarea-box{


    align-items:flex-start;


}



.textarea-box textarea{


    min-height:120px;


    resize:none;


}





.save-btn{


    background:#2563eb;


    color:white;


    padding:12px 30px;


    border-radius:14px;


    font-weight:700;


}



.save-btn:hover{


    background:#1d4ed8;


    color:white;


}



</style>



@endsection