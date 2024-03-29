<div class="sidebar">

    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="/admin/dashboard" class="d-block"><?= $user?->username?></a>
        </div>
    </div>

    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>

    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
                <a href="/admin/users" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
          menu
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/users" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>
                                ユーザ
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>other page</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="/admin/admin-users" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        管理者
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/admin-users/logout" class="nav-link logout">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Logout
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <script>
        q(".logout").addEventListener("click", e=>{
            if(!confirm("ログアウトしますか？")){
                e.preventDefault();
            }
        });
    </script>
</div>
