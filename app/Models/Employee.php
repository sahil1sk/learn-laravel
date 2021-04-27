<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = "tbl_employees"; // so now this model file will us to tbl_employees
    protected $primaryKey = "emp_id"; // so now emp_id will be the primary key
    protected $keyType = "string"; // if we have emp_id as string data type then we declare keytype as string
    public $incrementing = true; // so auto increment of primary key is true or enabled
    public $timestamps = true; // this have to tell that we have the timestamps

    // IN the given way we are able to specify different name
    const CREATED_AT = "creation_date";
    const UPDATED_AT = "last_update";


}
