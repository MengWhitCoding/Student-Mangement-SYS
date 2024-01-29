<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseModel extends Model
{
    protected $table = 'courses';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'image','syllabus', 'duration','teacher_id'];
    use HasFactory;

    public function duration(){
        return $this->duration.'Months';
    }

    public function teacher(){
        return $this->belongsTo(TeacherModel::class);
    }
}
