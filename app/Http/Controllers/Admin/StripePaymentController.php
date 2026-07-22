<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Payment;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class StripePaymentController extends Controller
{
    public function checkout(Payment $payment)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $session = Session::create([

            'payment_method_types' => ['card'],

            'mode' => 'payment',

            'success_url' =>
                route('admin.stripe.success',$payment),

            'cancel_url' =>
                route('admin.stripe.cancel',$payment),

            'line_items' => [[

                'price_data' => [

                    'currency' => 'pkr',

                    'product_data' => [

                        'name' => 'School Fee',

                    ],

                    'unit_amount' => $payment->amount * 100,

                ],

                'quantity' => 1,

            ]],

        ]);

        return redirect($session->url);
    }

    public function success(Payment $payment)
    {
        $payment->update([

            'payment_method'=>'Stripe',

           'payment_status'=>'Paid',

            'transaction_id'=>'STR'.time(),

            'reference_no'=>'Stripe-'.$payment->id,

        ]);

        Transaction::create([

            'payment_id'=>$payment->id,

            'transaction_no'=>'TRX'.time(),

            'gateway'=>'Stripe',

            'reference_no'=>$payment->reference_no,

            'amount'=>$payment->amount,

            'currency'=>'PKR',

'status'=>'Success',
        ]);

        Invoice::create([

            'payment_id'=>$payment->id,

            'invoice_no'=>'INV-'.time(),

        ]);

        return redirect()
            ->route('admin.payments.index')
            ->with('success','Stripe Payment Successful.');
    }

    public function cancel(Payment $payment)
    {
        return redirect()
            ->route('admin.payments.index')
            ->with('error','Payment Cancelled.');
    }
}