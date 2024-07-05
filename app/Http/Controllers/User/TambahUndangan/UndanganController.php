<?php

namespace App\Http\Controllers\User\TambahUndangan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User\BuatUndangan\ModelUndangan;

class UndanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $tmp = ModelUndangan::where('id_user', $user->id)->get();
        return view('User.TambahUndangan.index', compact('user', 'tmp'));
    }
    
    public function preview($id)
    {
        $tmp = ModelUndangan::find($id);
// dd($tmp);
        return view('User.PreviewTemplate.index',compact('tmp'));
    }

    public function edit($id)
    {
        $user = Auth::user();
        $tmp = ModelUndangan::find($id);
        return view('User.TambahUndangan.edit',compact('user','tmp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
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
    
        return redirect()->route('undangan')->with('success', 'Data undangan berhasil dihapus.');
    }
    
}
