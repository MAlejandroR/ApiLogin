<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Teacher;

class Student extends Model
{
    use HasFactory;
    protected $fillable=["name","email","birth_date","teacher_id"];

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }
}
