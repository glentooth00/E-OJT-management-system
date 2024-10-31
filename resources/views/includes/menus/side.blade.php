<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-text mx-3">E-OJT Management System</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}" href="/admin/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        MENUS
    </div>
    {{-- <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/interns') ? 'active' : '' }}"
            href="{{ route('admin.interns.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Interns</span>
        </a>
    </li> --}}
    {{-- <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/interns-evaluation') ? 'active' : '' }}"
            href="/admin/interns-evaluation">
            <i class="fas fa-fw fa-file"></i>
            <span>Intern's Evaluation</span>
        </a>
    </li> --}}
    {{-- <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/interns-log') ? 'active' : '' }}" href="/admin/interns-log">
            <i class="fas fa-fw fa-clock"></i>
            <span>Intern's Logs</span>
        </a>
    </li> --}}
    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/archives ') ? 'active' : '' }}"
            href="/admin/archive">
            <i class="fas fa-fw fa-clock"></i>
            <span>Archives</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/documents') ? 'active' : '' }}" href="{{ route('admin.documents') }}">
            <i class="fas fa-regular fa-building"></i>
            <span>Upload documents</span>
        </a>
    </li>






    {{-- <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/departmentHead') ? 'active' : '' }}"
            href="{{ route('admin.departmentHead.department_head') }}">
            <i class='fas fa-building'></i>
            <span>Department Head</span>
        </a>
    </li> --}}

    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/supervisor') ? 'active' : '' }}"
            href="{{ route('admin.supervisor.supervisor') }}">
            <i class='fas fa-building'></i>
            <span>Supervisor</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/supervisor') ? 'active' : '' }}"
            href="{{ route('admin.department_head.index') }}">
            <i class='fas fa-building'></i>
            <span>Chairpersons</span>
        </a>
    </li>

    {{-- <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/questionaire') ? 'active' : '' }}"
            href="{{ route('admin.questionnaire.index') }}">
            <i class='fas fa-building'></i>
            <span>Questionaire</span>
        </a>
    </li> --}}





    {{-- <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/notifications') ? 'active' : '' }}" href="/admin/notifications">
            <i class="fas fa-solid fa-bell"></i>
            <span>Notification</span>
            <span class="badge badge-success rounded-circle" style="font-size: 10px;">3+</span>
        </a>
    </li> --}}
    {{-- <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-solid fa-cogs"></i>
            <span>Settings</span>
        </a>
    </li>

    
    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/departmentHead') ? 'active' : '' }}"
            href="{{ route('admin.departmentHead.department_head') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Department Head</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.school_year.create') }}">
            <i class="fas fa-solid fa-cogs"></i>
            <span>Add School Year</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/categories') ? 'active' : '' }}"
            href="{{ route('admin.categories.index') }}">
            <i class='fas fa-building'></i>
            <span>Categories</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/questionaire') ? 'active' : '' }}"
            href="{{ route('admin.questionnaire.index') }}">
            <i class='fas fa-building'></i>
            <span>Evaluation</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/agencies') ? 'active' : '' }}" href="/admin/agencies">
            <i class='fas fa-building'></i>
            <span>Agencies</span>
        </a>
    </li>

    <li class="nav-item">
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="nav-link" style="background: none; border: none;">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </button>
        </form>
    </li> --}}

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Menu structure -->
<hr class="sidebar-divider">
<li class="nav-item">
    <a class="nav-link" href="#settingsMenu" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="settingsMenu">
        <i class="fas fa-solid fa-cogs"></i>
        <span>Settings</span>
    </a>
</li>

<!-- Submenu items under Settings -->
<div class="collapse" id="settingsMenu">
    {{-- <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/departmentHead') ? 'active' : '' }}"
            href="{{ route('admin.departmentHead.department_head') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Department Head</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.school_year.create') }}">
            <i class="fas fa-solid fa-cogs"></i>
            <span>Add School Year</span>
        </a>
    </li> --}}
    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/categories') ? 'active' : '' }}"
            href="{{ route('admin.categories.index') }}">
            <i class='fas fa-building'></i>
            <span>Categories</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/questionaire') ? 'active' : '' }}"
            href="{{ route('admin.questionnaire.index') }}">
            <i class='fas fa-building'></i>
            <span>Evaluation</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/agencies') ? 'active' : '' }}" href="/admin/agencies">
            <i class='fas fa-building'></i>
            <span>Agencies</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/endorsement') ? 'active' : '' }}"
            href="{{ route('admin.endorsement.index') }}">
            <i class='fas fa-building'></i>
            <span>Endorsement letter </span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/healthCert') ? 'active' : '' }}" href="{{ route('admin.healthCert') }}">
            <i class="fas fa-regular fa-building"></i>
            <span>Health Certificate</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/moa') ? 'active' : '' }}"
            href="{{ route('admin.moa.index') }}">
            <i class='fas fa-building'></i>
            <span>Upload MOA</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/department') ? 'active' : '' }}"
            href="{{ route('admin.department.index') }}">
            <i class='fas fa-building'></i>
            <span>Add Department</span>
        </a>
    </li>

    
    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/course') ? 'active' : '' }}"
            href="{{ route('admin.course.index') }}">
            <i class='fas fa-building'></i>
            <span>Course</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/year_level') ? 'active' : '' }}"
            href="{{ route('admin.year_level.index') }}">
            <i class='fas fa-building'></i>
            <span>Year/Level</span>
        </a>
    </li>

    <li class="nav-item">
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="nav-link" style="background: none; border: none;">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </button>
        </form>
    </li>
</div>

<!-- Bootstrap JS and Popper.js (required for Bootstrap 5) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



    <div class="sidebar-heading">
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
            e.preventDefault(); // Prevent default link behavior

            // Perform an Ajax request to load the content dynamically
            $.ajax({
                url: $(this).attr('href'), // Get the URL from the link
                type: 'GET',
                success: function(response) {
                    // Replace the content of a specific element with the loaded content
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
    /* Smooth transition for dropdown animation */
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
        /* your desired background color */
    }
</style>
