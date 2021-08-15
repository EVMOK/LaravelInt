<div class="topnav shadow-sm">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ route('home') }}" id="topnav-dashboards" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="uil-dashboard mr-1"></i>Главная
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ route('groups.index') }}" id="topnav-dashboards" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="uil-dashboard mr-1"></i>Группы
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link arrow-none" href="{{ route('students.index') }}" role="button" id="topnav-layouts" aria-haspopup="true" aria-expanded="false">
                            <i class="uil-car mr-1"></i>Студенты
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
