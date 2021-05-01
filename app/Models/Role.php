<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Role extends Model
{
    use HasFactory;

    // -- for get many to many relationship from role_student table
    public function getStudents() {
        return $this->belongsToMany(Student::class);
    }
}
