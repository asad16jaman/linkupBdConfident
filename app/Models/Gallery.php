<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_id',
        'project_image',
        'ip_address',
        'add_by',
        'updated_by',
    ];
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
