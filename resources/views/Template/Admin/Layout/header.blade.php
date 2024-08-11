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
        <div class="btn-group mr-3">
            @if (Route::currentRouteName() == 'sampel-undangan')
                <li class="nav-item">
                    <a href="{{ route('pilih-undangan') }}" class="nav-link btn btn-primary mb-4 text-white"
                        style="border-radius: 0;"><i class="fas fa-plus"></i>
                        Buat Undangan</a>
                </li>
            @endif
        </div>

    </div>
</header>
<style>

</style>
