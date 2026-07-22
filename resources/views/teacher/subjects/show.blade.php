@extends('layouts.teacher')

@section('title','Students')

@section('content')

<div class="container-fluid">

    <h3 class="fw-bold mb-4">

        {{ $assignment->subject->name }}

    </h3>

    <div class="row mb-4">

        <div class="col-md-4">

            <div class="card bg-primary text-white">

                <div class="card-body">

                    <h6>

                        Class

                    </h6>

                    <h4>

                        {{ $assignment->schoolClass->name }}

                    </h4>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card bg-success text-white">

                <div class="card-body">

                    <h6>

                        Section

                    </h6>

                    <h4>

                        {{ $assignment->section->name }}

                    </h4>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card bg-dark text-white">

                <div class="card-body">

                    <h6>

                        Students

                    </h6>

                    <h4>

                        {{ $students->count() }}

                    </h4>

                </div>

            </div>

        </div>

    </div>

    <div class="card shadow border-0 rounded-4">

        <div class="card-body">

            <table class="table table-bordered table-hover">

                <thead class="table-dark">

                    <tr>

                        <th>#</th>

                        <th>Name</th>

                        <th>Email</th>

                        <th>Class</th>

                        <th>Section</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($students as $student)

                    <tr>

                        <td>

                            {{ $loop->iteration }}

                        </td>

                        <td>

                            {{ $student->name }}

                        </td>

                        <td>

                            {{ $student->email }}

                        </td>

                        <td>

                            {{ $student->schoolClass->name }}

                        </td>

                        <td>

                            {{ $student->section->name }}

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5"
                            class="text-center">

                            No Students Found

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection