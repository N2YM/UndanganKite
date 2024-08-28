<?php

namespace App\Http\Controllers\Admin\SampelUndangan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Audio\ModelAudio;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin\Template\ModelTemplate;
use App\Models\Admin\Template\KategoriTemplate;
use App\Models\Admin\SampelUndangan\SampelUndangan;
use App\Models\Admin\SampelUndangan\Kategori\Wedding;
use App\Models\Admin\SampelUndangan\Kategori\Keagamaan;
use App\Models\Admin\SampelUndangan\Kategori\UlangTahun;

class SampelController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        $sampel = SampelUndangan::with('kategori')
                    ->whereNull('user_id') // Filter to show only records without a user_id
                    ->get();
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
// dd($undangan);
$undangan->save();
// dd($request->all());
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
        $undangan = SampelUndangan::with('wedding', 'kategori','ulangTahun','keagamaan')->find($id);
    
        // Periksa apakah undangan ditemukan
        if (!$undangan) {
            return redirect()->back()->with('error', 'Undangan tidak ditemukan');
        }
    
        // Ambil kategori terkait
        $kategori = $undangan->kategori;
    
        // Ambil data wedding dari relasi
        $wedding = $undangan->wedding;
        $ulangTahun = $undangan->ulangTahun;
        $keagamaan = $undangan->keagamaan;
    
        // Tentukan view form berdasarkan kategori
        $formView = $this->getFormView($kategori ? $kategori->kategori_tmp : 'default');
    
        // Kembalikan view dengan data yang diperlukan
        return view('Admin.PreviewUndangan.Kategori.' . $formView, compact('undangan', 'kategori', 'wedding','ulangTahun'));
    }
    
    public function updateForm(Request $request, $id, $kategori_id)
    {
        // Temukan data undangan dengan ID yang diberikan
        $adminUndangan = SampelUndangan::find($id);
        if (!$adminUndangan) {
            return redirect()->back()->with('error', 'Admin undangan tidak ditemukan');
        }
    
        // Wedding Section
        $undangan = Wedding::where('id', $adminUndangan->wedding_id)->first() ?: new Wedding;
        $undangan->fill($request->all());
    
        if ($request->hasFile('foto_pria')) {
            $file = $request->file('foto_pria');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/foto_pria', $filename);
            $undangan->foto_pria = $filename;
        }
    
        if ($request->hasFile('foto_wanita')) {
            $file = $request->file('foto_wanita');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/foto_wanita', $filename);
            $undangan->foto_wanita = $filename;
        }
    
        if ($request->hasFile('gallery')) {
            $gallery = [];
            foreach ($request->file('gallery') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/gallery', $filename);
                $gallery[] = $filename;
            }
    
            $existingGallery = $undangan->gallery;
            if (is_string($existingGallery)) {
                $existingGallery = json_decode($existingGallery, true);
            }
    
            if (is_array($existingGallery)) {
                $mergedGallery = array_merge($existingGallery, $gallery);
            } else {
                $mergedGallery = $gallery;
            }
    
            $filteredGallery = array_filter($mergedGallery, function ($item) {
                return !empty($item);
            });
    
            $undangan->gallery = json_encode($filteredGallery);
        }
    
        $undangan->save();
    
        if (!$adminUndangan->wedding_id) {
            $adminUndangan->wedding_id = $undangan->id;
            $adminUndangan->save();
        }
    
        // Ulang Tahun Section
        $ulangTahun = UlangTahun::where('id', $adminUndangan->ulang_tahun_id)->first() ?: new UlangTahun;
        $ulangTahun->fill($request->except(['galeri_ultah']));
    
        if ($request->hasFile('galeri_ultah')) {
            $galeri_ultah = [];
            foreach ($request->file('galeri_ultah') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/gallery_ultah', $filename);
                $galeri_ultah[] = $filename;
            }
    
            $existingGaleriUlangTahun = $ulangTahun->galeri_ultah;
            if (is_string($existingGaleriUlangTahun)) {
                $existingGaleriUlangTahun = json_decode($existingGaleriUlangTahun, true);
            }
    
            if (is_array($existingGaleriUlangTahun)) {
                $mergedGaleriUlangTahun = array_merge($existingGaleriUlangTahun, $galeri_ultah);
            } else {
                $mergedGaleriUlangTahun = $galeri_ultah;
            }
    
            $filteredGaleriUlangTahun = array_filter($mergedGaleriUlangTahun, function ($item) {
                return !empty($item);
            });
    
            $ulangTahun->galeri_ultah = json_encode($filteredGaleriUlangTahun);
        }
    
        if ($request->hasFile('foto_ultah')) {
            $file = $request->file('foto_ultah');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/foto_ultah', $filename);
            $ulangTahun->foto_ultah = $filename;
        }
    
        $ulangTahun->save();
    
        if (!$adminUndangan->ulang_tahun_id) {
            $adminUndangan->ulang_tahun_id = $ulangTahun->id;
            $adminUndangan->save();
        }
    
       // Keagamaan Section
// Keagamaan Section
$keagamaan = Keagamaan::where('id', $adminUndangan->keagamaan_id)->first() ?: new Keagamaan;
$keagamaan->fill($request->except(['galeri_keagamaan', 'foto_keagamaan']));

if ($request->hasFile('galeri_keagamaan')) {
    // Step 1: Delete old images from storage
    if ($keagamaan->galeri_keagamaan) {
        $existingGaleriKeagamaan = json_decode($keagamaan->galeri_keagamaan, true);
        if (is_array($existingGaleriKeagamaan)) {
            foreach ($existingGaleriKeagamaan as $oldImage) {
                Storage::delete('public/gallery_keagamaan/' . $oldImage);
            }
        }
    }

    // Step 2: Save new images
    $galeri_keagamaan = [];
    foreach ($request->file('galeri_keagamaan') as $file) {
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/gallery_keagamaan', $filename);
        $galeri_keagamaan[] = $filename;
    }

    // Save the new gallery images as JSON
    $keagamaan->galeri_keagamaan = json_encode($galeri_keagamaan);
}

if ($request->hasFile('foto_keagamaan')) {
    $file = $request->file('foto_keagamaan');
    $filename = time() . '_' . $file->getClientOriginalName();
    $file->storeAs('public/foto_keagamaan', $filename);
    $keagamaan->foto_keagamaan = $filename;
} else {
    // Preserve the existing foto_keagamaan if no new file is uploaded
    $keagamaan->foto_keagamaan = $keagamaan->getOriginal('foto_keagamaan');
}

$keagamaan->terimakasih_keagamaan = $request->input('terimakasih_keagamaan');
// dd($keagamaan);
$keagamaan->save();

if (!$adminUndangan->keagamaan_id) {
    $adminUndangan->keagamaan_id = $keagamaan->id;
    $adminUndangan->save();
}
        return redirect()->route('sampel-undangan')->with('success', 'Data undangan, ulang tahun, dan keagamaan berhasil diperbarui');
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
    public function deleteForm($id, $kategori_id)
    {
        // Temukan data undangan dengan ID yang diberikan
        $adminUndangan = SampelUndangan::find($id);
        if (!$adminUndangan) {
            return redirect()->back()->with('error', 'Admin undangan tidak ditemukan');
        }
    
                // Hapus data Wedding terkait jika ada
                if ($adminUndangan->wedding_id) {
                    $wedding = Wedding::find($adminUndangan->wedding_id);
                    if ($wedding) {
                        // Hapus foto pria dan wanita jika ada
                        if ($wedding->foto_pria) {
                            Storage::delete('public/foto_pria/' . $wedding->foto_pria);
                        }
                        if ($wedding->foto_wanita) {
                            Storage::delete('public/foto_wanita/' . $wedding->foto_wanita);
                        }
            
                        // Hapus galeri jika ada
                        if ($wedding->gallery) {
                            $galleryImages = json_decode($wedding->gallery, true);
                            if (is_array($galleryImages)) {
                                foreach ($galleryImages as $image) {
                                    if (is_string($image) && !empty($image)) {
                                        Storage::delete('public/gallery/' . $image);
                                    }
                                }
                            }
                        }
            
                        // Hapus data wedding
                        $wedding->delete();
                    }
                }
            
                // Hapus data ulang tahun terkait jika ada
                if ($adminUndangan->ulang_tahun_id) {
                    $ulangTahun = UlangTahun::find($adminUndangan->ulang_tahun_id);
                    if ($ulangTahun) {
                        // Hapus foto ulang tahun jika ada
                        if ($ulangTahun->foto_ultah) {
                            Storage::delete('public/foto_ultah/' . $ulangTahun->foto_ultah);
                        }
            
                        // Hapus galeri ulang tahun jika ada
                        if ($ulangTahun->galeri_ultah) {
                            $galeriUltahImages = json_decode($ulangTahun->galeri_ultah, true);
                            if (is_array($galeriUltahImages)) {
                                foreach ($galeriUltahImages as $image) {
                                    if (is_string($image) && !empty($image)) {
                                        Storage::delete('public/gallery_ultah/' . $image);
                                    }
                                }
                            }
                        }
            
                        // Hapus data ulang tahun
                        $ulangTahun->delete();
                    }
                }
            
                // Hapus data adminUndangan
                $adminUndangan->delete();
            
                // Redirect dengan pesan sukses
                return redirect()->route('sampel-undangan')->with('danger', 'Data undangan dan ulang tahun berhasil dihapus');
            }
        }     
