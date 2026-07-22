@extends('layouts.app')

@section('title','Edit Fee')

@section('content')

<div class="container-fluid">

    <div class="card shadow border-0 rounded-4">

        <div class="card-header bg-warning">

            <h4>

                Edit Fee

            </h4>

        </div>

        <div class="card-body">

            <form
                action="{{ route('admin.fees.update',$fee) }}"
                method="POST">

                @csrf

                @method('PUT')

                @include('admin.fees.form')

            </form>

        </div>

    </div>

</div>

@endsection