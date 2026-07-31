<div class="student-sidebar shadow-lg">

    <!-- Header -->
    <div class="student-sidebar-header">

        <div class="student-logo">
            <i class="bi bi-mortarboard-fill"></i>
        </div>

        <h4>School MS</h4>

        <small>Student Panel</small>

    </div>

    <!-- Menu -->
<div class="student-menu">
    <ul>

        <li>
            <a href="{{ route('student.dashboard') }}"
               class="{{ request()->routeIs('student.dashboard') ? 'active' : '' }}">

                <i class="bi bi-speedometer2"></i>

                <span>Dashboard</span>

            </a>
        </li>

        <li>
            <a href="{{ route('student.attendance') }}"
               class="{{ request()->routeIs('student.attendance') ? 'active' : '' }}">

                <i class="bi bi-calendar-check"></i>

                <span>My Attendance</span>

            </a>
        </li>

        <li>
            <a href="{{ route('student.subjects') }}"
               class="{{ request()->routeIs('student.subjects') ? 'active' : '' }}">

                <i class="bi bi-book"></i>

                <span>My Subjects</span>

            </a>
        </li>
<li class="nav-item">
    <a href="{{ route('student.exams.index') }}"
       class="nav-link {{ request()->routeIs('student.exams.*') ? 'active' : '' }}">

        <i class="bi bi-journal-check"></i>

        <span>Online Exams</span>
    </a>
</li>
        <li>
            <a href="{{ route('student.results') }}"
               class="{{ request()->routeIs('student.results') ? 'active' : '' }}">

                <i class="bi bi-award-fill"></i>

                <span>My Results</span>

            </a>
        </li>

       
<li class="nav-item">
    <a href="{{ route('student.fees.index') }}"
       class="nav-link {{ request()->routeIs('student.fees.*') ? 'active' : '' }}">

        <i class="bi bi-cash-stack"></i>

        <span>My Fees</span>

    </a>
</li>

<li class="nav-item">
    <a href="{{ route('student.payment.history') }}"
       class="nav-link">

        <i class="bi bi-credit-card"></i>

        <span>Payment History</span>

    </a>
</li>
 <li>
            <a href="{{ route('student.profile') }}"
               class="{{ request()->routeIs('student.profile') ? 'active' : '' }}">

                <i class="bi bi-person-circle"></i>

                <span>My Profile</span>

            </a>
        </li>
    </ul>
</div>
    <!-- Logout -->

   <div class="student-logout">

    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button type="submit" class="logout-button">
            <i class="bi bi-box-arrow-right"></i>
            <span>Logout</span>
        </button>

    </form>

</div>

</div>



<style>
/* =====================================================
   STUDENT SIDEBAR - FINAL ALIGNED VERSION
   Ready to Paste
===================================================== */

.student-sidebar{
    position:fixed;
    top:0;
    left:0;
    width:280px;
    height:100vh;

    display:flex;
    flex-direction:column;

    background:linear-gradient(180deg,#0f172a 0%,#1e3a8a 100%);
    color:#fff;

    overflow:hidden;
    z-index:1000;

    box-shadow:15px 0 35px rgba(15,23,42,.18);
}

/* HEADER */

.student-sidebar-header{
    flex-shrink:0;

    padding:28px 20px 24px;

    text-align:center;

    border-bottom:1px solid rgba(255,255,255,.08);
}

.student-logo{
    width:80px;
    height:80px;
    margin:auto;

    border-radius:22px;

    display:flex;
    align-items:center;
    justify-content:center;

    background:linear-gradient(135deg,#2563eb,#60a5fa);

    font-size:36px;
    color:#fff;

    box-shadow:0 15px 35px rgba(37,99,235,.35);
}

.student-sidebar-header h4{
    margin-top:18px;
    margin-bottom:4px;

    font-size:23px;
    font-weight:800;
    letter-spacing:.4px;
}

.student-sidebar-header small{
    color:#cbd5e1;
    font-size:13px;
}

/* MENU AREA */

.student-menu{
    flex:1;
    min-height:0;

    overflow-y:auto;
    overflow-x:hidden;

    margin:0;
    padding:18px 16px 110px; /* bottom space for logout */

    list-style:none;
}

.student-menu::-webkit-scrollbar{
    width:6px;
}

.student-menu::-webkit-scrollbar-thumb{
    background:#3b82f6;
    border-radius:20px;
}

.student-menu li{
    margin-bottom:10px;
}

/* LINKS */

.student-menu a,
.student-menu .nav-link{
    display:flex;
    align-items:center;
    gap:14px;

    width:100%;

    padding:14px 16px;

    color:#dbeafe;
    text-decoration:none;

    border-radius:16px;

    font-size:15px;
    font-weight:600;

    position:relative;

    transition:all .25s ease;
}

.student-menu a i,
.student-menu .nav-link i{
    width:22px;
    text-align:center;
    font-size:18px;
    flex-shrink:0;
}

.student-menu a span,
.student-menu .nav-link span{
    flex:1;
    line-height:1.2;
}

/* HOVER */

.student-menu a:hover,
.student-menu .nav-link:hover{
    background:rgba(255,255,255,.08);
    color:#fff;
    transform:translateX(4px);
}

/* ACTIVE */

.student-menu a.active,
.student-menu .nav-link.active{
    background:linear-gradient(135deg,#2563eb,#3b82f6);
    color:#fff;

    box-shadow:0 10px 25px rgba(37,99,235,.35);
}

.student-menu a.active::before,
.student-menu .nav-link.active::before{
    content:"";

    position:absolute;

    left:-16px;
    top:50%;
    transform:translateY(-50%);

    width:4px;
    height:34px;

    border-radius:10px;

    background:#fff;
}

/* LOGOUT SECTION */

.student-logout{
    flex-shrink:0;

    padding:16px;

    background:#162447;

    border-top:1px solid rgba(255,255,255,.08);
}

.logout-button{
    width:100%;
    height:54px;

    border:none;

    border-radius:16px;

    background:linear-gradient(135deg,#ef4444,#dc2626);

    color:#fff;

    display:flex;
    align-items:center;
    justify-content:center;
    gap:10px;

    font-size:15px;
    font-weight:700;

    cursor:pointer;

    transition:all .25s ease;
}

.logout-button i{
    font-size:18px;
}

.logout-button:hover{
    transform:translateY(-2px);
    box-shadow:0 12px 25px rgba(239,68,68,.35);
}

/* RESPONSIVE */

@media (max-width:991px){

    .student-sidebar{
        width:260px;
    }

}

@media (max-width:768px){

    .student-sidebar{
        transform:translateX(-100%);
        transition:transform .3s ease;
    }

    .student-sidebar.show{
        transform:translateX(0);
    }

}
</style>