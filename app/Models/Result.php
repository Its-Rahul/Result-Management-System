<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $table = 'table_results';
    protected $fillable = ['class_id','student_id','subject_id','marks'];

    public function classId(){
        return $this->belongsTo(Classes::class,'class_id');
    }
    public function subjectId(){
        return $this->belongsTo(Subject::class,'subject_id');
    }

}
