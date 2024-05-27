<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    // tampilkan halaman
    public function index(){
        // dapat data courses
        $courses = Courses::all();
        
        // panggil view
        return view('admin.content.courses.index', [
            'courses' => $courses
        ]);
    }
}
