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
use Illuminate\Database\Eloquent\Model;

class SampelController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        // Ambil semua data undangan beserta relasi kategori
        $sampel = SampelUndangan::with('kategori')->get(); // Memuat data undangan dengan relasi kategori
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

        // Tentukan view form berdasarkan kategori
        $formView = $this->getFormView($kategori->kategori_tmp);
        // return $sampel;
        return view('Admin.SampelUndangan.Kategori.' . $formView, compact('sampel', 'kategori'));
    }

    private function getFormView($kategori_tmp) 
    {
        // Tentukan nama view berdasarkan nama kategori
        switch ($kategori_tmp) {
            case 'Pernikahan':
                return 'pernikahan'; // Nama view harus dalam format yang sesuai
            case 'Syukuran':
                return 'syukuran'; // Nama view harus dalam format yang sesuai
            case 'Ulang Tahun':
                return 'ulang_tahun_dewasa'; // Nama view harus dalam format yang sesuai
            case 'Ulang Tahun Anak':
                return 'ulang_tahun_anak'; // Nama view harus dalam format yang sesuai
            case 'Acara Sosial':
                return 'acara_sosial'; // Nama view harus dalam format yang sesuai
            case 'Acara Keagamaan':
                return 'keagamaan'; // Nama view harus dalam format yang sesuai
            default:
                return 'default-form'; // Tambahkan view default jika diperlukan
        }
    }
    
   // ... existing code ...
public function viewForm(Request $request, $id, $kategori_id) 
{
    
    // Ambil data undangan berdasarkan ID
    $undangan = SampelUndangan::find($id);
    
    // Ambil kategori dari request (misalnya menggunakan parameter kategori_id)
    $kategori_id = $request->input('kategori_id');
    $kategori = KategoriTemplate::find($kategori_id);

    // Ambil data wedding berdasarkan wedding_id dari undangan
    $wedding = Wedding::where('id', $undangan->wedding_id)->first(); // Ambil data wedding
// return $undangan;
    // Periksa apakah data undangan, kategori, dan wedding ditemukan
    if (!$undangan || !$kategori || !$wedding) {
        return redirect()->back()->with('error', 'Data tidak ditemukan');
    }
    
    // Tentukan view form berdasarkan kategori
    $formView = $this->getFormView($kategori->kategori_tmp);
    
    return view('Admin.PreviewUndangan.Kategori.' . $formView, compact('undangan', 'kategori', 'wedding')); // Tambahkan wedding ke compact
}
// ... existing code ...
    
    // private function getFormView($kategori_tmp) 
    // {
    //     // Tentukan nama view berdasarkan nama kategori
    //     switch ($kategori_tmp) {
    //         case 'Pernikahan':
    //             return 'pernikahan'; // Nama view harus dalam format yang sesuai
    //         case 'Syukuran':
    //             return 'syukuran'; // Nama view harus dalam format yang sesuai
    //         case 'Ulang Tahun':
    //             return 'ulang_tahun'; // Nama view harus dalam format yang sesuai
    //         case 'Acara Sosial':
    //             return 'acara_sosial'; // Nama view harus dalam format yang sesuai
    //         case 'Acara Keagamaan':
    //             return 'keagamaan'; // Nama view harus dalam format yang sesuai
    //         default:
    //             return 'default-form'; // Tambahkan view default jika diperlukan
    //     }
    // }
    

























    public function updateForm(Request $request, $id = null, $kategori_id)
{
    // Validasi input (jika diperlukan)
    $request->validate([
        'font' => 'required|string',
        'judul_acara' => 'required|string',
       'foto_pria' => 'nullable|image',
        'foto_wanita' => 'nullable|image',
        'gallery' => 'nullable|array',
    ]);

    // Ambil admin undangan untuk mendapatkan wedding_id
    $adminUndangan = SampelUndangan::find($id);
    if (!$adminUndangan) {
        return redirect()->back()->with('error', 'Admin undangan tidak ditemukan');
    }
    $weddingId = $adminUndangan->wedding_id;

    // Ambil data undangan berdasarkan wedding_id atau buat baru jika tidak ada
    $undangan = Wedding::find($weddingId);

    // Jika data ada, perbarui data tersebut
    if ($undangan) {
        $undangan->fill([
            'font' => $request->input('font'),
            'judul_acara' => $request->input('judul_acara'),
            'kata_sambutan' => $request->input('kata_sambutan'),
            'countdown' => $request->input('countdown'),
            'np_pria' => $request->input('np_pria'),
            'np_wanita' => $request->input('np_wanita'),
            'nl_pria' => $request->input('nl_pria'),
            'nl_wanita' => $request->input('nl_wanita'),
            'inisial_pria' => $request->input('inisial_pria'),
            'inisial_wanita' => $request->input('inisial_wanita'),
            'ucapan_terima_kasih' => $request->input('ucapan_terima_kasih'),
            'ayah_pria' => $request->input('ayah_pria'),
            'ibu_pria' => $request->input('ibu_pria'),
            'alamat_org_tua_mp' => $request->input('alamat_org_tua_mp'),
            'ayah_wanita' => $request->input('ayah_wanita'),
            'ibu_wanita' => $request->input('ibu_wanita'),
            'alamat_org_tua_mw' => $request->input('alamat_org_tua_mw'),
            'lokasi_acara_akad' => $request->input('lokasi_acara_akad'),
            'jam_mulai_akad' => $request->input('jam_mulai_akad'),
            'jam_selesai_akad' => $request->input('jam_selesai_akad'),
            'latitude_akad' => $request->input('latitude_akad'),
            'longitude_akad' => $request->input('longitude_akad'),
            'lokasi_acara_resepsi' => $request->input('lokasi_acara_resepsi'),
            'jam_mulai_resepsi' => $request->input('jam_mulai_resepsi'),
            'jam_selesai_resepsi' => $request->input('jam_selesai_resepsi'),
            'latitude_resepsi' => $request->input('latitude_resepsi'),
            'longitude_resepsi' => $request->input('longitude_resepsi'),
            'tanggal_kenalan' => $request->input('tanggal_kenalan'),
            'cerita_kenalan' => $request->input('cerita_kenalan'),
            'tanggal_jadian' => $request->input('tanggal_jadian'),
            'cerita_jadian' => $request->input('cerita_jadian'),
            'tanggal_tunangan' => $request->input('tanggal_tunangan'),
            'cerita_tunangan' => $request->input('cerita_tunangan'),
            'tanggal_nikah' => $request->input('tanggal_nikah'),
            'cerita_nikah' => $request->input('cerita_nikah'),
            'gallery' => $request->has('gallery') ? json_encode($request->input('gallery')) : $undangan->gallery,
            'wedding_id' => $weddingId,
        ]);
    } else {
        // Jika data tidak ada, buat entri baru
        $undangan = Wedding::create([
            'font' => $request->input('font'),
            'judul_acara' => $request->input('judul_acara'),
            'kata_sambutan' => $request->input('kata_sambutan'),
            'countdown' => $request->input('countdown'),
            'np_pria' => $request->input('np_pria'),
            'np_wanita' => $request->input('np_wanita'),
            'nl_pria' => $request->input('nl_pria'),
            'nl_wanita' => $request->input('nl_wanita'),
            'inisial_pria' => $request->input('inisial_pria'),
            'inisial_wanita' => $request->input('inisial_wanita'),
            'ucapan_terima_kasih' => $request->input('ucapan_terima_kasih'),
            'ayah_pria' => $request->input('ayah_pria'),
            'ibu_pria' => $request->input('ibu_pria'),
            'alamat_org_tua_mp' => $request->input('alamat_org_tua_mp'),
            'ayah_wanita' => $request->input('ayah_wanita'),
            'ibu_wanita' => $request->input('ibu_wanita'),
            'alamat_org_tua_mw' => $request->input('alamat_org_tua_mw'),
            'lokasi_acara_akad' => $request->input('lokasi_acara_akad'),
            'jam_mulai_akad' => $request->input('jam_mulai_akad'),
            'jam_selesai_akad' => $request->input('jam_selesai_akad'),
            'latitude_akad' => $request->input('latitude_akad'),
            'longitude_akad' => $request->input('longitude_akad'),
            'lokasi_acara_resepsi' => $request->input('lokasi_acara_resepsi'),
            'jam_mulai_resepsi' => $request->input('jam_mulai_resepsi'),
            'jam_selesai_resepsi' => $request->input('jam_selesai_resepsi'),
            'latitude_resepsi' => $request->input('latitude_resepsi'),
            'longitude_resepsi' => $request->input('longitude_resepsi'),
            'tanggal_kenalan' => $request->input('tanggal_kenalan'),
            'cerita_kenalan' => $request->input('cerita_kenalan'),
            'tanggal_jadian' => $request->input('tanggal_jadian'),
            'cerita_jadian' => $request->input('cerita_jadian'),
            'tanggal_tunangan' => $request->input('tanggal_tunangan'),
            'cerita_tunangan' => $request->input('cerita_tunangan'),
            'tanggal_nikah' => $request->input('tanggal_nikah'),
            'cerita_nikah' => $request->input('cerita_nikah'),
            'gallery' => $request->has('gallery') ? json_encode($request->input('gallery')) : null,
            'wedding_id' => $weddingId,
        ]);
    }

    // Jika ada file yang di-upload, simpan file tersebut
    if ($request->hasFile('foto_pria')) {
        $file = $request->file('foto_pria');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('public/foto_pria', $filename);
        $undangan->foto_pria = $filename;
    }

    if ($request->hasFile('foto_wanita')) {
        $file = $request->file('foto_wanita');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('public/foto_wanita', $filename);
        $undangan->foto_wanita = $filename;
    }

    $undangan->save();

    return redirect()->route('sampel-undangan')->with('success', 'Data undangan berhasil diperbarui');
}

    
    
    
    
}
