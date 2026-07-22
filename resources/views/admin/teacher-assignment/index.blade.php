@extends('layouts.app')


@section('title','Teacher Assignment')


@section('content')


<div class="container-fluid py-4">


    <!-- Header -->

    <div class="d-flex justify-content-between align-items-center mb-4">


        <div>

            <h3 class="fw-bold text-dark mb-1">

                Teacher Assignment

            </h3>

            <p class="text-muted mb-0">

                Manage teacher subject assignments

            </p>

        </div>



        <a href="{{ route('admin.teacher.assignment.create') }}"
           class="btn btn-primary rounded-pill px-4 shadow-sm">

            <i class="bi bi-plus-circle me-2"></i>

            Assign Teacher

        </a>


    </div>





    <!-- Card -->


    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">


        <div class="card-header bg-white border-0 py-4 px-4">


            <div class="d-flex align-items-center gap-2">


                <div class="bg-primary bg-opacity-10 rounded-circle p-2">

                    <i class="bi bi-person-workspace text-primary fs-5"></i>

                </div>


                <h5 class="fw-bold mb-0">

                    Assignment List

                </h5>


            </div>


        </div>





        <div class="card-body p-0">


            <div class="table-responsive">


                <table class="table table-hover align-middle mb-0">


                    <thead class="table-dark">


                    <tr>

                        <th class="px-4">
                            Teacher
                        </th>


                        <th>
                            Subject
                        </th>


                        <th>
                            Class
                        </th>


                        <th>
                            Section
                        </th>


                        <th class="text-center">
                            Action
                        </th>


                    </tr>


                    </thead>




                    <tbody>


                    @forelse($assignments as $assignment)


                    <tr>


                        <td class="px-4">


                            <div class="d-flex align-items-center gap-3">


                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                                     style="width:42px;height:42px;">


                                    <i class="bi bi-person-fill"></i>


                                </div>



                                <div>


                                    <h6 class="mb-0 fw-semibold">

                                        {{ $assignment->teacher->user->name ?? 'N/A' }}

                                    </h6>


                                    <small class="text-muted">

                                        Teacher

                                    </small>


                                </div>


                            </div>


                        </td>





                        <td>


                            <span class="badge bg-info-subtle text-info px-3 py-2 rounded-pill">


                                <i class="bi bi-book me-1"></i>

                                {{ $assignment->subject->name ?? 'N/A' }}


                            </span>


                        </td>






                        <td>


                            <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill">


                                <i class="bi bi-building me-1"></i>

                                {{ $assignment->schoolClass->name ?? 'N/A' }}


                            </span>


                        </td>





                        <td>


                            <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill">


                                <i class="bi bi-diagram-3 me-1"></i>

                                {{ $assignment->section->name ?? 'N/A' }}


                            </span>


                        </td>






                        <td class="text-center">


                            <form action="{{route(
                            'admin.teacher.assignment.destroy',
                            $assignment->id
                            )}}"
                            method="POST">


                            @csrf

                            @method('DELETE')



                            <button class="btn btn-outline-danger btn-sm rounded-pill px-3"
                            onclick="return confirm('Delete Assignment?')">


                                <i class="bi bi-trash me-1"></i>

                                Delete


                            </button>



                            </form>


                        </td>



                    </tr>




                    @empty



                    <tr>


                        <td colspan="5" class="text-center py-5">


                            <div class="text-muted">


                                <i class="bi bi-inbox fs-1 d-block mb-3"></i>


                                No Assignment Found


                            </div>


                        </td>


                    </tr>



                    @endforelse



                    </tbody>


                </table>


            </div>


        </div>


    </div>


</div>


@endsection