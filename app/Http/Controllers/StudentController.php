<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // method untuk menampilkan halaman 
    public function index(){
        // mendapatkan data student
        $students = Student::all();

        // panggil view dan kirim data ke view
        return view('admin.content.student.index', [
            'students' => $students
        ]);
    }
}
