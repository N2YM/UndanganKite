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
     return view('Admin.Audio.index',compact('data','user'));
    }
 
    public function create()
    {
        $user = Auth::user();
        return view('Admin.Audio.create',compact('user'));
    }
    public function store(Request $request)
    { 
        // Validasi input
    $request->validate([
        'kategori_audio' => 'required|string|max:255',
        'judul' => 'required|string|max:255',
        'musik' => 'nullable|file|mimes:mp3,wav|max:5048', // Validasi file musik
    ]);

        $kategoriAudio = KategoriAudio::create([
            'kategori_audio' => $request->kategori_audio,
            'user_id' => auth()->id(),
        ]);
       
        if ($request->hasFile('musik')) {
            $file = $request->file('musik');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $musik = $file->storeAs('uploads/musik', $fileName, 'public');
        }
        $audio = new ModelAudio();
        $audio->user_id = auth()->id();
        $audio->judul = $request->judul;
        $audio->kategori_audio_id = $kategoriAudio->id;
        $audio->musik = $musik;
        $audio->save();
        return redirect()->route('audio')->with('success', 'Audio berhasil ditambahkan.');
    }

    public function edit($id)
{   
    $user = Auth::user();
    $data = ModelAudio::findOrFail($id);
    return view('Admin.Audio.edit', compact('data','user'));
}

public function update(Request $request, $id)
{
    // Tambahkan validasi
    $request->validate([
        'judul' => 'required|string|max:255',
        'kategori_audio' => 'required|string|max:255', // Perbaikan di sini
        'musik' => 'nullable|file|mimes:mp3,wav|max:5048', // Validasi file musik
    ]);

    $audio = ModelAudio::findOrFail($id);

    $audio->judul = $request->judul;
    $audio->kategori_audio_id = KategoriAudio::where('kategori_audio', $request->kategori_audio)->first()->id; // Perbaikan di sini

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