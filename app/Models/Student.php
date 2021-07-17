<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'table_students';
    protected $fillable = ['fullname','class_id','roll_id','email','dob','phone','image','address','status'];

    public function classId(){
        return$this->belongsTo(Classes::class,'class_id');
    }
}
