<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
        </div>
        <div class="sidebar-brand-text mx-3">SI Kepegawaian </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-tachometer-alt"></i>
            <span> Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Pegawai
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-table"></i>
            <span>Data Pegawai</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola Data Pegawai</h6>
                <a class="collapse-item" href={{ route ('tambah_pegawai') }}>Tambah Pegawai</a>
                <a class="collapse-item" href={{ route ('pegawai') }}>Data Pegawai</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <div class="sidebar-heading">
        Cuti Pegawai
    </div>
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-business-time"></i>
            <span>Data Cuti Pegawai</span></a>

        <a class="nav-link" href="charts.html">
            <i class="fas fa-calendar-check"></i>
            <span>Konfirmasi Cuti Pegawai</span></a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <div class="sidebar-heading">
        Izin Pegawai
    </div>
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-calendar-day"></i>
            <span>Data Izin Pegawai</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-calendar-check"></i>
            <span>Konfirmasi Izin Pegawai</span></a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <div class="sidebar-heading">
        Sakit Pegawai
    </div>
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-calendar-plus"></i>
            <span>Data Sakit Pegawai</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-calendar-check"></i>
            <span>Konfirmasi Sakit</span></a>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
