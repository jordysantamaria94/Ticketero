<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::post('/', [HomeController::class, 'search']);

Route::get('event/{type}/{id}', [EventController::class, 'index']);
Route::get('event/destination/{id}/{name}/{lat}/{lng}/{radius}', [EventController::class, 'destination']);
Route::get('search-tickets/{id}', [EventController::class, 'searchTickets']);
Route::get('search-hotel/{start}/{end}/{lat}/{lng}/{radius}/{city}/{rooms}/{adults}/{children}', [EventController::class, 'searchHotel']);
Route::get('reserve-room/{name}/{city}/{area}/{cost}/{nights}', [EventController::class, 'reserveRoom']);

Route::post('buy-tickets/{idTicket}/{idEvent}', [EventController::class, 'buyTickets']);
Route::post('search-hotel/{lat}/{lng}/{radius}/{city}', [EventController::class, 'redirectSearchHotel']);