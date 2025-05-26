<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Artisan;

class Dashboard extends Controller
{
    public function index(){
        return view('backend.dashboard');
    }
    function clear_cache(Request $request){
        Artisan::call('optimize:clear');
        return back();
    }
}
