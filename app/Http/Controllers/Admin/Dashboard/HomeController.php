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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
