<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocImage extends Model
{
    use HasFactory;
    protected $table = 'doc_images';
    protected $primaryKey = 'id';
    const UPDATED_AT = null;

    protected $fillable = [
        'filename',
        'created_at',
    ];
}
