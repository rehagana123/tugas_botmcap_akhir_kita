<div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel d-flex mt-3 mb-3 pb-3">
        <div class="image">
            <img src="{{ asset('./template/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->role_id == 1 ? 'Admin' : Auth::user()->username }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>

                <li class="nav-item">
                    <a href="/pinjam" class="nav-link {{ request()->is('pinjam*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-clipboard"></i>
                        <p>
                            List Pinjaman
                        </p>
                    </a>
            </li>


            <li class="nav-item {{ request()->is('data*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ request()->is('data*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        Buku
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/data" class="nav-link {{ request()->is('data') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>List Buku</p>
                        </a>
                    </li>

                    @if (Auth::user()->role_id == 1)
                        <li class="nav-item">
                            <a href="/data/create" class="nav-link {{ request()->is('data/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tambah Buku</p>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>

            <li class="nav-item">
                <a href="/category" class="nav-link {{ request()->is('category*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-th-list nav-icon"></i>
                    <p>
                        Category
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="/profile" class="nav-link {{ request()->is('profile*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Profile
                    </p>
                </a>
            </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
