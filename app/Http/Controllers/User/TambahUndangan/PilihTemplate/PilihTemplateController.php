<?php

namespace App\Http\Controllers\User\TambahUndangan\PilihTemplate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Audio\ModelAudio;
use App\Models\Admin\Template\ModelTemplate;
use App\Models\Admin\Template\KategoriTemplate;
use App\Models\Admin\SampelUndangan\SampelUndangan;

class PilihTemplateController extends Controller
{

    public function index()
    {
        $template = ModelTemplate::all();
        return view('User.TambahUndangan.PilihTemplate.index',compact('template'));
    }
    public function create($id)
    {
        $kategori_undangan = KategoriTemplate::all();
        $audio = ModelAudio::all();
        $template = ModelTemplate::findOrFail($id);
        return view('User.TambahUndangan.PilihTemplate.create', compact('kategori_undangan', 'audio','template'));
    }
    public function store(Request $request)
    {
       // Validasi data
// $request->validate([
//     'judul_undangan' => 'required',
//     'link_undangan' => 'required',
//     'audio' => 'required|file|mimes:mp3,wav',
//     'cover' => 'nullable|file|mimes:jpeg,png,jpg,gif',
//     'kategori_id' => 'required',
// ]);

// Upload audio
if ($request->hasFile('audio')) {
    $audioFile = $request->file('audio');
    $audioFileName = time() . '_' . $audioFile->getClientOriginalName();
    $audioPath = $audioFile->storeAs('uploads/audio', $audioFileName, 'public');
}

// Upload cover image
$coverPath = null;
if ($request->hasFile('cover')) {
    $coverFile = $request->file('cover');
    $coverFileName = time() . '_cover_' . $coverFile->getClientOriginalName();
    $coverPath = $coverFile->storeAs('uploads/covers', $coverFileName, 'public');
}

// Simpan data ke database
$undangan = new SampelUndangan();
$undangan->judul_undangan = $request->judul_undangan;
$undangan->link_undangan = $request->link_undangan;
$undangan->audio = $request->audio; // Nilai yang dipilih dari select
$undangan->cover = $request->cover; // Menggunakan value dari hidden input
$undangan->kategori_id = $request->kategori_id;
$undangan->user_id = auth()->id(); // Pastikan user terautentikasi
// dd($undangan);
$undangan->save();

    
        return redirect()->route('undangan')->with('success', 'Data berhasil disimpan.');
    }
}
