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
         <a class="nav-link {{ request()->is('department_head/dashboard') ? 'active' : '' }}"
             href="{{ route('department_head.dashboard') }}">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Intern</span>
         </a>
     </li>

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
