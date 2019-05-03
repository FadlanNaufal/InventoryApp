<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Borrow;
use App\BorrowDetail;
use App\Maintain;
use App\Item;
use App\Room;
use App\Supply;
class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pinjam(Request $request)
    {
        $to = $request->tgl_akhir;
        $from = $request->tgl_awal;

        return view('pages.admin.laporan.index',[
            'data'=>Borrow::whereBetween('borrow_date',[$from,$to])->get()
        ]);
    }   

     public function ruang(Request $request)
    {
        return view('pages.admin.laporan.ruang',[
            'room'=>Room::all(),
            'data'=>Item::where('room_id',$request->room_id)->get(),
        ]);
    }

    public function rusak(Request $request)
    {    
        $to = $request->tgl_akhir;
        $from = $request->tgl_awal;

        return view('pages.admin.laporan.broken',[
              'data'=>Maintain::whereBetween('broken_date',[$from,$to])->get()
        ]);
    }


    public function denied()
    {    
       
        return view('pages.admin.laporan.broken',[
              'data'=>BorrowDetail::where('status','denied')->get()
        ]);
    }    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
