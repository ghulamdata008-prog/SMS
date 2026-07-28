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

    <ul class="student-menu">

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

        <li>
            <a href="{{ route('student.results') }}"
               class="{{ request()->routeIs('student.results') ? 'active' : '' }}">

                <i class="bi bi-award-fill"></i>

                <span>My Results</span>

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


.student-sidebar{

    position:fixed;
    top:0;
    left:0;

    width:280px;
    height:100vh;

    background:linear-gradient(180deg,#0f172a,#1e3a8a);

    display:flex;
    flex-direction:column;

    color:#fff;

    overflow-y:auto;

    z-index:1000;

    padding:20px;

    box-shadow:10px 0 35px rgba(0,0,0,.25);

}

.student-sidebar::-webkit-scrollbar{

    width:6px;

}

.student-sidebar::-webkit-scrollbar-thumb{

    background:#3b82f6;
    border-radius:20px;

}

/* Header */

.student-sidebar-header{

    text-align:center;

    padding-bottom:28px;

    margin-bottom:25px;

    border-bottom:1px solid rgba(255,255,255,.12);

}

.student-logo{

    width:82px;
    height:82px;

    margin:auto;

    border-radius:24px;

    display:flex;
    justify-content:center;
    align-items:center;

    background:linear-gradient(135deg,#3b82f6,#60a5fa);

    font-size:38px;

    box-shadow:0 20px 35px rgba(59,130,246,.35);

}

.student-sidebar-header h4{

    margin-top:18px;
    margin-bottom:6px;

    font-size:24px;

    font-weight:800;

}

.student-sidebar-header small{

    color:#cbd5e1;

    font-size:14px;

}

/* Menu */

.student-menu{

    list-style:none;

    padding:0;

    margin:0;

    flex:1;

}

.student-menu li{

    margin-bottom:10px;

}

.student-menu a{

    display:flex;

    align-items:center;

    gap:15px;

    text-decoration:none;

    color:#e2e8f0;

    padding:15px 18px;

    border-radius:16px;

    font-weight:600;

    transition:.35s;

}

.student-menu a i{

    width:24px;

    text-align:center;

    font-size:20px;

}

.student-menu a:hover{

    background:rgba(255,255,255,.10);

    color:#fff;

    transform:translateX(6px);

}

.student-menu a.active{

    background:linear-gradient(135deg,#2563eb,#3b82f6);

    color:#fff;

    box-shadow:0 12px 25px rgba(37,99,235,.35);

}

/* Logout */

.student-logout{

    margin-top:auto;

    padding-top:20px;

    border-top:1px solid rgba(255,255,255,.12);

}

.logout-button{

    width:100%;

    border:none;

    border-radius:16px;

    padding:15px 18px;

    display:flex;

    align-items:center;

    justify-content:center;

    gap:12px;

    font-size:16px;

    font-weight:700;

    color:#fff;

    background:linear-gradient(135deg,#ef4444,#dc2626);

    transition:.35s;

}

.logout-button i{

    font-size:20px;

}

.logout-button:hover{

    transform:translateY(-3px);

    box-shadow:0 15px 30px rgba(239,68,68,.35);

}

/* Responsive */

@media(max-width:991px){

    .student-sidebar{

        width:260px;

    }

}

@media(max-width:768px){

    .student-sidebar{

        transform:translateX(-100%);

    }

    .student-sidebar.show{

        transform:translateX(0);

    }

}

</style>