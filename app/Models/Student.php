<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Branch;
use App\Models\subject;
use App\Models\Role;
use Illuminate\Support\Facades\Log;

class Student extends Model
{
    use HasFactory;

    // ---------- Model Events
    // --- To mantain the history which events are fired we will use this all the Log will genereated isnide Log Folder
    public static function boot() {
        parent::boot();

        static::creating(function($item){
            Log::info("Creating event fired " . $item);
        });

        static::created(function($item){
            Log::info("Created event fired " . $item);
        });
        
        static::updating(function($item){
            Log::info("Updating event fired " . $item);
        });
        
        static::updated(function($item){
            Log::info("Updated event fired " . $item);
        });
        
        static::deleting(function($item){
            Log::info("Deleting event fired " . $item);
        });

        static::deleted(function($item){
            Log::info("Deleted event fired " . $item);
        });

    }

    // one to one
    public function branch() {
        return $this->hasOne(Branch::class);
        // return $this->hasOne(Branch::class, "studentId"); // "studentId" set column name where you want to match the id
    }

    // one to many
    public  function branches() {
        return $this->hasMany(Branch::class);
        // return $this->hasMany(Branch::class, "studentId"); // "studentId" set column name where you want to match the id
    }

    // Has one through relationship
    public function subjectInformation() {
        // 1st pass subject::class which value we want and in 2nd we pass from which class we go 
        return $this->hasOneThrough(subject::class, Branch::class);
    }

    // Has many through relationship
    public function subjectList() {
        // 1st pass subject::class which value we want and in 2nd we pass from which class we go 
        return $this->hasManyThrough(subject::class, Branch::class);
    }

    // many to many relationship
    public function roles() {
        return $this->belongsToMany(Role::class);
        // return $this->belongsToMany(Role::class, "role_student"); // "role_student" set the table name from where you want to get multiple relation data
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
