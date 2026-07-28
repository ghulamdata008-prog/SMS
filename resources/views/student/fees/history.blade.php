@extends('layouts.student')

@section('title','Payment History')

@section('content')

<div class="container-fluid">

<div class="card shadow">

<div class="card-header bg-success text-white">

<h4>

Payment History

</h4>

</div>

<div class="card-body">

<table class="table table-bordered">

<thead>

<tr>

<th>#</th>

<th>Date</th>

<th>Method</th>

<th>Amount</th>

<th>Status</th>

<th>Invoice</th>

</tr>

</thead>

<tbody>

@foreach($payments as $payment)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $payment->payment_date }}</td>

<td>{{ $payment->payment_method }}</td>

<td>Rs {{ number_format($payment->amount,2) }}</td>

<td>

@if($payment->payment_status=='Paid')

<span class="badge bg-success">

Paid

</span>

@else

<span class="badge bg-warning">

Pending

</span>

@endif

</td>

<td>

<form action="{{ route('student.payment.delete',$payment->id) }}" 
method="POST"
onsubmit="return confirm('Are you sure you want to delete this payment?');">

@csrf
@method('DELETE')

<button type="submit" class="btn btn-danger btn-sm">

Delete

</button>

</form>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</div>

</div>

@endsection