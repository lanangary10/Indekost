<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KontenController extends Controller
{
    public function kontenlokasi($idlokasi)
    {
        return view('konten/kontenlokasidesa', ['idlokasi'=>$idlokasi]);
    }

    public function kontenlokasikecamatan($idlokasikecamatan)
    {
        return view('konten/kontenlokasikecamatan', ['idlokasikecamatan'=>$idlokasikecamatan]);
    }

    public function kontenfasilitass($idfs)
    {
        return view('konten/kontenfs', ['idfs'=>$idfs]);
    }

    public function kontenfasilitasp($idfp)
    {
        return view('konten/kontenfp', ['idfp'=>$idfp]);
    }

    public function kontenmenghadap($idhadap)
    {
        return view('konten/kontenmenghadap', ['idhadap'=>$idhadap]);
    }

    public function kontenstts($idstatus)
    {
        return view('konten/kontenstatus', ['idstatus'=>$idstatus]);
    }
  
}
