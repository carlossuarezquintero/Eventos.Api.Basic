<?php

namespace App\Http\Controllers;

use App\Tipoid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\DB;


class TipoidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $this->middleware('atu')->except('logout');
        
        $listaid = DB::Table('tiposid')
        ->select('*')
        ->orderBy('id', 'ASC')->get();
        
       // return response()->json(compact('listaid'), 200);
       return $this->showAll($listaid);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return 1;
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
     * @param  \App\Tipoid  $tipoid
     * @return \Illuminate\Http\Response
     */
    public function show(Tipoid $tipoid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tipoid  $tipoid
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipoid $tipoid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tipoid  $tipoid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipoid $tipoid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tipoid  $tipoid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipoid $tipoid)
    {
        //
    }
}
