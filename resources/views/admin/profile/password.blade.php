@extends('layouts.app')

@section('title','Change Password')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-6">

            <div class="card shadow border-0">

                <div class="card-header bg-warning">

                    <h4 class="mb-0">

                        <i class="bi bi-key-fill me-2"></i>

                        Change Password

                    </h4>

                </div>

                <div class="card-body">

                    <form action="{{ route('admin.profile.update') }}"
                          method="POST">

                        @csrf
                        @method('PUT')

                        <div class="mb-3">

                            <label>

                                Current Password

                            </label>

                            <input type="password"
                                   name="current_password"
                                   class="form-control">

                            @error('current_password')

                                <small class="text-danger">

                                    {{ $message }}

                                </small>

                            @enderror

                        </div>

                        <div class="mb-3">

                            <label>

                                New Password

                            </label>

                            <input type="password"
                                   name="password"
                                   class="form-control">

                            @error('password')

                                <small class="text-danger">

                                    {{ $message }}

                                </small>

                            @enderror

                        </div>

                        <div class="mb-4">

                            <label>

                                Confirm Password

                            </label>

                            <input type="password"
                                   name="password_confirmation"
                                   class="form-control">

                        </div>

                        <div class="text-end">

                            <a href="{{ route('admin.profile') }}"
                               class="btn btn-secondary">

                                Cancel

                            </a>

                            <button class="btn btn-warning">

                                <i class="bi bi-shield-lock-fill me-1"></i>

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