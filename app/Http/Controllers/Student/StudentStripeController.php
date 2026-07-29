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
        Stripe::setApiKey(config('services.stripe.secret'));

        $payment->load('student.schoolClass', 'student.section', 'fee');

        $student = $payment->student;
        $fee     = $payment->fee;

        $session = Session::create([

            'payment_method_types' => ['card'],

            'line_items' => [[

                'price_data' => [

                    'currency' => 'pkr',

                    'product_data' => [

                        'name' => 'School Fee Payment',

                        'description' =>
                            "Student Name: {$student->name}\n".
                            "Class: ".($student->schoolClass->name ?? 'N/A')."\n".
                            "Section: ".($student->section->name ?? 'N/A')."\n".
                            "Fee Type: {$fee->fee_type}",

                    ],

                    'unit_amount' => (int) ($payment->amount * 100),

                ],

                'quantity' => 1,

            ]],

            'mode' => 'payment',

            'customer_email' => $student->email,

            'metadata' => [

                'payment_id'   => $payment->id,
                'student_name' => $student->name,
                'class'        => $student->schoolClass->name ?? '',
                'section'      => $student->section->name ?? '',
                'fee_type'     => $fee->fee_type,

            ],

            'success_url' => route('student.stripe.success', $payment),

'cancel_url' => route('student.stripe.cancel'),
        ]);

        return redirect($session->url);
    }
}