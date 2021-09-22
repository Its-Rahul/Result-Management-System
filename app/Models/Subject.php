<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table = 'table_subjects';
    protected $fillable = ['class_id','subject_name','subject_code'];

    public function classId(){
        return $this->belongsTo(Classes::class,'class_id');
    }
}
