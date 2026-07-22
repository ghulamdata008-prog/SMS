<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Fee;
use App\Models\Transaction;
use App\Models\Invoice;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display Payment List
     */
    public function index()
    {
        $payments = Payment::with(['student','fee'])
            ->latest()
            ->paginate(10);

        return view('admin.payments.index', compact('payments'));
    }

    /**
     * Show Create Form
     */
    public function create()
    {
        $fees = Fee::with('student')->get();

        return view('admin.payments.create', compact('fees'));
    }

    /**
     * Store Payment
     */
    public function store(Request $request)
    {
        $request->validate([
            'fee_id' => 'required|exists:fees,id',
            'amount' => 'required|numeric|min:1',
            'payment_method' => 'required',
        ]);

        $fee = Fee::findOrFail($request->fee_id);

        // Create Payment
        $payment = Payment::create([

            'fee_id' => $fee->id,

            'student_id' => $fee->student_id,

            'amount' => $request->amount,

            'payment_method' => $request->payment_method,

            'payment_gateway' => $request->payment_method,

            'transaction_id' => 'TXN'.time(),

            'reference_no' => 'REF'.rand(100000,999999),

            'currency' => 'PKR',

        'payment_status' => 'Pending',

            'payment_date' => now(),

            'notes' => $request->notes,

        ]);

        // Create Transaction
        Transaction::create([

            'payment_id' => $payment->id,

            'transaction_no' => 'TRX'.time(),

            'gateway' => $payment->payment_method,

            'reference_no' => $payment->reference_no,

            'amount' => $payment->amount,

            'currency' => 'PKR',

    'payment_status' => 'Pending',

        ]);

        // Create Invoice
        Invoice::create([

            'payment_id' => $payment->id,

            'invoice_no' => 'INV-'.date('Y').'-'.str_pad($payment->id,6,'0',STR_PAD_LEFT),

        ]);

        // Update Fee Record
$fee->paid_fee += $payment->amount;
$fee->remaining_fee = $fee->total_fee - $fee->paid_fee;

$fee->paid_amount = $fee->paid_fee;
$fee->remaining_amount = $fee->remaining_fee;

if($fee->remaining_fee <= 0){

    $fee->status='Paid';

}elseif($fee->paid_fee>0){

    $fee->status='Partial';

}else{

    $fee->status='Pending';

}

$fee->save();
if($request->payment_method=='Stripe'){

    return redirect()->route(
        'admin.stripe.checkout',
        $payment
    );

}
if($request->payment_method=='PayPal'){

    return redirect()->route(
        'admin.paypal.checkout',
        $payment
    );

}
if($request->payment_method=='Monify'){

    return redirect()->route(
        'admin.monnify.checkout',
        $payment
    );

}
        return redirect()
            ->route('admin.payments.index')
            ->with('success','Payment Added Successfully.');
    }

    /**
     * Show Payment
     */
    public function show(Payment $payment)
    {
        return view('admin.payments.show', compact('payment'));
    }

    /**
     * Edit Payment
     */
    public function edit(Payment $payment)
    {
        $fees = Fee::with('student')->get();

        return view('admin.payments.edit', compact('payment','fees'));
    }

    /**
     * Update Payment
     */
    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'fee_id' => 'required',
            'amount' => 'required|numeric',
            'payment_method' => 'required',
            'payment_status' => 'required',
        ]);

        $payment->update($request->all());

        return redirect()
            ->route('admin.payments.index')
            ->with('success','Payment Updated Successfully.');
    }

    /**
     * Delete Payment
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();

        return redirect()
            ->route('admin.payments.index')
            ->with('success','Payment Deleted Successfully.');
    }
}