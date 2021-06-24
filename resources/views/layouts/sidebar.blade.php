<ul class="navbar-nav sidebar sidebar-dark bg-primary accordion" id="accordionSidebar">

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
        <a class="nav-link" href="{{ route ('dashboard') }}">
            <i class="fas fa-tachometer-alt"></i>
            <span> Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    @if (userRole() == 'admin')
        <!-- Heading -->
        <div class="sidebar-heading">
            Pegawai
        </div>

        <!-- Nav Item - Pages Collapse Menu -->

        <li class="nav-item">
            <a class="nav-link" href="{{ route ('pegawai.index') }}">
                <i class="fas fa-table"></i>
                <span>Data Pegawai
                    {{-- <small><i class="fas fa-chevron-right"></i></small> --}}
                </span>

            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-light py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Kelola Data Pegawai</h6>
                    <a class="collapse-item" href={{ route ('pegawai.tambah') }}>Tambah Pegawai</a>
                    <a class="collapse-item" href={{ route ('pegawai.index') }}>Data Pegawai</a>
                </div>
            </div>
        </li>
    @endif


    <li class="nav-item">
        <a class="nav-link" href="{{route('surat.index')}}">
            <i class="fas fa-envelope-open-text"></i>
            <span>Data Surat</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('sanksi.index')}}"> <i class="fas fa-exclamation-circle"></i><span>Data Sanksi</span></a>
    </li>

    @if (userRole() == 'admin')
        <li class="nav-item">
            <a class="nav-link" href="charts.html"> <i class="fas fa-money-check-alt"></i> <span>Data Gaji</span></a>
        </li>
    @endif

    <li class="nav-item">
        <a class="nav-link" href="{{route('sakit.index')}}"><i class="fas fa-calendar-plus"></i><span>Data Sakit</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('cuti.index')}}"> <i class="fas fa-business-time"></i><span>Data Cuti</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
