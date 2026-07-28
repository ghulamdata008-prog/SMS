<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Transaction;
use App\Models\Invoice;

class StudentPaymentController extends Controller
{
    public function success(Payment $payment)
    {
        $payment->update([

            'payment_status' => 'Paid',

            'transaction_id' => 'TXN'.time(),

            'reference_no' => 'REF'.rand(100000,999999),

        ]);

        Transaction::create([

            'payment_id'=>$payment->id,

            'transaction_no'=>'TRX'.time(),

            'gateway'=>$payment->payment_method,

            'reference_no'=>$payment->reference_no,

            'amount'=>$payment->amount,

            'currency'=>'PKR',

            'status'=>'Success',

        ]);

        if(!$payment->invoice){

            Invoice::create([

                'payment_id'=>$payment->id,

                'invoice_no'=>'INV-'.time(),

            ]);

        }

        $fee=$payment->fee;

        $fee->paid_fee += $payment->amount;

        $fee->remaining_fee = max(0,$fee->total_fee-$fee->paid_fee);

        $fee->paid_amount = $fee->paid_fee;

        $fee->remaining_amount = $fee->remaining_fee;

        if($fee->remaining_fee<=0){

            $fee->status='Paid';

        }elseif($fee->paid_fee>0){

            $fee->status='Partial';

        }else{

            $fee->status='Pending';

        }

        $fee->save();

        return redirect()

            ->route('student.fees.history')

            ->with('success','Payment Completed Successfully.');
    }
}