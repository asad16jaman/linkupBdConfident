<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'status',
        'type',
        'location',
        'map_url',
        'video',
        'address',
        'land_area',
        'no_of_floor',
        'appartments',
        'no_of_parking',
        'flat_details',
        'features_details',
        'collection',
        'handover',
        'main_image',
        'details_image',
        'feature_image',
        'book_image',
        'ip_address',
        'add_by',
        'updated_by',
    ];
    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
}
