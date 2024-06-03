<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = ['name', 'nim', 'major', 'class', 'course_id'];

    /**
     * 1 to 1
     * hasOne(Namamodelnya) : table saat ini meminjamkan key
     * belongsTo(Namamodelnya) : table saat ini meminjamkan id dari table lain
     * 
     * 1 to M
     * hasMany(NamaModelnya) : table saat ini meminjamkan key
     * belongstoMany(NamaModelnya) : table saat ini meminjamkan id dari table lain
     */

    // mendefinisikan relasi ke model course
    public function course(){
        return $this->belongsTo(Courses::class);
    }
}
