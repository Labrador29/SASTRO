 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
         <div class="sidebar-brand-text mx-3">Sasdik Scout</div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item active">
         <a class="nav-link" href="{{ route('admin') }}">
             <i class="fa-solid fa-list"></i>
             <span>Dashboard</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Interface
     </div>

     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
             aria-expanded="true" aria-controls="collapseTwo">
             <i class="fa-solid fa-house"></i>
             <span>Beranda</span>
         </a>

         <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="">Home</a>
                 <a class="collapse-item" href="">About Us</a>
                 <a class="collapse-item" href="">Kegiatan</a>
                 <a class="collapse-item" href="">Pembina</a>
                 <a class="collapse-item" href="">Struktur Organisasi</a>
             </div>
         </div>
     </li>

     <!-- Nav Item - Utilities Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link" href="{{ route('events.index') }}">
             <i class="fa-solid fa-chart-line"></i>
             <span>Acara</span>
         </a>
     </li>

     <li class="nav-item">
         <a class="nav-link" href="{{ route('users.index') }}">
             <i class="fa-solid fa-user"></i>
             <span>Users</span>
         </a>
     </li>

     <li class="nav-item">
         <a class="nav-link" href="{{ route('bidang.index') }}">
             <i class="fa-solid fa-people-group"></i>
             <span>Bidang</span>
         </a>
     </li>

     <li class="nav-item">
         <a class="nav-link" href="#">
             <i class="fa-solid fa-lock"></i>
             <span>Admin</span>
         </a>
     </li>
     <hr class="sidebar-divider">

     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>
 </ul>
 <!-- End of Sidebar -->