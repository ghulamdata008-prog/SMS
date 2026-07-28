@extends('layouts.student')

@section('title','Fee Details')

@section('content')

<div class="container-fluid">

<div class="row justify-content-center">

<div class="col-lg-8">

<div class="card shadow border-0">

<div class="card-header bg-primary text-white">

<h4>

Fee Details

</h4>

</div>

<div class="card-body">

<table class="table">

<tr>

<th>Fee Type</th>

<td>{{ $fee->fee_type }}</td>

</tr>

<tr>

<th>Total Fee</th>

<td>Rs {{ number_format($fee->total_fee,2) }}</td>

</tr>

<tr>

<th>Paid Fee</th>

<td class="text-success">

Rs {{ number_format($fee->paid_fee,2) }}

</td>

</tr>

<tr>

<th>Remaining Fee</th>

<td class="text-danger">

Rs {{ number_format($fee->remaining_fee,2) }}

</td>

</tr>

<tr>

<th>Status</th>

<td>

@if($fee->status=='Paid')

<span class="badge bg-success">

Paid

</span>

@elseif($fee->status=='Partial')

<span class="badge bg-warning">

Partial

</span>

@else

<span class="badge bg-danger">

Pending

</span>

@endif

</td>

</tr>

</table>

@if($fee->remaining_fee>0)

<form action="{{ route('student.fees.pay',$fee) }}" method="POST">

    @csrf

    <input type="hidden"
           name="payment_method"
           value="Stripe">

    <button class="btn btn-primary w-100 mb-2">

        <i class="bi bi-credit-card"></i>

        Pay with Stripe

    </button>

</form>

<form action="{{ route('student.fees.pay',$fee) }}" method="POST">

    @csrf

    <input type="hidden"
           name="payment_method"
           value="PayPal">

    <button class="btn btn-info text-white w-100 mb-2">

        Pay with PayPal

    </button>

</form>

<form action="{{ route('student.fees.pay',$fee) }}" method="POST">

    @csrf

    <input type="hidden"
           name="payment_method"
           value="Monnify">

    <button class="btn btn-warning w-100">

        Pay with Monnify

    </button>

</form>

@endif

<a href="{{ route('student.fees.index') }}"
class="btn btn-secondary mt-4">

Back

</a>

</div>

</div>

</div>

</div>

</div>

@endsection