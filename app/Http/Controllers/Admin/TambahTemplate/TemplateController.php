<?php

namespace App\Http\Controllers\Admin\TambahTemplate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $data = ModelTemplate::all();
        $user = Auth::user();
        return view('Admin.TambahTemplate.index', compact('data','user'));
    }

    public function create()
    {
        $user = Auth::user();
        return view('Admin.TambahTemplate.create',compact('user'));
    }

    public function edit(string $id)
    {
        $user = Auth::user();
        $template = ModelTemplate::findOrFail($id);
        return view('Admin.TambahTemplate.edit', compact('template','user'));
    }

    public function store(Request $request)
{
   
    // Simpan kategori_template terlebih dahulu
    $kategoriTemplate = TemplateKategoriTemplate::create([
        'kategori_tmp' => $request->kategori_tmp,
        'user_id' => auth()->id(),
    ]);

    // Simpan data template
    $template = new ModelTemplate();
    $template->judul = $request->judul;
    $template->user_id = auth()->id();
    $template->kategori_template_id = $kategoriTemplate->id;
    $template->save();

    // Proses penyimpanan file gambar
    $this->storeImage($request, 'cover1', $template);
    $this->storeImage($request, 'cover2', $template);
    $this->storeImage($request, 'cover3', $template);
    $this->storeImage($request, 'cover4', $template);
    $this->storeImage($request, 'cover5', $template);

    // Redirect ke rute atau halaman yang sesuai setelah penyimpanan berhasil
    return redirect()->route('template')->with('success', 'Template berhasil ditambahkan.');
}

// Fungsi untuk menyimpan gambar

    public function update(Request $request, $id)
    {
        // Validasi input
        // $request->validate([
        //     'judul' => 'required|string',
        //     'cover1' => 'nullable|image|max:2048', // Contoh validasi untuk file gambar (opsional)
        //     'cover2' => 'nullable|image|max:2048',
        //     'cover3' => 'nullable|image|max:2048',
        //     'cover4' => 'nullable|image|max:2048',
        //     'cover5' => 'nullable|image|max:2048',
        //     'isi' => 'required|string',
        //     'kategori_tmp' => 'required|string',
        // ]);
    
        // Temukan template berdasarkan ID
        $template = ModelTemplate::findOrFail($id);
    
        // Update atau buat data kategori_template
        $kategoriTemplate = $template->kategoriTemplate;
        if (!$kategoriTemplate) {
            $kategoriTemplate = new TemplateKategoriTemplate();
            $kategoriTemplate->user_id = auth()->id();
        }
        $kategoriTemplate->kategori_tmp = $request->kategori_tmp;
        $kategoriTemplate->save();
    
        // Update data template
        $template->judul = $request->judul;
        $template->kategori_template_id = $kategoriTemplate->id;
        $template->save();
    
        // Proses pembaruan file gambar
        $this->storeImage($request, 'cover1', $template);
        $this->storeImage($request, 'cover2', $template);
        $this->storeImage($request, 'cover3', $template);
        $this->storeImage($request, 'cover4', $template);
        $this->storeImage($request, 'cover5', $template);
    
        // Redirect ke rute atau halaman yang sesuai setelah pembaruan berhasil
        return redirect()->route('template')->with('success', 'Template berhasil diperbarui.');
    }
    
    // Fungsi untuk menyimpan gambar
    private function storeImage($request, $imageField, $template)
    {
        if ($request->hasFile($imageField)) {
            $imagePath = $request->file($imageField)->store('images', 'public');
            $template->$imageField = $imagePath;
            $template->save();
        }
    }
    public function destroy(string $id)
    {
        $template = ModelTemplate::findOrFail($id); // Cari template berdasarkan ID

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

        return redirect()->route('template')->with('success', 'Template berhasil dihapus.');
    }
}
