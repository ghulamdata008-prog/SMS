@extends('layouts.teacher')

@section('title','Teacher Dashboard')

@section('content')


<div class="teacher-dashboard">



    <!-- Welcome Hero -->


    <div class="teacher-hero">


        <div>


            <span class="dashboard-badge">

                <i class="bi bi-circle-fill"></i>

                Teacher Portal

            </span>



            <h1>

                Welcome Back,

                <span>
                    {{ auth()->user()->name }}
                </span>

                👋

            </h1>



            <p>

                Manage your classes, students and attendance easily.

            </p>



        </div>



        <div class="hero-teacher-icon">

            <i class="bi bi-person-workspace"></i>

        </div>



    </div>








    <!-- Statistics -->


    <div class="row g-4 mt-3">



        <!-- Students -->


        <div class="col-xl-4 col-md-6">


            <div class="teacher-stat-card blue-card">


                <div class="stat-icon">

                    <i class="bi bi-people-fill"></i>

                </div>



                <div>

                    <p>
                        Total Students
                    </p>


                    <h2>
                        {{ $students }}
                    </h2>


                </div>



            </div>


        </div>







        <!-- Subjects -->


        <div class="col-xl-4 col-md-6">


            <div class="teacher-stat-card green-card">


                <div class="stat-icon">

                    <i class="bi bi-book-fill"></i>

                </div>



                <div>

                    <p>
                        Subjects
                    </p>


                    <h2>
                        {{ $subjects }}
                    </h2>


                </div>



            </div>


        </div>







        <!-- Attendance -->


        <div class="col-xl-4 col-md-6">


            <div class="teacher-stat-card orange-card">


                <div class="stat-icon">

                    <i class="bi bi-calendar-check-fill"></i>

                </div>



                <div>

                    <p>
                        Attendance Records
                    </p>


                    <h2>
                        {{ $attendance }}
                    </h2>


                </div>



            </div>


        </div>



    </div>






    <!-- Bottom Cards -->


    <div class="row mt-4 g-4">



        <div class="col-lg-8">


            <div class="teacher-box">


                <div class="box-header">

                    <h5>

                        Quick Overview

                    </h5>


                </div>




                <div class="overview-content">


                    <div>

                        <i class="bi bi-mortarboard-fill"></i>

                        <span>
                            Manage Students
                        </span>


                    </div>



                    <div>

                        <i class="bi bi-calendar-check"></i>

                        <span>
                            Mark Attendance
                        </span>


                    </div>




                    <div>

                        <i class="bi bi-journal-check"></i>

                        <span>
                            Manage Marks
                        </span>


                    </div>



                </div>



            </div>


        </div>




        <div class="col-lg-4">


            <div class="teacher-box">


                <div class="box-header">

                    <h5>

                        Teacher Panel

                    </h5>

                </div>



                <p class="text-muted">

                    Use sidebar menu to manage your teaching activities.

                </p>



            </div>


        </div>



    </div>





</div>


@endsection