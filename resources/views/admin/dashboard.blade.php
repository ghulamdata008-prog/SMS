@extends('layouts.app')

@section('title','Admin Dashboard')

@section('content')

<div class="dashboard">

    <!-- Hero Header -->
    <div class="hero-card mb-4">

        <div class="hero-content d-flex justify-content-between align-items-center">

            <div>

                <span class="badge-live">
                    <i class="bi bi-circle-fill"></i>
                    Live Dashboard
                </span>


                <h2 class="mt-3">
                    Welcome Back,
                    <span>{{ auth()->user()->name }}</span> 👋
                </h2>


                <p>
                    School Management System Overview
                </p>


            </div>


            <div class="hero-icon">

                <i class="bi bi-mortarboard-fill"></i>

            </div>


        </div>

    </div>




    <!-- Statistics -->

    <div class="row g-4">


        <div class="col-xl-3 col-md-6">

            <div class="stat-card blue">

                <div class="stat-top">

                    <div>

                        <span>Total Students</span>

                        <h2>{{ $students }}</h2>

                    </div>


                    <div class="icon-box">
                        <i class="bi bi-people-fill"></i>
                    </div>

                </div>


                <div class="progress-line"></div>


            </div>

        </div>





        <div class="col-xl-3 col-md-6">

            <div class="stat-card green">

                <div class="stat-top">

                    <div>

                        <span>Total Teachers</span>

                        <h2>{{ $teachers }}</h2>

                    </div>


                    <div class="icon-box">
                        <i class="bi bi-person-workspace"></i>
                    </div>

                </div>


                <div class="progress-line"></div>

            </div>

        </div>






        <div class="col-xl-3 col-md-6">

            <div class="stat-card orange">

                <div class="stat-top">

                    <div>

                        <span>Total Classes</span>

                        <h2>{{ $classes }}</h2>

                    </div>


                    <div class="icon-box">
                        <i class="bi bi-building"></i>
                    </div>

                </div>


                <div class="progress-line"></div>

            </div>

        </div>






        <div class="col-xl-3 col-md-6">

            <div class="stat-card red">


                <div class="stat-top">


                    <div>

                        <span>Total Subjects</span>

                        <h2>{{ $subjects }}</h2>

                    </div>



                    <div class="icon-box">

                        <i class="bi bi-book-fill"></i>

                    </div>


                </div>



                <div class="progress-line"></div>


            </div>


        </div>


    </div>







    <!-- Records Section -->

    <div class="row g-4 mt-2">





        <!-- Students -->

        <div class="col-xl-8 col-lg-7">


            <div class="dashboard-box">


                <div class="box-title d-flex justify-content-between align-items-center">


                    <h5>
                        Recent Students
                    </h5>


                    <span class="view-all">
                        Latest Records
                    </span>


                </div>





                @if($recentStudents->count())


                <div class="student-list">


                @foreach($recentStudents as $student)


                    <div class="student-item">


                        <div class="student-avatar">

                            {{ strtoupper(substr($student->name,0,1)) }}

                        </div>




                        <div class="ms-3">


                            <h6 class="mb-1">

                                {{ $student->name }}

                            </h6>


                            <small class="text-muted d-block">

                                {{ $student->email }}

                            </small>




                            <small class="text-primary">


                                <i class="bi bi-building"></i>

                                Class:
                                {{ $student->schoolClass->name ?? '-' }}



                                &nbsp; | &nbsp;



                                <i class="bi bi-people"></i>

                                Section:
                                {{ $student->section->name ?? '-' }}


                            </small>


                        </div>





                        <div class="ms-auto">


                            <span class="badge bg-primary">

                                {{ $student->created_at->diffForHumans() }}

                            </span>


                        </div>



                    </div>



                @endforeach


                </div>




                @else


                <div class="empty-state">

                    <i class="bi bi-mortarboard-fill"></i>

                    <h5>
                        No Recent Students
                    </h5>

                    <p>
                        Student records will appear here.
                    </p>

                </div>



                @endif


            </div>



        </div>








        <!-- Teachers -->


        <div class="col-xl-4 col-lg-5">


            <div class="dashboard-box">


                <div class="box-title d-flex justify-content-between align-items-center">


                    <h5>
                        Recent Teachers
                    </h5>


                    <span class="view-all">
                        Latest Records
                    </span>


                </div>




                @if($recentTeachers->count())



                <div class="student-list">



                @foreach($recentTeachers as $teacher)



                    <div class="student-item">



                        <div class="student-avatar">


                            {{ strtoupper(substr($teacher->name,0,1)) }}


                        </div>





                        <div class="ms-3">


                            <h6 class="mb-1">

                                {{ $teacher->name }}

                            </h6>


                            <small class="text-muted d-block">

                                {{ $teacher->email }}

                            </small>



                            <small class="text-primary">

                                <i class="bi bi-book"></i>

                               

                        Subject:

{{ $teacher->assignments->first()->subject->name ?? '-' }}

                            </small>


                            <br>


                            <small class="text-success">


                                <i class="bi bi-cash"></i>

                                Salary:

                                Rs {{ number_format($teacher->salary ?? 0) }}


                            </small>


                        </div>




                    </div>




                @endforeach



                </div>




                @else


                <div class="empty-state">

                    <i class="bi bi-person-badge-fill"></i>

                    <h5>
                        No Recent Teachers
                    </h5>


                    <p>
                        Teacher records will appear here.
                    </p>


                </div>



                @endif


            </div>


        </div>





    </div>







    <!-- Quick Actions -->

    <div class="row mt-4">


        <div class="col-12">


            <div class="dashboard-box">


                <div class="box-title">

                    <h5>
                        Quick Actions
                    </h5>

                </div>




                <div class="row g-3">


                    <div class="col-md-3">

                        <a href="{{ route('admin.students.create') }}"
                           class="dashboard-action-btn primary">

                            <i class="bi bi-person-plus-fill"></i>

                            Add Student

                        </a>


                    </div>




                    <div class="col-md-3">


                        <a href="{{ route('admin.teachers.create') }}"
                           class="dashboard-action-btn success">


                            <i class="bi bi-person-badge-fill"></i>

                            Add Teacher


                        </a>


                    </div>





                    <div class="col-md-3">


                        <a href="{{ route('admin.classes.create') }}"
                           class="dashboard-action-btn warning">


                            <i class="bi bi-building-fill-add"></i>

                            Add Class


                        </a>


                    </div>





                    <div class="col-md-3">


                        <a href="{{ route('admin.subjects.create') }}"
                           class="dashboard-action-btn danger">


                            <i class="bi bi-book-fill"></i>

                            Add Subject


                        </a>


                    </div>


                </div>


            </div>


        </div>


    </div>



</div>


@endsection