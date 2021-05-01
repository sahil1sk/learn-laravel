<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Branch;
use App\Models\subject;

class Student extends Model
{
    use HasFactory;

    // one to one
    public function branch() {
        return $this->hasOne(Branch::class);
    }

    // one to many
    public  function branches() {
        return $this->hasMany(Branch::class);
    }

    // Has one through relationshipt
    public function subjectInformation() {
        // 1st pass subject::class which value we want and in 2nd we pass from which class we go 
        return $this->hasOneThrough(subject::class, Branch::class);
    }

    // Mutators helps to update the values before saving
    public function setMobileAttribute($value) {
        $this->attributes["mobile"] = "+91" . $value;
    }

    // ---- Given are Accesors which helps to manupulate values before showing

    // this is the accessor method which will help to uppercase the email value
    public function getEmailAttribute($value) {
        return strtoupper($value);
    }

    public function getCreatedAtAttribute($value) {
        return date('Y-m-d h:i:s', strtotime($value));
    }
}
