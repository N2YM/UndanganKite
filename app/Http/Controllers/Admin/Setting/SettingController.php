<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\Admin\Audio\KategoriAudio;
use App\Models\Admin\Template\KategoriTemplate;
use Illuminate\Http\Request; // Gunakan Request dari Illuminate

class SettingController extends Controller
{
    public function index(){
        $kategoriTemplate = KategoriTemplate::all();
        $kategoriAudio = KategoriAudio::all();
        return view("Admin.Setting.index",compact('kategoriTemplate','kategoriAudio'));
    }

    public function storeTemplate(Request $request)
    {
        $request->validate([
            'kategori_tmp' => 'required|string|max:255',
        ]);
        // Cek apakah kategori sudah ada
        $exists = KategoriTemplate::where('kategori_tmp', $request->kategori_tmp)->exists();
        if ($exists) {
            return back()->with('info', 'Kategori template sudah ada.');
        }
        $kategori = new KategoriTemplate();
        $kategori->kategori_tmp = $request->kategori_tmp; 
        $kategori->save();
        return back()->with('success', 'Kategori template berhasil ditambahkan.');
    }

    public function destroyTemplate($id)
    {
        $template = KategoriTemplate::find($id);  
        if ($template) {
            $template->delete();
            return back()->with('danger', 'Kategori template berhasil dihapus.');
        }
    }

    public function storeAudio(Request $request)
    {
        $request->validate([
            'kategori_audio' => 'required|string|max:255',
        ]);
        // Cek apakah kategori sudah ada
        $exists = KategoriAudio::where('kategori_audio', $request->kategori_audio)->exists();
        if ($exists) {
            return back()->with('info', 'Kategori template sudah ada.');
        }
        $kategori = new KategoriAudio();
        $kategori->kategori_audio = $request->kategori_audio; 
        $kategori->save();
        return back()->with('success', 'Kategori template berhasil ditambahkan.');
    }

    public function destroyAudio($id) {
        $audio = KategoriAudio::find($id);
        if ($audio) {
            $audio->delete();
            return back()->with('danger', 'Kategori audio berhasil dihapus.');
        }
    }

    

  
}
