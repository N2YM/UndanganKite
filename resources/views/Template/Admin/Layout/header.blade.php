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
        <div class="ml-auto d-flex align-items-center mt-3 mr-3">
            @if (Route::currentRouteName() == 'audio')
                <a href="{{ route('tambah-audio') }}" class="nav-link btn btn-primary mb-4 text-white mr-2"><i
                        class="fas fa-plus"></i>
                    Buat Undangan</a>
            @endif

            @if (Route::currentRouteName() == 'template')
                <a href="{{ route('tambah-template') }}" class="nav-link btn btn-primary mb-4 text-white"><i
                        class="fas fa-plus"></i>
                    Buat Undangan</a>
            @endif
        </div>
    </div>
</header>
<style>

</style>
