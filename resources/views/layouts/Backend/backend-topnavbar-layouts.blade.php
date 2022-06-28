<ul class="navbar-nav navbar-right">
    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
            class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
    </li>
    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
            class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
        <div class="dropdown-menu dropdown-list dropdown-menu-right">
            <div class="dropdown-header">Notifications
                <div class="float-right">
                    <a href="#">Mark All As Read</a>
                </div>
            </div>
            <div class="dropdown-list-content dropdown-list-icons">
                <a href="#" class="dropdown-item">
                    <div class="dropdown-item-icon bg-info text-white">
                        <i class="fas fa-bell"></i>
                    </div>
                    <div class="dropdown-item-desc">
                        Welcome to Stisla template!
                        <div class="time">Yesterday</div>
                    </div>
                </a>
            </div>
            <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
    </li>
    <li class="dropdown"><a href="#" data-toggle="dropdown"
            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{ asset('img/undraw_profile.svg') }}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, Ujang Maman</div>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            @include('layouts.Backend.backend-menu-right-layout')
        </div>
    </li>
</ul>
