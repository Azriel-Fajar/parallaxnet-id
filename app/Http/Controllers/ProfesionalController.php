<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfesionalController extends Controller
{
    public function cyberSecurity()
    {
        return view('kurikulum.profesional.cybersecurity');
    }

    public function ethicalHacker()
    {
        return view('kurikulum.profesional.ethicalhacker');
    }

    public function iot()
    {
        return view('kurikulum.profesional.iot');
    }
}
