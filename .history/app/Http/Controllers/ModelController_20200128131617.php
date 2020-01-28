<?php

namespace App\Http\Controllers;

use App\Modelo;
use Illuminate\Http\Request;

class ModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = Modelo::get();

        return $ms;
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
        $models = new Modelo();

        $models->type_id        = $request["type_id"];
        $models->identification = $request["identification"];
        $models->name           = $request["name"];
        $models->lastname       = $request["lastname"];
        $models->address        = $request["address"];
        $models->email          = $request["email"];
        $models->phone          = $request["phone"];
        $models->cellphone      = $request["cellphone"];
        $models->admission_date = $request["admission_date"];
        $models->birth_date     = $request["birth_date"];
        $models->sede_id        = $request["sede_id"];
        $models->birth_country  = $request["birth_country"];
        $models->birth_city     = $request["birth_city"];
        $models->eps_id         = $request["eps_id"];
        $models->afp_id         = $request["afp_id"];
        $models->ccf_id         = $request["ccf_id"];
        $models->country_id     = $request["country_id"];
        $models->city_id        = $request["city_id"];
        $models->status_id      = 2;
        $models->category_id    = 1;

        $models->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function show(Modelo $modelo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function edit(Modelo $modelo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $modelo)
    {
        $models = Modelo::find($modelo);

        $models->identification = $request["identification"];
        $models->name           = $request["name"];
        $models->lastname       = $request["lastname"];
        $models->address        = $request["address"];
        $models->email          = $request["email"];
        $models->cellphone      = $request["cellphone"];
        $models->admission_date = $request["admission_date"];
        $models->sede_id        = $request["sede_id"];

        $models->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modelo $modelo)
    {
        //
    }
}
