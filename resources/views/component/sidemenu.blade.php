<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="#" target="_blank">
            <center>
            <img src="{{ asset('assets/img/logo-3.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            </center>
            
            <!-- <span class="ms-1 font-weight-bold">Siduksa</span> -->
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-cart text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Pembelian</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-basket text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Penjualan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-delivery-fast text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Pengiriman</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Produksi</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-scissors text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Konversi</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Penjadwalan</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Stok</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-app text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Sampah Plastik</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-books text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Sampah Cacah</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Data</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('supplier.*') ? 'active' : '' }}" href="{{ route('supplier.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-archive-2 text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Supplier</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('pengepul.*') ? 'active' : '' }}" href="{{ route('pengepul.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-box-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Pengepul</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('mesin.*') ? 'active' : '' }}" href="{{ route('mesin.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-briefcase-24 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Mesin</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Administrator</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('user.*') ? 'active' : '' }}" href="{{ route('user.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Data User</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidenav-footer mx-3 ">
        <div class="card card-plain shadow-none" id="sidenavCard">
            <img class="w-50 mx-auto" src="./assets/img/illustrations/icon-documentation.svg"
                alt="sidebar_illustration">
            <div class="card-body text-center p-3 w-100 pt-0">
                <div class="docs-info">
                    <h6 class="mb-0">Laporan</h6>
                    <p class="text-xs font-weight-bold mb-0">cari dan print semua laporan</p>
                </div>
            </div>
        </div>
        <a href="#" target="_blank"
            class="btn btn-dark btn-sm w-100 mb-3">Laporan Produksi</a>
        <a class="btn btn-primary btn-sm mb-3 w-100"
            href="#" type="button">Laporan
            Penjualan</a>
        <a href="#" target="_blank"
            class="btn btn-danger btn-sm w-100 mb-3">Laporan Pembelian</a>
    </div>
</aside>
