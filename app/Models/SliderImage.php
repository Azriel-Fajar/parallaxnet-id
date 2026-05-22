<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderImage extends Model
{
    use HasFactory;

    protected $table = 'slider_images';
    protected $primaryKey = 'id';
    const UPDATED_AT = null;

    protected $fillable = [
        'filename',
        'created_at',
    ];
}
