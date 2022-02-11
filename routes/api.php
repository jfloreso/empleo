<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\models\Employee;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();


});

  Route::apiResource('/employees', EmployeeController::class);
  Route::get("/empleados", function () {
    $data= Employee::orderBy('id', 'DESC')->get();
      return view ('empleados', compact('data'));
  })->name('empleados');
  Route::get('create', function () {
      return view ('create');
  })->name('create');

  Route::get('destroy', 'App\Http\Controllers\EmployeeController@destroy')->name('destroy');
  Route::get('edit', 'App\Http\Controllers\EmployeeController@edit')->name('edit');
  Route::get('mostrar/{employee}', 'App\Http\Controllers\EmployeeController@mostrar')->name('mostrar');








