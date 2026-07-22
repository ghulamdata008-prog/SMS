@extends('layouts.app')

@section('title','Add Payment')

@section('content')

<div class="container-fluid">

<div class="card shadow">

<div class="card-header">

<h4>

Add Payment

</h4>

</div>

<div class="card-body">

<form action="{{ route('admin.payments.update',$payment) }}" method="POST">

@csrf
@method('PUT')



<div class="mb-3">

<label>

Fee

</label>

<select
name="fee_id"
class="form-select">

<option value="{{ $payment->amount }}">

Select Fee

</option>

@foreach($fees as $fee)
<option
value="{{ $fee->id }}"
{{ $payment->fee_id==$fee->id ? 'selected':'' }}>

{{ $fee->student->name }}

</option>

@endforeach

</select>

</div>

<div class="mb-3">

<label>

Amount

</label>

<input
type="number"
step="0.01"
name="amount"
class="form-control">

</div>

<div class="mb-3">

<label>

Payment Method

</label>

<select
name="payment_method"
class="form-select">

<option>Cash</option>

<option>Bank</option>

<option>Stripe</option>

<option>Paypal</option>

<option>Monify</option>

<option>JazzCash</option>

<option>Easypaisa</option>

</select>

</div>

<div class="mb-3">

<label>

Notes

</label>

<textarea
name="{{ $payment->notes }}"
rows="3"
class="form-control"></textarea>

</div>

<button class="btn btn-primary">

Save Payment

</button>

<a href="{{ route('admin.payments.index') }}"
class="btn btn-secondary">

Cancel

</a>

</form>

</div>

</div>

</div>

@endsection