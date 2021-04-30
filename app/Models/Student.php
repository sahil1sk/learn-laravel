<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // this is the accessor method which will help to uppercase the email value
    public function getEmailAttribute($value) {
        return strtoupper($value);
    }

    public function getCreatedAtAttribute($value) {
        return date('Y-m-d h:i:s', strtotime($value));
    }
}
