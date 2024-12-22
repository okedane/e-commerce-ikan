<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">DATA KARYAWAN</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">DK</a>
        </div>
        <div class="hide-sidebar-mini mt-4 mb-4 p-3">
            <a href="/dashboard" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Dashboard
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="nav-item dropdown ">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i>
                    <span>Kategori</span></a>
                <ul class="dropdown-menu">
                    <li class="">
                        <a class="nav-link" href="{{ route('kategori.index') }}">Kategori Penjualan</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown ">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i>
                    <span>karyawan</span></a>
                <ul class="dropdown-menu">
                    <li class="">
                        <a class="nav-link" href="/karyawan/index">Data Karyawan</a>
                    </li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
