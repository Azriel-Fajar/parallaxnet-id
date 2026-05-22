<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BootcampController extends Controller
{
    public function webDev()
    {
        return view('kurikulum.bootcamp.webdev');
    }

    public function ai()
    {
        return view('kurikulum.bootcamp.ai');
    }

    public function hacker()
    {
        return view('kurikulum.bootcamp.hacker');
    }
}
