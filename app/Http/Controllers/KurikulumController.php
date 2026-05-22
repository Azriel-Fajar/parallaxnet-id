<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KurikulumController extends Controller
{
    public function index()
    {
        return view('kurikulum.index');
    }

    public function kursusStandar()
    {
        return view('kurikulum.standar');
    }

    public function kursusBootcamp()
    {
        return view('kurikulum.bootcamp.index');
    }

    public function kursusProfesional()
    {
        return view('kurikulum.profesional.index');
    }

    public function kursusInggris()
    {
        return view('kurikulum.inggris');
    }
}
