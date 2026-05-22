<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnivImages extends Model
{
    use HasFactory;
    protected $table = 'univ_images';
    protected $primaryKey = 'id';
    const UPDATED_AT = null;

    protected $fillable = [
        'filename',
        'category',
        'created_at',
    ];
}
