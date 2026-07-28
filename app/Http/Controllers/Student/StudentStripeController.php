<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class StudentStripeController extends Controller
{
    public function checkout(Payment $payment)
    {

        /*
        Later Stripe API integration here
        */

        // Temporary success simulation

        $payment->update([

            'payment_status'=>'Paid',

        ]);


        return redirect()
        ->route('student.fees.history')
        ->with('success','Stripe payment successful');

    }
}