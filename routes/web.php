<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\Section2Controller;

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

//Authentication routes
Route::get('auth/login',[EtudiantController::class,'login'])->name('login')->middleware('isLogged');
Route::get('auth/signin',[EtudiantController::class,'signin'])->name('signin')->middleware('isLogged');
Route::post('auth/register',[EtudiantController::class,'register'])->name('register');
Route::post('auth/check',[EtudiantController::class,'check'])->name('check');

//Pages routes
Route::get('/home',[EtudiantController::class,'home'])->name('home')->middleware('isNotLogged');
Route::get('/home/logout',[EtudiantController::class,'logout'])->name('logout')->middleware('isNotLogged');
Route::get('/home/section/{id}',[EtudiantController::class,'section'])->name('sections')->middleware('isNotLogged');
//section1 routes
Route::get('/home/section/1/apprendre',function(){ return view('section1/exercice'); })->name('apprendre');
Route::get('/home/section/1/chalenge',function(){ return view('section1/chalenge'); })->name('chalenge');
Route::get('/home/section/1/',function(){ return view('home/sectionContent');})->name('section1');
//section2 routes
Route::get('home/section/{id}/exercice1',[Section2Controller::class,'exercice1'])->name('exercice1')->middleware('isNotLogged');
Route::get('/',function(){
    return view('index');
});
Route::get('/score/add',[EtudiantController::class,'addSectionScore']);
Route::get('/vie/get',[EtudiantController::class,'etudiantVieInfo']);

