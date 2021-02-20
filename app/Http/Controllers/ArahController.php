<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArahController extends Controller
{
    public function farah()
    {
        return view('arah/arahfilter1');
    }

    public function farah2($id5)
    {
        return view('arah/arahfilter2', ['idfilterarah' =>$id5]);
    }
}
