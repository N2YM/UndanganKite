<?php

namespace App\Http\Controllers\Admin\DaftarTemplate;


use App\Http\Controllers\Controller;
use App\Models\Admin\Template\ModelTemplate;

class DaftarTemplateController extends Controller
{
    public function index()
    {
        $data = ModelTemplate::all();
        return view('Admin.DaftarTemplate.index',compact('data'));
    }
 
    public function view($id){
        $data = ModelTemplate::find($id);
        return view('Admin.DaftarTemplate.view', compact('data'));
    }

}
