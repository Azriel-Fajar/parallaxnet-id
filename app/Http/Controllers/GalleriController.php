<?php

namespace App\Http\Controllers;

use App\Models\DocImage;

class GalleriController extends Controller
{
    public function index()
    {
        $images = DocImage::latest('id')->get();

        return view('galeri', ['images' => $images]);
    }
}
