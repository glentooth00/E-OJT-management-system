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

    <li class="nav-item dropdown" onmouseleave="closeDropdown(this)">
        <a class="nav-link {{ request()->is('admin/archives', 'admin/supervisor', 'admin/department_head') ? 'active' : '' }}" href="#" id="userManagementDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-users"></i>
            <span>User Management <span class="ml-1"></span></span> <!-- Added the > here -->
        </a>
        <div class="dropdown-menu" aria-labelledby="userManagementDropdown">
            <div id="accordionUserManagement">
                <!-- Supervisor Sub-menu -->
                <a class="dropdown-item" href="{{ route('admin.supervisor.supervisor') }}">
                    <i class="fas fa-building"></i> Supervisor
                </a>
    
                <!-- Chairpersons Sub-menu -->
                <a class="dropdown-item" href="{{ route('admin.department_head.index') }}">
                    <i class="fas fa-building"></i> Chairpersons
                </a>

                <!-- OJT supervisor Sub-menu -->
                <a class="dropdown-item" href="{{ route('admin.ojt_supervisor.index') }}">
                    <i class="fas fa-building"></i> OJT Supervisor
                </a>
            </div>
        </div>
    </li>
    
    
    
    
    
    
    


    <li class="nav-item dropdown" onmouseleave="closeDropdown(this)">
        <a class="nav-link dropdown-toggle {{ request()->is('admin/documents', 'admin/reports', 'admin/endorsement', 'admin/healthCert', 'admin/moa') ? 'active' : '' }}" href="#" id="documentsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-folder"></i>
            <span>Documents</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="documentsDropdown">
            <div id="accordion">
                <a class="dropdown-item" data-toggle="collapse" href="#uploadDocuments" role="button" aria-expanded="false" aria-controls="uploadDocuments">
                    <i class="fas fa-upload"></i> Upload Documents
                </a>
                <div id="uploadDocuments" class="collapse" data-parent="#accordion">
                    <a class="dropdown-item" href="{{ route('admin.documents') }}">Go to Upload Documents</a>
                </div>
    
                <a class="dropdown-item" data-toggle="collapse" href="#reports" role="button" aria-expanded="false" aria-controls="reports">
                    <i class="fas fa-chart-line"></i> Reports
                </a>
                <div id="reports" class="collapse" data-parent="#accordion">
                    <a class="dropdown-item" href="{{ route('reports.index') }}">Go to Reports</a>
                </div>
    
                <a class="dropdown-item" data-toggle="collapse" href="#endorsement" role="button" aria-expanded="false" aria-controls="endorsement">
                    <i class="fas fa-paper-plane"></i> Endorsement Letter
                </a>
                <div id="endorsement" class="collapse" data-parent="#accordion">
                    <a class="dropdown-item" href="{{ route('admin.endorsement.index') }}">Go to Endorsement Letter</a>
                </div>
    
                <a class="dropdown-item" data-toggle="collapse" href="#healthCert" role="button" aria-expanded="false" aria-controls="healthCert">
                    <i class="fas fa-stethoscope"></i> Health Certificate
                </a>
                <div id="healthCert" class="collapse" data-parent="#accordion">
                    <a class="dropdown-item" href="{{ route('admin.healthCert') }}">Go to Health Certificate</a>
                </div>
    
                <a class="dropdown-item" data-toggle="collapse" href="#moa" role="button" aria-expanded="false" aria-controls="moa">
                    <i class="fas fa-file-alt"></i> Upload MOA
                </a>
                <div id="moa" class="collapse" data-parent="#accordion">
                    <a class="dropdown-item" href="{{ route('admin.moa.index') }}">Go to Upload MOA</a>
                </div>
            </div>
        </div>
    </li>
    
    
    







    {{-- <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/departmentHead') ? 'active' : '' }}"
            href="{{ route('admin.departmentHead.department_head') }}">
            <i class='fas fa-building'></i>
            <span>Department Head</span>
        </a>
    </li> --}}
{{-- 
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
    </li> --}}

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
        <i class="fas fa-cogs"></i>  <!-- Changed icon here -->
        <span>Settings</span>
    </a>
</li>

<!-- Submenu items under Settings -->
<div class="collapse" id="settingsMenu">
    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/categories') ? 'active' : '' }}" href="{{ route('admin.categories.index') }}">
            <i class="fas fa-th-large"></i>  <!-- Changed icon for Categories -->
            <span>Categories</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/questionaire') ? 'active' : '' }}" href="{{ route('admin.questionnaire.index') }}">
            <i class="fas fa-clipboard-check"></i>  <!-- Changed icon for Evaluation -->
            <span>Evaluation</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/agencies') ? 'active' : '' }}" href="/admin/agencies">
            <i class="fas fa-building"></i>  <!-- Icon remains same for Agencies -->
            <span>Agencies</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/department') ? 'active' : '' }}" href="{{ route('admin.department.index') }}">
            <i class="fas fa-sitemap"></i>  <!-- Changed icon for Add Department -->
            <span>Add Department</span>
        </a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/course') ? 'active' : '' }}" href="{{ route('admin.course.index') }}">
            <i class="fas fa-graduation-cap"></i>  <!-- Changed icon for Course -->
            <span>Course</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/year_level') ? 'active' : '' }}" href="{{ route('admin.year_level.index') }}">
            <i class="fas fa-calendar-alt"></i>  <!-- Changed icon for Year/Level -->
            <span>Year/Level</span>
        </a>
    </li>

    <li class="nav-item">
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="nav-link" style="background: none; border: none;">
                <i class="fas fa-sign-out-alt"></i>  <!-- Icon remains same for Logout -->
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

    function closeDropdown(element) {
    $(element).removeClass('show');
    $(element).find('.dropdown-menu').removeClass('show');
}

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
