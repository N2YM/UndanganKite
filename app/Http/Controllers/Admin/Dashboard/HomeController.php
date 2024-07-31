<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Audio\ModelAudio;
use App\Models\Admin\Audio\KategoriAudio;
use App\Models\Admin\Template\ModelTemplate;
use App\Models\Admin\Template\KategoriTemplate;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jumlahTemplate = ModelTemplate::count();
        $jumlahPengguna = User::count();
        $jumlahAudio    = ModelAudio::count();
        $jumlahKategoriTmp    = KategoriTemplate::count();
        $jumlahKategoriAudio    = KategoriAudio::count();
        $user = Auth::user();
        return view('Admin.Dashboard.index',compact('jumlahPengguna','jumlahTemplate','jumlahAudio','jumlahKategoriTmp','jumlahKategoriAudio','user'));
    }

}
