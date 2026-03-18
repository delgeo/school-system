<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    // Fillable fields
    protected $fillable = ['school_name', 'address', 'phone', 'is_active', 'user_id'];
}
