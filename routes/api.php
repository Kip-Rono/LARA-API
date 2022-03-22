<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SparePartsController;
use App\Http\Controllers\MechanicsController;

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

//fetch all spare parts in inventory
Route::get('fetch_spare_parts', [SparePartsController::class, 'fetchSpareParts']);

//save / add spare parts
Route::post('save_new_spare_parts', [SparePartsController::class, 'saveSpareParts']);

//save services offered by mechanic
Route::post('save_pair_mechanic_services', [MechanicsController::class, 'saveMechanicsServices']);

//fetch mechanics and the services they offer
Route::get('fetch_mechanic_services/{mechanic_id}', [MechanicsController::class, 'fetchMechanicServices']);


