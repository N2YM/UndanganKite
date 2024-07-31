<header class="header">
    <div class="page-brand">
        <a class="link" href="index.html">
            <span class="brand">Invi
                <span class="brand-tip">Vibe</span>
            </span>
            <span class="brand-mini">IV</span>
        </a>
    </div>
    <div class="flexbox flex-1">
        <!-- START TOP-LEFT TOOLBAR-->
        <ul class="nav navbar-toolbar">
            <li>
                <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a>
            </li>

        </ul>
        <div class="ml-auto">
            @if (Route::currentRouteName() == 'undangan')
                <li class="nav-item">
                    <a href="{{ route('pilih-template') }}" class="nav-link btn btn-primary mb-4 text-white"
                        style="border-radius: 0;"><i class="fas fa-plus"></i>
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

    .nav-link.btn {
        box-shadow: none;
        /* Menghilangkan bayangan */
    }
</style>
