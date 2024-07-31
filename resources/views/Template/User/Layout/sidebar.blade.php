<nav class="page-sidebar fixed-sidebar" id="sidebar">
    <style>
        .fixed-sidebar {
            position: fixed;

        }

        .img {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            object-fit: cover;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Tambahkan margin ke konten utama untuk menghindari tumpang tindih dengan sidebar */
        .main-content {
            margin-left: 250px;
            /* Sesuaikan dengan lebar sidebar */
        }
    </style>
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                @if ($user->profile && $user->profile->image)
                    <img class="img" src="{{ asset($user->profile->image) }}" />
                @else
                    <img class="img" src="{{ asset('path/to/default/image.jpg') }}" />
                @endif
            </div>
            <div class="admin-info">
                <div class="font-strong">{{ Auth::user()->name }}</div><small>Administrator</small>
            </div>
        </div>
        <ul class="side-menu metismenu">
            <li class="heading">FEATURES</li>
            <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            <li class="{{ request()->is('undangan') ? 'active' : '' }}">
                <a href="{{ route('undangan') }}"><i class="sidebar-item-icon fa fa-plus"></i>
                    <span class="nav-label">Tambah Undangan</span>
                </a>
            </li>
            <li class="{{ request()->is('profile') ? 'active' : '' }}">
                <a href="{{ route('profile') }}"><i class="sidebar-item-icon fa fa-user"></i>
                    <span class="nav-label">Profile</span>
                </a>
            </li>
            <li>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); if(confirm('Apakah yakin ingin keluar dari sistem ini?')) { document.getElementById('logout-form').submit(); }">
                    <i class="sidebar-item-icon fa fa-key"></i>
                    <span class="nav-label">Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</nav>
<!-- Konten utama -->
<div class="main-content">
    <!-- Konten dashboard Anda -->
</div>
