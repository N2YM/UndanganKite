<?php

namespace App\Http\Controllers\User\TambahUndangan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User\BuatUndangan\Opening;
use App\Models\User\BuatUndangan\GaleriWedding;
use App\Models\User\BuatUndangan\ModelUndangan;
use App\Models\User\BuatUndangan\ProfilWedding;
use App\Models\User\BuatUndangan\DetailAcaraUndangan;

class UndanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $tmp = ModelUndangan::where('id_user', $user->id)->get();
        // return $tmp;
        return view('User.TambahUndangan.index', compact('user', 'tmp'));
    }
    public function preview($id)
    {
        $tmp = ModelUndangan::with(['opening', 'undanganProfilWedding', 'galeriWedding','detailWedding'])->find($id);
        
        // dd($tmp);
        // return $tmp;
         // Periksa apakah undangan ditemukan
        //  if (!$tmp) {
        //     return redirect()->route('undangan.index')->with('error', 'Undangan tidak ditemukan');
        // }
        return view('User.PreviewTemplate.index', compact('tmp',));
    }

    public function edit($id)
    {
        $user = Auth::user();
        $tmp = ModelUndangan::find($id);
        $profilWedding = ProfilWedding::firstOrNew(['user_id' => $user->id, 'buat_undangan_id' => $id]);
        $opening = Opening::firstOrNew(['user_id' => $user->id, 'buat_undangan_id' => $id]);
        return view('User.TambahUndangan.edit', compact('user', 'tmp', 'profilWedding','opening'));
    }

    public function update(Request $request, $buatUndanganId)
    {
        $request->validate([
            'salam_pembuka' => 'required|string|max:255',
            'cerita_mempelai' => 'required|string',
            'nama_mempelai_pria' => 'required|string|max:255',
            'nama_mempelai_wanita' => 'required|string|max:255',
            'nama_ayah_mempelai_pria' => 'required|string|max:255',
            'nama_ibu_mempelai_pria' => 'required|string|max:255',
            'nama_ayah_mempelai_wanita' => 'required|string|max:255',
            'nama_ibu_mempelai_wanita' => 'required|string|max:255',
            'deskripsi_singkat_pasangan' => 'required|string',
            'fm_pria' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'fm_wanita' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        // Cari data profil undangan berdasarkan user_id dan buat_undangan_id
        $profilWedding = ProfilWedding::firstOrNew([
            'user_id' => Auth::id(),
            'buat_undangan_id' => $buatUndanganId
        ]);
        // Perbarui atau isi data profil undangan
        $profilWedding->salam_pembuka = $request->salam_pembuka;
        $profilWedding->cerita_mempelai = $request->cerita_mempelai;
        $profilWedding->nama_mempelai_pria = $request->nama_mempelai_pria;
        $profilWedding->nama_mempelai_wanita = $request->nama_mempelai_wanita;
        $profilWedding->nama_ayah_mempelai_pria = $request->nama_ayah_mempelai_pria;
        $profilWedding->nama_ibu_mempelai_pria = $request->nama_ibu_mempelai_pria;
        $profilWedding->nama_ayah_mempelai_wanita = $request->nama_ayah_mempelai_wanita;
        $profilWedding->nama_ibu_mempelai_wanita = $request->nama_ibu_mempelai_wanita;
        $profilWedding->deskripsi_singkat_pasangan = $request->deskripsi_singkat_pasangan;

        // Unggah dan perbarui foto mempelai pria jika ada
        if ($request->hasFile('fm_pria')) {
            if ($profilWedding->fm_pria) {
                Storage::delete($profilWedding->fm_pria);
            }
            $profilWedding->fm_pria = $request->file('fm_pria')->store('public/user/kategori/wedding/foto');
        }

        // Unggah dan perbarui foto mempelai wanita jika ada
        if ($request->hasFile('fm_wanita')) {
            if ($profilWedding->fm_wanita) {
                Storage::delete($profilWedding->fm_wanita);
            }
            $profilWedding->fm_wanita = $request->file('fm_wanita')->store('public/user/kategori/wedding/foto');
        }

        // Simpan data
        $profilWedding->save();

        return back()->with('success', 'Profil undangan pernikahan berhasil disimpan atau diperbarui!');
    }
    public function updateOpening(Request $request, $buatUndanganId)
    {
        
        // Aktifkan validasi
        // $request->validate([
        //     'judul_acara' => 'required|string|max:255',
        //     'tanggal_acara' => 'required|date',
        // ]);
        // Cari data opening berdasarkan user_id dan buat_undangan_id
        $opening = Opening::firstOrNew([
            'user_id' => Auth::id(),
            'buat_undangan_id' => $buatUndanganId
        ]);
        
        // Perbarui atau isi data opening
        $opening->judul_acara = $request->judul_acara;
        $opening->tanggal_acara = $request->tanggal_acara;
        // dd($opening);
        // Simpan data
        $opening->save();

        return back()->with('success', 'Opening berhasil disimpan atau diperbarui!');
    }
    public function updateDetailAcara(Request $request, $buatUndanganId)
    {
        // Validasi input dari pengguna
        // $request->validate([
        //     'acara1' => 'required|string|max:255',
        //     'jam_mulai_acara1' => 'required|date_format:H:i',
        //     'jam_selesai_acara1' => 'required|date_format:H:i',
        //     'hari_tanggal_acara1' => 'required|date',
        //     'alamat_gedung_acara1' => 'required|string|max:255',
        //     'link_map_acara1' => 'nullable|url',
        //     'acara2' => 'nullable|string|max:255',
        //     'jam_mulai_acara2' => 'nullable|date_format:H:i',
        //     'jam_selesai_acara2' => 'nullable|date_format:H:i',
        //     'hari_tanggal_acara2' => 'nullable|date',
        //     'alamat_gedung_acara2' => 'nullable|string|max:255',
        //     
        // ]);
        // dd($request->all());
        // Cari data DetailAcaraUndangan berdasarkan user_id dan buat_undangan_id
        $detailAcara = DetailAcaraUndangan::firstOrNew([
            'user_id' => Auth::id(),
            'buat_undangan_id' => $buatUndanganId
        ]);
        // Perbarui atau isi data DetailAcaraUndangan
        $detailAcara->acara1 = $request->acara1;
        $detailAcara->jam_mulai_acara1 = $request->jam_mulai_acara1;
        $detailAcara->jam_selesai_acara1 = $request->jam_selesai_acara1;
        $detailAcara->hari_tanggal_acara1 = $request->hari_tanggal_acara1;
        $detailAcara->alamat_gedung_acara1 = $request->alamat_gedung_acara1;
        $detailAcara->link_map_acara1 = $request->link_map_acara1;
        $detailAcara->acara2 = $request->acara2;
        $detailAcara->jam_mulai_acara2 = $request->jam_mulai_acara2;
        $detailAcara->jam_selesai_acara2 = $request->jam_selesai_acara2;
        $detailAcara->hari_tanggal_acara2 = $request->hari_tanggal_acara2;
        $detailAcara->alamat_gedung_acara2 = $request->alamat_gedung_acara2;
      

        // Simpan data
        $detailAcara->save();

        return back()->with('success', 'Detail acara berhasil disimpan atau diperbarui!');
    }


    public function updateGalleri(Request $request, $buatUndanganId)
    {
        // Validasi input foto yang diupload
        $request->validate([
            'image_path.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi foto
        ]);
    // dd($request->all());
        // Ambil semua foto yang diupload
        $files = $request->file('image_path');
    
        // Ambil user ID
        $userId = Auth::id();
    
        // Cek jika ada file yang diupload
        if ($files && count($files) > 0) {
            foreach ($files as $file) {
                // Simpan foto di storage
                $path = $file->store('public/user/kategori/wedding/gallery');
    
                // Periksa apakah ada data galeri sebelumnya
                $existingGaleri = GaleriWedding::where('user_id', $userId)
                                               ->where('buat_undangan_id', $buatUndanganId)
                                               ->first();
                
                if ($existingGaleri) {
                    // Hapus foto lama dari storage
                    Storage::delete($existingGaleri->image_path);
    
                    // Update data galeri dengan foto baru
                    $existingGaleri->image_path = $path;
                    $existingGaleri->save();
                } else {
                    // Tambahkan data foto baru ke tabel gallery_wedding
                    GaleriWedding::create([
                        'user_id' => $userId,
                        'buat_undangan_id' => $buatUndanganId,
                        'image_path' => $path,
                    ]);
                }
            }
        } else {
            // Jika tidak ada file baru, tambahkan pesan atau tindakan yang sesuai
            return back()->with('info', 'Tidak ada file baru untuk diupload.');
        }
        return back()->with('success', 'Foto berhasil diupload atau diperbarui!');
    }


    public function destroy($id)
    {
        // Temukan data undangan berdasarkan ID
        $template = ModelUndangan::findOrFail($id);
    
        // Hapus cover images dari storage (jika ada)
        // Hapus audio undangan dari storage (jika ada)
        if ($template->audio_undangan) {
            Storage::disk('public')->delete($template->audio_undangan);
        }
        // Hapus data undangan dari database
        $template->delete();
    
        return redirect()->route('undangan')->with('danger', 'Data undangan berhasil dihapus.');
    }
}