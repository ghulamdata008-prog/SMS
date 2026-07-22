@extends('layouts.teacher')

@section('title','Teacher Profile')

@section('content')

<div class="container-fluid">

@if(session('success'))

<div class="alert alert-success">

{{ session('success') }}

</div>

@endif

<div class="row">

<div class="col-md-4">

<div class="card shadow border-0">

<div class="card-body text-center">

@if($teacher->user->profile_photo)

<img
src="{{ asset('storage/'.$teacher->user->profile_photo) }}"
class="rounded-circle mb-3"
width="150"
height="150">

@else

<img
src="{{ asset('images/default-user.png') }}"
class="rounded-circle mb-3"
width="150"
height="150">

@endif

<h4>

{{ $teacher->user->name }}

</h4>

<p>

{{ $teacher->user->email }}

</p>

</div>

</div>

</div>

<div class="col-md-8">

<div class="card shadow border-0">

<div class="card-header bg-primary text-white">

Update Profile

</div>

<div class="card-body">

<form
action="{{ route('teacher.profile.update') }}"
method="POST"
enctype="multipart/form-data">

@csrf

<div class="row">

<div class="col-md-6 mb-3">

<label>Name</label>

<input
type="text"
name="name"
class="form-control"
value="{{ old('name',$teacher->user->name) }}">

</div>

<div class="col-md-6 mb-3">

<label>Email</label>

<input
type="email"
name="email"
class="form-control"
value="{{ old('email',$teacher->user->email) }}">

</div>

<div class="col-md-6 mb-3">

<label>Phone</label>

<input
type="text"
name="phone"
class="form-control"
value="{{ old('phone',$teacher->phone) }}">

</div>

<div class="col-md-6 mb-3">

<label>Qualification</label>

<input
type="text"
name="qualification"
class="form-control"
value="{{ old('qualification',$teacher->qualification) }}">

</div>

<div class="col-md-12 mb-3">

<label>Address</label>

<textarea
name="address"
class="form-control"
rows="3">{{ old('address',$teacher->address) }}</textarea>

</div>

<div class="col-md-12 mb-3">

<label>Profile Image</label>

<input
type="file"
name="profile_image"
class="form-control">

</div>

<div class="text-end">
<a href="{{ route('teacher.profile.show') }}"
       class="btn btn-info">

        <i class="bi bi-eye"></i>

        View Profile

    </a>
<button class="btn btn-primary">

Update Profile

</button>

</div>

</div>

</form>

</div>

</div>

<div class="card shadow border-0 mt-4">

<div class="card-header bg-dark text-white">

Change Password

</div>

<div class="card-body">

<form
action="{{ route('teacher.profile.password') }}"
method="POST">

@csrf

<div class="mb-3">

<label>New Password</label>

<input
type="password"
name="password"
class="form-control">

</div>

<div class="mb-3">

<label>Confirm Password</label>

<input
type="password"
name="password_confirmation"
class="form-control">

</div>

<div class="text-end">

<button class="btn btn-success">

Update Password

</button>

</div>

</form>

</div>

</div>

</div>

</div>

</div>

@endsection