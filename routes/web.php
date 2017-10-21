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

Route::get('/',[
    'uses'=>'HomeController@welcome',
    'as'=>'welcome'
]);
Route::post('/resultViewBy',[
    'uses'=>'HomeController@viewBy',
    'as'=>'resultViewBy'
]);

Route::get('/detailResult/{id}',[
    'uses'=>'HomeController@detailResult',
    'as'=>'detailResult'
]);





Auth::routes();
Route::group(['middleware'=>'auth'],function (){


Route::get('/dashboard',[
    'uses'=>'HomeController@index',
    'as'=>'dashboard'
]);

Route::get('/student',[
    'uses'=>'StudentController@student',
    'as'=>'student'
]);

Route::post('/newStudent',[
    'uses'=>'StudentController@newStudent',
    'as'=>'newStudent'
]);

Route::get('/yearMajor',[
    'uses'=>'StudentController@yearMajor',
    'as'=>'yearMajor'
]);

Route::get('/examResult',[
    'uses'=>'ResultController@examResult',
    'as'=>'examResult'
]);

Route::get('/idTo/{id}',[
    'uses'=>'ResultController@idTo',
    'as'=>'idTo'
]);



Route::post('/newMarks',[
    'uses'=>'ResultController@newMarks',
    'as'=>'newMarks'
]);


Route::post('/newYearMajor',[
    'uses'=>'StudentController@newYearMajor',
    'as'=>'newYearMajor'
]);

Route::get('/deleteYearMajor,{id}',[
    'uses'=>'StudentController@deleteYearMajor',
    'as'=>'deleteYearMajor'
]);

Route::get('/deleteStudent,{id}',[
    'uses'=>'StudentController@deleteStudent',
    'as'=>'deleteStudent'
]);

Route::get('/studentDetail/{name}',[
    'uses'=>'StudentController@studentDetail',
    'as'=>'studentDetail'
    ]);
Route::get('/getImage/{stdPhoto}',[
    'uses'=>'StudentController@getImage',
    'as'=>'getImage'
]);

Route::post('/updateStudent',[
    'uses'=>'StudentController@updateStudent',
    'as'=>'updateStudent'
]);
Route::post('/viewBy',[
   'uses'=>'StudentController@viewBy',
    'as'=>'viewBy'
]);

Route::post('/examViewBy',[
    'uses'=>'ResultController@viewBy',
    'as'=>'examViewBy'
]);

});





