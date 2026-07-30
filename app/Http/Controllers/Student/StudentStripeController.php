<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class StudentStripeController extends Controller
{
    public function checkout(Payment $payment)
    {
        // Set Stripe Secret Key
        Stripe::setApiKey(config('services.stripe.secret'));

        // Load relationships
        $payment->load('student.schoolClass', 'student.section', 'fee');

        $student = $payment->student;
        $fee     = $payment->fee;

        // Create Stripe Checkout Session
        $session = Session::create([
            'payment_method_types' => ['card'],

            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd', // use usd for testing

                    'product_data' => [
                        'name' => 'School Fee Payment',

                        'description' =>
                            "Student: {$student->name}\n".
                            "Class: ".($student->schoolClass->name ?? 'N/A')."\n".
                            "Section: ".($student->section->name ?? 'N/A')."\n".
                            "Fee Type: {$fee->fee_type}",
                    ],

                    'unit_amount' => (int) round($payment->amount * 100),
                ],

                'quantity' => 1,
            ]],

            'mode' => 'payment',

            'customer_email' => $student->email,

            'success_url' => route('student.stripe.success', $payment, true),

            'cancel_url' => route('student.stripe.cancel', [], true),
        ]);

        return redirect($session->url);
    }

    public function cancel()
    {
        return redirect()
            ->route('student.fees.index')
            ->with('error', 'Payment was cancelled.');
    }
}