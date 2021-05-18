<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\StatusScope;

class Device extends Model
{
    use HasFactory;

    protected static function booted()
    {
        static::addGlobalScope(new StatusScope);
    }

    protected function scopeWhereStatus($query, $val) {
        return $query->where("status", $val);
    }
}
