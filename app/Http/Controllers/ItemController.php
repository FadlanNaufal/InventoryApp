<?php

namespace App\Http\Controllers;

use App\Item;
use App\Room;
use App\Type;
use Auth;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.item.index',['data'=>Item::latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.item.create',[
            'room'=>Room::all(),
            'type'=>Type::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
            'name'=>'required',
            'item_code'=>'required',
            'desc'=>'required',
            'total'=>'required',
            'room_id'=>'required',
            'type_id'=>'required',
        ]); 

         $item = new Item($request->all());
         $item->user_id = Auth::user()->id;

         $item->save();

         return redirect()->route('item.index')->with('success','Item Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view('pages.admin.item.supply',['data'=>$item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view('pages.admin.item.edit',[
            'data'=>$item,
            'room'=>Room::all(),
            'type'=>Type::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
 

         $item->update($request->except('_method','_token'));



         return redirect()->route('item.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return back()->with('success','Item Deleted');;
    }
}
