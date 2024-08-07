<?php

namespace App\Http\Controllers;

use App\Models\Courses;
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

    // method untuk menampilkan form tambah student
    public function create(){

        // dapatkan data course dari database
        $courses = Courses::all();


        return view('admin.content.student.create',[
            'courses' => $courses
        ]);
    }

    // method untuk menyimpan data student
    public function store(Request $request){
        // validasi data yang diterima
        $request->validate([
            'name' => 'required',
            'nim'  => 'required|numeric',
            'major'=> 'required',
            'class'=> 'required',
            'course_id' => 'nullable|numeric',
        ]);

        // simpan ke database
        Student::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'major' => $request->major,
            'class' => $request->class,
            'course_id' => $request->course_id
        ]);

        // arahkan ke halaman student index
        return redirect('/admin/student')->with('pesan', 'Berhasil menambahkan data.');
    }

    // method untuk menampilkan edit
    public function edit($id){
        // cari student berdasarkan id
        $student = Student::find($id); // SELECT * FROM student WHERE id = $id;
        
        // dapatkan data course dari database
        $courses = Courses::all();

        // kirim student ke view edit
        return view('admin.content.student.edit', [
            'student' => $student, 'courses' => $courses
        ]);
    }

        
    // untuk menyimpan hasil update student
    public function update($id, Request $request){
        // cari data student berdasarkan id
        $student = Student::find($id); // SELECT * FROM student WHERE id = $id;

        $request->validate([
            'name' => 'required',
            'nim'  => 'required|numeric',
            'major'=> 'required',
            'class'=> 'required',
            'course_id' => 'nullable|numeric',
        ]);

        // simpan perubahan
        $student->update([
            'name' => $request->name,
            'nim' => $request->nim,
            'major' => $request->major,
            'class' => $request->class,
            'course_id' => $request->course_id
        ]);

        // kembalikan ke halaman student
        return redirect('/admin/student')->with('pesan', 'Berhasil mengubah data student.');
    }

    // method untuk menghapus student
    public function destroy($id){
        // cari data student berdasarkan id
        $student = Student::find($id); // SELECT * FROM student WHERE id = $id;

        // hapus student
        $student->delete();

        // kembalikan ke halaman student
        return redirect('/admin/student')->with('pesan', 'Berhasil menghapus data student.');
    }
}
