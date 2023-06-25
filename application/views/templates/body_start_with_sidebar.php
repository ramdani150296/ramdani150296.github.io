<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-dark Blue navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto"></ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="#" class="brand-link">
                <img src="<?= base_url('assets/template') ?>/dist/img/logo1.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-red-light">INVENTORY</span>
            </a>
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url('assets/template') ?>/dist/img/icon_user2.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= $this->session->userdata('fullname'); ?></a>
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
                        <li class="nav-item menu-open">
                            <a href="<?= base_url('dashboard') ?>" class="nav-link active">
                                <i class="fa-solid fa-chart-line"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        <br>
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link ">
                                <!-- <i class="fa-solid fa-bars"></i> -->
                                <p>
                                    Report Stock
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right">2</span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('CriticalStockController') ?>" class="nav-link active">
                                        <i class="fa-solid fa-box"></i>
                                        <p>Critical stock</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('MonitoringStockController') ?>" class="nav-link">
                                        <i class="fa-solid fa-computer"></i>
                                        <p> Monitoring stock</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link ">
                                <!-- <i class="fa-solid fa-bars"></i> -->
                                <p>
                                    Report Warehouse
                                    <i class="right fas fa-angle-left"></i>
                                    <span class="badge badge-info right">2</span>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('AkurasiStockController') ?>" class="nav-link active">
                                        <i class="fa-solid fa-book"></i>
                                        <p>Akurasi Stock</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('PerbandinganStockController') ?>" class="nav-link">
                                        <i class="fa-solid fa-clipboard"></i>
                                        <p>Perbandingan Stock</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link ">
                                <!-- <i class="fa-solid fa-bars"></i> -->
                                <p>
                                    Report Logistik
                                    <i class="right fas fa-angle-left"></i>
                                    <span class="badge badge-info right">2</span>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link active">
                                        <i class="fa-solid fa-truck"></i>
                                        <p>Gagal Kirim</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="SummaryDoController" class="nav-link">
                                        <i class="fa-solid fa-truck"></i>
                                        <p>Summary DO</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('UsersController') ?>" href="#" class="nav-link ">
                                <i class="fa-solid fa-user"></i>
                                <p>
                                    User
                                    <span class="right badge badge-danger"></span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                           <a onclick="logout()" href="#" class="nav-link ">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                <p>
                                    Log out
                                    <span class="right badge badge-danger"></span>
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="content-wrapper">
            <!-- <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <li class="breadcrumb-item active">{title}</li>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">{title}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="content">
                <div class="container-fluid"> 
                    <!-- container-fluid start -->
                    <!-- berlanjut pada file footer body -->
                