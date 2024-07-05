<header class="header">
    <div class="page-brand">
        <a class="link" href="index.html">
            <span class="brand">Admin
                <span class="brand-tip">CAST</span>
            </span>
            <span class="brand-mini">AC</span>
        </a>
    </div>
    <div class="flexbox flex-1">
        <!-- START TOP-LEFT TOOLBAR-->
        <ul class="nav navbar-toolbar">
            <li>
                <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a>
            </li>
            <li>
                <form class="navbar-search" action="javascript:;">
                    <div class="rel">
                        <span class="search-icon"><i class="ti-search"></i></span>
                        <input class="form-control" placeholder="Search here...">
                    </div>
                </form>
            </li>
        </ul>
        <div class="ml-auto">
            @if (Route::currentRouteName() == 'undangan')
                <li class="nav-item">
                    <a href="{{ route('pilih-template') }}" class="nav-link btn btn-primary mb-4 text-white"><i
                            class="fas fa-plus"></i>
                        Buat Undangan</a>
                </li>
            @endif
        </div>
    </div>
</header>

<style>
    .flexbox {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .ml-auto {
        margin-left: auto;
    }
</style>
