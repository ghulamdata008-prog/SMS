<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Payment;

class StudentMonnifyController extends Controller
{

    public function checkout(Payment $payment)
    {

        $payment->update([

            'payment_status'=>'Paid',

        ]);


        return redirect()
         ->with('success','Monnify payment successful');

    }

}