<?php

namespace App\Http\Controllers\Admin\TambahTemplate;

use App\Models\Admin\Template\KategoriTemplate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Audio\KategoriAudio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
// use App\Models\Template\KategoriTemplate;
use App\Models\Admin\Template\ModelTemplate;
use App\Models\Admin\Template\KategoriTemplate as TemplateKategoriTemplate;


class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua template dengan relasi kategori
        $data = ModelTemplate::with('kategori')->get(); // Menambahkan relasi kategori
        // Ambil semua kategori
        $kategoriTemplate = KategoriTemplate::all();
        // Jika Anda memerlukan kategori yang dipilih, ambil ID atau data yang relevan 
        // Kirim data ke view
        return view('Admin.TambahTemplate.index', compact('data', 'kategoriTemplate'));
    }

    // public function create()
    // {
    //     $data = KategoriTemplate::all();
    //     return view('Admin.TambahTemplate.create',compact('data'));
    // }

    public function store(Request $request)
    {
        // Validasi input
        // $request->validate([
        //     'judul' => 'required|string|max:255',
        //     'kategori_id' => 'required|exists:admin__kategori__template,id', // Memastikan kategori_id valid
        //     'cover' => 'nullable|image|max:2048', // Maksimal 2MB (2048 KB)
        // ], [
        //     'judul.required' => 'Judul template harus diisi.',
        //     'kategori_id.required' => 'Kategori template harus diisi.',
        //     'kategori_id.exists' => 'Kategori yang dipilih tidak valid.',
        //     'cover.image' => 'Cover harus berupa gambar.',
        //     'cover.max' => 'Cover tidak boleh lebih dari 2MB.',
        // ]);

        // Simpan data template
        $template = new ModelTemplate();
        $template->judul = $request->judul;
        $template->kategori_id = $request->kategori_id;

        // Proses penyimpanan file gambar
        if ($request->hasFile('cover')) {
            $imagePath = $request->file('cover')->store('images', 'public');
            $template->cover = $imagePath;
        }

        $template->save();

        return redirect()->route('template')->with('success', 'Template berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        // $request->validate([
        //     'judul' => 'nullable|string|max:255',
        //     'kategori_tmp' => 'required|exists:kategori_template,id',
        //     'cover' => 'nullable|image|max:2048', // Maksimal 2MB (2048 KB)
        // ]);
    
        // Temukan template berdasarkan ID
        $template = ModelTemplate::findOrFail($id);
    
        // Update data template
        $template->judul = $request->input('judul', $template->judul); // Jika tidak ada perubahan, tetap menggunakan nilai lama
        $template->kategori_id = $request->input('kategori_tmp', $template->kategori_id);
    
        // Proses pembaruan file gambar
        if ($request->hasFile('cover')) {
            $imagePath = $request->file('cover')->store('images', 'public');
            $template->cover = $imagePath;
        }
    
        $template->save();
    
        return redirect()->route('template')->with('warning', 'Template berhasil diperbarui.');
    }
    
    public function destroy(string $id)
{
    $template = ModelTemplate::findOrFail($id); // Cari template berdasarkan ID

// Validasi sebelum menghapus
if (!$template) {
    return redirect()->route('template')->with('danger', 'Template tidak ditemukan.');
}


    // Hapus file cover jika ada sebelum menghapus record dari database
    if ($template->cover1) {
        Storage::delete('public/cover_images/' . $template->cover1);
    }
    if ($template->cover2) {
        Storage::delete('public/cover_images/' . $template->cover2);
    }
    if ($template->cover3) {
        Storage::delete('public/cover_images/' . $template->cover3);
    }
    if ($template->cover4) {
        Storage::delete('public/cover_images/' . $template->cover4);
    }
    if ($template->cover5) {
        Storage::delete('public/cover_images/' . $template->cover5);
    }

    $template->delete(); // Hapus record dari database
    return redirect()->route('template')->with('danger', 'Template berhasil dihapus.');
}
}
