<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class messageFromCeo extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'title',
        'description',
        'head_image_ceo',
        'ip_address',
        'updated_by',
    ];
}
