<?php

namespace App\Http\Controllers;

use App\FacturationRule;
use Illuminate\Http\Request;

class FacturationRuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rule = FacturationRule::with('infomodelo')
                               ->with('sede')
                               ->with('pagina')
                               ->get();

        return $rule;
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
        $rule = new FacturationRule();

        $rule->init_date    = $request["init_date"];
        $rule->minimun      = $request["minimun"];
        $rule->maximum      = $request["maximum"];
        $rule->percentage   = $request["percentage"];
        $rule->trm          = $request["trm"];
        $rule->page_id      = $request["page_id"];
        $rule->model_id     = $request["model_id"];
        $rule->sede_id      = $request["sede_id"];

        $rule->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FacturationRule  $facturationRule
     * @return \Illuminate\Http\Response
     */
    public function show(FacturationRule $facturationRule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FacturationRule  $facturationRule
     * @return \Illuminate\Http\Response
     */
    public function edit(FacturationRule $facturationRule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FacturationRule  $facturationRule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $facturationRule)
    {
        $rule = FacturationRule::find($facturationRule);

        $rule->init_date    = $request["init_date"];
        $rule->minimun      = $request["minimun"];
        $rule->maximum      = $request["maximum"];
        $rule->percentage   = $request["percentage"];
        $rule->trm          = $request["trm"];
        $rule->page_id      = $request["page_id"];
        $rule->model_id     = $request["model_id"];
        $rule->sede_id      = $request["sede_id"];

        $rule->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FacturationRule  $facturationRule
     * @return \Illuminate\Http\Response
     */
    public function destroy(FacturationRule $facturationRule)
    {
        //
    }
}
