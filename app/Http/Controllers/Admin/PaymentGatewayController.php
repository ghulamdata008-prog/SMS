<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentGateway;
use Illuminate\Http\Request;

class PaymentGatewayController extends Controller
{
    /**
     * Dashboard
     */
    public function index()
{
    $stripe = PaymentGateway::where('gateway','Stripe')->first();

    $paypal = PaymentGateway::where('gateway','PayPal')->first();

    $monnify = PaymentGateway::where('gateway','Monnify')->first();

    return view('admin.payment_gateways.index', compact(
        'stripe',
        'paypal',
        'monnify'
    ));
}

    /**
     * ==============================
     * STRIPE
     * ==============================
     */

    public function stripe()
    {
        $gateway = PaymentGateway::firstOrNew([
            'gateway' => 'Stripe'
        ]);

        return view('admin.payment_gateways.stripe', compact('gateway'));
    }

    public function storeStripe(Request $request)
    {
        $request->validate([
            'publishable_key' => 'required',
            'secret_key'      => 'required',
            'currency'        => 'required',
            'environment'     => 'required',
        ]);

       PaymentGateway::updateOrCreate(
    ['gateway' => 'Stripe'],
    [
        'display_name'    => 'Stripe',
        'client_id'       => $request->client_id,
        'publishable_key' => $request->publishable_key,
        'secret_key'      => $request->secret_key,
        'currency'        => $request->currency,
        'environment'     => $request->environment,
        'status'          => $request->has('status'),
    ]
);

        return redirect()
            ->route('admin.payment-gateways.index')
            ->with('success', 'Stripe Settings Saved Successfully.');
    }

    /**
     * ==============================
     * PAYPAL
     * ==============================
     */

    public function paypal()
    {
        $gateway = PaymentGateway::firstOrNew([
            'gateway' => 'PayPal'
        ]);

        return view('admin.payment_gateways.paypal', compact('gateway'));
    }

    public function storePaypal(Request $request)
    {
        $request->validate([
            'client_id'    => 'required',
            'secret_key'   => 'required',
            'currency'     => 'required',
            'environment'  => 'required',
        ]);

        PaymentGateway::updateOrCreate(

            ['gateway' => 'PayPal'],

            [
                'client_id'   => $request->client_id,
                'secret_key'  => $request->secret_key,
                'currency'    => $request->currency,
                'environment' => $request->environment,
                'status'      => $request->status ?? 0,
            ]
        );

        return redirect()
            ->route('admin.payment-gateways.index')
            ->with('success', 'PayPal Settings Saved Successfully.');
    }

    /**
     * ==============================
     * MONNIFY
     * ==============================
     */

    public function monnify()
    {
        $gateway = PaymentGateway::firstOrNew([
            'gateway' => 'Monnify'
        ]);

        return view('admin.payment_gateways.monnify', compact('gateway'));
    }

    public function storeMonnify(Request $request)
    {
        $request->validate([
            'client_id'     => 'required',
            'secret_key'    => 'required',
            'contract_code' => 'required',
            'currency'      => 'required',
            'environment'   => 'required',
        ]);

        PaymentGateway::updateOrCreate(

            ['gateway' => 'Monnify'],

            [
                'client_id'     => $request->client_id,
                'secret_key'    => $request->secret_key,
                'contract_code' => $request->contract_code,
                'currency'      => $request->currency,
                'environment'   => $request->environment,
                'status'        => $request->status ?? 0,
            ]
        );

        return redirect()
            ->route('admin.payment-gateways.index')
            ->with('success', 'Monnify Settings Saved Successfully.');
    }
   public function show(PaymentGateway $paymentGateway)
{
    return view('admin.payment_gateways.show', compact('paymentGateway'));
}
}