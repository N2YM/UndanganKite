<?php

namespace App\Http\Controllers\Admin\Audio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Audio\KategoriAudio;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Audio\ModelAudio;
use Illuminate\Support\Facades\Storage;

class AudioController extends Controller
{
   
    public function index()
    {
        $data = ModelAudio::all();
        $user = Auth::user();
        $kategoriAudio = KategoriAudio::all();  
     return view('Admin.Audio.index',compact('data','user','kategoriAudio'));
    }
    
  public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'kategori_audio' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'musik' => 'nullable|file|mimes:mp3,wav|max:5048',
        ]);
    
        // Cek apakah judul sudah ada di database
        $exists = ModelAudio::where('judul', $request->judul)->exists();
        if ($exists) {
            return back()->with('info', 'Judul sudah ada, ganti dengan yang lain.');
        }
    
        // Simpan file musik jika ada
        if ($request->hasFile('musik')) {
            $file = $request->file('musik');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $musik = $file->storeAs('uploads/musik', $fileName, 'public');
        } else {
            $musik = null; // Atau beri nilai default jika tidak ada file yang diunggah
        }
    
        // Buat dan simpan objek ModelAudio
        $audio = new ModelAudio();
        $audio->judul = $request->judul;
        $audio->kategori_audio = $request->kategori_audio;
        $audio->musik = $musik;
        $audio->save();
    
        // Redirect dengan pesan sukses
        return redirect()->route('audio')->with('success', 'Audio berhasil ditambahkan.');
    }
    
    
    public function edit($id){ 

    $kategoriAudio = KategoriAudio::all();
    $data = ModelAudio::findOrFail($id);
    return view('Admin.Audio.edit', compact('data','kategoriAudio'));
}
public function update(Request $request, $id)
{
    // Tambahkan validasi
    $request->validate([
        'judul' => 'required|string|max:255|',
        'kategori_audio' => 'required|string|max:255', // Perbaikan di sini
        'musik' => 'nullable|file|mimes:mp3,wav|max:5048', // Validasi file musik
    ]);

    $audio = ModelAudio::findOrFail($id);

    $audio->judul = $request->judul;
    $audio->kategori_audio = $request->kategori_audio;

    if ($request->hasFile('musik')) {
        $file = $request->file('musik');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $musik = $file->storeAs('uploads/musik', $fileName, 'public');

        // Hapus file lama jika ada
        if ($audio->musik) {
            Storage::disk('public')->delete('uploads/musik/' . $audio->musik);
        }
        $audio->musik = $musik;
    }
    $audio->save();

    return redirect()->route('audio')->with('warning', 'Audio updated successfully.');
}
public function destroy($id)
{
    $audio = ModelAudio::findOrFail($id);
    if ($audio->musik) {
        Storage::disk('public')->delete('uploads/musik/' . $audio->musik);
    }
    $audio->delete();

    return redirect()->route('audio')->with('danger', 'Audio deleted successfully.');
}
}