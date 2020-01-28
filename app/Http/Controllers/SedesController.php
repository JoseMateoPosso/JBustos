<?php

namespace App\Http\Controllers;

use App\Sedes;
use App\Page;
use App\PagesSede;
use Illuminate\Http\Request;

class SedesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sedes = Sedes::where('status_id', 1)->get();
        return $sedes;
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
        $sedes = new Sedes();

        $sedes->name            = $request['name'];
        $sedes->representative  = $request['representative'];
        $sedes->phone           = $request['phone'];
        $sedes->email           = $request['email'];
        $sedes->type            = $request['type'];
        $sedes->address         = $request['address'];
        $sedes->status_id       = 2;

        $sedes->save();

        $paginas = Page::get();

        foreach ($paginas as $key => $value) {
            $pageSede = new PagesSede();

            $pageSede->sede_id = $sedes->id;
            $pageSede->page_id = $value->id;
            $pageSede->status_id = 2;

            $pageSede->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sedes  $sedes
     * @return \Illuminate\Http\Response
     */
    public function show(Sedes $sedes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sedes  $sedes
     * @return \Illuminate\Http\Response
     */
    public function edit(Sedes $sedes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sedes  $sedes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sedes = Sedes::find($id);

        $sedes->name            = $request['name'];
        $sedes->representative  = $request['representative'];
        $sedes->phone           = $request['phone'];
        $sedes->email           = $request['email'];
        $sedes->type            = $request['type'];
        $sedes->address         = $request['address'];
        $sedes->status_id       = 2;

        $sedes->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sedes  $sedes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sedes $sedes)
    {
        //
    }
}
