<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('dashboard') }}" class="sidebarLink">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->


        <!-- Loading Spinner with Bootstrap Card (hidden by default) -->
        <div id="loadingMessage"
            style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 1000;">
            <div class="card text-center" style="width: 18rem;">
                <div class="card-body mt-5">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="card-text mt-3">Please wait...</p>
                </div>
            </div>
        </div>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-people"></i><span>Mahasiswa</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('data_mahasiswa.index') }}" class="sidebarLink">
                        <i class="bi bi-circle"></i><span>Data Mahasiswa</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('laporanadmin.index') }}" class="sidebarLink">
                        <i class="bi bi-circle"></i><span>Laporan PKL</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed sidebarLink" href="{{ route('dosen_pa.index') }}">
                <i class="bi bi-person-lines-fill"></i>
                <span>Dosen PA</span>
            </a>
        </li>

        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed sidebarLink" href="{{ route('profile.edit') }}">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-left"></i>
                <span>Sign Out</span>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li><!-- End Profile Page Nav -->
    </ul>
</aside><!-- End Sidebar-->

