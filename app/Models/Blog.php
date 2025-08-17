<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
    'title',
    'description',
    'image',
    'ip_address',
    'add_by',
    'updated_by',
];

}
