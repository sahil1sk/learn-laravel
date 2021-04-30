<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Branch extends Model
{
    use HasFactory;

    public function student() {
        return $this->belongsTo(Student::class); // this means Branch model also belongs to student model
    }
}
