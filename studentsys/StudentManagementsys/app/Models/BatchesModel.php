<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatchesModel extends Model
{
    protected $table = "batches";
    protected $primaryKey = "id";
    protected $fillable = ['name', 'course_id','start_date'] ;
    use HasFactory;

    public function course(){
        return $this->belongsTo(CourseModel::class); // one to one
    }
}
