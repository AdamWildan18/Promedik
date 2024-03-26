<nav class="main-sidebar ps-menu">
    <div class="sidebar-header">
        <img src="{{ asset('assets/images/promedik.png') }}" class="sidebar-logo">

        <div class="close-sidebar action-toggle">
            <i class="ti-close"></i>
        </div>
    </div>
    <div class="sidebar-content">
        <ul>
            <li class="{{ '/' == request()->path() ? 'active' : '' }}">
                <a href="/" class="link">
                    <i class="ti-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="menu-category">
                <span class="text-uppercase">Management User</span>
            </li>
            <li class="{{ in_array(request()->path(), ['user', 'area', 'branch', 'teritory', 'sub_teritory', 'product', 'customer', 'outlet', 'outlet/create']) ? 'active' : '' }}">
                <a href="#" class="main-menu has-dropdown">
                    <i class="ti-desktop"></i>
                    <span>Management</span>
                </a>
                <ul class="sub-menu ">
                    <li class="{{ 'user' == request()->path() ? 'active' : '' }}"><a href="/user" class="link"><span>User</span></a></li>
                    <li class="{{ 'area' == request()->path() ? 'active' : '' }}"><a href="/area" class="link"><span>Area</span></a></li>
                    <li class="{{ 'branch' == request()->path() ? 'active' : '' }}"><a href="/branch" class="link"><span>Branch</span></a></li>
                    <li class="{{ 'teritory' == request()->path() ? 'active' : '' }}"><a href="/teritory" class="link"><span>Teritory</span></a></li>
                    <li class="{{ 'sub_teritory' == request()->path() ? 'active' : '' }}"><a href="/sub_teritory" class="link"><span>Sub Teritory</span></a></li>
                    <li class="{{ 'product' == request()->path() ? 'active' : '' }}"><a href="{{ route('product') }}" class="link"><span>Product</span></a></li>
                    <li class="{{ 'customer' == request()->path() ? 'active' : '' }}"><a href="{{ route('customer') }}" class="link"><span>Costumer</span></a></li>
                    <li class="{{ in_array(request()->path(), ['outlet', 'outlet/create']) ? 'active' : '' }}"><a href="{{ route('outlet') }}" class="link"><span>Outlet</span></a></li>
                </ul>
            </li>
            <li class="{{ '' == request()->path() ? 'active' : '' }}">
                <a href="#" class="main-menu has-dropdown">
                    <i class="ti-book"></i>
                    <span>Sales</span>
                </a>
                <ul class="sub-menu ">
                    <li><a href="form-element.html" class="link">
                            <span>All Sales</span></a>
                    </li>
                    <li><a href="form-datepicker.html" class="link">
                            <span>Cek Sales Reture</span></a>
                    </li>
                    <li><a href="form-select2.html" class="link">
                            <span>Data Mentah</span></a>
                    </li>
                    <li><a href="form-select2.html" class="link">
                            <span>Data Mentah Detail</span></a>
                    </li>
                    <li><a href="form-select2.html" class="link">
                            <span>Proses Sales MR/SMR</span></a>
                    </li>
                    <li><a href="form-select2.html" class="link">
                            <span>Sales Report (Chart)</span></a>
                    </li>
                    <li><a href="form-select2.html" class="link">
                            <span>Sales Upload !</span></a>
                    </li>
                </ul>
            </li class="{{ '' == request()->path() ? 'active' : '' }}">
            <li class="menu-category">
                <span class="text-uppercase">Target</span>
            </li>
            <li class="{{ '' == request()->path() ? 'active' : '' }}">
                <a href="#" class="main-menu has-dropdown">
                    <i class="ti-notepad"></i>
                    <span>Target</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="error-404.html" target="_blank" class="link"><span>Cek Target Cabang</span></a></li>
                    <li><a href="error-403.html" target="_blank" class="link"><span>Copy Target Cabang !</span></a></li>
                    <li><a href="error-500.html" target="_blank" class="link"><span>Download Format Cabang</span></a></li>
                    <li><a href="error-500.html" target="_blank" class="link"><span>Upload Format Cabang !</span></a></li>
                    <li><a href="error-500.html" target="_blank" class="link"><span>Sales vs Target MR</span></a></li>
                    <li><a href="error-500.html" target="_blank" class="link"><span>Sales vs Target Teritori</span></a></li>
                    <li><a href="error-500.html" target="_blank" class="link"><span>Sales vs Target MR by Product</span></a></li>
                </ul>
            </li>
            <li class="{{ '' == request()->path() ? 'active' : '' }}">
                <a href="#" class="main-menu has-dropdown">
                    <i class="ti-layers-alt"></i>
                    <span>Mapping</span>
                </a>
                <ul class="sub-menu ">
                    <li><a href="pages-blank.html" class="link"><span>Mapping File Force</span></a></li>
                    <li><a href="pages-blank.html" class="link"><span>Mapping Proses !</span></a></li>
                    <li><a href="pages-blank.html" class="link"><span>Outlate Sync !</span></a></li>
                    <li><a href="pages-blank.html" class="link"><span>Outlate Unclaim</span></a></li>
                    <li><a href="pages-blank.html" class="link"><span>Data Doctor</span></a></li>
                    <li><a href="pages-blank.html" class="link"><span>Data Outlate</span></a></li>
                </ul>
            </li>
            <li class="{{ '' == request()->path() ? 'active' : '' }}">
                <a href="charts.html" class="link">
                    <i class="ti-bar-chart"></i>
                    <span>Product</span>
                </a>
            </li>
            <li class="{{ '' == request()->path() ? 'active' : '' }}">
                <a href="{{ route('transaksi') }}" class="link">
                    <i class="ti-bar-chart"></i>
                    <span>Transaksi</span>
                </a>
            </li>
        </ul>
    </div>
</nav>


