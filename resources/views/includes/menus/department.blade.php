<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-text mx-3">E-OJT Management System</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link {{ request()->is('department_head/dashboard') ? 'active' : '' }}"
            href="{{ route('department_head.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        MENUS
    </div>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('department_head/documents*') ? 'active' : '' }}"
            href="{{ route('department_head.documents.index') }}">
            <i class="fas fa-fw fa-user-graduate"></i>
            <span>Intern</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->is('department_head/weekly_reports*') ? 'active' : '' }}"
            href="{{ route('department_head.weekly_reports.reports') }}">
            <i class="fas fa-fw fa-calendar-week"></i>
            <span>Weekly Reports</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('department_head/gallery*') ? 'active' : '' }}"
            href="{{ route('department_head.gallery.index') }}">
            <i class="fas fa-fw fa-images"></i>
            <span>Gallery</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('department_head/school_year*') ? 'active' : '' }}"
           href="{{ route('department_head.school_year.create') }}">
            <i class="fas fa-fw fa-calendar-alt"></i>
            <span>Add School Year</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('department_head/evaluation*') ? 'active' : '' }}"
           href="{{ route('department_head.evaluation.index') }}">
            <i class="fas fa-fw fa-chart-bar"></i>
            <span>Intern Evaluations</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('department_head/report*') ? 'active' : '' }}"
           href="{{ route('department_head.report.index') }}">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Reports</span>
        </a>
    </li>

    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link" href="#settingsMenu" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="settingsMenu">
            <i class="fas fa-fw fa-cogs"></i>
            <span>Settings</span>
        </a>
    </li>

    <!-- Submenu items under Settings -->
    <div class="collapse" id="settingsMenu">
        {{-- 
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/departmentHead') ? 'active' : '' }}"
                href="{{ route('admin.departmentHead.department_head') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>Department Head</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.school_year.create') }}">
                <i class="fas fa-fw fa-calendar-plus"></i>
                <span>Add School Year</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('department_head/moa') ? 'active' : '' }}"
                href="{{ route('department_head.moa.index') }}">
                <i class="fas fa-fw fa-file-upload"></i>
                <span>Upload MOA</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/questionaire') ? 'active' : '' }}"
                href="{{ route('admin.questionnaire.index') }}">
                <i class="fas fa-fw fa-clipboard-list"></i>
                <span>Evaluation</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/agencies') ? 'active' : '' }}" href="/admin/agencies">
                <i class="fas fa-fw fa-building"></i>
                <span>Agencies</span>
            </a>
        </li>
        --}}
        <li class="nav-item">
            <form action="{{ route('department_head.logout') }}" method="POST">
                @csrf
                <button type="submit" class="nav-link" style="background: none; border: none;">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span>
                </button>
            </form>
        </li>
    </div>

    <div class="sidebar-heading">
    </ul>
    <!-- Sidebar -->

<!-- Bootstrap JS and Popper.js (required for Bootstrap 5) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
