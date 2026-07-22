<aside class="teacher-sidebar">


    <!-- Logo -->

    <div class="teacher-logo">

        <a href="{{ route('teacher.dashboard') }}">

            <div class="logo-icon">
                <i class="bi bi-mortarboard-fill"></i>
            </div>

            <div>
                <h4>Teacher Panel</h4>
                <small>School Portal</small>
            </div>

        </a>

    </div>




    <!-- Menu -->

    <ul class="teacher-menu">


        <li>

            <a href="{{ route('teacher.dashboard') }}">

                <i class="bi bi-grid-fill"></i>

                <span>
                    Dashboard
                </span>

            </a>

        </li>





        <li>

            <a href="{{ route('teacher.my.classes') }}">

                <i class="bi bi-building"></i>

                <span>
                    My Classes
                </span>

            </a>

        </li>





        <li>

            <a href="{{ route('teacher.students') }}">

                <i class="bi bi-people-fill"></i>

                <span>
                    My Students
                </span>

            </a>

        </li>





        <li>

            <a href="{{ route('teacher.attendance') }}">

                <i class="bi bi-calendar-check-fill"></i>

                <span>
                    Class Attendance
                </span>

            </a>

        </li>





        <li>

            <a href="{{ route('teacher.attendance.view') }}">

                <i class="bi bi-eye-fill"></i>

                <span>
                    View Attendance
                </span>

            </a>

        </li>





        <li>

            <a href="{{ route('teacher.marks.index') }}">

                <i class="bi bi-journal-check"></i>

                <span>
                    Marks
                </span>

            </a>

        </li>





        <li>

            <a href="{{ route('teacher.subjects.index') }}">

                <i class="bi bi-book-fill"></i>

                <span>
                    Subjects
                </span>

            </a>

        </li>





        <li>

            <a href="{{ route('teacher.profile') }}">

                <i class="bi bi-person-circle"></i>

                <span>
                    Profile
                </span>

            </a>

        </li>



    </ul>


</aside>