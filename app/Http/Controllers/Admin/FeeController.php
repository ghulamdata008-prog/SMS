<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fee;
use App\Models\Student;
use App\Models\SchoolClass;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    /**
     * Display Fee List
     */
    public function index()
    {
        $fees = Fee::with(['student','schoolClass'])
                    ->latest()
                    ->paginate(10);

        return view('admin.fees.index', compact('fees'));
    }

    /**
     * Show Create Form
     */
    public function create()
    {
        $students = Student::all();
        $classes = SchoolClass::all();

        return view('admin.fees.create', compact('students','classes'));
    }

    /**
     * Store Fee
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id'=>'required|exists:students,id',
            'class_id'=>'required|exists:school_classes,id',
            'fee_type'=>'required',
            'amount'=>'required|numeric|min:1',
            'due_date'=>'required|date',
        ]);

Fee::create([
    'student_id'       => $request->student_id,
    'class_id'         => $request->class_id,
    'fee_type'         => $request->fee_type,

    // New columns
    'amount'           => $request->amount,
    'paid_amount'      => 0,
    'remaining_amount' => $request->amount,

    // Old columns (still exist in your table)
    'total_fee'        => $request->amount,
    'paid_fee'         => 0,
    'remaining_fee'    => $request->amount,

    'due_date'         => $request->due_date,
    'status'           => 'Pending',
]);
        return redirect()
            ->route('admin.fees.index')
            ->with('success','Fee Added Successfully.');
    }

    /**
     * Show Fee Details
     */
    public function show(Fee $fee)
    {
        return view('admin.fees.show', compact('fee'));
    }

    /**
     * Edit Fee
     */
    public function edit(Fee $fee)
    {
        $students = Student::all();
        $classes = SchoolClass::all();

        return view('admin.fees.edit', compact(
            'fee',
            'students',
            'classes'
        ));
    }

    /**
     * Update Fee
     */
    public function update(Request $request, Fee $fee)
    {
        $request->validate([
            'student_id'=>'required',
            'class_id'=>'required',
            'fee_type'=>'required',
            'amount'=>'required|numeric',
            'due_date'=>'required|date',
        ]);

        $fee->update($request->all());

        return redirect()
            ->route('admin.fees.index')
            ->with('success','Fee Updated Successfully.');
    }

    /**
     * Delete Fee
     */
    public function destroy(Fee $fee)
    {
        $fee->delete();

        return redirect()
            ->route('admin.fees.index')
            ->with('success','Fee Deleted Successfully.');
    }
}