<?php

namespace App\Http\Controllers;

use App\MarketItem;
use Illuminate\Http\Request;

class MarketItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('market')->with([
            'c_page'=>'market'
        ]);
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
     * @param  \App\MarketItem  $marketItem
     * @return \Illuminate\Http\Response
     */
    public function show(MarketItem $marketItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MarketItem  $marketItem
     * @return \Illuminate\Http\Response
     */
    public function edit(MarketItem $marketItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MarketItem  $marketItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MarketItem $marketItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MarketItem  $marketItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(MarketItem $marketItem)
    {
        //
    }
}
