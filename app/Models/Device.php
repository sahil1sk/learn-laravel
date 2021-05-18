<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected function scopeWhereStatus($query, $val) {
        return $query->where("status", $val);
    }
}
