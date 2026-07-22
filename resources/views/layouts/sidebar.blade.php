<aside class="sidebar">


  <!-- Logo -->
<div class="logo">

    <a href="{{ route('admin.dashboard') }}" class="brand">

        <!-- <div class="brand-icon">
            <i class="bi bi-mortarboard-fill"></i>
        </div> -->
<div class="brand-icon">
    <div class="brand-glow"></div>
    <i class="bi bi-mortarboard-fill"></i>
</div>
        <div class="brand-text">
            <h5>School</h5>
            <small>Management System</small>
        </div>

    </a>

</div>



<!-- User Info -->

<!-- <div class="admin-info"> -->

    <!-- <div class="admin-icon">
        <i class="bi bi-person-fill"></i>
    </div> -->
<!-- <div class="admin-icon">
    <div class="online-dot"></div>
    <i class="bi bi-person-fill"></i>
</div>

    <div>

        <h6>
            {{ auth()->user()->name }}
        </h6>


        <span>
            {{ auth()->user()->getRoleNames()->first() ?? 'Admin' }}
        </span>

    </div>


</div> -->

    <!-- Menu -->

    <ul class="sidebar-menu">


        <li>
            <a href="{{ route('admin.dashboard') }}"
            class="{{ request()->routeIs('admin.dashboard') ? 'active':'' }}">

                <i class="bi bi-speedometer2"></i>
                Dashboard

            </a>
        </li>



        <li>
            <a href="{{ route('admin.students.index') }}"
            class="{{ request()->routeIs('admin.students.*') ? 'active' : '' }}">

                <i class="bi bi-people"></i>
                Students

            </a>
        </li>



        <li>
            <a href="{{ route('admin.teachers.index') }}"
            class="{{ request()->routeIs('admin.teachers.*') ? 'active' : '' }}">

                <i class="bi bi-person-badge"></i>
                Teachers

            </a>
        </li>



        <li>
            <a href="{{ route('admin.classes.index') }}"
            class="{{ request()->routeIs('admin.classes.*') ? 'active' : '' }}">

                <i class="bi bi-building"></i>
                Classes

            </a>
        </li>



        <li>
            <a href="{{ route('admin.sections.index') }}"
            class="{{ request()->routeIs('admin.sections.*') ? 'active' : '' }}">

                <i class="bi bi-list"></i>
                Sections

            </a>
        </li>



        <li>
            <a href="{{ route('admin.subjects.index') }}"
            class="{{ request()->routeIs('admin.subjects.*') ? 'active' : '' }}">

                <i class="bi bi-book"></i>
                Subjects

            </a>
        </li>


<li>

<a href="{{route('admin.teacher.assignment.index')}}">

<i class="bi bi-person-workspace"></i>

Teacher Assign

</a>

</li>
        <li>
            <a href="{{ route('admin.attendance.index') }}"
            class="{{ request()->routeIs('admin.attendance.*') ? 'active' : '' }}">

                <i class="bi bi-calendar-check"></i>
                Attendance

            </a>
        </li>



<li>

<a href="{{route('admin.marks.index')}}"
class="{{ request()->routeIs('admin.marks.*') ? 'active' : '' }}">

<i class="bi bi-award"></i>

Marks

</a>

</li>
<!-- <li class="nav-item">

    <a href="{{ route('admin.fees.index') }}"
       class="nav-link">

        <i class="bi bi-credit-card"></i>

        <span>Payment Management</span>

    </a>

</li> -->
<!-- ========================= -->
<!-- Payment Management -->
<!-- ========================= -->

<li class="nav-item">

    <a class="nav-link {{ request()->routeIs('admin.fees.*') ? 'active' : '' }}"
       href="{{ route('admin.fees.index') }}">

        <i class="bi bi-cash-stack me-2"></i>

        <span>Fee Management</span>

    </a>

</li>
<li class="nav-item">
    <a href="{{ route('admin.payment-gateways.index') }}"
       class="nav-link">

        <i class="bi bi-credit-card-2-front"></i>

        <span>Payment Gateway</span>

    </a>
</li>
<li class="nav-item">

    <a class="nav-link {{ request()->routeIs('admin.payments.*') ? 'active' : '' }}"
       href="{{ route('admin.payments.index') }}">

        <i class="bi bi-credit-card-2-front me-2"></i>

        <span>Payments</span>

    </a>

</li>

<li class="nav-item">

    <a class="nav-link {{ request()->routeIs('admin.invoices.*') ? 'active' : '' }}"
       href="{{ route('admin.invoices.index') }}">

        <i class="bi bi-receipt-cutoff me-2"></i>

        <span>Invoices</span>

    </a>

</li>

<li class="nav-item">

    <a class="nav-link {{ request()->routeIs('admin.transactions.*') ? 'active' : '' }}"
       href="{{ route('admin.transactions.index') }}">

        <i class="bi bi-arrow-left-right me-2"></i>

        <span>Transactions</span>

    </a>

</li>
        <li>

<a href="{{route('admin.reports.index')}}"
class="{{ request()->routeIs('admin.reports.*') ? 'active' : '' }}">

<i class="bi bi-bar-chart-line"></i>

Reports

</a>

</li>



       <li>

<a href="{{route('admin.settings.index')}}"
class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">


<i class="bi bi-gear"></i>


<span>
Settings
</span>


</a>

</li>

    </ul>



    <!-- Logout -->

    <div class="logout">

        <form action="{{ route('logout') }}" method="POST">

            @csrf

            <button class="btn btn-danger w-100">

                <i class="bi bi-box-arrow-right"></i>
                Logout

            </button>


        </form>


    </div>


</aside>