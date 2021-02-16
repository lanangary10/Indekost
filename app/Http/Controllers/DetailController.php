<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
     * @return \Illuminate\Http\Response
     */
    public function show($id2)
    {
       
        return view('indekost/tampilkost', ['iddetail' =>$id2]);
    }

       /**
     * Display the specified resource.
     *
     * @param  int  $id3
     * 
     * @return \Illuminate\Http\Response
     */
    public function isikost($id3)
    {
       
        return view('indekost/detailkost', ['iddetail2' =>$id3]);
    }
 
        /**
     * Display the specified resource.
     *
     * @param  int  $id4
     * 
     * @return \Illuminate\Http\Response
     */
    public function fasilitaskosttampil($id4)
    {
       
        return view('indekost/detailkost', ['iddetail2' =>$id4]);
    }

    public function isikost2($id5)
    {
       
        return view('indekost/detailkost', ['iddetail2' =>$id5]);
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
