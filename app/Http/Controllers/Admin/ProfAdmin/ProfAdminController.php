<?php

namespace App\Http\Controllers\Admin\ProfAdmin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ProfAdminController extends Controller
{
    public function index(){
        
        return view('Admin.ProfAdmin.index');
    }
    
    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:admins,email,' . Auth::guard('admin')->id(),
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'nullable|string|min:6|confirmed', // Validasi password jika ada
        ]);
    
        $admin = Auth::guard('admin')->user();
    
        // Cek apakah ada file foto yang diunggah
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($admin->foto && Storage::disk('public')->exists($admin->foto)) {
                Storage::disk('public')->delete($admin->foto);
            }
    
            // Simpan foto baru
            $filePath = $request->file('foto')->store('admin_fotos', 'public');
            $admin->foto = $filePath;
        }
    
        // Update data admin
        $admin->name = $request->name;
        $admin->email = $request->email;
    
        // Update password jika ada perubahan
        if ($request->filled('password')) {
            $admin->password = bcrypt($request->password);
        }
    // dd($request->all());
        $admin->save();
    
        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }
    
}
