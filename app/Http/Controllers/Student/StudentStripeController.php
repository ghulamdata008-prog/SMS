<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class StudentStripeController extends Controller
{
    public function checkout(Payment $payment)
{
    $payment->update([
        'payment_status' => 'Paid',
    ]);

    return redirect()->route('student.payment.success', $payment->id);
}
}