<?php

namespace App\Http\Controllers\Admin\SampelUndangan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Audio\ModelAudio;
use App\Models\Admin\Template\ModelTemplate;
use App\Models\Admin\Template\KategoriTemplate;
use App\Models\Admin\SampelUndangan\SampelUndangan;
use App\Models\Admin\SampelUndangan\Kategori\Wedding;

class SampelController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        $sampel = SampelUndangan::with('kategori')->get();
        return view('Admin.SampelUndangan.index', compact('admin', 'sampel'));
    }

    public function indexPilih() 
    {
        $template = ModelTemplate::all();
        return view('Admin.PilihUndangan.index', compact('template'));
    }

    public function create(Request $request, $id)
    {
        $template = ModelTemplate::with('kategori')->findOrFail($id);
        $audio = ModelAudio::all();
        return view('Admin.SampelUndangan.create', compact('template', 'audio'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_undangan' => 'required',
            'link_undangan' => 'required',
            'cover' => 'required',
            'audio' => 'required',
            'kategori_id' => 'required',
        ]);

        SampelUndangan::create([
            'judul_undangan' => $request->judul_undangan,
            'link_undangan' => $request->link_undangan,
            'cover' => $request->cover,
            'audio' => $request->audio,
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect()->route('sampel-undangan')->with('success', 'Undangan berhasil dibuat');
    }

    public function editForm($id, $kategori_id) 
    {
        $sampel = SampelUndangan::find($id);
        $kategori = KategoriTemplate::find($kategori_id);

        if (!$sampel || !$kategori) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        $formView = $this->getFormView($kategori->kategori_tmp);
        return view('Admin.SampelUndangan.Kategori.' . $formView, compact('sampel', 'kategori'));
    }

    public function viewForm(Request $request, $id) 
    {
        // Ambil data undangan berdasarkan ID
        $undangan = SampelUndangan::with('wedding', 'kategori')->find($id);
    
        // Periksa apakah undangan ditemukan
        if (!$undangan) {
            return redirect()->back()->with('error', 'Undangan tidak ditemukan');
        }
    
        // Ambil kategori terkait
        $kategori = $undangan->kategori;
    
        // Ambil data wedding dari relasi
        $wedding = $undangan->wedding;
    
        // Tentukan view form berdasarkan kategori
        $formView = $this->getFormView($kategori ? $kategori->kategori_tmp : 'default');
    
        // Kembalikan view dengan data yang diperlukan
        return view('Admin.PreviewUndangan.Kategori.' . $formView, compact('undangan', 'kategori', 'wedding'));
    }
    
    
    

    public function updateForm(Request $request, $id, $kategori_id)
    {
        // Temukan data undangan dengan ID yang diberikan
        $adminUndangan = SampelUndangan::find($id);
        if (!$adminUndangan) {
            return redirect()->back()->with('error', 'Admin undangan tidak ditemukan');
        }
    
        // Temukan wedding_id yang sesuai atau buat instance baru jika tidak ada
        $undangan = Wedding::where('id', $adminUndangan->wedding_id)->first() ?: new Wedding;
    
        // Mengisi data undangan dengan data dari request
        $undangan->fill($request->all());
    
        // Simpan foto pria jika ada dalam request
        if ($request->hasFile('foto_pria')) {
            $file = $request->file('foto_pria');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/foto_pria', $filename);
            $undangan->foto_pria = $filename;
        }
    
        // Simpan foto wanita jika ada dalam request
        if ($request->hasFile('foto_wanita')) {
            $file = $request->file('foto_wanita');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/foto_wanita', $filename);
            $undangan->foto_wanita = $filename;
        }
    
        // Simpan perubahan pada undangan
        $undangan->save();
    
        // Update wedding_id di adminUndangan (SampelUndangan) jika perlu
        if (!$adminUndangan->wedding_id) {
            $adminUndangan->wedding_id = $undangan->id;
            $adminUndangan->save();
        }
    
        // Redirect dengan pesan sukses
        return redirect()->route('sampel-undangan')->with('success', 'Data undangan berhasil diperbarui');
    }
    

    private function getFormView($kategori_tmp) 
    {
        switch ($kategori_tmp) {
            case 'Pernikahan':
                return 'pernikahan';
            case 'Syukuran':
                return 'syukuran';
            case 'Ulang Tahun':
                return 'ulang_tahun';
            case 'Acara Sosial':
                return 'acara_sosial';
            case 'Acara Keagamaan':
                return 'keagamaan';
            default:
                return 'default-form';
        }
    }
}
