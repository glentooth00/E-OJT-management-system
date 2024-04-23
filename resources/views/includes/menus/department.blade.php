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
     <li class="nav-item">
         <a class="nav-link {{ request()->is('admin/interns') ? 'active' : '' }}"
             href="{{ route('admin.interns.index') }}">
             <i class="fas fa-fw fa-users"></i>
             <span>Interns</span>
         </a>

     </li>
     <li class="nav-item">
         <a class="nav-link {{ request()->is('admin/interns-evaluation') ? 'active' : '' }}"
             href="/admin/interns-evaluation">
             <i class="fas fa-fw fa-file"></i>
             <span>Intern's Evaluation</span>
         </a>
     </li>
     <li class="nav-item">
         <a class="nav-link {{ request()->is('admin/interns-log') ? 'active' : '' }}" href="/admin/interns-log">
             <i class="fas fa-fw fa-clock"></i>
             <span>Intern's Logs</span>
         </a>
     </li>
     <li class="nav-item">
         <a class="nav-link {{ request()->is('admin/moa') ? 'active' : '' }}" href="/admin/moa">
             <i class="fas fa-regular fa-building"></i>
             <span>MOA / MOU</span>
         </a>
     </li>
     <li class="nav-item">
         <a class="nav-link {{ request()->is('admin/bookmarks') ? 'active' : '' }}" href="/admin/bookmarks">
             <i class="fas fa-solid fa-book"></i>
             <span>Bookmarks</span>
         </a>
     </li>
     <li class="nav-item">
         <a class="nav-link {{ request()->is('admin/agencies') ? 'active' : '' }}" href="/admin/agencies">
             <i class='fas fa-building'></i>
             <span>Agencies</span>
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
         <a class="nav-link {{ request()->is('admin/notifications') ? 'active' : '' }}" href="/admin/notifications">
             <i class="fas fa-solid fa-bell"></i>
             <span>Notification</span>
             <span class="badge badge-success rounded-circle" style="font-size: 10px;">3+</span>
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
