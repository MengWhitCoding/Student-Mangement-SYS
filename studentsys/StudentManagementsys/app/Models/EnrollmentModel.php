<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrollmentModel extends Model
{
    protected $table = 'enrollments';
    protected $primaryKey = 'id';
    protected $fillable = ['enroll_no', 'batch_id', 'student_id', 'join_date', 'fee'];
    use HasFactory;

    public function student(){
        return $this->belongsTo(StudentModel::class);
    }

    public function batch(){
        return $this->belongsTo(BatchesModel::class);
    }
}
