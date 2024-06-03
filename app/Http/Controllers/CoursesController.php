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

    // method untuk menampilkan form tambah
    public function create(){
        return view('admin.content.courses.create');
    }

     // method untuk menyimpan data student
     public function store(Request $request){
        // validasi data yang diterima
        $request->validate([
            'name' => 'required',
            'category'=> 'required',
            'desc'=> 'required'
        ]);

        // simpan ke database
        Courses::create([
            'name' => $request->name,
            'category' => $request->category,
            'desc' => $request->desc,
        ]);

        // arahkan ke halaman courses index
        return redirect('/admin/courses')->with('pesan', 'Berhasil menambahkan data.');
    }

    // method untuk menampilkan edit Courses
    public function edit($id){
        // cari courses berdasarkan id
        $courses = Courses::find($id); // SELECT * FROM courses WHERE id = $id;

        // kirim courses ke view edit
        return view('admin.content.courses.edit', [
            'courses' => $courses
        ]);
    }

     // untuk menyimpan hasil update courses
     public function update($id, Request $request){
        // cari data courses berdasarkan id
        $courses = Courses::find($id); // SELECT * FROM courses WHERE id = $id;

        $request->validate([
            'name' => 'required',
            'category'=> 'required',
            'desc'=> 'required'
        ]);

        // simpan perubahan
        $courses->update([
            'name' => $request->name,
            'category' => $request->category,
            'desc' => $request->desc,
        ]);

        // kembalikan ke halaman courses
        return redirect('/admin/courses')->with('pesan', 'Berhasil mengubah data courses.');
    }

    // method untuk menghapus courses
    public function destroy($id){
        // cari data courses berdasarkan id
        $courses = Courses::find($id); // SELECT * FROM courses WHERE id = $id;

        // hapus courses
        $courses->delete();

        // kembalikan ke halaman courses
        return redirect('/admin/courses')->with('pesan', 'Berhasil menghapus data courses.');
    }
}
