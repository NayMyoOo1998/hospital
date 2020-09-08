<?php

use App\Patient;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    
    Route::get('notallowforlab', 'PageController@notallowforlab');
    Route::get('notallowfordoctor', 'PageController@notallowfordoctor');

    Route::get('/', 'PageController@index');
    // lab 
    Route::get('labs-list', 'PageController@labList');
    Route::get('add-labs', 'PageController@addLabs')->middleware('IsLab');
    Route::post('add-labs', 'LabController@store')->middleware('IsLab');
    Route::post('labupdate/{id}', 'LabController@update')->middleware('IsLab');
    Route::get('lab-delete/{id}', 'LabController@destroy')->middleware('IsLab');
    Route::get('lab-list-search', 'LabController@search');
    Route::get('labs_list_searchempty', 'LabController@searchEmpty');
    Route::get('lab-order', 'LabController@labOrder');


    // patient 
    Route::get('patients-list', 'PageController@patientsList');
    Route::get('add-patients', 'PageController@addPatients')->middleware('IsDoctor');
    Route::post('add-patients', 'PatientController@store');
    Route::get('patient-delete/{id}','PatientController@destroy')->middleware('IsDoctor');
    Route::get('patients-search', 'PatientController@search');
    Route::get('patients-empty-list', 'PatientController@patientEmpty');
    Route::get('patients-list-order', 'PatientController@patientOrder');
    


    Route::get('report', 'PageController@report');
    Route::get('report-view/{id}', 'PageController@reportView');

    // test 
    Route::get('test-list', 'PageController@testList');
    Route::get('add-test/{id}', 'TestController@addTest')->middleware('IsLab');
    Route::post('add-test', 'TestController@store');



});
