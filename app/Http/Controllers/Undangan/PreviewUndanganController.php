<?php

namespace App\Http\Controllers\Undangan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Template\ModelTemplate;

class PreviewUndanganController extends Controller
{
    public function index($id){
        $tmp = ModelTemplate::find($id);
        
        return view('Undangan.index', compact('tmp'));
    }
}
