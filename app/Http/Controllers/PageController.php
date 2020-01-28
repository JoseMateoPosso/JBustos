<?php

namespace App\Http\Controllers;

use App\Page;
use App\PagesSede;
use App\Sedes;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginas = Page::with("categoria")->orderBy("name")->get();

        return $paginas;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $txtHttp = 'http://';
        $url = $request['url'];
        $urlogin = $request['url_login'];
        $pos = strpos($url, $txtHttp);
        if($pos === false && $url != '')
          $url = $txtHttp.$url;

        $pos = strpos($urlogin, $txtHttp);
        if($pos === false && $urlogin != '')
            $urlogin = $txtHttp.$urlogin;

        $paginas = new Page();

        $paginas->name            = $request['name'];
        $paginas->url             = $url;
        $paginas->url_login       = $urlogin;
        $paginas->category_id     = $request['category_id'];
        $paginas->column_nick     = strtoupper($request['column_nick']);
        $paginas->column_value    = strtoupper($request['column_value']);
        $paginas->status_id       = 2;

        $paginas->save();

        $sedes = Sedes::get();

        foreach ($sedes as $key => $value) {
            $pageSede = new PagesSede();

            $pageSede->sede_id = $value->id;
            $pageSede->page_id = $paginas->id;
            $pageSede->status_id = 2;

            $pageSede->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $paginas = Page::find($id);

        $paginas->name            = $request['name'];
        $paginas->url             = $request['url'];
        $paginas->url_login       = $request['url_login'];
        $paginas->category_id     = $request['category_id'];
        $paginas->column_nick     = strtoupper($request['column_nick']);
        $paginas->column_value    = strtoupper($request['column_value']);
        $paginas->status_id       = 2;

        $paginas->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        //
    }
}
