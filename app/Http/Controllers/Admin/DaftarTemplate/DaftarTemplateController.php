<?php

namespace App\Http\Controllers\Admin\DaftarTemplate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Template\ModelTemplate;

class DaftarTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ModelTemplate::all();
        $user = Auth::user();
        return view('Admin.DaftarTemplate.index',compact('data','user'));
    }
 
    public function view($id){
        $user = Auth::user();
        $data = ModelTemplate::find($id);
        return view('Admin.DaftarTemplate.view', compact('user','data'));
    }

}
