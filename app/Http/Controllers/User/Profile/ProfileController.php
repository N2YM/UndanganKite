<?php

namespace App\Http\Controllers\User\Profile;

use App\Models\User\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User\BuatUndangan\ModelUndangan;
use App\Models\Admin\SampelUndangan\SampelUndangan;

class ProfileController extends Controller
{
   
    public function index()
    {
        $user = Auth::user();
        $jumlahUndangan = SampelUndangan::count();
        return view('User.Profile.index', compact('user','jumlahUndangan'));
    }

    public function update(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();
    
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'no_hp' => 'nullable|string|max:15',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'alamat' => 'nullable|string|max:255',
        ]);
    
        // Update user information
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
        $user->save();
    
        // Update profile information
        $profile = $user->profile;
    
        if (!$profile) {
            // Jika profil belum ada, buat profil baru
            $profile = new Profile();
            $profile->id_user = $user->id;
            $profile->no_hp;
            $profile->alamat;
            $profile->kota;
            $profile->image;
        }
    
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/ProfilUser'), $imageName);
            $profile->image = 'images/ProfilUser/'.$imageName;
        }
        $profile->no_hp = $request->no_hp;
        $profile->alamat = $request->alamat;
        $profile->kota = $request->kota;
    
        $profile->save();
    
        return redirect()->back()->with('warning', 'Profile updated successfully.');
    }
}
