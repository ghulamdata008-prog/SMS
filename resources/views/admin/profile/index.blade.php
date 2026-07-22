@extends('layouts.app')

@section('title', 'My Profile')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-10">

            <!-- @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}

                    <button class="btn-close"
                            data-bs-dismiss="alert"></button>
                </div>
            @endif -->

            <div class="card shadow border-0 rounded-4">

                <div class="card-header bg-primary text-white">

                    <h4 class="mb-0">

                        <i class="bi bi-person-circle me-2"></i>

                        My Profile

                    </h4>

                </div>

                <div class="card-body p-5">

                    <div class="row">

                        <!-- Profile Image -->
                        <div class="col-md-4 text-center">

                            @if(auth()->user()->profile_photo)

                                <img src="{{ asset('storage/'.auth()->user()->profile_photo) }}"
                                     class="rounded-circle shadow"
                                     width="180"
                                     height="180"
                                     style="object-fit:cover;">

                            @else

                                <img src="{{ asset('images/client3.jpg') }}"
                                     class="rounded-circle shadow"
                                     width="180"
                                     height="180">

                            @endif

                            <h4 class="mt-3">

                                {{ auth()->user()->name }}

                            </h4>

                            <span class="badge bg-success">

                                {{ auth()->user()->getRoleNames()->first() ?? 'Admin' }}

                            </span>

                        </div>

                        <!-- Profile Details -->

                        <div class="col-md-8">

                            <table class="table table-bordered">

                                <tr>

                                    <th width="220">

                                        Full Name

                                    </th>

                                    <td>

                                        {{ auth()->user()->name }}

                                    </td>

                                </tr>

                                <tr>

                                    <th>Email</th>

                                    <td>

                                        {{ auth()->user()->email }}

                                    </td>

                                </tr>

                                <tr>

                                    <th>Phone</th>

                                    <td>

                                        {{ auth()->user()->phone ?? 'Not Added' }}

                                    </td>

                                </tr>

                                <tr>

                                    <th>Address</th>

                                    <td>

                                        {{ auth()->user()->address ?? 'Not Added' }}

                                    </td>

                                </tr>

                                <tr>

                                    <th>Role</th>

                                    <td>

                                        {{ auth()->user()->getRoleNames()->first() }}

                                    </td>

                                </tr>

                                <tr>

                                    <th>Member Since</th>

                                    <td>

                                        {{ auth()->user()->created_at->format('d M Y') }}

                                    </td>

                                </tr>

                                <tr>

                                    <th>Last Login</th>

                                    <td>

                                        {{ auth()->user()->last_login_at ? auth()->user()->last_login_at->diffForHumans() : 'First Login' }}

                                    </td>

                                </tr>

                            </table>

                            <div class="mt-4">

                                <a href="{{ route('admin.profile.edit') }}"
                                   class="btn btn-primary">

                                    <i class="bi bi-pencil-square"></i>

                                    Edit Profile

                                </a>

                                <a href="{{ route('admin.profile.password') }}"
                                   class="btn btn-warning">

                                    <i class="bi bi-key"></i>

                                    Change Password

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection