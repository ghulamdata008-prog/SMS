<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Fee;
use App\Models\Student;
use App\Models\Payment;
use Illuminate\Http\Request;

class StudentFeeController extends Controller
{
    public function index()
    {
        $student = Student::where('user_id', auth()->id())->firstOrFail();

        $fees = Fee::where('student_id', $student->id)
                    ->latest()
                    ->get();

        return view('student.fees.index', compact('fees'));
    }

    public function show(Fee $fee)
    {
        return view('student.fees.show', compact('fee'));
    }

    /**
     * Create Payment Record
     */
    public function pay(Request $request, Fee $fee)
    {
        $student = Student::where('user_id', auth()->id())->firstOrFail();

        $payment = Payment::create([

            'fee_id' => $fee->id,

            'student_id' => $student->id,

            'amount' => $fee->remaining_fee,

            'payment_method' => $request->payment_method,

            'payment_gateway' => $request->payment_method,

            'payment_status' => 'Pending',

            'transaction_id' => 'TXN'.time(),

            'reference_no' => 'REF'.rand(100000,999999),

            'currency' => 'PKR',

            'payment_date' => now(),

        ]);

        if($request->payment_method=='Stripe'){

            return redirect()->route('student.stripe.checkout',$payment);

        }

       

        return back();
    }

    public function history()
{
    $student = \App\Models\Student::where('user_id', auth()->id())->firstOrFail();

    $payments = \App\Models\Payment::with('fee')
        ->where('student_id', $student->id)
        ->latest()
        ->paginate(10);

    return view('student.payment.history', compact('payments'));
}
}