<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaptopLending extends Model
{
    use HasFactory;
    protected $fillable = [
        'nis',
        'name',
        'region',
        'purposes',
        'ket',
        'date',
        'return_date',
        'teacher',
    ];
}
