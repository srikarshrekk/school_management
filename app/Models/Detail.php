<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'roll_no',
        'mobile',
        'address',
        'age',
        'sex',
        'image',
        'status',
    ];

}
