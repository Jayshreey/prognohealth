<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Artisan;

class Filemanager extends Controller
{
    public function index(){
        $page_data = array();
        $page_data['page_title'] = 'Filemanager';
        return view('backend.filemanager.index',$page_data);
    }
}