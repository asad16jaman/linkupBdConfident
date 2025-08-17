<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurStrength extends Model
{
    use HasFactory;
    protected $fillable = [
    'title',
    'description',
    'add_by',
    'updated_by',
];

}
