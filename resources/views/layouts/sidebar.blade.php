{{-- @php
    $menu=''
@endphp
@empty($sidebar)
@else
    @php
        $menu = $sidebar
    @endphp
@endempty --}}
<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                    data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>

    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Dashboards</li>
                <li>
                    <a href="index.html" class="{{$sidebar =="dashboard"?'mm-active':''}}">
                        <i class="metismenu-icon pe-7s-home"></i>
                        Dashboard
                    </a>
                </li>
                <li class="app-sidebar__heading">User</li>
                <li class="{{$sidebar =="admin-lihat"||$sidebar =="admin-tambah"?'mm-active':''}}">
                    <a href="#">
                        <i class="metismenu-icon pe-7s-user"></i>
                        Admin
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul class="show mm-collapse">
                        <li>
                            <a href="{{route('pengguna.admin')}}" class="{{$sidebar =="admin-lihat"?'mm-active':''}}" id="showtoast">
                                <i class="metismenu-icon">
                                </i>Lihat
                            </a>
                            <a href="elements-utilities.html" class="{{$sidebar =="admin-tambah"?'mm-active':''}}">
                                <i class="metismenu-icon">
                                </i>Tambah
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="{{$sidebar =="karyawan-lihat"||$sidebar =="karyawan-tambah"?'mm-active':''}}">
                    <a href="#">
                        <i class="metismenu-icon pe-7s-user-female"></i>
                        Karyawan
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="elements-utilities.html" class="{{$sidebar =="karyawan-lihat"?'mm-active':''}}">
                                <i class="metismenu-icon">
                                </i>Lihat
                            </a>
                            <a href="elements-utilities.html" class="{{$sidebar =="karyawan-tambah"?'mm-active':''}}">
                                <i class="metismenu-icon">
                                </i>Tambah
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="{{$sidebar =="pelanggan-lihat"||$sidebar =="pelanggan-tambah"?'mm-active':''}}">
                    <a href="#">
                        <i class="metismenu-icon pe-7s-users"></i>
                        Pelanggan
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="elements-utilities.html" class="{{$sidebar =="pelanggan-lihat"?'mm-active':''}}">
                                <i class="metismenu-icon">
                                </i>Lihat
                            </a>
                            <a href="elements-utilities.html" class="{{$sidebar =="pelanggan-tambah"?'mm-active':''}}">
                                <i class="metismenu-icon">
                                </i>Ubah
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="app-sidebar__heading">Transaksi</li>
                <li>
                    <a href="dashboard-boxes.html" class="{{$sidebar =="tracking"?'mm-active':''}}">
                        <i class="metismenu-icon pe-7s-cart"></i>
                        Tracking
                    </a>
                </li>
                <li>
                    <a href="dashboard-boxes.html" class="{{$sidebar =="jemput"?'mm-active':''}}">
                        <i class="metismenu-icon pe-7s-car"></i>
                        Dijemput
                    </a>
                </li>
                <li>
                    <a href="dashboard-boxes.html" class="{{$sidebar =="cuci"?'mm-active':''}}">
                        <i class="metismenu-icon pe-7s-helm"></i>
                        Dicuci
                    </a>
                </li>
                <li>
                    <a href="dashboard-boxes.html" class="{{$sidebar =="setrika"?'mm-active':''}}">
                        <i class="metismenu-icon pe-7s-settings"></i>
                        Setrika
                    </a>
                </li>
                <li>
                    <a href="dashboard-boxes.html" class="{{$sidebar =="bayar"?'mm-active':''}}">
                        <i class="metismenu-icon pe-7s-cash"></i>
                        Dibayar
                    </a>
                </li>
                <li>
                    <a href="dashboard-boxes.html" class="{{$sidebar =="kirim"?'mm-active':''}}">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Dikirim
                    </a>
                </li>
                <li class="app-sidebar__heading">Kategori</li>
                <li>
                    <a href="forms-controls.html" class="{{$sidebar =="kategori-lihat"?'mm-active':''}}">
                        <i class="metismenu-icon pe-7s-piggy">
                        </i>Lihat
                    </a>
                </li>
                <li>
                    <a href="forms-layouts.html" class="{{$sidebar =="kategori-tambah"?'mm-active':''}}">
                        <i class="metismenu-icon pe-7s-magic-wand">
                        </i>Tambah
                    </a>
                </li>
                <li>
                    <a href="forms-validation.html" class="{{$sidebar =="service-tambah"?'mm-active':''}}">
                        <i class="metismenu-icon pe-7s-next-2">
                        </i>Tambah Layanan
                    </a>
                </li>
                <li class="app-sidebar__heading">Laporan</li>
                <li>
                    <a href="charts-chartjs.html" class="{{$sidebar =="laporan"?'mm-active':''}}">
                        <i class="metismenu-icon pe-7s-graph2">
                        </i>Laporan
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
