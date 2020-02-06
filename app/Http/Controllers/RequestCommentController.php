<?php

namespace App\Http\Controllers;

use App\RequestComment;
use Illuminate\Http\Request;

class RequestCommentController extends Controller
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

    
    public function commentListbyc(Request $request)
    {
      $basicInformation = RequestComment::where('request_id',$request['request_id'])->get();

      return $basicInformation;
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\RequestComment  $requestComment
     * @return \Illuminate\Http\Response
     */
    public function show(RequestComment $requestComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RequestComment  $requestComment
     * @return \Illuminate\Http\Response
     */
    public function edit(RequestComment $requestComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RequestComment  $requestComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequestComment $requestComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RequestComment  $requestComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestComment $requestComment)
    {
        //
    }
}
