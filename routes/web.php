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
use App\Dept_emp;
 
Route::get('/', function () {
    return view('index');
});
Route::get('/charts', function () {
    return view('charts');
});
Route::get('/salaries', function () {
    return view('salaries');
});
Route::get('/titles', function () {
    return view('titles');
});
Route::get('/gender', function () {
    return view('gender');
});
Route::get('/staff', function () {
    return view('staff');
});
Route::get('show', 'employeesController@show')->name('employees.show');
Route::get('demo/custom-view', function () {
    return view('demo/custom-view');
});
Route::get('/search','SearchController@search');
Route::get('marketing.show', function(){
	$dept_emps = Dept_emp::where('dept_no', 'd001')->paginate(20);
	return View::make('show', ['dept_emps'=>$dept_emps]);
})->name('marketing.show');
Route::get('finance.show', function(){
	$dept_emps = Dept_emp::where('dept_no', 'd002')->paginate(20);
	return View::make('show', ['dept_emps'=>$dept_emps]);
})->name('finance.show');
Route::get('human.show', function(){
	$dept_emps = Dept_emp::where('dept_no', 'd003')->paginate(20);
	return View::make('show', ['dept_emps'=>$dept_emps]);
})->name('human.show');
Route::get('production.show', function(){
	$dept_emps = Dept_emp::where('dept_no', 'd004')->paginate(20);
	return View::make('show', ['dept_emps'=>$dept_emps]);
})->name('production.show');
Route::get('development.show', function(){
	$dept_emps = Dept_emp::where('dept_no', 'd005')->paginate(20);
	return View::make('show', ['dept_emps'=>$dept_emps]);
})->name('development.show');
Route::get('quality.show', function(){
	$dept_emps = Dept_emp::where('dept_no', 'd006')->paginate(20);
	return View::make('show', ['dept_emps'=>$dept_emps]);
})->name('quality.show');
Route::get('sales.show', function(){
	$dept_emps = Dept_emp::where('dept_no', 'd007')->paginate(20);
	return View::make('show', ['dept_emps'=>$dept_emps]);
})->name('sales.show');
Route::get('research.show', function(){
	$dept_emps = Dept_emp::where('dept_no', 'd008')->paginate(20);
	return View::make('show', ['dept_emps'=>$dept_emps]);
})->name('research.show');
Route::get('service.show', function(){
	$dept_emps = Dept_emp::where('dept_no', 'd009')->paginate(20);
	return View::make('show', ['dept_emps'=>$dept_emps]);
})->name('service.show');

Route::get('ifMan', 'employeesController@ifMan')->name('ifMan');
Route::get('charter', 'ChartController@charter')->name('charter');
Route::get('charter1', 'ChartController@charter1')->name('charter1');
Route::get('charter2', 'ChartController@charter2')->name('charter2');
Route::get('charter3', 'ChartController@charter3')->name('charter3');
Route::get('charter4', 'ChartController@charter4')->name('charter4');