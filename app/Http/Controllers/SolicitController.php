<?php

namespace App\Http\Controllers;

use App\Solicit;
use Illuminate\Http\Request;

class SolicitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = Solicit::select('requests.*','s.description','s.type','a.nickname','b.name as page_name')
        ->join('statuses as s', 's.id', 'requests.status_id')
        ->join('nicks as a', 'a.id', 'requests.nick_id')
        ->join('pages as b', 'b.id', 'requests.page_id')->get();

        
        return json_encode($models);
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
     * @param  \App\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $solict = Solicit::find($id);

        $solict->nickname_orig = $request['nickname_orig'];
		$solict->nickname_suggest = $request['nickname_suggest'];
		$solict->observation = $request['observation'];
		$solict->page_id = $request['page_id'];
		$solict->sede_id_orig = $request['sede_id_orig'];
		$solict->sede_id_dest = $request['sede_id_dest'];
		$solict->nick_id = $request['nick_id'];
        $solict->status_id = $request['status_id'];
        
        $solict->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
    }
}
