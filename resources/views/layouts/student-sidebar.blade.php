<div class="student-sidebar shadow-lg">


    <!-- Logo -->
    <div class="student-sidebar-header">

        <div class="student-logo">

            <i class="bi bi-mortarboard-fill"></i>

        </div>


        <h4>
            School MS
        </h4>


        <span>
            Student Panel
        </span>


    </div>




    <!-- Menu -->

    <ul class="student-menu">


        <li>

            <a href="{{ route('student.dashboard') }}"
               class="active">

                <i class="bi bi-speedometer2"></i>

                <span>
                    Dashboard
                </span>

            </a>

        </li>




        <li>

            <a href="{{ route('student.attendance') }}">

                <i class="bi bi-calendar-check"></i>

                <span>
                    My Attendance
                </span>

            </a>

        </li>




        <li>

            <a href="{{ route('student.subjects') }}">

                <i class="bi bi-book"></i>

                <span>
                    My Subjects
                </span>

            </a>

        </li>




        <li>

            <a href="{{ route('student.results') }}">

                <i class="bi bi-award-fill"></i>

                <span>
                    My Results
                </span>

            </a>

        </li>




        <li>

            <a href="{{ route('student.profile') }}">

                <i class="bi bi-person-circle"></i>

                <span>
                    My Profile
                </span>

            </a>

        </li>



    </ul>





    <!-- Logout -->

<div class="student-logout">

    <form method="POST" action="{{ route('logout') }}">

        @csrf

        <button type="submit" class="logout-button">

            <i class="bi bi-box-arrow-right"></i>

            <span>
                Logout
            </span>

        </button>

    </form>

</div>
</div>





<style>


.student-sidebar{


    position:fixed;

    left:0;

    top:0;

    width:270px;

    height:100vh;

    background:

    linear-gradient(
        180deg,
        #0f172a,
        #1e3a8a
    );


    color:white;

    padding:25px 15px;

    display:flex;

    flex-direction:column;

    z-index:1000;


}




.student-sidebar-header{


    text-align:center;

    padding-bottom:25px;

    border-bottom:

    1px solid rgba(255,255,255,.15);


}




.student-logo{


    width:75px;

    height:75px;

    margin:auto;

    display:flex;

    align-items:center;

    justify-content:center;


    border-radius:25px;


    background:

    linear-gradient(
        135deg,
        #3b82f6,
        #60a5fa
    );


    font-size:35px;


    box-shadow:

    0 15px 30px rgba(0,0,0,.3);


}




.student-sidebar-header h4{


    margin-top:15px;

    font-weight:800;


}



.student-sidebar-header span{


    color:#cbd5e1;

    font-size:14px;


}




.student-menu{


    list-style:none;

    padding:20px 0;

    margin:0;

}



.student-menu li{


    margin-bottom:10px;


}




.student-menu a{


    display:flex;

    align-items:center;

    gap:15px;


    padding:14px 18px;


    color:#e2e8f0;


    text-decoration:none;


    border-radius:16px;


    font-weight:600;


    transition:.3s;


}



.student-menu a i{


    font-size:20px;


}





.student-menu a:hover,
.student-menu a.active{


    background:

    rgba(255,255,255,.15);


    color:white;


    transform:translateX(6px);


}





.student-logout{


    margin-top:auto;

    padding:15px;


}



.student-logout button{


    width:100%;


    padding:14px;


    border:none;


    border-radius:16px;


    background:

    linear-gradient(
        135deg,
        #ef4444,
        #dc2626
    );


    color:white;


    font-weight:700;


    transition:.3s;


}



.student-logout button:hover{


    transform:translateY(-3px);


    box-shadow:

    0 15px 25px rgba(239,68,68,.35);


}



</style>