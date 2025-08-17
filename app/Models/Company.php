<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_name',
        'phone',
        'email',
        'address',
        'footer_slogan',
        'facebook',
        'linkdin',
        'youtube',
        'instagram',
        'twitter',
        'logo',
        'ip_address',
        'updated_by',
    ];
}
