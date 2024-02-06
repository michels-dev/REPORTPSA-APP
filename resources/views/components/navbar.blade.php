<div class="page-loader-wrapper">
    <div class="loader">
        <div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
        <p>Please wait...</p>
        <div class="m-t-30">
            <img src="{{ asset('image/gambar/logopenabur.png') }}" alt="" style="width: 8%"><br>
            <span class="text-dark">SAS BPK PENABUR</span>
        </div>
    </div>
</div>


<!-- Top Bar -->
<nav class="navbar">
    <div class="col-12">
        <div class="navbar-header"><a href="javascript:void(0);" class="h-bars"></a><a class="navbar-brand" href="index.html"><img src="{{ asset('image/gambar/icon.png') }}" alt="" style="width: 100%"></a></div>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown font-18"><a class="dropdown-toggle xs-hide" data-toggle="dropdown" role="button">Halo! {{ Auth::user()->name }} ({{ Auth::user()->role }})
                <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
                </a>
            </li>
            {{-- <li><a href="sign-in.html" class="mega-menu xs-hide" data-close="true"><i class="zmdi zmdi-power"></i></a></li>
            <li class=""><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li> --}}
        </ul>
    </div>
</nav>

<div class="menu-container mt-4">
    <div class="menu">
        <ul class="pullDown">
            <li><a href="javascript:void(0)">Dashboard</a>
                <ul class="pullDown">
                    <li><a href="{{ route('admin.index') }}">Admin Dashboard</a></li>
                    <li><a href="{{ route('user.index-users') }}">Users Dashboard</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0)">Tables</a>
                <ul class="pullDown">
                    <li><a href="{{ route('admin.table-ruangan') }}">Admin Tables</a></li>
                    <li><a href="{{ route('user.user.table-user') }}">Users Tables</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0)">Forms</a>
                <ul class="pullDown">
                    <li><a href="{{ route('admin.form-ruangan') }}">Forms Peminjaman Barang</a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0)">Authentication</a>
                <ul class="pullDown">
                    <li><a href="javascript:void(0)">Forgot Password</a></li>
                    <li><a href="{{ route('auth.logout') }}">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>