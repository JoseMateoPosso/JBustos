<?php

namespace App\Http\Controllers;

use App\BasicInformation;
use Illuminate\Http\Request;

class BasicInformationController extends Controller
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

    public function basicinformationbyc(Request $request)
    {
      $basicInformation = BasicInformation::where('category_id', $request['category_id'])->get();

      return $basicInformation;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $basicInformation = new BasicInformation();

      $basicInformation->description    = $request["description"];
      $basicInformation->category_id    = $request["category_id"];

      $basicInformation->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BasicInformation  $basicInformation
     * @return \Illuminate\Http\Response
     */
    public function show(BasicInformation $basicInformation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BasicInformation  $basicInformation
     * @return \Illuminate\Http\Response
     */
    public function edit(BasicInformation $basicInformation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BasicInformation  $basicInformation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $basicInformation)
    {
      $basicInfo = BasicInformation::find($basicInformation);

      $basicInfo->description    = $request["description"];

      $basicInfo->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BasicInformation  $basicInformation
     * @return \Illuminate\Http\Response
     */
    public function destroy(BasicInformation $basicInformation)
    {
        //
    }
}
