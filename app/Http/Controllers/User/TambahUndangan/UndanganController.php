<?php

namespace App\Http\Controllers\User\TambahUndangan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User\BuatUndangan\Opening;
use App\Models\Admin\Template\KategoriTemplate;
use App\Models\User\BuatUndangan\ProfilWedding;
use App\Models\User\BuatUndangan\TambahUndangan;
use App\Models\Admin\SampelUndangan\SampelUndangan;
use App\Models\Admin\SampelUndangan\Kategori\Wedding;
use App\Models\Admin\SampelUndangan\Kategori\Keagamaan;
use App\Models\Admin\SampelUndangan\Kategori\UlangTahun;

class UndanganController extends Controller
{
    public function index()
    {
        // Dapatkan user yang sedang login
        $user = Auth::user();
        
        // Ambil data undangan berdasarkan id user
        $undangan = SampelUndangan::where('user_id', $user->id)->get();
        
        // Kirim data ke view
        return view('User.TambahUndangan.index', compact('user', 'undangan'));
    }
    
    public function preview($id)
    {
        $user = Auth::user();
        $tmp = TambahUndangan::with(['opening', 'undanganProfilWedding', 'galeriWedding','detailWedding'])->find($id);
       
        return view('User.PreviewTemplate.index', compact('tmp', 'user'   ));
    }

    public function edit($id)
    {
        $user = Auth::user();
        $tmp = TambahUndangan::find($id);
        $profilWedding = ProfilWedding::firstOrNew(['user_id' => $user->id, 'buat_undangan_id' => $id]);
        $opening = Opening::firstOrNew(['user_id' => $user->id, 'buat_undangan_id' => $id]);
        return view('User.TambahUndangan.edit', compact('user', 'tmp', 'profilWedding','opening'));
    }

    public function editForm($id, $kategori_id) 
{  $user = Auth::user();
    $sampel = SampelUndangan::find($id);
    $kategori = KategoriTemplate::find($kategori_id);

    if (!$sampel || !$kategori) {
        return redirect()->back()->with('error', 'Data tidak ditemukan');
    }

    $formView = $this->getFormView($kategori->kategori_tmp);
    return view('User.TambahUndangan.Kategori.' . $formView, compact('sampel', 'kategori','user'));
}

public function viewForm(Request $request, $id) 
{
    $user = Auth::user();
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
    return view('User.PreviewTemplate.Kategori.' . $formView, compact('undangan', 'kategori', 'wedding', 'ulangTahun','user'));
}

public function updateForm(Request $request, $id, $kategori_id)
{
    // Temukan data undangan dengan ID yang diberikan
    $userUndangan = SampelUndangan::find($id);
    if (!$userUndangan) {
        return redirect()->back()->with('error', 'Undangan tidak ditemukan');
    }

    // Wedding Section
    $undangan = Wedding::where('id', $userUndangan->wedding_id)->first() ?: new Wedding;
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

    if (!$userUndangan->wedding_id) {
        $userUndangan->wedding_id = $undangan->id;
        $userUndangan->save();
    }

    // Ulang Tahun Section
    $ulangTahun = UlangTahun::where('id', $userUndangan->ulang_tahun_id)->first() ?: new UlangTahun;
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

    if (!$userUndangan->ulang_tahun_id) {
        $userUndangan->ulang_tahun_id = $ulangTahun->id;
        $userUndangan->save();
    }

    // Keagamaan Section
    $keagamaan = Keagamaan::where('id', $userUndangan->keagamaan_id)->first() ?: new Keagamaan;
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
    $keagamaan->save();

    if (!$userUndangan->keagamaan_id) {
        $userUndangan->keagamaan_id = $keagamaan->id;
        $userUndangan->save();
    }

    return redirect()->route('undangan')->with('success', 'Data undangan, ulang tahun, dan keagamaan berhasil diperbarui');
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
    $userUndangan = SampelUndangan::find($id);
    if (!$userUndangan) {
        return redirect()->back()->with('error', 'Undangan tidak ditemukan');
    }

    // Wedding Section
    if ($userUndangan->wedding_id) {
        Wedding::where('id', $userUndangan->wedding_id)->delete();
    }

    // Ulang Tahun Section
    if ($userUndangan->ulang_tahun_id) {
        UlangTahun::where('id', $userUndangan->ulang_tahun_id)->delete();
    }

    // Keagamaan Section
    if ($userUndangan->keagamaan_id) {
        Keagamaan::where('id', $userUndangan->keagamaan_id)->delete();
    }

    // Hapus undangan
    $userUndangan->delete();

    return redirect()->route('undangan')->with('success', 'Undangan, ulang tahun, dan keagamaan berhasil dihapus');
}


}