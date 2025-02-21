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
{{-- <<<<<<< HEAD
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
             aria-expanded="true" aria-controls="collapseBootstrap">
             <i class="far fa-fw fa-window-maximize"></i>
             <span>PRINTABLES</span>
         </a>
         <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap"
             data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item {{ request()->is('admin/interns') ? 'active' : '' }}"
                     href="/student/printables/bio-data">Bio Data Form</a>
                 <a class="collapse-item {{ request()->is('admin/interns') ? 'active' : '' }}"
                     href="/student/printables/letter-of-intent">Letter of Intent</a>
                 <a class="collapse-item {{ request()->is('admin/interns') ? 'active' : '' }}"
                     href="/student/printables/good-moral">Good Moral Character</a>
                 <a class="collapse-item {{ request()->is('admin/interns') ? 'active' : '' }}"
                     href="/student/printables/guardian-consent-form">Guardian Consent Form</a>
             </div>
         </div>
     </li> --}}
{{-- ======= --}}
         <a class="nav-link {{ request()->is('/student/dashboard') ? 'active' : '' }}" href="{{ route('student.experience.index') }}">
             <i class="fa fa-file" aria-hidden="true"></i>
             <span>Experience Record</span>
         </a>
     </li>
        <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fa fa-list" aria-hidden="true"></i>
          <span>Download & Upload</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item {{ request()->is('') ? 'active' : '' }}" href="{{ route('download.documents') }}">Download Form</a>
            {{-- <a class="collapse-item {{ request()->is('') ? 'active' : '' }}" href="/student/upload">Upload Form</a>
            <a class="collapse-item {{ request()->is('') ? 'active' : '' }}" href="#">Endorsement Letter</a> --}}
            {{-- <a class="collapse-item {{ request()->is('') ? 'active' : '' }}" href="/student/printables/letter-of-intent">Picture With Description</a> --}}
          </div>
        </div>
      </li>
{{-- >>>>>>> NEW-UI-ALVIN --}}
     <li class="nav-item">
         <a class="nav-link {{ request()->is('weekly-report/index') ? 'active' : '' }}"
             href="{{ route('student.weeklyReportIndex') }}">
             <i class="fa fa-clock"></i>
             <span>Daily Logs</span>
         </a>
     </li>
     <li class="nav-item">
         <a class="nav-link {{ request()->is('documents/index') ? 'active' : '' }}"
             href="{{ route('documents.index') }}">
             <i class="fas fa-folder"></i>
             <span>Documents</span>
         </a>
     </li>

{{-- 
     <li class="nav-item">
         <a class="nav-link position-relative {{ request()->is('admin/interns-log') ? 'active' : '' }}" href="/student/notification">
             <i class="fa fa-bell" aria-hidden="true"></i>
             <span>Notifications</span>
         </a>
     </li> --}}
     <hr class="sidebar-divider">

     <!-- Settings with Submenu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#settingsSubMenu" aria-expanded="false" aria-controls="settingsSubMenu">
             <i class="fas fa-solid fa-cogs"></i>
             <span>Settings</span>
         </a>
         <div id="settingsSubMenu" class="collapse">
             <ul class="submenu">
                 <li>
                     <form action="{{ route('student.logout') }}" method="POST">
                         @csrf
                         <button type="submit" class="nav-link" style="background: none; border: none; padding-left: 30px;">
                             <i class="fas fa-sign-out-alt"></i>
                             Logout
                         </button>
                     </form>
                 </li>
             </ul>
         </div>
     </li>
     
     <div class="sidebar-heading">
     </ul>
     
     <!-- CSS for submenu styling -->
     <style>
         /* Styling the submenu */
         .submenu {
             list-style-type: none;
             padding: 0;
         }
     
         .submenu li {
             padding-left: 20px;
         }
     
         /* Styling for smooth collapse */
         #settingsSubMenu {
             padding-top: 5px;
             padding-bottom: 5px;
         }
     </style>

     <!-- Required Bootstrap CSS and JS for collapse functionality -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>