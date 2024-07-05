<?php

namespace App\Http\Controllers\Admin\AkunPengguna;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        $user = Auth::user();
        return view('Admin.AkunPengguna.index', compact('data','user'));
    }

    public function show($id)
    {
        $user = Auth::user();
        $user = User::with('profile')->find($id);
    
        if (!$user) {
            return redirect()->route('home')->with('error', 'User not found.');
        }
    
        // dd($user->toArray()); // Tambahkan ini untuk debugging
    
        return view('Admin.AkunPengguna.show', compact('user'));
    }
    
    
    public function destroy($id)
    {
        // Temukan user berdasarkan ID
        $user = User::find($id);
    
        // Periksa apakah user ditemukan
        if (!$user) {
            return redirect()->route('akun')->with('error', 'User not found.');
        }
    
        // Hapus user
        $user->delete();
        // Redirect kembali ke halaman daftar user dengan pesan sukses
        return redirect()->route('akun')->with('success', 'User deleted successfully.');
    }
}
