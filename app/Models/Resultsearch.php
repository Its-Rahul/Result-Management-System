<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultsearch extends Model
{
    use HasFactory;
    protected $table = 'table_results';

    public function classId(){
        return $this->belongsTo(Classes::class,'class_id');
    }
    public function subjectId(){
        return $this->belongsTo(Subject::class,'subject_id');
    }
    public function studentId(){
        return $this->belongsTo(Student::class,'student_id');
    }

}
