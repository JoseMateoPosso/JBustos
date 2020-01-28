<?php

namespace App\Http\Controllers;

use App\Nick;
use App\Modelo;
use App\PagesSede;
use Illuminate\Http\Request;

class NickController extends Controller
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
        $modelo = Modelo::find($request["model_id"]);

        $page = PagesSede::where('page_id', $request['page_id'])
                         ->where('sede_id', $modelo->sede_id)
                         ->first();

        if($page != null){
            $nicks = $modelo->nicks()->create([
                'nickname' => $request['nickname'],
                'password' => $request["password"],
                'url'      => $request['url'],
                'page_id'  => $request['page_id'],
                'category_id' => 2,
                'status_id'   => 2
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nick  $nick
     * @return \Illuminate\Http\Response
     */
    public function show($nick)
    {
        $modelo = Modelo::find($nick);

        $nicks = $modelo->nicks()->with("pagina")->get();

        return $nicks;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nick  $nick
     * @return \Illuminate\Http\Response
     */
    public function edit(Nick $nick)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nick  $nick
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nick)
    {
        $nicks = Nick::find($nick);

        $modelo = Modelo::find($request['model_id']);

        $page = PagesSede::where('page_id', $request['page_id'])
                         ->where('sede_id', $modelo->sede_id)
                         ->first();

        $nicks->nickname = $request["nickname"];
        $nicks->password = $request["password"];
        $nicks->url      = $request["url"];

        if($page != null){
            $nicks->page_id = $request['page_id'];
        }

        $nicks->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nick  $nick
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nick $nick)
    {
        //
    }
}
