<?php

namespace App\Http\Controllers;

use App\SalesConsolidate;
use App\Sales;
use App\FacturationRule;
use App\Sedes;
use Illuminate\Http\Request;

class SalesConsolidateController extends Controller
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

    public function Liquidar()
    {
        //
        $initialDate = date('2020-01-01');
        $ventas = Sales::whereNull('consolidate_id')
                       ->where('sales_date','>=',$initialDate)
                       //->where('sales_date','<=',$initialDate)
                       //->orderBy('model_id asc', 'page_id asc')
                       ->get();

        $ventaTotal = 0;
        $ventaPagina = 0;
        $ventaTokens = 0;
        $ventaDollars = 0;
        $page_id = 0;
        $model_id = 0;
        $percentage = 0;
        foreach ($ventas as $venta) {

          //die();
          if($page_id != $venta->page_id){
            //var_dump($venta);
            if($page_id != 0){
              if($page_id = -1 ){
                $page_id = 1;
              }

            //Se valida si tiene regla para las ventas en la pagina y modelo
            $rule = FacturationRule::whereNull('final_date')
                                     ->where('page_id',$venta->page_id)
                                     ->where('model_id',$venta->model_id)
                                     ->where('minimun','>=', $ventaPagina)
                                     ->where('maximum','<=',$ventaPagina)
                                     ->first();


            //Se valida si se tiene regla para la modelo y página
            if(!isset($rule)){
              $rule = FacturationRule::whereNull('final_date')
                                     ->whereNull('minimun')
                                     ->whereNull('maximum')
                                     ->whereNull('sede_id')
                                     ->where('page_id',$venta->page_id)
                                     ->where('model_id',$venta->model_id)
                                     ->first();
            }


            //Se valida si se tiene regla para la modelo unicamente
            if(!isset($rule)){
              $rule = FacturationRule::whereNull('final_date')
                                     ->whereNull('minimun')
                                     ->whereNull('maximum')
                                     ->whereNull('sede_id')
                                     ->whereNull('page_id')
                                     ->where('model_id',$venta->model_id)
                                     ->first();
            }

            //Se valida si tiene regla para las ventas en la pagina y sede
            if(!isset($rule)){
              $rule = FacturationRule::whereNull('final_date')
                                      ->whereNull('model_id')
                                      ->where('page_id',$venta->page_id)
                                     ->where('sede_id',$venta->sede_id)
                                     ->where('minimun','>=', $ventaPagina)
                                     ->where('maximum','<=',$ventaPagina)
                                     ->first();
            }

            //Se valida si se tiene regla para la página y la sede
            if(!isset($rule)){
              $rule = FacturationRule::whereNull('final_date')
                                     ->whereNull('minimun')
                                     ->whereNull('maximum')
                                     ->whereNull('model_id')
                                     ->where('page_id',$venta->page_id)
                                     ->where('sede_id',$venta->sede_id)
                                     ->first();
            }

            //Se valida si tiene regla para las ventas en la pagina y sede
            if(!isset($rule)){
              $rule = FacturationRule::whereNull('final_date')
                                     ->whereNull('model_id')
                                     ->whereNull('sede_id')
                                     ->where('page_id',$venta->page_id)
                                     ->where('minimun','>=', $ventaPagina)
                                     ->where('maximum','<=',$ventaPagina)
                                     ->first();
            }

            //Se valida si se tiene regla para la sede unicamente
            if(!isset($rule)){
              $rule = FacturationRule::whereNull('final_date')
                                     ->whereNull('minimun')
                                     ->whereNull('maximum')
                                     ->whereNull('model_id')
                                     ->whereNull('page_id')
                                     ->where('sede_id',$venta->sede_id)
                                     ->first();
            }

            //Se valida si se tiene regla para la página unicamente
            if(!isset($rule)){
              $rule = FacturationRule::whereNull('final_date')
                                     ->whereNull('minimun')
                                     ->whereNull('maximum')
                                     ->whereNull('sede_id')
                                     ->whereNull('model_id')
                                     ->where('page_id',$venta->page_id)
                                     ->first();
            }

            // Si no se encuentra regla se escoge el porcentaje de la sede
            if(!isset($rule)){
              $sedeInfo = Sedes::find($venta->sede_id);
              $percentage = $sedeInfo->type;
            }else{
              $percentage = $rule->percentage;
            }

            $ventasConsolidada = new SalesConsolidate();

            $ventasConsolidada->total_paid        = $ventaPagina;
            $ventasConsolidada->total_dollars     = $ventaDollars;
            $ventasConsolidada->total_tokens      = $ventaTokens;
            $ventasConsolidada->percentage_paid   = $percentage;
            $ventasConsolidada->facturation_date  = date("Y-m-d");
            $ventasConsolidada->page_id           = $page_id;
            $ventasConsolidada->model_id          = $model_id;
            $ventasConsolidada->sede_id           = $venta->sede_id;
            if(isset($rule)){
              $ventasConsolidada->rule_id         = $rule->id;
            }

            $ventasConsolidada->save();
          }
             $page_id =  $venta->page_id;
             $ventaPagina = 0;
             $ventaTokens = 0;
             $ventaDollars = 0;

          }else{
             $ventaPagina = $ventaPagina + (($venta->tokens * 0.05) + $venta->dollars);
             $ventaTokens = $venta->tokens;
             $ventaDollars = $venta->dollars;

          }
            if($model_id != $venta->model_id){
              if($model_id != 0 ){
                //Se valida si se tiene regla para el rango de $ventas
                $rule = FacturationRule::whereNull('final_date')
                ->where('minimun',$venta->$ventaTotal)
                ->where('maximum',$venta->$ventaTotal)
                ->first();
                /*if(isset($rule)){
                  SalesConsolidate::where()
                }*/
              }

              $model_id = $venta->model_id;
              $ventaTotal = 0;
              $page_id = 0;
            //  $page_id = -1;
            }else{
              $ventaTotal = $ventaTotal + (($venta->tokens * 0.05) + $venta->dollars);
            }



        }
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
     * @param  \App\SalesConsolidate  $salesConsolidate
     * @return \Illuminate\Http\Response
     */
    public function show(SalesConsolidate $salesConsolidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SalesConsolidate  $salesConsolidate
     * @return \Illuminate\Http\Response
     */
    public function edit(SalesConsolidate $salesConsolidate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SalesConsolidate  $salesConsolidate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SalesConsolidate $salesConsolidate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SalesConsolidate  $salesConsolidate
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalesConsolidate $salesConsolidate)
    {
        //
    }
}
