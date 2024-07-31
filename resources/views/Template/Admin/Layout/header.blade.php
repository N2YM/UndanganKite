<header class="header">
    <div class="page-brand">
        <div class="link">
            <span class="brand">Invi
                <span class="brand-tip">Vibe</span>
            </span>
            <span class="brand-mini">IV</span>
        </div>
    </div>
    <div class="flexbox flex-1">
        <!-- START TOP-LEFT TOOLBAR-->
        <ul class="nav navbar-toolbar">
            <li>
                <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a>
            </li>
            <li>

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
