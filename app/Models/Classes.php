<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classes extends Model
{
    use HasFactory;
    protected $table = 'table_classes';

    protected $fillable = ['classname','classnamenumeric'];

    function subjects(){
        return $this->hasMany(Subject::class,'class_id');
    }
    function students(){
        return $this->hasMany(Student::class,'class_id');
    }
}
