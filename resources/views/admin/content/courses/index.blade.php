@extends('admin.main')
@section('content')
<div class="pagetitle">
  
    <h1>Courses</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"></li>
        <li class="breadcrumb-item active">Courses</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
        <div class="card">
            <div class="card-body py-4">
                <a href="/admin/courses/create" class="btn btn-primary m-3">+ Courses</a>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Desc</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($courses as $course)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $course->name }}</td>
                            <td>{{ $course->category }}</td>
                            <td>{{ $course->desc }}</td>
                            <td class="d-flex">
                                <a href="/admin/courses/edit/{{ $course->id }}" class="btn btn-warning me-3">Edit</a>
                                <form action="/admin/courses/delete/{{ $course->id }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
                                </form>
                            </td>
                        </tr>    
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
  </section>
    @endsection