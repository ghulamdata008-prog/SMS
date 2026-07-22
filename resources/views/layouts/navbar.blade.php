<nav class="navbar navbar-expand-lg premium-navbar">

    <div class="container-fluid">

        <!-- Sidebar Toggle
        <button class="sidebar-toggle-btn" id="sidebarToggle">
            <i class="bi bi-list"></i>
        </button> -->

        <!-- Search -->
<form class="d-none d-lg-flex ms-4 flex-grow-1 position-relative">


    <div class="premium-search">


        <i class="bi bi-search"></i>


        <input
            type="search"
            id="globalSearch"
            autocomplete="off"
            placeholder="Search students, teachers...">


    </div>



    <div id="searchResults" class="search-dropdown"></div>


</form>
        <!-- <form class="d-none d-lg-flex ms-4 flex-grow-1">

            <div class="premium-search">

                <i class="bi bi-search"></i>

                <input
                    type="search"
                    placeholder="Search students, teachers..."
                    aria-label="Search">

            </div>

        </form> -->

<!-- Notification -->
<li class="nav-item dropdown me-3">

    <a class="nav-link position-relative"
       href="#"
       role="button"
       data-bs-toggle="dropdown"
       aria-expanded="false">

        <i class="bi bi-bell-fill fs-5"></i>

        @if(auth()->user()->unreadNotifications->count())
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                {{ auth()->user()->unreadNotifications->count() }}
            </span>
        @endif

    </a>

   <ul class="dropdown-menu dropdown-menu-end shadow p-0" style="width:380px;">

    <li class="dropdown-header d-flex justify-content-between align-items-center px-3 py-2">

        <span class="fw-bold">Notifications</span>

        <a href="{{ route('admin.notifications.readAll') }}"
           class="text-decoration-none small">
            Read All
        </a>

    </li>

    @forelse(auth()->user()->notifications()->latest()->take(5)->get() as $notification)

        <li>

            <div class="d-flex justify-content-between align-items-start px-3 py-3 border-bottom">

                <div class="flex-grow-1 pe-2">

                    <a href="{{ route('admin.notifications.read',$notification->id) }}"
                       class="text-decoration-none text-dark d-block">

                        <div class="fw-semibold">
                            {{ $notification->data['title'] }}
                        </div>

                        <small class="d-block text-muted">
                            {{ $notification->data['message'] }}
                        </small>

                        <small class="text-secondary">
                            {{ $notification->created_at->diffForHumans() }}
                        </small>

                    </a>

                </div>

                <div class="ms-2">

                    <form action="{{ route('admin.notifications.destroy',$notification->id) }}"
                          method="POST">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-sm btn-outline-danger">
                            <i class="bi bi-trash"></i>
                        </button>

                    </form>

                </div>

            </div>

        </li>

    @empty

        <li class="text-center py-4 text-muted">
            No Notifications
        </li>

    @endforelse

    @if(auth()->user()->notifications->count())

        <li class="p-3 border-top">

            <form action="{{ route('admin.notifications.destroyAll') }}"
                  method="POST">

                @csrf
                @method('DELETE')

                <button class="btn btn-danger btn-sm w-100">
                    Delete All Notifications
                </button>

            </form>

        </li>

    @endif

</ul>
        <!-- User -->
<li class="nav-item dropdown">

    <a href="#"
       class="nav-link d-flex align-items-center sms-navbar-user"
       data-bs-toggle="dropdown"
       aria-expanded="false">

        <img src="{{ auth()->user()->profile_photo
                ? asset('storage/'.auth()->user()->profile_photo)
                : asset('images/client3.jpg') }}"
             alt="User"
             class="rounded-circle"
             width="45"
             height="45"
             style="object-fit:cover;">

        <div class="ms-2 d-none d-lg-block">

            <h6 class="mb-0 fw-bold">
                {{ auth()->user()->name }}
            </h6>

            <small class="text-muted">
                {{ auth()->user()->getRoleNames()->first() ?? 'Admin' }}
            </small>

        </div>

        <i class="bi bi-chevron-down ms-2"></i>

    </a>

    <ul class="dropdown-menu dropdown-menu-end shadow border-0">

        <li class="dropdown-header">
            {{ auth()->user()->email }}
        </li>

        <li>
            <a class="dropdown-item"
               href="{{ route('admin.profile') }}">
                <i class="bi bi-person-circle me-2"></i>
                My Profile
            </a>
        </li>

        <li>
            <a class="dropdown-item"
               href="{{ route('admin.profile.edit') }}">
                <i class="bi bi-pencil-square me-2"></i>
                Edit Profile
            </a>
        </li>

        <li>
            <a class="dropdown-item"
               href="{{ route('admin.profile.password') }}">
                <i class="bi bi-key me-2"></i>
                Change Password
            </a>
        </li>

        <li>
            <hr class="dropdown-divider">
        </li>

        <li>

            <form action="{{ route('logout') }}"
                  method="POST">

                @csrf

                <button type="submit"
                        class="dropdown-item text-danger">

                    <i class="bi bi-box-arrow-right me-2"></i>

                    Logout

                </button>

            </form>

        </li>

    </ul>

</li>
    </div>

</nav>