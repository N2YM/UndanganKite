<?php

namespace App\Http\Controllers\User\TambahUndangan\PilihTemplate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Audio\ModelAudio;
use App\Models\Admin\Template\ModelTemplate;
use App\Models\Admin\Template\KategoriTemplate;
use App\Models\User\BuatUndangan\ModelUndangan;

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
        // // Validasi data
        // $request->validate([
        //     'kategori_undangan' => 'required',
        //     'audio_acara' => 'required|file|mimes:mp3,wav',
        //     'cover1' => 'nullable|file|mimes:jpeg,png,jpg,gif',
        //     'cover2' => 'nullable|file|mimes:jpeg,png,jpg,gif',
        //     'cover3' => 'nullable|file|mimes:jpeg,png,jpg,gif',
        //     'cover4' => 'nullable|file|mimes:jpeg,png,jpg,gif',
        //     'cover5' => 'nullable|file|mimes:jpeg,png,jpg,gif',
        //     'template_id' => 'required|exists:templates,id',
        //     'cover_id' => 'required|exists:covers,id',
        // ]);
    
        // Upload audio
        if ($request->hasFile('audio_acara')) {
            $audioFile = $request->file('audio_acara');
            $audioFileName = time() . '_' . $audioFile->getClientOriginalName();
            $audioPath = $audioFile->storeAs('uploads/audio', $audioFileName, 'public');
        }
        // Upload cover images
        $coverPaths = [];
        for ($i = 1; $i <= 5; $i++) {
            if ($request->hasFile('cover' . $i)) {
                $coverFile = $request->file('cover' . $i);
                $coverFileName = time() . '_cover' . $i . '_' . $coverFile->getClientOriginalName();
                $coverPaths['cover' . $i] = $coverFile->storeAs('uploads/covers', $coverFileName, 'public');
            }
        }
        // Simpan data ke database
        $undangan = new ModelUndangan();
        $undangan->judul_undangan = $request->judul_undangan;
        $undangan->kategori_undangan = $request->kategori_undangan;
        $undangan->cover1 = $request->cover1;
        $undangan->cover2 = $request->cover2;
        $undangan->cover3 = $request->cover3;
        $undangan->cover4 = $request->cover4;
        $undangan->cover5 = $request->cover5;
        $undangan->link_undangan = $request->link_undangan; // Sesuaikan dengan input dari form
        $undangan->audio_undangan = $request->audio_undangan;
        $undangan->id_user = auth()->id(); // Pastikan user terautentikasi
        // dd($request->all());
        $undangan->save();

    
        return redirect()->route('undangan')->with('success', 'Data berhasil disimpan.');
    }
    


}
