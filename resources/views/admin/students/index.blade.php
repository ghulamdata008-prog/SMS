@extends('layouts.app')

@section('title','Students')

@section('content')

<div class="container-fluid">

    <!-- Header -->

    <div class="page-header mb-4">

        <div>

            <h2 class="page-title">
                Student Management
            </h2>

            <p class="page-subtitle">
                Manage all students in one place
            </p>

        </div>

        <a href="{{ route('admin.students.create') }}" class="btn-add">

            <i class="bi bi-person-plus-fill"></i>

            Add Student

        </a>

    </div>



    <!-- Card -->

    <div class="table-card">

        <div class="table-header">

            <h5>

                <i class="bi bi-people-fill"></i>

                Student List

            </h5>

            <span>

                Total :
                {{ $students->count() }}

            </span>

        </div>



        <div class="table-responsive">

            <table class="table align-middle student-table">

                <thead>

                <tr>

                    <th>#</th>

                    <th>Student</th>

                    <th>Email</th>

                    <th>Phone</th>

                    <th width="220">
                        Actions
                    </th>

                </tr>

                </thead>

                <tbody>

                @forelse($students as $student)

                    <tr>

                        <td>

                            {{ $loop->iteration }}

                        </td>

                        <td>

                            <div class="student-info">

                                @if($student->profile_image)

                                    <img
                                        src="{{ asset('storage/'.$student->profile_image) }}"
                                        class="student-img">

                                @else

                                    <div class="student-placeholder">

                                        {{ strtoupper(substr($student->name,0,1)) }}

                                    </div>

                                @endif


                                <div>

                                    <h6>

                                        {{ $student->name }}

                                    </h6>

                                    <small>

                                        Student

                                    </small>

                                </div>

                            </div>

                        </td>

                        <td>

                            {{ $student->email }}

                        </td>

                        <td>

                            {{ $student->phone }}

                        </td>

                        <td>

                            <div class="action-buttons">

                                <a href="{{ route('admin.students.show',$student) }}"
   class="btn-action view">

    <i class="bi bi-eye-fill"></i>

</a>

                                <a href="{{ route('admin.students.edit',$student) }}"
                                   class="btn-action edit">

                                    <i class="bi bi-pencil-square"></i>

                                </a>
  <form
                                    action="{{ route('admin.students.destroy',$student) }}"
                                    method="POST"
                                    class="delete-form d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn-action delete">

                                        <i class="bi bi-trash-fill"></i>

                                    </button>

                                </form>

                                <!-- <form action="{{ route('admin.students.destroy',$student) }}"
                                      method="POST"
                                      class="delete-form d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn-action delete">

                                        <i class="bi bi-trash-fill"></i>

                                    </button>

                                </form> -->

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5">

                            <div class="empty-box">

                                <i class="bi bi-people"></i>

                                <h5>

                                    No Students Found

                                </h5>

                            </div>

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection