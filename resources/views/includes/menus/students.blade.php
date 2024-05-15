 <!-- Sidebar -->
 <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
         <div class="sidebar-brand-text mx-3">E-OJT Management System</div>
     </a>
     <hr class="sidebar-divider my-0">
     <br>
     <div class="sidebar-heading">
         MENUS
     </div>
     <li class="nav-item">
         <a class="nav-link {{ request()->is('admin/interns') ? 'active' : '' }}" href="{{ route('student.dashboard') }}">
             <i class="fa fa-home" aria-hidden="true"></i>
             <span>Dashboard</span>
         </a>
     </li>
     <li class="nav-item">
         <a class="nav-link {{ request()->is('admin/interns') ? 'active' : '' }}"
             href="{{ route('student.dashboard') }}">
             <i class="fas fa-fw fa-users"></i>
             <span>Home</span>
         </a>
     </li>
     {{-- <li class="nav-item">
         <a class="nav-link {{ request()->is('weekly-report/index') ? 'active' : '' }}"
             href="{{ route('weekly-report.show', ['id' => $report->id]) }}">
             <i class="fas fa-fw fa-file"></i>
             <span>Activities</span>
         </a>
     </li> --}}


     <li class="nav-item">
         <a class="nav-link {{ request()->is('weekly-report/index') ? 'active' : '' }}"
             href="{{ route('student.weeklyReportIndex') }}">
             <i class="fas fa-fw fa-file"></i>
             <span>Weekly Logs</span>
         </a>
     </li>

     <li class="nav-item">
         <a class="nav-link {{ request()->is('admin/interns-log') ? 'active' : '' }}" href="/admin/interns-log">
             <i class="fas fa-fw fa-clock"></i>
             <span>Notifications</span>
         </a>
     </li>
     <hr class="sidebar-divider">
     <li class="nav-item">
         <a class="nav-link" href="#">
             <i class="fas fa-solid fa-cogs"></i>
             <span>Settings</span>
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

     <div class="sidebar-heading">
 </ul>
 <!-- Sidebar -->