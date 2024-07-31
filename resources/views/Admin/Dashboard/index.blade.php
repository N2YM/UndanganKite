@extends('Template.Admin.base')
@section('content')
    <div class="row">
        <div class="col-lg-2 col-md-4">
            <div class="ibox bg-success color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">{{ $jumlahPengguna }}</h2>
                    <div class="m-b-5">JUMLAH</div><i class="ti-user widget-stat-icon"></i>
                    <div class="m-b-5"> PENGGUNA</div><i class="ti-user widget-stat-icon"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-4">
            <div class="ibox bg-info color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">{{ $jumlahTemplate }}</h2>
                    <div class="m-b-5">JUMLAH </div><i class="ti-bar-chart widget-stat-icon"></i>
                    <div class="m-b-5">TEMPLATE</div><i class="ti-bar-chart widget-stat-icon"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-4">
            <div class="ibox bg-warning color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">{{ $jumlahAudio }}</h2>
                    <div class="m-b-5">JUMLAH </div><i class="ti-bar-chart widget-stat-icon"></i>
                    <div class="m-b-5">AUDIO</div><i class="ti-bar-chart widget-stat-icon"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-4">
            <div class="ibox bg-danger color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong"> {{ $jumlahKategoriTmp }}</h2>
                    <div class="m-b-5">KATEGORI</div><i class="ti-image widget-stat-icon"></i>
                    <div class="m-b-5">TEMPLATE</div><i class="ti-image widget-stat-icon"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-4">
            <div class="ibox bg-danger color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">{{ $jumlahKategoriAudio }}</h2>
                    <div class="m-b-5">KATEGORI</div><i class="ti-music widget-stat-icon"></i>
                    <div class="m-b-5 ">AUDIO</div><i class="ti-music widget-stat-icon"></i>
                </div>
            </div>
        </div>
    </div>
@endsection
