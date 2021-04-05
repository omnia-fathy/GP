<?php

namespace App\Http\Controllers;

use App\CoverPhoto;
use Illuminate\Http\Request;

class CoverPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\CoverPhoto  $coverPhoto
     * @return \Illuminate\Http\Response
     */
    public function show(CoverPhoto $coverPhoto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CoverPhoto  $coverPhoto
     * @return \Illuminate\Http\Response
     */
    public static function getPhoto($id)
    {
        //
        return CoverPhoto::all()->where('User_Id','=',$id)->first()->Cover_Photo;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CoverPhoto  $coverPhoto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CoverPhoto $coverPhoto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CoverPhoto  $coverPhoto
     * @return \Illuminate\Http\Response
     */
    public function destroy(CoverPhoto $coverPhoto)
    {
        //
    }
}
