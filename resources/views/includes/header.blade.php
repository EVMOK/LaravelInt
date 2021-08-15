<!-- Topbar Start -->
<div class="navbar-custom topnav-navbar topnav-navbar-dark">
    <div class="container-fluid">

        <!-- LOGO -->
        <a href="" class="topnav-logo">
                                <span class="topnav-logo-lg">
                                    <img src="/assets/images/logo-light.png" alt="" height="36">
                                </span>
            <span class="topnav-logo-sm">
                                    <img src="/assets/images/logo_sm_dark.png" alt="" height="36">
                                </span>
        </a>

        <ul class="list-unstyled topbar-right-menu float-right mb-0">

            <li class="dropdown notification-list d-lg-none">
                <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="false" aria-expanded="false">
                    <i class="dripicons-search noti-icon"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                    <form class="p-3">
                        <input type="text" class="form-control" placeholder="Search ..."
                               aria-label="Recipient's username">
                    </form>
                </div>
            </li>

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" id="topbar-notifydrop"
                   role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="dripicons-bell noti-icon"></i>
                    <span class="noti-icon-badge"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg"
                     aria-labelledby="topbar-notifydrop">

                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5 class="m-0">
                                <span class="float-right">
                                    <a href="javascript: void(0);" class="text-dark">
                                        <small>Очистить</small>
                                    </a>
                                </span>События
                        </h5>
                    </div>

                    <div style="max-height: 230px;" data-simplebar>

                        <!-- All-->
                        <a href="javascript:void(0);"
                           class="dropdown-item text-center text-primary notify-item notify-all">
                            Все события
                        </a>
                    </div>

                </div>
            </li>

            <li class="dropdown user-list">
                <!-- Authentication Links -->
                @guest
                    <div class="col-md-8 mt-2 mx-auto">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </div>
                @else
                    <a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown"
                       id="topbar-userdrop"
                       href="#" role="button" aria-haspopup="true"
                       aria-expanded="false">
                    <span class="account-user-avatar">
                        <img src="/assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                    </span>
                        <span class="account-user-name">{{ Auth::user()->name }}</span>
                        <span class="account-position">{{ Auth::user()->roles[0]->name }}</span>
                    </a>
                    <div
                        class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu profile-dropdown"
                        aria-labelledby="topbar-userdrop">

                        <!-- item-->
                        <a href="{{ route('profile') }}" class="dropdown-item notify-item">
                            <i class="mdi mdi-account-circle mr-1"></i>
                            <span>Мой аккаунт</span>
                        </a>

                        @role('Admin')
                        <!-- item-->
                        <a href="{{ route('assignrole.index') }}" class="dropdown-item notify-item">
                            <i class="mdi mdi-account-edit mr-1"></i>
                            <span>Назначение ролей</span>
                        </a>

                        <!-- item-->
                        <a href="{{ route('roles-permissions') }}" class="dropdown-item notify-item">
                            <i class="mdi mdi-lifebuoy mr-1"></i>
                            <span>Роли и разрешения</span>
                        </a>
                        @endrole

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="dropdown-item notify-item"
                               href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                <i class="mdi mdi-logout mr-1"></i>
                                <span>{{ __('Выход') }}</span>
                            </a>
                        </form>

                    </div>
            </li>
            @endguest
        </ul>
    </div>
</div>
<!-- end Topbar -->
