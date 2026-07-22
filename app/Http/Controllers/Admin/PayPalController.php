<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Transaction;
use App\Models\Invoice;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalController extends Controller
{
    public function checkout(Payment $payment)
    {
        $provider = new PayPalClient;

        $provider->setApiCredentials(config('paypal'));

        $provider->getAccessToken();

        $response = $provider->createOrder([

            "intent" => "CAPTURE",

            "application_context" => [

                "return_url" => route('admin.paypal.success',$payment),

                "cancel_url" => route('admin.paypal.cancel',$payment),

            ],

            "purchase_units" => [[

                "amount" => [

                    "currency_code" => "USD",

                    "value" => $payment->amount,

                ]

            ]]

        ]);

        if(isset($response['links'])){

            foreach($response['links'] as $link){

                if($link['rel']=='approve'){

                    return redirect($link['href']);

                }

            }

        }

        return back()->with('error','Unable to connect to PayPal.');
    }

    public function success(Payment $payment)
    {
        $payment->update([

            'payment_method'=>'PayPal',

            'payment_status'=>'Paid',

            'transaction_id'=>'PAY'.time(),

            'reference_no'=>'PAYPAL-'.$payment->id,

        ]);

        Transaction::create([

            'payment_id'=>$payment->id,

            'transaction_no'=>'TRX'.time(),

            'gateway'=>'PayPal',

            'reference_no'=>$payment->reference_no,

            'amount'=>$payment->amount,

            'currency'=>'USD',

            'status'=>'Success',

        ]);

        Invoice::create([

            'payment_id'=>$payment->id,

            'invoice_no'=>'INV-'.time(),

        ]);

        return redirect()
            ->route('admin.payments.index')
            ->with('success','PayPal Payment Successful.');
    }

    public function cancel(Payment $payment)
    {
        return redirect()
            ->route('admin.payments.index')
            ->with('error','Payment Cancelled.');
    }
}