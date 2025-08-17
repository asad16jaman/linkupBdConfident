<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class WhyChooseUs extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'image',
        'head_image',
        'management_head_image',
        'director_head_image',
        'mission_image',
        'news_events_image',
        'contact_head_image',
        'status_head_image',
        'ip_address',
        'updated_by',
    ];
}
