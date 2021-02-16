<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndekostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('indekost/index');
    }
    
   
    public function fasilitas1()
    {
        return view('fasilitas/fasilitasfilter1');
    }

  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * 
     * 
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       return view('indekost/kecamatan', ['idkost' =>$id]);
    }

      /**
     * Display the specified resource.
     *
     * @param  int  $id2
     * 
     * 
     * @return \Illuminate\Http\Response
     */
    public function fasilitas2($id3)
    {
        return view('fasilitas/fasilitasfilter2', ['idfilter1' =>$id3]);
    }

    
       /**
     * Display the specified resource.
     *
     * @param  int  $id
     * 
     *
     * 
     * 
     * @return \Illuminate\Http\Response
     */

    public function fharga()
    {
        return view('harga/hargafilter1');
    }

    
        /**
     * Display the specified resource.
     *
     * @param  int  $id4
     * 
     * 
     * @return \Illuminate\Http\Response
     */

    public function fharga2($id4)
    {
        return view('harga/hargafilter2', ['idfilterharga' =>$id4]);
    }

    public function farah()
    {
        return view('arah/arahfilter1');
    }

    public function farah2($id5)
    {
        return view('arah/arahfilter2', ['idfilterarah' =>$id5]);
    }

    public function fstatus()
    {
        return view('status/statusfilter1');
    }

    public function fstatus2($id6)
    {
        return view('status/statusfilter2', ['idfilterstatus' =>$id6]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
