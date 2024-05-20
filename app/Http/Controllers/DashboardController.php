<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Method untuk menampilkan dashboard
    public function index(){
        return view('admin.content.dasboard.index');
    }
}
