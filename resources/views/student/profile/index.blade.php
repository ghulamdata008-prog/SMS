@extends('layouts.student')

@section('title','My Profile')

@section('content')

<div class="container-fluid">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow border-0 rounded-4">

        <div class="card-header bg-primary text-white">

            <h4 class="mb-0">My Profile</h4>

        </div>

        <div class="card-body">

            <form action="{{ route('student.profile.update') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-3 text-center">

                        @if($student->profile_image)

                            <img src="{{ asset('storage/'.$student->profile_image) }}"
                                 class="img-thumbnail rounded-circle mb-3"
                                 width="180"
                                 height="180">

                        @else

                            <img src="https://via.placeholder.com/180"
                                 class="img-thumbnail rounded-circle mb-3">

                        @endif

                        <input type="file"
                               name="profile_image"
                               class="form-control">

                    </div>

                    <div class="col-md-9">

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label>Name</label>

                                <input type="text"
                                       name="name"
                                       value="{{ old('name',$student->name) }}"
                                       class="form-control">

                            </div>

                            <div class="col-md-6 mb-3">

                                <label>Email</label>

                                <input type="email"
                                       value="{{ $student->email }}"
                                       class="form-control"
                                       readonly>

                            </div>

                            <div class="col-md-6 mb-3">

                                <label>Phone</label>

                                <input type="text"
                                       name="phone"
                                       value="{{ old('phone',$student->phone) }}"
                                       class="form-control">

                            </div>

                            <div class="col-md-6 mb-3">

                                <label>Class</label>

                                <input type="text"
                                       value="{{ $student->schoolClass->name ?? '-' }}"
                                       class="form-control"
                                       readonly>

                            </div>

                            <div class="col-md-6 mb-3">

                                <label>Section</label>

                                <input type="text"
                                       value="{{ $student->section->name ?? '-' }}"
                                       class="form-control"
                                       readonly>

                            </div>

                            <div class="col-md-12 mb-3">

                                <label>Address</label>

                                <textarea name="address"
                                          class="form-control"
                                          rows="4">{{ old('address',$student->address) }}</textarea>

                            </div>

                        </div>

                        <button class="btn btn-primary">

                            Update Profile

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection