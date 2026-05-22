<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $fillable = [
        'news_title',
        'news_link',
        'news_img_filename',
        'thumbnail',
    ];
}
