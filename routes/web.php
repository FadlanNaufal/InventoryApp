<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login/emp','EmpAuth\LoginController@show')->name('show');
Route::post('/login/emp','EmpAuth\LoginController@login')->name('login.emp');


Route::get('/dashboard', function () {
	$borrow = App\BorrowDetail::count();
	$item = App\Item::count();
	$room = App\Room::count();
	$rusak = App\Maintain::where('total','>',0)->count();
    return view('pages.admin.dashadmin',compact('borrow','item','rusak','room'));
});


Route::get('dashboard/employee', function () {
    return view('pages.employee.dashboard');
});

Route::get('/dashboard/employee','EmployeeController@dashboard')->name('dash.emp');
Route::get('/laporan/pinjam','LaporanController@pinjam');
Route::post('/laporan/pinjam','LaporanController@pinjam')->name('laporantgl');

Route::get('/laporan/rusak','LaporanController@rusak');
Route::post('/laporan/rusak','LaporanController@rusak')->name('laporanrusak');

Route::get('/laporan/ruang','LaporanController@ruang');
Route::post('/laporan/ruang','LaporanController@ruang')->name('laporanruang');

Route::get('/laporan/denied','LaporanController@denied');


Auth::routes();


route::resources([
'room'=>'RoomController',
'type'=>'TypeController',
'supply'=>'SupplyController',
'item'=>'ItemController',
'maintain'=>'MaintainController',
'borrow'=>'BorrowController',
'borrow_detail'=>'BorrowDetailController',
'employee'=>'EmployeeController',
]);

Route::get('/home', 'HomeController@index')->name('home');

