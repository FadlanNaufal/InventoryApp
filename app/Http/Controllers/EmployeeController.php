<?php

 namespace App\Http\Controllers;

use App\Employee;
use App\Borrow;
use Hash;
use Auth;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.employee.index',['data'=>Employee::all()]);
    }

    public function dashboard()
    {
        $borrow = Borrow::where('employee_id',Auth::guard('employee')->user()->id)->count();
        $borrowed = Borrow::where('employee_id',Auth::guard('employee')->user()->id)
                          ->where('status','=','borrowed')
                          ->count();

        return view('pages.employee.dashboard',compact('borrow','borrowed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.employee.create');
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
            'nip'=>'required',
            'address'=>'required',
        ]);

        $e = new Employee($request->all());
        $e->password = Hash::make($request->nip);
        $e->save();

        return redirect()->route('employee.index')->with('success','Employee Added');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return back()->with('success','Employee Deleted');
    }
}
