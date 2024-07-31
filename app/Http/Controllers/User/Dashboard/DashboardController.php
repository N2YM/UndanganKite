<?php

namespace App\Http\Controllers\User\Dashboard;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = Auth::user();
        return view('User.Dashboard.index',compact('user'));
    }

  
}
