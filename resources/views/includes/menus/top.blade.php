    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <!-- TopBar -->
            <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
                <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="img-profile rounded-circle" src="img/boy.png" style="max-width: 60px">
                            @if (Auth::check())
                                @if (Auth::user()->role == 'admin')
                                    <span class="ml-2 d-none d-lg-inline text-white small">ADMIN</span>
                                @elseif(Auth::user()->role == 'department_head')
                                    <span class="ml-2 d-none d-lg-inline text-white small">DEPARTMENT HEAD</span>
                                @endif
                            @endif

                        </a>
                    </li>
                </ul>
            </nav>
            <!-- Topbar -->
