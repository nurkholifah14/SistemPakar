<aside class="main-sidebar sidebar-light-cyan elevation-4">
    <!-- Brand Logo -->
        <a href="index3.html" class="brand-link bg-cyan">
            <img src="{{ asset('images/logo1.jpg') }}" alt="AdminLTE Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light"><b>SIPAKAR</b></span>
        </a>
    <!-- Sidebar -->
    <div class="sidebar ">
        <!-- Sidebar user panel (optional) -->
            <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('template/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Alexander Pierce</a>
                </div>
            </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/admin" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p> Dashboard </p>
                    </a>
                </li>
                <li class="nav-header">INFORMASI</li>
                    <!-- <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p> Data Pengguna </p>
                            <i class="fas fa-angle-left right"></i>
                        </a>
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/data_pengguna" class="nav-link {{ request()->is('dataadmin') ? 'active' : '' }} ">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Admin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/top-nav-sidebar.html" class="nav-link {{ request()->is('datauser') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>User</p>
                            </a>
                        </li>
                        </ul>
                    </li> -->
                    <li class="nav-item">
                        <a href="/data-pengguna" class="nav-link {{ request()->is('data-pengguna') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user"></i>
                            <p> Data Pengguna</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/gejalakulit" class="nav-link {{ request()->is('gejalakulit') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-plus-square"></i>
                            <p> Data Gejala Kulit </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/jeniskulit" class="nav-link {{ request()->is('jeniskulit') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-copy"></i>
                            <p> Data Jenis Kulit </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/data-diagnosa" class="nav-link {{ request()->is('data-diagnosa') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-edit"></i>
                            <p> Data Diagnosa</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/treatment" class="nav-link {{ request()->is('treatment') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-folder"></i>
                            <p> Data Treatments </p>
                        </a>
                    </li>
                    </li>
                <li class="nav-header">REPORT</li>
                    <li class="nav-item">
                        <a href="" class="nav-link {{ request()->is('riwayat-diagnosa') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-line"></i>
                            <p>Riwayat Diagnosa</p>
                        </a>
                    </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>