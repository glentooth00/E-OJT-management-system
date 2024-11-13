<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-text mx-3">E-OJT Management System</div>
    </a>
    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link" href="/supervisor/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">MENUS</div>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('supervisor/list') ? 'active' : '' }}" href="{{ route('supervisor.list.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Interns</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('supervisor/list') ? 'active' : '' }}" href="{{ route('supervisor.experience.index') }}">
            <i class="fas fa-fw fa-briefcase"></i>
            <span>Intern Experiences</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/interns-evaluation') ? 'active' : '' }}" href="{{ route('supervisor.interns.index') }}">
            <i class="fas fa-fw fa-clipboard-list"></i>
            <span>Activity Logs</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('supervisor/evaluate/index') ? 'active' : '' }}" href="{{ route('supervisor.evaluate.index') }}">
            <i class="fas fa-fw fa-star-half-alt"></i>
            <span>Evaluation</span>
        </a>
    </li>

    {{-- <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/notifications') ? 'active' : '' }}" href="/admin/notifications">
            <i class="fas fa-solid fa-bell"></i>
            <span>Notification</span>
            <span class="badge badge-success rounded-circle" style="font-size: 10px;">3+</span>
        </a>
    </li> --}}

    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-solid fa-cogs"></i>
            <span>Settings</span>
        </a>
    </li>

    <li class="nav-item">
        <form action="{{ route('supervisor.logout') }}" method="POST">
            @csrf
            <button type="submit" class="nav-link" style="background: none; border: none;">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </button>
        </form>
    </li>

    <div class="sidebar-heading"></div>
</ul>
<!-- Sidebar -->

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    // Initialize Bootstrap's accordion for dropdown menus on hover with smooth animation
    var dropdowns = document.querySelectorAll('.dropdown');
    dropdowns.forEach(function(dropdown) {
        dropdown.addEventListener('mouseover', function() {
            var submenu = this.querySelector('.dropdown-menu');
            if (submenu) {
                submenu.classList.add('show');
            }
        });
        dropdown.addEventListener('mouseout', function() {
            var submenu = this.querySelector('.dropdown-menu');
            if (submenu) {
                submenu.classList.remove('show');
            }
        });
    });

    $(document).ready(function() {
        $('#departmentHeadLink').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('href'),
                type: 'GET',
                success: function(response) {
                    $('#mainContent').html(response);
                },
                error: function() {
                    alert('Error loading content.');
                }
            });
        });
    });
</script>

<style>
    .dropdown-menu {
        opacity: 0;
        visibility: hidden;
        transition: opacity 1s ease, visibility 1s ease;
    }

    .dropdown-menu.show {
        opacity: 1;
        visibility: visible;
    }

    .nav-link.active {
        background-color: #f8f9fa;
    }
</style>
