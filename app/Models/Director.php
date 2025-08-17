<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    use HasFactory;
    protected $fillable = [
    'name',
    'designation',
    'message',
    'image',
    'add_by',
    'updated_by',
];

}
