<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsEvent extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'date',
        'type',
        'description',
        'image',
        'ip_address',
        'add_by',
        'updated_by',
    ];
}
