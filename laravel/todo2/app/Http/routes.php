<?php


use App\Task as Task;
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


// Authentication Routes...
/*

Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

// Registration Routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

*/
Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/', 'HomeController@indexslash');

    Route::get('/dashboard', 'TaskController@indexdashboard');

    Route::get('/tasks', 'TaskController@index');
	Route::post('/task', 'TaskController@store');
	Route::delete('/task/{task}', 'TaskController@destroy');
	Route::put('/task/{done}/{task}', 'TaskController@put');

	/*Route::put('/task/{done}/{task}', function($done, Task $task) {
		Task::where( 'id', $task->id )->update([ 'done' => $done ]);

        //return redirect( '/tasks' );
        echo $done;
        echo $task;
	});*/
});
