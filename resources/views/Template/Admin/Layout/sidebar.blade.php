<nav class="page-sidebar" id="sidebar" style="position: fixed">
    <style>
        .fixed-sidebar {
            position: fixed;

        }

        .img1 {
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
                    <img class="img1" src="{{ asset($user->profile->image) }}" />
                @else
                    <img class="img1" src="{{ asset('path/to/default/image.jpg') }}" />
                @endif
            </div>
            <div class="admin-info">
                <div class="font-strong">{{ Auth::user()->name }}</div><small>Administrator</small>
            </div>
        </div>
        <ul class="side-menu metismenu">
            <li class="heading">FEATURES</li>
            <li>
                <a class="{{ Route::is('home') ? 'text-white bg-primary rounded' : '' }}" href="{{ route('home') }}"><i
                        class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            <li>
                <a class="{{ Route::is('akun') ? 'text-white bg-primary rounded' : '' }}" href="{{ route('akun') }}"><i
                        class="sidebar-item-icon fa fa-users"></i>
                    <span class="nav-label">Akun Pengguna</span>
                </a>
            </li>
            <li>
                <a class="{{ Route::is('template') ? 'text-white bg-primary rounded' : '' }}"
                    href="{{ route('template') }}"><i class="sidebar-item-icon fa fa-plus"></i>
                    <span class="nav-label">Tambah Template</span>
                </a>
            </li>
            <li>
                <a class="{{ Route::is('audio') ? 'text-white bg-primary rounded' : '' }}"
                    href="{{ route('audio') }}"><i class="sidebar-item-icon fa fa-music"></i>
                    <span class="nav-label">Tambah Audio</span>
                </a>
            </li>
            <li>
                <a class="{{ Route::is('daftar-template') ? 'text-white bg-primary rounded' : '' }}"
                    href="{{ route('daftar-template') }}"><i class="sidebar-item-icon fa fa-envelope"></i>
                    <span class="nav-label">Daftar Template</span>
                </a>
            </li>
            <li>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); if(confirm('Yakin ingin keluar dari sistem ini?')) { document.getElementById('logout-form').submit(); }">
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
