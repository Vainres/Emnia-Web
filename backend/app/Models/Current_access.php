<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Current_access extends Model
{
    protected $fillable =[
        'user_id',
        'token',
    ];
    use HasFactory;
}
