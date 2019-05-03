<?php

namespace App\Http\Controllers\EmpAuth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'dashboard/employee';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:employee')->except('logout');
    }

    public function show(){
    	return view('auth.EmpLogin');
    }

    public function login(Request $request){


    	$auth = Auth::guard('employee')->attempt([
    		'nip'=>$request->nip,
    		'password'=>$request->password,
    	]);

    	if($auth){
    		return redirect()->route('dash.emp');
    	}else{
    		return back()->with('danger','Login Failed');
    	}
    }
}
