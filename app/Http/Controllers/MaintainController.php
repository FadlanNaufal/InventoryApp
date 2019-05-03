<?php

namespace App\Http\Controllers;

use App\Maintain;
use Illuminate\Http\Request;

class MaintainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.maintain.index',[
            'data'=>Maintain::latest()->get()
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
     * @param  \App\Maintain  $maintain
     * @return \Illuminate\Http\Response
     */
    public function show(Maintain $maintain)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Maintain  $maintain
     * @return \Illuminate\Http\Response
     */
    public function edit(Maintain $maintain)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Maintain  $maintain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maintain $maintain)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Maintain  $maintain
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maintain $maintain)
    {
        $item = $maintain->item;

        $item->update([
            'total'=>$item->total + $maintain->total
        ]);

        $maintain->update([
            'fix_date'=>date('y-m-d')
        ]);

        return redirect()->route('maintain.index')->with('success','Item Fixed');;
    }

}
