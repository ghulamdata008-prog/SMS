@extends('layouts.teacher')

@section('title','My Classes')

@section('content')


<div class="teacher-content-wrapper">


    <!-- Header -->

    <div class="page-header mb-4">


        <div>

            <span class="page-badge">

                <i class="bi bi-building"></i>

                Teaching

            </span>


            <h2 class="fw-bold mt-3">

                My Classes

            </h2>


            <p class="text-muted">

                Manage your assigned classes, sections and subjects.

            </p>


        </div>



    </div>







    <!-- Classes Card -->


    <div class="classes-card">


        <div class="classes-header">


            <div class="header-icon">

                <i class="bi bi-mortarboard-fill"></i>

            </div>


            <div>

                <h5>
                    Assigned Classes
                </h5>

                <small>
                    Your teaching assignments
                </small>

            </div>


        </div>







        <div class="table-responsive">


            <table class="table classes-table align-middle mb-0">


                <thead>


                    <tr>

                        <th>
                            Class
                        </th>


                        <th>
                            Section
                        </th>


                        <th>
                            Subject
                        </th>


                    </tr>


                </thead>



                <tbody>



                @forelse($assignments as $assignment)



                    <tr>


                        <td>


                            <div class="class-info">


                                <div class="class-icon">


                                    <i class="bi bi-building"></i>


                                </div>



                                <span>

                                    {{ $assignment->schoolClass->name ?? '-' }}

                                </span>



                            </div>



                        </td>





                        <td>


                            <span class="section-badge">


                                <i class="bi bi-people-fill"></i>


                                {{ $assignment->section->name ?? '-' }}


                            </span>


                        </td>





                        <td>


                            <span class="subject-badge">


                                <i class="bi bi-book-fill"></i>


                                {{ $assignment->subject->name ?? '-' }}


                            </span>


                        </td>



                    </tr>




                @empty



                    <tr>


                        <td colspan="3">


                            <div class="empty-state">


                                <i class="bi bi-building-x"></i>


                                <h5>
                                    No Class Assigned
                                </h5>


                                <p>
                                    Your assigned classes will appear here.
                                </p>


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