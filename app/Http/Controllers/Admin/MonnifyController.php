<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Transaction;
use App\Models\Invoice;
use Illuminate\Support\Facades\Http;

class MonnifyController extends Controller
{
    /**
     * Redirect to Monnify Checkout
     */
    public function checkout(Payment $payment)
    {
        // Get Monnify settings from database
        $gateway = \App\Models\PaymentGateway::where('gateway', 'Monnify')->first();

        if (!$gateway) {
            return redirect()
                ->route('admin.payments.index')
                ->with('error', 'Monnify gateway is not configured.');
        }

        /*
        |--------------------------------------------------------------------------
        | Generate Basic Authentication Token
        |--------------------------------------------------------------------------
        */

        $authorization = base64_encode(
            $gateway->client_id . ':' . $gateway->secret_key
        );

        /*
        |--------------------------------------------------------------------------
        | Get Access Token
        |--------------------------------------------------------------------------
        */

        $tokenResponse = Http::withHeaders([
            'Authorization' => 'Basic ' . $authorization,
        ])->post(
            $gateway->environment == 'Live'
                ? 'https://api.monnify.com/api/v1/auth/login'
                : 'https://sandbox.monnify.com/api/v1/auth/login'
        );

        if (!$tokenResponse->successful()) {

            return back()->with(
                'error',
                'Unable to connect to Monnify.'
            );
        }

        $accessToken = $tokenResponse['responseBody']['accessToken'];

        /*
        |--------------------------------------------------------------------------
        | Create Transaction
        |--------------------------------------------------------------------------
        */

        $paymentResponse = Http::withToken($accessToken)->post(

            $gateway->environment == 'Live'
                ? 'https://api.monnify.com/api/v1/merchant/transactions/init-transaction'
                : 'https://sandbox.monnify.com/api/v1/merchant/transactions/init-transaction',

            [

                "amount" => $payment->amount,

                "customerName" => $payment->student->name,

                "customerEmail" => $payment->student->email,

                "paymentReference" => "MON-" . time(),

                "paymentDescription" => "School Fee Payment",

                "currencyCode" => $gateway->currency,

                "contractCode" => $gateway->contract_code,

                "redirectUrl" => route(
                    'admin.monnify.success',
                    $payment
                ),

            ]

        );

        if (
            isset($paymentResponse['responseBody']['checkoutUrl'])
        ) {

            return redirect(
                $paymentResponse['responseBody']['checkoutUrl']
            );

        }

        return back()->with(
            'error',
            'Unable to initialize Monnify payment.'
        );
    }

    /**
     * Payment Success
     */
    public function success(Payment $payment)
    {
        $payment->update([

            'payment_method'   => 'Monnify',

            'payment_status'   => 'Paid',

            'transaction_id'   => 'MON' . time(),

            'reference_no'     => 'MON-' . $payment->id,

        ]);

        Transaction::create([

            'payment_id'     => $payment->id,

            'transaction_no' => 'TRX' . time(),

            'gateway'        => 'Monnify',

            'reference_no'   => $payment->reference_no,

            'amount'         => $payment->amount,

            'currency'       => 'NGN',

            'status'         => 'Success',

        ]);

        Invoice::create([

            'payment_id' => $payment->id,

            'invoice_no' => 'INV-' . time(),

        ]);

        return redirect()
            ->route('admin.payments.index')
            ->with('success', 'Monnify Payment Successful.');
    }

    /**
     * Payment Cancel
     */
    public function cancel(Payment $payment)
    {
        return redirect()
            ->route('admin.payments.index')
            ->with('error', 'Payment Cancelled.');
    }
}