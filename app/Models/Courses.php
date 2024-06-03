<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $fillable = ['name', 'category', 'desc'];

    // mendefinisikan relasi ke model student 1:M
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
