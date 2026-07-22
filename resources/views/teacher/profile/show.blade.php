@extends('layouts.teacher')

@section('title','My Profile')

@section('content')

<div class="container-fluid">

    <h3 class="fw-bold mb-4">

        My Profile

    </h3>

    <div class="card shadow border-0 rounded-4">

        <div class="card-body">

            <div class="row">

                <div class="col-md-4 text-center">

                    @if($teacher->user->profile_photo)

                        <img
                            src="{{ asset('storage/'.$teacher->user->profile_photo) }}"
                            class="rounded-circle border shadow"
                            width="180"
                            height="180">

                    @else

                        <img
                            src="{{ asset('images/default-user.png') }}"
                            class="rounded-circle border shadow"
                            width="180"
                            height="180">

                    @endif

                </div>

                <div class="col-md-8">

                    <table class="table table-bordered">

                        <tr>

                            <th width="220">

                                Name

                            </th>

                            <td>

                                {{ $teacher->user->name }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Email

                            </th>

                            <td>

                                {{ $teacher->user->email }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Phone

                            </th>

                            <td>

                                {{ $teacher->phone ?? '-' }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Qualification

                            </th>

                            <td>

                                {{ $teacher->qualification ?? '-' }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Address

                            </th>

                            <td>

                                {{ $teacher->address ?? '-' }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Total Subjects

                            </th>

                            <td>

                                {{ $teacher->subjects()->count() }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Joining Date

                            </th>

                            <td>

                                {{ $teacher->created_at->format('d M Y') }}

                            </td>

                        </tr>

                    </table>

                    <a href="{{ route('teacher.profile') }}"
                       class="btn btn-primary">

                        Edit Profile

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection