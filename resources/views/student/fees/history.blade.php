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

@if($payment->invoice)

<a href="{{ route('student.invoice.show',$payment->invoice) }}"
class="btn btn-primary btn-sm">

Invoice

</a>

@endif

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</div>

</div>

@endsection