<?php

namespace App\Http\Controllers;

use App\Borrow;
use App\BorrowDetail;
use Auth;
use App\Item;
use App\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() // HALAMAN AWAL BORROW
    {
        if(Auth::guard('employee')->check()){
            $data = Borrow::where('employee_id',Auth::guard('employee')->user()->id)->get();
        }else{
            $data = Borrow::latest()->get();
        }

        return view('pages.admin.borrow.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.borrow.create',['data'=>Employee::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // TOMBOL MULAI PINJAM
    {
        $carbon = Carbon::now();

        if(Auth::guard('web')->check()){
            $borrow = new Borrow($request->all());
            $borrow->borrow_date = Carbon::now();
            $borrow->return_date = $carbon->addDays($request->return_date);
            $borrow->status = "uncomplete";
            $borrow->status_denda = "non-aktif";
            $borrow->user_id = Auth::user()->id;
            $borrow->approve = 1;
            $borrow->save();
        }else{
            $borrow = new Borrow($request->all());
            $borrow->borrow_date = Carbon::now();
            $borrow->status = "uncomplete";
            $borrow->return_date = $carbon->addDays($request->return_date);
            $borrow->employee_id = Auth::guard('employee')->user()->id;
            $borrow->status_denda = "non-aktif";
            $borrow->approve = 0;
            $borrow->save();
        }

        return redirect()->route('borrow.show',$borrow);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function show(Borrow $borrow) // PILIH ITEM DI TABLE UTAMA
    {
        return view('pages.admin.borrow.next',[
            'borrow'=>$borrow,
            'item'=>Item::where('total','>',0)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function edit(Borrow $borrow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request;
     * @param  \App\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Borrow $borrow) // TOMBOL DONE SELESAI PINJAM
    {
        if (Auth::guard('web')->check()) {
            $borrow->update([
                'status' => 'borrowed'
            ]);
            return redirect()->route('borrow.index')->with('success','Peminjaman Berhasil');;
        }else{
             $borrow->update([
                'status' => 'book'
            ]);
            return redirect()->route('borrow.index')->with('success','Peminjaman Berhasil , Tunggu Konfirmasi Dari Admin');;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request ,Borrow $borrow) // TOMBOL ACC / REJECT 
    {
        if($request->approve == 1){
            $borrow->update([
                'status' => 'borrowed',
                'approve' => 1,
                'user_id' => Auth::user()->id
            ]);
        }else{

            foreach($borrow->detail_borrow as $show){
                $item = Item::find($show->item_id);
                $item->update([
                    'total'=>$item->total + $show->total
                ]);
            }

            $borrow->detail_borrow()->update([
                'status'=>'denied'
            ]);

            $borrow->update([
                'status'=>'denied'
            ]);
        }
        return back();
    }
}
