<?php

namespace App\Http\Controllers;

use App\BorrowDetail;
use App\Borrow;
use App\Maintain;
use App\Item;
use Illuminate\Http\Request;

class BorrowDetailController extends Controller
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
         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // Tombol Pindah Item Ke Table Temporary
    {
        $this->validate($request,[
            'borrow_id'=>'required',
            'item_id'=>'required',
            'total'=>'required',
        ]);

        $item = Item::where('id',$request->item_id);

        if($item->first()->total < $request->total){
            return back();
        }else{
            $borrowDetail = BorrowDetail::where([
                'borrow_id'=>$request->borrow_id,
                'item_id'=>$request->item_id,
            ]);

            $current = $item->first()->total -  $request->total;

            if ($borrowDetail->count() > 0) {
                $borrowDetail->update([
                    'total'=>$borrowDetail->first()->total + $request->total,
                ]);
            }else{
                $id = BorrowDetail::create($request->all())->id;
            }
            $item->update([
                'total'=> $current 
            ]);
        }

        return back()->with('success','Added To Cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BorrowDetail  $borrowDetail
     * @return \Illuminate\Http\Response
     */
    public function show($borrow)
    {
        return view('pages.admin.borrow.return',[
            'data'=>Borrow::find($borrow)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BorrowDetail  $borrowDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(BorrowDetail $borrowDetail)
    {
        $detail = $borrowDetail;
        return view('pages.admin.borrow.detail',compact('detail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BorrowDetail  $borrowDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $borrow) // Tombol Pengembalian + Maintain bila ada rusak
    {
        $old_borrow = Borrow::find($borrow);
        for($i = 0;$i< count($request->item_id);$i++)
        {
            $item = Item::find($request->item_id[$i]);
            if($request->total[$i] < $request->total_broken[$i])
            {
                return back()->with('success','Lebih Teuing');
            }
            $after_total = $request->total[$i] - $request->total_broken[$i];
            
            $item->update([
                'total'=>$item->total + $after_total,
            ]);
            if($request->total_broken[$i] > 0)
            {
                Maintain::create([
                    'item_id'=>$request->item_id[$i],
                    'total'=>$request->total_broken[$i],
                    'borrow_id'=>$old_borrow->id,
                    'broken_date'=>date("Y-m-d"),
                ]);
            }
        }
        $old_borrow->update([
            'status'=>'returned',
            'returned_on'=>date('y-m-d'),
        ]);
        if ($old_borrow->returned_on > $old_borrow->return_date) {
            $old_borrow->update([
                'status_denda'=>'aktif'
            ]); 
        }else{
            $old_borrow->update([
                'status_denda'=>'non-aktif'
            ]); 
        }

        return redirect()->route('borrow.index')->with('message','Berhasil Mengembalikan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BorrowDetail  $borrowDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(BorrowDetail $borrowDetail)
    {
        $item = $borrowDetail->item;
        $total = $borrowDetail->total;

        $item->update([
            'total'=>$item->total + $total
        ]);
        
        $borrowDetail->delete();

        return back()->with('success','Berhasil Batal Pinjam');
    }
}

 