@extends('layouts.app')

@section('title','Edit Profile')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow border-0">

                <div class="card-header bg-primary text-white">

                    <h4 class="mb-0">
                        <i class="bi bi-person-gear me-2"></i>
                        Edit Profile
                    </h4>

                </div>

                <div class="card-body">

                    <form action="{{ route('admin.profile.password.update') }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="text-center mb-4">

                            @if(auth()->user()->profile_photo)

                                <img src="{{ asset('storage/'.auth()->user()->profile_photo) }}"
                                     class="rounded-circle shadow"
                                     width="150"
                                     height="150"
                                     style="object-fit:cover">

                            @else

                                <img src="{{ asset('images/default-user.png') }}"
                                     class="rounded-circle shadow"
                                     width="150">

                            @endif

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Profile Image
                            </label>

                            <input type="file"
                                   name="profile_photo"
                                   class="form-control">

                            @error('profile_photo')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>

                        <div class="mb-3">

                            <label>Name</label>

                            <input type="text"
                                   name="name"
                                   value="{{ old('name',auth()->user()->name) }}"
                                   class="form-control">

                            @error('name')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>

                        <div class="mb-3">

                            <label>Email</label>

                            <input type="email"
                                   value="{{ auth()->user()->email }}"
                                   class="form-control"
                                   readonly>

                        </div>

                        <div class="mb-3">

                            <label>Phone</label>

                            <input type="text"
                                   name="phone"
                                   value="{{ old('phone',auth()->user()->phone) }}"
                                   class="form-control">

                        </div>

                        <div class="mb-4">

                            <label>Address</label>

                            <textarea
                                name="address"
                                rows="4"
                                class="form-control">{{ old('address',auth()->user()->address) }}</textarea>

                        </div>
<hr class="my-4">

<h5 class="mb-3">
    <i class="bi bi-shield-lock me-2"></i>
    Change Password
</h5>

<div class="mb-3">

    <label class="form-label">
        Current Password
    </label>

    <input type="password"
           name="current_password"
           class="form-control @error('current_password') is-invalid @enderror"
           placeholder="Enter current password">

    @error('current_password')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

</div>

<div class="mb-3">

    <label class="form-label">
        New Password
    </label>

    <input type="password"
           name="password"
           class="form-control @error('password') is-invalid @enderror"
           placeholder="Enter new password">

    @error('password')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

</div>

<div class="mb-4">

    <label class="form-label">
        Confirm Password
    </label>

    <input type="password"
           name="password_confirmation"
           class="form-control"
           placeholder="Confirm new password">

</div>
                        <div class="text-end">

                            <a href="{{ route('admin.profile') }}"
                               class="btn btn-secondary">

                                Cancel

                            </a>

                            <button class="btn btn-primary">

                                <i class="bi bi-check-circle me-1"></i>

                                Update Profile

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection